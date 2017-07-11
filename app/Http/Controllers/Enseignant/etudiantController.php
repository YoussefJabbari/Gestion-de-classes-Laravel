<?php

namespace App\Http\Controllers\Enseignant;

use App\Models\Classe;
use App\Models\Etudiant;
use App\Models\Evaluation;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class etudiantController extends Controller
{
    //
    public function index($id)
    {
        //TODO fin a solution for the not found id
        $classe = Classe::findOrFail($id);
        return view('enseignant.etudiants')->with('classe',$classe);
    }

    public function add($id, Request $request)
    {
        //
        $classe = Classe::findOrFail($id);

        $etudiantId = Etudiant::where('user_id',$request->input('acne'))->first();

        $evaluation = new Evaluation;
        $evaluation->etudiant_id = $etudiantId->id;
        $evaluation->classe_id = $classe->id;
        
        $evaluation->save();

        return redirect()->action('Enseignant\etudiantController@index', ['id' => $classe->id]);
    }

    public function remove($id, Request $request)
    {
        //
        $classe = Classe::findOrFail($id);

        $etudiantId = Etudiant::where('user_id',$request->input('scne'))->first();

        Evaluation::where('etudiant_id',$etudiantId->id)->where('classe_id',$classe->id)->delete();
        
        return redirect()->action('Enseignant\etudiantController@index', ['id' => $classe->id]);
    }
}
