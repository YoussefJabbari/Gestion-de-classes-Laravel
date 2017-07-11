@extends('master')

@section('title', '- Profile')

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
    @include('components.menuEnseignantProfile')
@endsection

@section('content')
    <?php $prof = Auth::user()->enseignant ?>
    <div class="content">
        <div class="content_title"><h2><span class="glyphicon glyphicon-home"></span> Vos classes</h2></div>

        @if(count($prof->classes) != 0)

        <div class="clearfix table">
            <table class="table table-hover">
                <tr>
                    <th>Nom du cours</th>
                    <th>Nom de la formation</th>
                    <th>Semestre</th>
                    <th>Année scolaire</th>
                    <th>Supprimer</th>
                </tr>

                @foreach($prof->classes as $classe)

                <tr>
                    <td><a href="{{ action('Enseignant\annonceController@index', ['id' => $classe->id]) }}"> {{ $classe->nom_cours }} </a></td>
                    <td>{{ $classe->nom_formation }}</td>
                    <td>{{ $classe->semestre }}</td>
                    <td>{{ $classe->annee_univ }}</td>
                    <td><a href="{{ action('Enseignant\classeController@delete', ['id' => $classe->id]) }}">Supprimer</a></td>
                </tr>

                @endforeach

            </table>
        </div>

        @else

        <h2 style="color: #222222;padding: 10px 20px;font-family: elephant;">Vous n'avez aucune classe!</h2>

        @endif

        <br/>

        <div class="clearfix single_content newsletter">

            <form action="{{ action('Enseignant\classeController@create') }}" method="post">
                {{ csrf_field() }}
                <legend class="legende">Créez une classe:</legend>
                <input type="text" name="nom_cours" placeholder="Nom du cours" required><br />
                <input type="text" name="semestre" placeholder="Semestre" required><br />
                <input type="text" name="annee_univ" placeholder="Année universitaire" required><br />
                <input type="text" name="nom_formation" placeholder="Nom de la formation" required><br />
                <input type="submit" value="Créer"> <br /><br />
            </form>

        </div>
    </div>
@endsection

@section('sidebar')
    @include('components.sidebarEnseignantProfile')
@endsection