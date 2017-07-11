@extends('master')

@section('title', '- Documents')

@section('meta')
@endsection

@section('css')
    <style>
        .newsletter form select{
            width: 680px;
            height: 30px;
            margin-bottom: 15px;
            box-shadow: inset 0px 0px 50px 0px #CCCCCC;
            -webkit-box-shadow: inset 0px 0px 50px 0px #CCCCCC;
            -moz-box-shadow: inset 0px 0px 50px 0px #CCCCCC;
            -o-box-shadow: inset 0px 0px 50px 0px #CCCCCC;
            font-family: sans-serif;
            font-style: bold;
        }
    </style>
@endsection

@section('js')
    <script src="{{ asset('jquery.js') }}"></script>
    <script src="{{ asset('js/index.js') }}"></script>
@endsection

@section('espace')
    enseignant
@endsection

@section('menu')
    @include('components.menuEtudiantClasse')
@endsection

@section('content')
    <div class="clearfix content">
        <div class="content_title"><h2>Documents</h2></div>

        @if(count($classe->documents) != 0)

        <div class="div clearfix work_pagination">
            <ul class="tab-group">
                <li class="tab active"><a  href="#affichageNormale">Affichage normale</a></li>
                <li class="tab"><a  href="#affichageCategorie">Affichage par catégorie</a></li>
            </ul>

            <div class="tab-content">
                <div id="affichageNormale">

                    @foreach($classe->documents as $document)
                    <div class="clearfix single_content">
                        <div class="clearfix post_date floatleft">
                            <div class="date">
                                <h3>Dc</h3>
                            </div>
                        </div>
                        <div class="clearfix post_detail">
                            <h2><a href="">Titre : {{ $document->titre_document }} </a></h2>
                            <div class="clearfix post-meta">
                                <p><span><i class="fa fa-user"></i> {{ $classe->nom_cours }}</span> <span><i class="fa fa-clock-o"></i> {{ $document->date_document }}</span> </p>
                            </div>

                            <div class="clearfix post_excerpt">
                                <pre>Type :   {{ $document->categorie->nom_categorie }} <br/></pre>
                                <pre>Description: {{ $document->description }}</pre>

                            </div>
                            <a href="{{ action('Etudiant\documentController@download',['idClasse'=>$classe->id,'idDocument'=>$document->id]) }}">Télécharger le document</a>
                        </div>
                    </div>

                    @endforeach
                </div>

                <div id="affichageCategorie" style="display:none;">
                    <div class="cours">
                        <h1>Cours</h1>

                        @foreach($classe->documents as $document)
                            @if($document->categorie_id == 1)
                                <div class="clearfix singlesidebar post_excerpt categoriee">
                                    <h2>{{ $document->titre_document }}</h2>
                                    <ul>
                                        <li class="floatleft">

                                            <p>Type : {{ $document->categorie->nom_categorie }}</p><br>

                                            <p>Date : {{ $document-> date_document}}</p>

                                            <a href="{{ action('Etudiant\documentController@download',['idClasse'=>$classe->id,'idDocument'=>$document->id]) }}">Télécharger le document</a>
                                        </li>
                                    </ul>
                                </div>
                            @endif
                        @endforeach

                    </div>

                    <div class="cours">
                        <h1>Exercice:</h1>

                        @foreach($classe->documents as $document)
                            @if($document->categorie_id == 2)
                                <div class="clearfix singlesidebar post_excerpt categoriee">
                                    <h2>{{ $document->titre_document }}</h2>
                                    <ul>
                                        <li class="floatleft">

                                            <p>Type : {{ $document->categorie->nom_categorie }}</p><br>

                                            <p>Date : {{ $document-> date_document}}</p>

                                            <a href="{{ action('Etudiant\documentController@download',['idClasse'=>$classe->id,'idDocument'=>$document->id]) }}">Télécharger le document</a>
                                        </li>
                                    </ul>
                                </div>
                            @endif
                        @endforeach

                    </div>

                    <div class="cours">
                        <h1>Autre:</h1>

                        @foreach($classe->documents as $document)
                            @if($document->categorie_id == 3)
                                <div class="clearfix singlesidebar post_excerpt categoriee">
                                    <h2>{{ $document->titre_document }}</h2>
                                    <ul>
                                        <li class="floatleft">

                                            <p>Type : {{ $document->categorie->nom_categorie }}</p><br>

                                            <p>Date : {{ $document-> date_document}}</p>

                                            <a href="{{ action('Etudiant\documentController@download',['idClasse'=>$classe->id,'idDocument'=>$document->id]) }}">Télécharger le document</a>
                                        </li>
                                    </ul>
                                </div>
                            @endif
                        @endforeach

                    </div>
                </div>
            </div>
        </div>

        @else
            <h2 style="color: #222222;padding: 10px 20px;font-family: elephant;">Cette classe ne contient aucun document!</h2>
        @endif

    </div>
@endsection

@section('sidebar')

    @include('components.sidebarClasse')

    <div class="clearfix sidebar">
        <div class="clearfix single_sidebar">
            <div class="popular_post">
                <div class="sidebar_title"><h2>Statistiques:</h2></div>
                <ul>
                    <li>
                        <a>
                            <label>Cours: {{ $cours }}</label><br>
                            <label>Exercices: {{ $exercice }}</label><br>
                            <label>Autres catégories: {{ $autre }}</label><br>
                            <label>Total: {{ $cours+$exercice+$autre }}</label><br>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection