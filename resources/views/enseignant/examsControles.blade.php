@extends('master')

@section('title', '- Exams&Controles')

@section('meta')
@endsection

@section('css')
@endsection

@section('js')
    <script>
        function loadDoc(id) {

            $.get("/get_info_etudiant",{id:id})
                    .done(function (data) {
                        //console.log(data);
                        $('#etudiant').html(data);
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
        <div class="content_title"><h2>Examens & Contrôles</h2></div>
        <div class="clearfix table">
            @if(count($classe->etudiants) != 0)
            <table>
                <tr>
                    <th>CNE</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Devoirs</th>
                    <th>Contrôles</th>
                    <th>Session normale</th>
                    <th>Session rattrapage</th>
                </tr>
                @foreach($classe->etudiants as $etudiant)
                <tr data-id="{{ $etudiant->id }}">
                    <td><a href="#etudiant" onclick="loadDoc({{ $etudiant->user_id }})">{{ $etudiant->user_id }}</a></td>
                    <td>{{ $etudiant->user->nom }}</td>
                    <td>{{ $etudiant->user->prenom }}</td>
                    <td class="note_devoir">{{ $etudiant->evaluation($classe->id)->note_devoir }}</td>
                    <td class="note_controle">{{ $etudiant->evaluation($classe->id)->note_controle }}</td>
                    <td class="note_normale">{{ $etudiant->evaluation($classe->id)->note_normale }}</td>
                    <td class="note_rattrapage">{{ $etudiant->evaluation($classe->id)->note_rattrapage }}</td>
                </tr>
                @endforeach
            </table>
            @else
                <h2 style="color: #222222;padding: 10px 20px;font-family: elephant;">Cette classe ne contient aucun étudiant!</h2>
            @endif
        </div>
    </div>
@endsection

@section('sidebar')

    @include('components.sidebarClasse')

    <div id="etudiant" class="clearfix sidebar bottom">

    </div>

@endsection