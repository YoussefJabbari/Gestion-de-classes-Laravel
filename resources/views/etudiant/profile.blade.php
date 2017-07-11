@extends('master')

@section('title', '- Profile')

@section('meta')
@endsection

@section('css')
@endsection

@section('js')
@endsection

@section('espace')
    etudiant
@endsection

@section('menu')
    @include('components.menuEtudiantProfile')
@endsection

@section('content')
    <?php $etd = Auth::user()->etudiant ?>
    <div class="clearfix content">

        <div class="content_title"><h2><span class="glyphicon glyphicon-home"></span> Vos classes</h2></div>

        @if(count($etd->classes) != 0)

        <div class="clearfix table">
            <table>
                <tr>
                    <th>Nom du cours</th>
                    <th>Nom de la formation</th>
                    <th>Semestre</th>
                    <th>Année scolaire</th>
                </tr>

                @foreach($etd->classes as $classe)

                    <tr>
                        <td><a href="{{ action('Etudiant\annonceController@index', ['id' => $classe->id]) }}"> {{ $classe->nom_cours }} </a></td>
                        <td>{{ $classe->nom_formation }}</td>
                        <td>{{ $classe->semestre }}</td>
                        <td>{{ $classe->annee_univ }}</td>
                    </tr>

                @endforeach

            </table>
        </div>

        @else
            <h2 style="color: #222222;padding: 10px 20px;font-family: elephant;">Vous n'êtes inscrit dans aucune classe!</h2>
        @endif

    </div>
@endsection

@section('sidebar')

    @include('components.sidebarEtudiantProfile')

    <div class="clearfix sidebar bottom"  id="travail">
        <div class="clearfix single_sidebar">
            <div class="popular_post contact_us">
                <div class="sidebar_title"><h2><span class="glyphicon glyphicon-search"></span> Rechercher une classe :</h2></div>
                <ul>
                    <li>
                        <form action="{{ action('Etudiant\classeController@search') }}" method="post">
                            {{ csrf_field() }}
                            <input type="text" name="nom_cours" class="wpcf7__number" placeholder="Nom du cours">
                            <input type="text" name="semestre" class="wpcf7__number" placeholder="Semestre">
                            <input type="text" name="annee_univ" class="wpcf7__number" placeholder="Année universitaire">
                            <input type="text" name="nom_formation" class="wpcf7__number" placeholder="Nom de la formation"><br>
                            <input type="submit" name="rechercher" class="floatright wpcf7__submit" value="Rechercher">
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>

@endsection