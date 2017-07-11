<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/', function () {
    return redirect('login');
});

Route::auth();

Route::group(['middleware' => 'web'], function () {

});

Route::group(['middleware' => 'auth'], function () {
    
    Route::group(['prefix' => 'ENS', 'middleware' => 'enseignant'], function() {
        
        Route::get('/', ['as' => 'ens', 'uses' => 'Enseignant\classeController@index']);
        Route::post('/', 'Enseignant\classeController@create');
        Route::get('delete/{id}', 'Enseignant\classeController@delete')->where('id','[0-9]+');
        Route::get('demandes/{id_etudiant}/{id_classe}/add', 'Enseignant\demandeController@add')->where('id_etudiant','[0-9]+')->where('id_classe','[0-9]+');
        Route::get('demandes/{id_etudiant}/{id_classe}/refuse', 'Enseignant\demandeController@refuse')->where('id_etudiant','[0-9]+')->where('id_classe','[0-9]+');
        Route::get('demandes', 'Enseignant\demandeController@index');
        Route::get('{id}/annonces', 'Enseignant\annonceController@index')->where('id','[0-9]+');
        Route::post('{id}/annonces', 'Enseignant\annonceController@create')->where('id','[0-9]+');
        Route::get('{id}/devoirs', 'Enseignant\devoirController@index')->where('id','[0-9]+');
        Route::post('{id}/devoirs', 'Enseignant\devoirController@create')->where('id','[0-9]+');
        Route::get('{idClasse}/devoir/{idDevoir}', 'Enseignant\travailController@index')->where(['idClasse' => '[0-9]+', 'idDevoir' => '[0-9]+']);
        Route::get('get_travail_etudiant/{iddevoir}', 'Enseignant\travailsSidebarController@index');
        Route::get('travails/{idTravail}', 'Enseignant\travailsSidebarController@download')->where('idTravail', '[0-9]+');
        Route::post('inserer_note_travail', 'Enseignant\travailsSidebarController@insert');
        Route::get('{id}/documents', 'Enseignant\documentController@index')->where('id','[0-9]+');
        Route::post('{id}/documents', 'Enseignant\documentController@create')->where('id','[0-9]+');
        Route::get('{idClasse}/document/{idDocument}', 'Enseignant\versionController@index')->where(['idClasse' => '[0-9]+', 'idDocument' => '[0-9]+']);
        Route::post('{idClasse}/document/{idDocument}', 'Enseignant\versionController@add')->where(['idClasse' => '[0-9]+', 'idDocument' => '[0-9]+']);
        Route::get('{id}/assiduite', 'Enseignant\absenceController@index')->where('id','[0-9]+');
        Route::post('{id}/assiduite', 'Enseignant\absenceController@create')->where('id','[0-9]+');
        Route::get('{id}/exams-controles', 'Enseignant\examsController@index')->where('id','[0-9]+');
        Route::get('get_info_etudiant', 'Enseignant\examsSidebarController@index');
        Route::post('{id}/inser_info_etudiant', 'Enseignant\examsSidebarController@insert')->where('id','[0-9]+');
        Route::get('{id}/etudiants', 'Enseignant\etudiantController@index')->where('id','[0-9]+');
        Route::post('{id}/etudiants/add', ['as' => 'add','uses' => 'Enseignant\etudiantController@add'])->where('id','[0-9]+');
        Route::post('{id}/etudiants/remove', ['as' => 'remove','uses' => 'Enseignant\etudiantController@remove'])->where('id','[0-9]+');
        Route::get('{id}/notes', 'Enseignant\notesController@index')->where('id','[0-9]+');
        Route::post('{id}/notes', 'Enseignant\notesController@calcul')->where('id','[0-9]+');
        
    });

    Route::group(['prefix' => 'ETD', 'middleware' => 'etudiant'], function () {

        Route::get('/', ['as' => 'etd', 'uses' => 'Etudiant\classeController@index']);
        Route::post('/', 'Etudiant\classeController@search');
        Route::get('demande/{classe_id}', 'Etudiant\classeController@send')->where('classe_id','[0-9]+');
        Route::get('{id}/annonces', 'Etudiant\annonceController@index')->where('id','[0-9]+');
        Route::get('{id}/devoirs', 'Etudiant\devoirController@index')->where('id','[0-9]+');
        Route::post('devoirs/upload', 'Etudiant\devoirController@upload');
        Route::get('{id}/documents', 'Etudiant\documentController@index')->where('id','[0-9]+');
        Route::get('{idClasse}/documents/{idDocument}', 'Etudiant\documentController@download')->where(['idClasse' => '[0-9]+','idDocument' => '[0-9]+']);

    });


});