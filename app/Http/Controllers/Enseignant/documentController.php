<?php

namespace App\Http\Controllers\Enseignant;

use App\Models\Classe;
use App\Models\Document;
use App\Models\Version;
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
        return view('enseignant.documents')->with('classe',$classe)->with('cours',$cours)->with('exercice',$exercice)->with('autre',$autre);
    }

    public function create($id, Request $request)
    {
        //
        $classe = Classe::findOrFail($id);

        $document = new Document;
        $document->classe_id = $classe->id ;
        $document->categorie_id = $request->input('categorie');
        $document->titre_document = $request->input('titre_document');
        $document->date_document = date('Y-m-d');
        $document->description = $request->input('description');

        $document->save();

        if(Version::first() != null)
        {
            $versionId = Version::orderBy('id','desc')->first()->id;
            $versionId += 1;
        }
        else
        {
            $versionId = 1;
        }

        $file = $request->file('fichier');
        $fileName =  $document->id . 'Version' . $versionId . '.' . $file->getClientOriginalExtension();
        $file->move('Telechargements/documents',$fileName);

        $document->url_document = $fileName;
        $document->save();

        $version = new Version;
        $version->id = $versionId;
        $version->document_id = $document->id;
        $version->date_mise = date('Y-m-d');
        $version->url_version = $fileName;

        $version->save();

        return redirect()->action('Enseignant\documentController@index', ['id' => $classe->id]);
    }
}
