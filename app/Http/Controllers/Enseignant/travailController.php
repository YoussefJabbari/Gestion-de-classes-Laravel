<?php

namespace App\Http\Controllers\Enseignant;

use App\Models\Classe;
use App\Models\Devoir;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class travailController extends Controller
{
    //
    public function index($idClasse, $idDevoir)
    {
        //TODO fin a solution for the not found id
        $classe = Classe::findOrFail($idClasse);
        $devoir = Devoir::findOrFail($idDevoir);
        return view('enseignant.travails')->with('devoir',$devoir)->with('classe',$classe);
    }
}
