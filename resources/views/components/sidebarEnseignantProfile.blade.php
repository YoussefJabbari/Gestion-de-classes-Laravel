<div class="clearfix sidebar">
    <div class="clearfix single_sidebar">
        <div class="popular_post">
            <div class="content_title"><h2><span class="glyphicon glyphicon-user"></span> Profile:</h2></div>
            <img src="/Telechargements/images/{{ Auth::user()->photo }}" class="img-thumbnail" style="width:270px;height:255px;" class="img-responsive" alt="Responsive image"/>
            <ul>
                <li>
                    <a>
                        <label>Nom: {{ Auth::user()->nom }}</label><br>
                        <label>Prénom: {{ Auth::user()->prenom }}</label><br>
                        <label>Date de naissance: {{Auth::user()->date_naissance}}</label><br>
                        <label>Email: {{ Auth::user()->email }}</label><br>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>