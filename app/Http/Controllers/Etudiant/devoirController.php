<?php

namespace App\Http\Controllers\Etudiant;

use App\Models\Classe;
use App\Models\Devoir;
use App\Models\Format;
use App\Models\Travail;
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
        return view('etudiant.devoirs')->with('classe',$classe);
    }
    
    public function upload(Request $request)
    {
        //
        $classe = Classe::findOrFail($request->input('classe_id'));
        $devoir = Devoir::findOrFail($request->input('devoir_id'));
        $format = Format::where('devoir_id', $devoir->id)->first();

        $file = $request->file('fichier');
        if(date('Y-m-d') <= $devoir->deadline && $format->type_format == $file->getClientOriginalExtension())
        {

            $travail = Travail::create([
                'devoir_id' => $devoir->id,
                'etudiant_id' => Auth::user()->etudiant->id,
            ]);
            
            $fileName = Auth::user()->id . "-" . $devoir->id . "-" . $travail->id . "." . $file->getClientOriginalExtension();
            $file->move('Telechargements/travails',$fileName);

            Travail::find($travail->id)->update(['url_travail' => $fileName]);
            
            return "Votre travail a été posté avec succès";
        }
        else
        {
            return "Format ou Deadline non respecté";
        }

    }
}
