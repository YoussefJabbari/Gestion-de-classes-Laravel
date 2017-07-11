@extends('master')

@section('title', '- Notes')

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
        <div class="clearfix single_content newsletter">
            <form action="{{ action('Enseignant\notesController@calcul', ['id' => $classe->id]) }}" method="post">
                {{ csrf_field() }}
                <legend class="legende">Calculer les notes:</legend><br>
                <input type="number" name="pourcentage_examen" placeholder="Pourcentage de l'examen final"><br />
                <input type="number" name="pourcentage_controle" placeholder="Pourcentage des contrôles"><br />
                <input type="number" name="pourcentage_devoir" placeholder="Pourcentage des devoirs"><br />
                <input type="number" name="pourcentage_assiduite"  placeholder="Pourcentage de l'assiduité"><br />
                <input type="number" name="note_reference"  placeholder="Note de référence de l'assiduité"><br />
                <input type="number" name="nbr_seance"  placeholder="Nombre de séances"><br />

                <input type="submit" class="floatright" value="Calculer"> <br /><br />
            </form>
        </div>
    </div>
@endsection

@section('sidebar')
    @include('components.sidebarClasse')
@endsection