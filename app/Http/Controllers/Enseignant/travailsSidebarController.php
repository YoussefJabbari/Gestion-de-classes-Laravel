<?php

namespace App\Http\Controllers\Enseignant;

use App\Models\Devoir;
use App\Models\Etudiant;
use App\Models\Travail;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class travailsSidebarController extends Controller
{
    //
    public function index($iddevoir,Request $request)
    {
        //
        $etudiant = Etudiant::where('user_id',$request->input('id'))->first();
        $devoir = Devoir::where('id',$iddevoir)->first();
        $travails = Travail::where(['etudiant_id' => $etudiant->id, 'devoir_id' => $devoir->id])->get();
        return view('components.notesT',['etudiant' => $etudiant, 'devoir' => $devoir, 'travails' => $travails]);
    }

    public function download($idTravail)
    {
        //
        $travail = Travail::findOrFail($idTravail);
        return response()->download('Telechargements/travails/'.$travail->url_travail);
    }
    
    public function insert(Request $request)
    {
        //
        $travail = Travail::where(['etudiant_id' => $request->input('idetudiant'), 'devoir_id' => $request->input('iddevoir')])->update(['note_devoir' => $request->input('note_devoir')]);
        $travail1 = Travail::where(['etudiant_id' => $request->input('idetudiant'), 'devoir_id' => $request->input('iddevoir')])->first();
        
        return $travail1;
    }
}
