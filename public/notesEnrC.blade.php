<div class="clearfix single_sidebar">
    <div class="popular_post contact_us">
        <div class="sidebar_title"><h2>Etudiant :</h2></div>
        <img src="Telechargements/images/{{ $etudiant->user->photo }}" class="floatright" width="112px" height="112px">
        <ul>
            <li>
                <a>
                    <label>CNE: {{ $etudiant->user_id }}</label><br>
                    <label>Nom: {{ $etudiant->user->nom }}</label><br>
                    <label>Prenom: {{ $etudiant->user->prenom }}</label><br>
                </a>
            </li>
            <li>
                <form action="" method="post">
                    <input type="number" name="note_normale" class="wpcf7number" placeholder="Session normale">
                    <input type="number" name="note_rattrapage" class="wpcf7number" placeholder="Session rattrapage">
                    <input type="number" name="note_controle" class="wpcf7number" placeholder="Note de contrôle">
                    <input type="submit" name="inserer" class="wpcf7__submit" value="Insérer">
                </form>
            </li>
        </ul>
    </div>
</div>