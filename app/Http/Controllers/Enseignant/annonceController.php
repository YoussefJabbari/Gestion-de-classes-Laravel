<?php

namespace App\Http\Controllers\Enseignant;

use App\Models\Annonce;
use App\Models\Classe;
use App\Models\Publiee;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class annonceController extends Controller
{
    //
    public function index($id)
    {
        //TODO fin a solution for the not found id
        $classe = Classe::findOrFail($id);
        return view('enseignant.annonces')->with('classe',$classe);
    }

    public function create($id, Request $request)
    {
        //
        $classe = Classe::findOrFail($id);

        $annonce = new Annonce;
        $annonce->enseignant_id = Auth::user()->enseignant->id ;
        $annonce->nom_annonce = $request->input('titre_annonce');
        $annonce->annonce = $request->input('annonce');
        $annonce->date_annonce = date('Y-m-d');

        $annonce->save();

        $publiee = new Publiee;
        $publiee->annonce_id = $annonce->id;
        $publiee->classe_id = $classe->id;
        
        $publiee->save();
        
        return redirect()->action('Enseignant\annonceController@index', ['id' => $classe->id]);
    }
}
