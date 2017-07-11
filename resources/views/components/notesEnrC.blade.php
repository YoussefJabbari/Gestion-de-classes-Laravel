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
            <li>
                <form id="testform"  >
                    {{ csrf_field() }}
                    <input type="hidden" name="idetudiant" value="{{ $etudiant->id }}" >
                    <input type="number" name="note_normale" class="input" placeholder="Session normale">
                    <input type="number" name="note_rattrapage" class="input" placeholder="Session rattrapage">
                    <input type="number" name="note_controle" class="input" placeholder="Note de contrôle">
                </form>
                <button  onclick="submit()" class="wpcf7__submit floatright">Insérer</button>
            </li>
        </ul>
    </div>
</div>

<script>
   var  submit =function () {
        $.post("inser_info_etudiant", $( "#testform" ).serialize())
                .done(function (data) {
                    $('[data-id="'+data["etudiant_id"]+'"]    td.note_normale').html(data["note_normale"])
                    $('[data-id="'+data["etudiant_id"]+'"]    td.note_rattrapage').html(data["note_rattrapage"])
                    $('[data-id="'+data["etudiant_id"]+'"]    td.note_controle').html(data["note_controle"])
                });
    }
</script>