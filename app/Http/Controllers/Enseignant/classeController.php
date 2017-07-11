<?php

namespace App\Http\Controllers\Enseignant;

use App\Models\Classe;
use Illuminate\Contracts\Auth\Guard;
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
        return view('enseignant.profile');
    }

    public function create(Request $request)
    {
        //
        $classe = new Classe;
        $classe->enseignant_id = Auth::user()->enseignant->id ;
        $classe->nom_cours = $request->input('nom_cours');
        $classe->semestre = $request->input('semestre');
        $classe->annee_univ = $request->input('annee_univ');
        $classe->nom_formation = $request->input('nom_formation');
        $classe->save();

        return view('enseignant.profile');
    }

    public function delete($id)
    {
        //TODO fin a solution for the not found id
        Classe::destroy($id);
        
        return redirect()->action('Enseignant\classeController@index');
    }
}
