@extends('master')

@section('title', '- Assiduité')

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
    <form action="{{ action('Enseignant\absenceController@create', ['id' => $classe->id]) }}" method="post" >
        {{ csrf_field() }}
    <div class="clearfix content">
        <div class="content_title"><h2>Assiduité</h2></div>
        <div class="clearfix table">
            @if(count($classe->etudiants) != 0)
            <table class="">
                <tr>
                    <th>CNE</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>N°h d'absence</th>
                    <th>Assiduité</th>
                </tr>
                @foreach($classe->etudiants as $etudiant)
                    <tr class="div">
                        <td>{{ $etudiant->user_id }}</td>
                        <td>{{ $etudiant->user->nom }}</td>
                        <td>{{ $etudiant->user->prenom }}</td>
                        <td>{{ $etudiant->evaluation($classe->id)->nbr_absence }}</td>
                        <td><input type="checkbox" name=absence['{{ $etudiant->id }}'] value="{{ $etudiant->id }}" /></td>
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

    <div class="tab-contentt">
        <div class="clearfix">
            <div class="clearfix single_sidebar">
                <div class="popular_post contact_us">
                    <div class="sidebar_title"><h2>Date de séance :</h2></div>
                    <input type="date" name="date_seance" class="wpcf7date" required>
                    <input type="submit" name="valider_assiduite" class="wpcf7__submit" value="Valider">
                </div>
            </div>
        </div>
    </div>
    </form>

@endsection