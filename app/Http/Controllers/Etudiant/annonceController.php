<?php

namespace App\Http\Controllers\Etudiant;

use App\Models\Classe;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class annonceController extends Controller
{
    //
    public function index($id)
    {
        //TODO fin a solution for the not found id
        $classe = Classe::findOrFail($id);
        return view('etudiant.annonces')->with('classe',$classe);
    }
}
