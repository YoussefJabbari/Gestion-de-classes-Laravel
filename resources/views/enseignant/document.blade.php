@extends('master')

@section('title', '- Document')

@section('meta')
@endsection

@section('css')
@endsection

@section('js')
@endsection

@section('espace')
    enseignant
@endsection

@section('menu')
    @include('components.menuEnseignantClasse')
@endsection

@section('content')
    <div class="clearfix content">

        <h1>Titre : {{ $document->titre_document }} </h1>
        <div class="clearfix post-meta">
            <p><span><i class="fa fa-user"></i> {{ $classe->nom_cours }}</span> <span><i class="fa fa-clock-o"></i> {{ $document->date_document }}</span> </p>
        </div>

        <div class="clearfix post_excerpt categoriee">

            <p>Type :   {{ $document->categorie->nom_categorie }}</p><br/>

            <p>Description: {{ $document->description }}</p><br/>

        </div>

        <div class="more_post_container">

            <h2>Versions:</h2>
            <div class="more_post">

                @foreach($document->versions as $version)
                    <span><label>{{$version->url_version}} {{ $version->date_mise }}</label></span><br>
                @endforeach
            </div>

        </div><br/>

        <div class="more_post_container contact_us">

            <h2>Ajouter une autre version:</h2>

            <form action="{{ action('Enseignant\versionController@add', ['idClasse' => $classe->id, 'idDocument' => $document->id]) }}" method="post" enctype="multipart/form-data" >
                {{ csrf_field() }}
                <div class="more_post">
                    <input type="file" name="fichier" required/><br>
                </div>
                <input type="submit" class="wpcf7submit" value="Ajouter" />
            </form>

        </div>

    </div>
@endsection

@section('sidebar')
    @include('components.sidebarClasse')
@endsection