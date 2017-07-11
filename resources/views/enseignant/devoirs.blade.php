@extends('master')

@section('title', '- Devoirs')

@section('meta')
@endsection

@section('css')
    <style>
        .newsletter form input[type=date]{
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
@endsection

@section('espace')
    enseignant
@endsection

@section('menu')
    @include('components.menuEnseignantClasse')
@endsection

@section('content')
    <div class="clearfix content">
        <div class="content_title"><h2>Devoirs</h2></div>
        <div class="clearfix single_content newsletter">


            <form action="{{ action('Enseignant\devoirController@create',['id' => $classe->id]) }}" method="post">
                {{ csrf_field() }}
                <legend class="legende">Ajouter un devoir:</legend>
                <input type="text" name="titre_devoir" placeholder="Titre du devoir " required><br />
                <input type="text" name="format_demandee" placeholder="Format demandée" ><br />
                <label for="deadline">Dernier délai:</label><br>
                <input type="date" name="deadline"  required><br /><br>
                <textarea  name="enonce" placeholder="Enoncé" required></textarea><br />
                <input type="submit" value="Ajouter"> <br /><br />
            </form>

        </div>

        @forelse($classe->devoirs as $devoir)

        <div class="clearfix single_content">
            <div class="clearfix post_date floatleft">
                <div class="date">
                    <h3>Dv</h3>
                </div>
            </div>
            <div class="clearfix post_detail">
                <h2><a href="">Titre : {{ $devoir->titre_devoir }} </a></h2>
                <div class="clearfix post-meta">
                    <p><span><i class="fa fa-user"></i> {{ $classe->nom_cours }}</span> <span><i class="fa fa-clock-o"></i> {{ $devoir->date_devoir }}</span> </p>
                </div>
                <div class="clearfix post_excerpt">
                    <p>Enoncé : {{ $devoir->enonce }}<br>
                        Dernier delai:    {{ $devoir->deadline }}<br>
                        Formats demandées:@foreach($devoir->formats as $format) {{ strtoupper($format->type_format) }} @endforeach</p>
                </div>
                <a href="{{ action('Enseignant\travailController@index', ['idClasse' => $classe->id, 'idDevoir' => $devoir->id]) }}">Accéder aux devoirs rendus</a>
            </div>
        </div>

        @empty

        <h2 style="color: #222222;padding: 10px 20px;font-family: elephant;">Cette classe ne contient aucun devoir!</h2>

        @endforelse

    </div>
@endsection

@section('sidebar')
    @include('components.sidebarClasse')
@endsection