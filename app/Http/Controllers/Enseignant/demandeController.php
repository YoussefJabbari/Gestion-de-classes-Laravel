<?php

namespace App\Http\Controllers\Enseignant;

use App\Models\Demande;
use App\Models\Evaluation;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class demandeController extends Controller
{
    //
    public function index()
    {
        //
        return view('enseignant.demandes');
    }

    public function add($etudiant_id, $classe_id)
    {
        $evaluation = new Evaluation;
        $evaluation->etudiant_id = $etudiant_id;
        $evaluation->classe_id = $classe_id;
        
        $evaluation->save();

        Demande::where('etudiant_id',$etudiant_id)->where('classe_id',$classe_id)->delete();

        return redirect()->action('Enseignant\demandeController@index');
    }

    public function refuse($etudiant_id, $classe_id)
    {
        Demande::where('etudiant_id',$etudiant_id)->where('classe_id',$classe_id)->delete();

        return redirect()->action('Enseignant\demandeController@index');
    }
}
