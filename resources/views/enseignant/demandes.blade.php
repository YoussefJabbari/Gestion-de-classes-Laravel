@extends('master')

@section('title', '- Demandes')

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

        <div class="content_title"><h2>Demandes des étudiants</h2></div>

        @forelse($prof->demandes as $demande)

        <div class="clearfix single_content">
            <div class="clearfix post_date floatleft">
                <img width="100px" src="Telechargements/images/{{$demande->etudiant->user->photo}}" >
            </div>
            <div class="clearfix post_detail">
                <h2><a>{{$demande->etudiant->user->nom}} {{ $demande->etudiant->user->prenom }} </a></h2>
                <div class="clearfix post-meta">
                    <p><span><i class="fa"></i>Classe demandée:</span></p>
                </div>
                <div class="clearfix post_excerpt">
                    <p>Nom du cours         : {{ $demande->classe->nom_cours }}<br>

                        Semestre            : {{ $demande->classe->semestre }}<br>

                        Année universitaire : {{ $demande->classe->annee_univ }}<br>

                        Nom de la formation : {{ $demande->classe->nom_formation }}</p><br>
                </div>
                <span><a href="{{ action('Enseignant\demandeController@add',['id_etudiant' => $demande->etudiant->id,'id_classe' => $demande->classe->id]) }}" >Ajouter</a></span>
                <span><a href="{{ action('Enseignant\demandeController@refuse',['id_etudiant' => $demande->etudiant->id,'id_classe' => $demande->classe->id]) }}" >Refuser</a></span>

            </div>


        </div>


        @empty

        <h2 style="color: #222222;padding: 10px 20px;font-family: elephant;">Vous n'avez aucune demande!</h2>

        @endforelse

    </div>
@endsection

@section('sidebar')
    @include('components.sidebarEnseignantProfile')
@endsection
