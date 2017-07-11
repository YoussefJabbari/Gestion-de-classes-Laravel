@extends('master')

@section('title', '- Travails')

@section('meta')
@endsection

@section('css')
@endsection

@section('js')
    <script>
        function loadDoc(id) {

            $.get("/get_travail_etudiant/{{ $devoir->id }}",{id:id})
                    .done(function (data) {
                        //console.log(data);
                        $('#travails').html(data);
                    })
        }
    </script>
@endsection

@section('espace')
    enseignant
@endsection

@section('menu')
    @include('components.menuEnseignantClasse')
@endsection

@section('content')
    <div class="clearfix content">

        <h1>Titre: {{ $devoir->titre_document }} </h1>
        <div class="clearfix post-meta">
            <p><span><i class="fa fa-user"></i> {{ $classe->nom_cours }}</span> <span><i class="fa fa-clock-o"></i> {{ $devoir->date_devoir }}</span> </p>
        </div>

        <div class="clearfix post_excerpt categoriee">

            <p>Enoncé : {{ $devoir->enonce }}</p><br>

            <p>Dernier delai:    {{ $devoir->deadline }}</p><br>

            <p>Formats demandées: @foreach($devoir->formats as $format) {{ strtoupper($format->type_format) }} @endforeach</p>

        </div>

    </div><br><br>
    <div class="clearfix table">
        @if(count($classe->etudiants) != 0)
        <table>
            <tr>
                <th>CNE</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Travail</th>
                <th>Note</th>
            </tr>

            @foreach($classe->etudiants as $etudiant)
                <tr data-id="{{ $etudiant->id }}">
                    <td>{{ $etudiant->user_id }}</td>
                    <td>{{ $etudiant->user->nom }}</td>
                    <td>{{ $etudiant->user->prenom }}</td>
                    <td><a href="#travails" onclick="loadDoc({{ $etudiant->user_id }})">Travail</a></td>
                    <td class="note_devoir">
                        @if(count($etudiant->travail($devoir->id)) != 0)
                            {{ $etudiant->travail($devoir->id)->note_devoir }}
                        @else
                            0
                        @endif
                    </td>
                </tr>
            @endforeach
        </table>
        @else
            <h2 style="color: #222222;padding: 10px 20px;font-family: elephant;">Cette classe ne contient aucun étudiant!</h2>
        @endif
    </div>
@endsection

@section('sidebar')

    @include('components.sidebarClasse')

    <div id="travails" class="clearfix sidebar bottom">

    </div>

@endsection