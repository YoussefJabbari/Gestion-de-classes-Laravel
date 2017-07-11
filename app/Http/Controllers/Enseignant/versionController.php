<?php

namespace App\Http\Controllers\Enseignant;

use App\Models\Classe;
use App\Models\Document;
use App\Models\Version;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class versionController extends Controller
{
    //
    public function index($idClasse, $idDocument)
    {
        //TODO fin a solution for the not found id
        $classe = Classe::findOrFail($idClasse);
        $document = Document::findOrFail($idDocument);
        return view('enseignant.document')->with('document',$document)->with('classe',$classe);
    }

    public function add($idClasse, $idDocument,Request $request)
    {
        //
        $classe = Classe::findOrFail($idClasse);
        $document = Document::findOrFail($idDocument);

        $version = new Version;
        $version->document_id = $document->id;
        $version->date_mise = date('Y-m-d');
        
        $version->save();

        $file = $request->file('fichier');
        $fileName =  $document->id . 'Version' . $version->id . '.' . $file->getClientOriginalExtension();
        $file->move('Telechargements/documents',$fileName);

        $version->url_version = $fileName;
        $version->save();
        
        Document::where(['id'=>$document->id])->update(['url_document' => $fileName]);

        return redirect()->action('Enseignant\versionController@index', ['idClasse' => $classe->id, 'idDocument' => $document->id]);
    }
}
