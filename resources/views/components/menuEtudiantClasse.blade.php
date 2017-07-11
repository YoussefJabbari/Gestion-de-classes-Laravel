<div class="header_bottom">
    <nav>
        <ul id="nav">
            <li><a href=""></a></li>
            <li><a href="{{ action('Etudiant\annonceController@index',['id' => $classe->id]) }}">Annonces</a></li>
            <li><a href="{{ action('Etudiant\devoirController@index',['id' => $classe->id]) }}">Devoirs</a></li>
            <li><a href="{{ action('Etudiant\documentController@index',['id' => $classe->id]) }}">Documents</a></li>
            <li><a href=""></a></li><li><a href=""></a></li><li><a href=""></a></li><li><a href=""></a></li><li><a href=""></a></li><li><a href=""></a></li>
            <li><a href=""></a></li><li><a href=""></a></li><li><a href=""></a></li><li><a href=""></a></li><li><a href=""></a></li><li><a href=""></a></li>
            <li><a href=""></a></li><li><a href=""></a></li><li><a href=""></a></li><li><a href=""></a></li><li><a href=""></a></li><li><a href=""></a></li>
            <li id="dropdown"><a>Paramètres</a>
                <ul>
                    <li><a href="{{ action('Etudiant\classeController@index') }}">Vos classes</a></li>
                    <li><a href="/logout">Déconnexion</a></li>
                </ul>
            </li>
        </ul>
    </nav>
</div>