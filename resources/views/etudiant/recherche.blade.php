@extends('master')

@section('title', '- Recherche')

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
    <div style="border-top: 3px solid #CCC ; padding:20px;" class="clearfix content">

        <div class="content_title"><h2>Votre Recherche !</h2></div>
        <?php $i = 0; ?>
        @forelse($classes as $classe)
            @if(count($evaluation->where('classe_id', $classe->id)) == 0 && count($demande->where('classe_id', $classe->id)) == 0)
        <div class="clearfix single_content">
            <div class="clearfix post_date floatleft">
                <div class="date">
                    <h3>C</h3>
                </div>
            </div>
            <div class="clearfix post_detail">
                <h2><a>Classe trouvée:</a></h2>
                <div class="clearfix post_excerpt">
                    <p>Nom du cours: {{ $classe->nom_cours }}</p>

                    <p>Semestre: {{ $classe->semestre }}</p>

                    <p>Année universitaire: {{ $classe->annee_univ }}</p>

                    <p>Nom de la formation: {{ $classe->nom_formation }}</p>

                    <p>Enseignant responsable: {{ $classe->enseignant->user->nom }} {{ $classe->enseignant->user->prenom }}</p><br/>

                </div>
                <a href="{{ action('Etudiant\classeController@send', ['classe_id' => $classe->id]) }}">Envoyer une demande</a>
            </div>
        </div>
                <?php $i++; ?>
            @endif

        @empty
            <h2 style="color: #222222;padding: 10px 20px;font-family: elephant;">Il n'existe aucune classe avec ces propriétés!</h2>
        @endforelse
        @if($i == 0 && count($classes) != 0)
            <h2 style="color: #222222;padding: 10px 20px;font-family: elephant;">Vous avez déjà envoyé une demande ou vous êtes déjà inscrit dans les classes ayant ces propriétés!</h2>
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