<?php

namespace App\Http\Controllers\Enseignant;

use App\Models\Classe;
use App\Models\Devoir;
use App\Models\Format;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class devoirController extends Controller
{
    //
    public function index($id)
    {
        //TODO fin a solution for the not found id
        $classe = Classe::findOrFail($id);
        return view('enseignant.devoirs')->with('classe',$classe);
    }

    public function create($id, Request $request)
    {
        //
        $classe = Classe::findOrFail($id);

        $devoir = new Devoir;
        $devoir->classe_id = $classe->id ;
        $devoir->titre_devoir = $request->input('titre_devoir');
        $devoir->enonce = $request->input('enonce');
        $devoir->date_devoir = date('Y-m-d');
        $devoir->deadline = $request->input('deadline');

        $devoir->save();

        $format = new Format;
        $format->devoir_id = $devoir->id;
        $format->type_format = $request->input('format_demandee');

        $format->save();

        return redirect()->action('Enseignant\devoirController@index', ['id' => $classe->id]);
    }
}
