@extends('master')

@section('title', '- Etudiants')

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

        <div class="content_title"><h2>Etudiants</h2></div>

        <div class="clearfix table">

            @if(count($classe->etudiants) != 0)

            <table>

                <tr>
                    <th>CNE</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>N°h d'absence</th>
                    <th>Email</th>
                    <th>Date de naissance</th>
                </tr>

                @foreach($classe->etudiants as $etudiant)
                    <tr class="div">
                        <td>{{ $etudiant->user_id }}</td>
                        <td>{{ $etudiant->user->nom }}</td>
                        <td>{{ $etudiant->user->prenom }}</td>
                        <td>{{ $etudiant->evaluation($classe->id)->nbr_absence }}</td>
                        <td>{{ $etudiant->user->email }}</td>
                        <td>{{ $etudiant->user->date_naissance }}</td>
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
                    <div class="sidebar_title" style="margin-bottom: 0px;"><h2>Ajouter un étudiant</h2></div>
                    <ul>
                        <li>
                            <form action="{{ route('add',['id' => $classe->id]) }}" method="post">
                                {{ csrf_field() }}
                                <input class="floatright" style="width: 280px; height: 25px;" type="number" name="acne" placeholder="CNE" required><br>
                                <input type="submit" name="ajouter_etudiant" class="floatright wpcf7__submit" value="Ajouter">
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="tab-contentt">
        <div class="clearfix">
            <div class="clearfix single_sidebar">
                <div class="popular_post contact_us">
                    <div class="sidebar_title" style="margin-bottom: 0px;"><h2>Supprimer un étudiant</h2></div>
                    <ul>
                        <li>
                            <form class="floatright" action="{{ route('remove',['id' => $classe->id]) }}" method="post">
                                {{ csrf_field() }}
                                <input style="width: 280px; height: 25px;" type="number" name="scne" placeholder="CNE" required><br>
                                <input type="submit" name="supprimer_etudiant" class="floatright wpcf7__submit" value="Supprimer">
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection