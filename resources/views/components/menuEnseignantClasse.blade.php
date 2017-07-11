<div class="header_bottom">
    <nav>
        <ul id="nav">
            <li><a href=""></a></li>
            <li><a href="{{ action('Enseignant\annonceController@index', ['id' => $classe->id]) }}">Annonces</a></li>
            <li><a href="{{ action('Enseignant\devoirController@index', ['id' => $classe->id]) }}">Devoirs</a></li>
            <li><a href="{{ action('Enseignant\documentController@index', ['id' => $classe->id]) }}">Documents</a></li>
            <li><a href="{{ action('Enseignant\absenceController@index', ['id' => $classe->id]) }}">Assiduité</a></li>
            <li><a href="{{ action('Enseignant\examsController@index', ['id' => $classe->id]) }}">Exams/Controles</a></li>
            <li><a href="{{ action('Enseignant\etudiantController@index', ['id' => $classe->id]) }}">Etudiants</a></li>
            <li><a href="{{ action('Enseignant\notesController@index', ['id' => $classe->id]) }}">Notes</a></li>
            <li><a href=""></a></li><li><a href=""></a></li><li><a href=""></a></li><li><a href=""></a></li><li><a href=""></a></li><li><a href=""></a></li>
            <li id="dropdown"><a href="">Paramètres</a>
                <ul>
                    <li><a href="{{ action('Enseignant\classeController@index') }}">Vos classes</a></li>
                    <li><a href="{{ action('Enseignant\demandeController@index') }}">Demandes des étudiants</a></li>
                    <li><a href="/logout"><span class="glyphicon glyphicon-off"></span>Déconnexion</a></li>
                </ul>
            </li>
        </ul>
    </nav>
</div>