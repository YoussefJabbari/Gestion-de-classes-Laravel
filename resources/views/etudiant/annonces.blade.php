@extends('master')

@section('title', '- Annonces')

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
    @include('components.menuEtudiantClasse')
@endsection

@section('content')
    <div class="clearfix content">
        <div class="content_title"><h2>Annonces</h2></div>

        @forelse($classe->annonces as $annonce)

        <div class="clearfix single_content">
            <div class="clearfix post_date floatleft">
                <div class="date">
                    <h3>A</h3>
                </div>
            </div>
            <div class="clearfix post_detail">
                <h2><a>{{ $annonce->nom_annonce }}</a></h2>
                <div class="clearfix post-meta">
                    <p><span><i class="fa fa-user"></i> {{ $classe->nom_cours }}</span> <span><i class="fa fa-clock-o"></i> {{ $annonce->date_annonce }}</span> </p>
                </div>
                <div class="clearfix post_excerpt">
                    <pre>{{ $annonce->annonce }}</pre><br>
                </div>
            </div>
        </div>

        @empty

            <h2 style="color: #222222;padding: 10px 20px;font-family: elephant;">Cette classe ne contient aucune annonce!</h2>

        @endforelse

    </div>
@endsection

@section('sidebar')
    @include('components.sidebarClasse')
@endsection