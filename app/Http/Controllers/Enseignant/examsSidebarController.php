<?php

namespace App\Http\Controllers\Enseignant;

use App\Models\Etudiant;
use App\Models\Evaluation;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class examsSidebarController extends Controller
{
    //
    public function index(Request $request)
    {
        //
        $etudiant = Etudiant::where('user_id',$request->input('id'))->first();
        return view('components.notesEnrC',['etudiant' => $etudiant]);
    }

    public function insert($id, Request $request)
    {
        //
        $evaluation = Evaluation::where('classe_id',$id)->where('etudiant_id',$request->input('idetudiant'))->first();

        if(    $request->input('note_normale') != null     )
        {
            $evaluation->note_normale = $request->input('note_normale');
        }
        if(    $request->input('note_rattrapage') != null     )
        {
            $evaluation->note_rattrapage = $request->input('note_rattrapage');
        }
        if(    $request->input('note_controle')  != null    )
        {
            $evaluation->note_controle = $request->input('note_controle');
        }

        $evaluation2 = Evaluation::where('classe_id',$id)->where('etudiant_id',$request->input('idetudiant'))
        ->update([
            'note_normale'=> $evaluation->note_normale,
            'note_controle'=> $evaluation->note_controle,
            'note_rattrapage'=> $evaluation->note_rattrapage

        ]);
//
        return $evaluation;
    }
}
