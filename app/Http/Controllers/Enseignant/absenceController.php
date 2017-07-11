<?php

namespace App\Http\Controllers\Enseignant;

use App\Models\Absence;
use App\Models\Classe;
use App\Models\Evaluation;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class absenceController extends Controller
{
    //
    public function index($id)
    {
        //TODO fin a solution for the not found id
        $classe = Classe::findOrFail($id);
        return view('enseignant.assiduite')->with('classe',$classe);
    }

    public function create($id, Request $request)
    {
        //
        $classe = Classe::findOrFail($id);

        if(count($request->input('absence')) != 0)
        {
            foreach ($request->input('absence') as $key => $value)
            {
                $absence = new Absence;
                $absence->classe_id = $classe->id ;
                $absence->etudiant_id = $value;
                $absence->date_seance = $request->input('date_seance');

                $absence->save();

                Evaluation::where(['classe_id' => $classe->id , 'etudiant_id' => $value])->increment('nbr_absence');

            }
        }

        return redirect()->action('Enseignant\absenceController@index', ['id' => $classe->id]);
    }
}
