@extends('master')

@section('title', '- Devoirs')

@section('meta')
@endsection

@section('css')
    <style>
        button{background: #222222;
            border: medium none;
            color: #FFD500;
            padding: 5px 20px;
            margin: 2px 0;
            display: inline-block;
            border-radius: 4px;
            box-sizing: border-box;
            cursor: pointer;
            font-size: 12px;
            width: 25%;
            height: 30px;
            font-family: oswald;}
    </style>
@endsection

@section('espace')
    etudiant
@endsection

@section('menu')
    @include('components.menuEtudiantClasse')
@endsection

@section('content')
    <div class="clearfix content">

        <div class="content_title"><h2>Devoirs</h2></div>

        @forelse($classe->devoirs as $devoir)

        <div class="clearfix single_content">
            <div class="clearfix post_date floatleft">
                <div class="date">
                    <h3>Dv</h3>
                </div>
            </div>
            <div class="clearfix post_detail">
                <h2><a>Titre : {{ $devoir->titre_devoir }} </a></h2>
                <div class="clearfix post-meta">
                    <p><span><i class="fa fa-user"></i> {{ $classe->nom_cours }}</span> <span><i class="fa fa-clock-o"></i> {{ $devoir->date_devoir }}</span> </p>
                </div>
                <div class="clearfix post_excerpt">
                    <p>Enoncé : {{ $devoir->enonce }}<br>
                        Dernier delai:    {{ $devoir->deadline }}<br>
                        Formats demandées:@foreach($devoir->formats as $format) {{ strtoupper($format->type_format) }} @endforeach</p>
                </div><br/>
                <form id="fichier" action="{{ action('Etudiant\devoirController@upload', ['classe_id' => $classe->id, '$devoir_id' => $devoir->id]) }}" method='post' enctype="multipart/form-data" >
                    {{ csrf_field() }}
                    <input type="hidden" name="classe_id" value="{{ $classe->id}}"/>
                    <input type="hidden" name="devoir_id" value="{{ $devoir->id}}"/>
                    <input class="style" type="file" name="fichier" required/>
                </form>
                <button class="floatright" type="submit" id="upload">ENVOYER</button>
            </div>
        </div>

        @empty

            <h2 style="color: #222222;padding: 10px 20px;font-family: elephant;">Cette classe ne contient aucun devoir!</h2>

        @endforelse

    </div>
@endsection

@section('sidebar')
    @include('components.sidebarClasse')
@endsection

@section('js')
    <script>
        $(function () {
            $('#upload').click(function () {
                var file = new FormData($('#fichier')[0]);
                $.ajax({
                    url: '/devoirs/upload',
                    type: 'POST',
                    data: file,
                    processData: false,
                    contentType: false,
                    success: function (data) {
                        if(data==1)
                        {
                            alert('OK');
                        }
                        else
                        {
                            alert(data);
                        }
                    }
                })
            })


        })
    </script>
@endsection