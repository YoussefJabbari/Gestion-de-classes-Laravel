<?php

namespace App\Http\Controllers\Etudiant;

use App\Models\Classe;
use App\Models\Document;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class documentController extends Controller
{
    //
    public function index($id)
    {
        //TODO fin a solution for the not found id
        $classe = Classe::findOrFail($id);
        $cours      = 0;
        $exercice   = 0;
        $autre      = 0;
        foreach ($classe->documents as $document)
        {
            if($document->categorie_id == 1)
            {
                $cours++;
            }
            if($document->categorie_id == 2)
            {
                $exercice++;
            }
            if($document->categorie_id == 3)
            {
                $autre++;
            }
        }
        return view('etudiant.documents')->with('classe',$classe)->with('cours',$cours)->with('exercice',$exercice)->with('autre',$autre);
    }

    public function download($idClasse, $idDocument)
    {
        //
        Classe::findOrFail($idClasse);
        $document = Document::findOrFail($idDocument);

        return response()->download('Telechargements/documents/'.$document->url_document);
    }
}
