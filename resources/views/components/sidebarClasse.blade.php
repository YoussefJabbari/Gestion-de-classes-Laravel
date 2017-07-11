<div class="clearfix sidebar">
    <div class="clearfix single_sidebar">
        <div class="popular_post">
            <div class="sidebar_title"><h2>Classe:</h2></div>
            <ul>
                <li>
                    <a>
                        <label>Nom du cours: {{ $classe->nom_cours }}</label><br>
                        <label>Semestre: {{ $classe->semestre }}</label><br>
                        <label>Formation: {{ $classe->nom_formation }}</label><br>
                        <label>Année scolaire: {{ $classe->annee_univ }}</label><br>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>