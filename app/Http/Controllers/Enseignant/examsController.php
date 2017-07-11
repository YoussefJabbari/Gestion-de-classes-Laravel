<?php

namespace App\Http\Controllers\Enseignant;

use App\Models\Classe;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class examsController extends Controller
{
    //
    public function index($id)
    {
        //TODO fin a solution for the not found id
        $classe = Classe::findOrFail($id);
        return view('enseignant.examsControles')->with('classe',$classe);
    }
}
