<?php

namespace App\Http\Controllers\Etudiant;

use App\Models\Classe;
use App\Models\Demande;
use App\Models\Evaluation;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class classeController extends Controller
{
    //
    public function index()
    {
        //
        return view('etudiant.profile');
    }

    public function search(Request $request)
    {
        //
        $classes = Classe::where('nom_cours', $request->input('nom_cours'))->orwhere('semestre', $request->input('semestre'))->orwhere('annee_univ', $request->input('annee_univ'))->orwhere('nom_formation', $request->input('nom_formation'))->get();
        $idetudiant = Auth::user()->etudiant->id;
        $evaluation = Evaluation::where('etudiant_id', $idetudiant)->get();
        $demande = Demande::where('etudiant_id', $idetudiant)->get();

        return view('etudiant.recherche')->with('classes', $classes)->with('evaluation', $evaluation)->with('demande', $demande);
    }

    public function send($classe_id)
    {
        $demande = new Demande;
        $demande->etudiant_id = Auth::user()->etudiant->id;
        $demande->classe_id = $classe_id;
        $demande->date_demande = date('Y-m-d');

        $demande->save();

        return redirect()->action('Etudiant\classeController@index');
    }
}
