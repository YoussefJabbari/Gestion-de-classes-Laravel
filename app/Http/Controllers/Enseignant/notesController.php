<?php

namespace App\Http\Controllers\Enseignant;

use App\Models\Classe;
use App\Models\Etudiant;
use App\Models\Evaluation;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Validator;
use Maatwebsite\Excel\Facades\Excel;


class notesController extends Controller
{
    //
    public function index($id)
    {
        //TODO fin a solution for the not found id
        $classe = Classe::findOrFail($id);
        return view('enseignant.notes')->with('classe',$classe);
    }

    public function calcul($id, Request $request)
    {
        $classe = Classe::findOrFail($id);

//        $validator = $this->validator($request->all());
//
//        if ($validator->fails()) {
//            $this->throwValidationException(
//                $request, $validator
//            );
//        }

        //Inserer les propriétés saisies au formulaire

        $classe->pourcent_devoir = $request->input('pourcentage_devoir');
        $classe->pourcent_assiduite = $request->input('pourcentage_assiduite');
        $classe->pourcent_exam = $request->input('pourcentage_examen');
        $classe->pourcent_controle = $request->input('pourcentage_controle');

        if ($request->input('pourcentage_assiduite') != 0)
        {
            $classe->note_reference = $request->input('note_reference');
            $classe->nbr_seance = $request->input('nbr_seance');
        }

        $classe->save();





        //Calcul de la note d'assiduite

        if ($request->input('pourcentage_assiduite') != 0)
        {
            foreach ($classe->etudiants as $etudiant)
            {
                $prc_assiduite = ($request->input('nbr_seance') - $etudiant->evaluation($classe->id)->nbr_absence) / $request->input('nbr_seance');
                $note_assiduite = $prc_assiduite * $request->input('note_reference');
                Evaluation::where(['etudiant_id' => $etudiant->id, 'classe_id' => $classe->id])->update(['note_presence' => $note_assiduite]);
            }
        }




        //Calcul de la note des devoirs

        if ($request->input('pourcentage_devoir') != 0)
        {
            foreach ($classe->etudiants as $etudiant)
            {
                $nbr_devoirs = 0;
                $note_devoir = 0;
                foreach ($classe->devoirs as $devoir)
                {
                    if (count($etudiant->travail($devoir->id)) != 0)
                    {
                        $note_devoir += $classe->travail($etudiant->id, $devoir->id)->note_devoir;
                        $nbr_devoirs++;
                    }
                }
                Evaluation::where(['etudiant_id' => $etudiant->id, 'classe_id' => $classe->id])->update(['note_devoir' => $note_devoir]);
            }
        }






        // Calcul de la note Globale

        foreach ($classe->evaluations as $evaluation)
        {
            if ($evaluation->note_normale >= 10)
            {
                $noteGlobale = ($request->input('pourcentage_devoir')/100)    * $evaluation->note_devoir
                             + ($request->input('pourcentage_assiduite')/100) * $evaluation->note_presence
                             + ($request->input('pourcentage_controle')/100)  * $evaluation->note_controle
                             + ($request->input('pourcentage_examen')/100)    * $evaluation->note_normale ;
            }
            else
            {
                $noteGlobale = ($request->input('pourcentage_devoir')/100)    * $evaluation->note_devoir
                             + ($request->input('pourcentage_assiduite')/100) * $evaluation->note_presence
                             + ($request->input('pourcentage_controle')/100)  * $evaluation->note_controle
                             + ($request->input('pourcentage_examen')/100)    * $evaluation->note_rattrapage ;
            }

            Evaluation::where(['etudiant_id' => $evaluation->etudiant_id, 'classe_id' => $classe->id])->update(['note_globale' => $noteGlobale]);
        }






        //Création des fichiers EXCEL




//        Excel::create('Filename', function($excel) {

//            // Set the title
//            $excel->setTitle('Our new awesome title');

//            // Chain the setters
//            $excel->setCreator('Maatwebsite')
//                ->setCompany('Maatwebsite');

//            // Call them separately
//            $excel->setDescription('A demonstration to change the file properties');

//        });


        ini_set('xdebug.max_nesting_level', 1000);
       Excel::create('Resultats de calculs' . $classe->id . 'test', function($excel){


           //Title name
            $excel->setTitle('Resultats de calculs');

            //Setters
            $excel->setCreator('ENS0')->setCompany('GDC app');

            //Sheet 1
            $excel->sheet('Notes Globales', function($sheet) {

                $evaluation = Evaluation::leftjoin('etudiants', 'etudiants.id', '=', 'evaluations.etudiant_id')
                                        ->leftjoin('users', 'users.id', '=', 'etudiants.user_id')
                                        ->select(DB::raw('etudiants.user_id as CNE,
                                                          users.nom as Nom,
                                                          users.prenom as Prenom,
                                                          users.email as Email,
                                                          evaluations.note_globale as "Note globale"'))
                                        ->get();
                $sheet->fromArray($evaluation, null, 'A1', true);

            });

            //Sheet 2
            $excel->sheet('Notes Detaillees', function($sheet) {

                $evaluation = Evaluation::leftjoin('etudiants', 'etudiants.id', '=', 'evaluations.etudiant_id')
                                        ->leftjoin('users', 'users.id', '=', 'etudiants.user_id')
                                        ->select(DB::raw('etudiants.user_id as CNE,
                                                          users.nom as Nom,
                                                          users.prenom as Prenom,
                                                          users.email as Email,
                                                          evaluations.note_presence as "Note d\'assiduite",
                                                          evaluations.note_devoir as "Notes des devoirs",
                                                          evaluations.note_controle as "Notes des controles",
                                                          evaluations.note_normale as "Notes d\'examen-Normale",
                                                          evaluations.note_rattrapage as "Notes d\'examen-Rattrapage",
                                                          evaluations.note_globale as "Note globale"'))
                                        ->get();
                $sheet->fromArray($evaluation, null, 'A1', true);

            });
            
            //sheet 3
            $excel->sheet('Validés', function($sheet) {

                $evaluationV = Evaluation::leftjoin('etudiants', 'etudiants.id', '=', 'evaluations.etudiant_id')
                    ->leftjoin('users', 'users.id', '=', 'etudiants.user_id')
                    ->select(DB::raw('etudiants.user_id as CNE,
                                                          users.nom as Nom,
                                                          users.prenom as Prenom,
                                                          users.email as Email'))
                    ->where('evaluations.note_globale', '>=', '10')
                    ->get();

                $i = count($evaluationV) + 4;

                $sheet->mergeCells('A1:E1');
                $sheet->row(1, array('Listes des étudiant ayant validé'));
                $sheet->fromArray($evaluationV, null, 'A2', true);

            });

           //sheet 4
           $excel->sheet('Convoqués en ratt', function($sheet) {

               $evaluationR = Evaluation::join('etudiants', 'etudiants.id', '=', 'evaluations.etudiant_id')
                   ->join('users', 'users.id', '=', 'etudiants.user_id')
                   ->select(DB::raw('etudiants.user_id as CNE,
                                                           users.nom as Nom,
                                                           users.prenom as Prenom,
                                                           users.email as Email'))
                   ->where('evaluations.note_normale', '<', '10')
                   ->get();

               $j = count($evaluationR) + 8;

               $sheet->mergeCells('A1:E1');
               $sheet->row(1, array('Listes des étudiant convoqués en rattrapage'));
               $sheet->fromArray($evaluationR, 1, 'A2');
           });
           //sheet 5
           $excel->sheet('Non-Validés', function($sheet) {
               
                $evaluationN = Evaluation::leftjoin('etudiants', 'etudiants.id', '=', 'evaluations.etudiant_id')
                                         ->leftjoin('users', 'users.id', '=', 'etudiants.user_id')
                                         ->select(DB::raw('etudiants.user_id as CNE,
                                                           users.nom as Nom,
                                                           users.prenom as Prenom,
                                                           users.email as Email'))
                                         ->where('evaluations.note_globale' , '<', '10')
                                         ->get();
//
                $sheet->mergeCells('A1:E1');
                $sheet->row(1,array('Listes des étudiant n\'ayant pas validé'));
                $sheet->fromArray($evaluationN, null, 'A2', true);
//
//                $sheet->row(1, function($row) {
//
//                    // call cell manipulation methods
//                    $row->setBackground('#000000');
//
//                });

            });
            
        })->export('xls');






























        //
        return redirect()->action('Enseignant\notesController@index', ['id' => $classe->id]);
    }



    protected function validator(array $data)
    {
        return \Validator::make($data, [
            'pourcentage_examen' => 'required|integer|between:0,100',
            'pourcentage_controle' => 'required|integer|between:0,100',
            'pourcentage_devoir' => 'required|integer|between:0,100',
            'pourcentage_assiduite' => 'required|integer|between:0,100',
            'note_reference' => 'required_unless:pourcentage_assiduite,0|between:10,20',
            'nbr_seance' => 'required_unless:pourcentage_assiduite,0',
        ]);
    }
}
