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
    .input{
        width: 247px;
        height: 22px;
        padding: 12px 20px;
        margin: 2px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }
</style>
<div class="clearfix single_sidebar">
    <div class="popular_post contact_us">
        <div class="sidebar_title"><h2>Etudiant :</h2></div>
        <img src="/Telechargements/images/{{ $etudiant->user->photo }}" class="floatright" width="112px" height="112px">
        <ul>
            <li>
                <a>
                    <label>CNE: {{ $etudiant->user_id }}</label><br>
                    <label>Nom: {{ $etudiant->user->nom }}</label><br>
                    <label>Prenom: {{ $etudiant->user->prenom }}</label><br>
                </a>
            </li>
            @foreach($travails as $travail)
            <li><a href="{{ action('Enseignant\travailsSidebarController@download', ['idTravail' => $travail->id]) }}"><label>Travail</label><br></a></li>
            @endforeach
            <li>
                <form id="travailform">
                    {{ csrf_field() }}
                    <input type="hidden" name="idetudiant" value="{{ $etudiant->id }}" >
                    <input type="hidden" name="iddevoir" value="{{ $devoir->id }}" >
                    <input type="number" name="note_devoir" class="input" >
                </form>
                <button  onclick="submit()" class="wpcf7__submit floatright">Ajouter</button>
            </li>
        </ul>
    </div>
</div>

<script>
    var  submit =function () {
        $.post("/inserer_note_travail", $( "#travailform" ).serialize())
                .done(function (data) {
                    $('[data-id="'+data["etudiant_id"]+'"]    td.note_devoir').html(data["note_devoir"])
                });
    }
</script>