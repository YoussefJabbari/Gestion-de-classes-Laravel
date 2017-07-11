<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Gestion de classes</title>

    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel='stylesheet prefetch' href="{{ asset('css/Home.css') }}">
    <link rel='stylesheet prefetch' href="{{ asset('css/home2.css') }}">
    <link rel='stylesheet prefetch' href="{{ asset('css/home3.css') }}">
    <link rel="stylesheet" href="{{ asset('css/test.css') }}">
    <style>
        .has-error {
            border: 1px solid #FA5 !important;
        }

        body {
            background-image: url("{{ asset('Amphi-Ulg.jpg') }}");
        }

        .error
        {
            float: right;
            font-family: "Roboto", sans-serif;
            font-size: small;
            color: #FA5;
        }
    </style>
</head>

<body>
<div class="container">
    <div class="info">
        <h1>Gestion de classes</h1>
    </div>
</div>
<div class="form" style=" background: rgba(255, 250, 235, 0.6)">
    <div class="thumbnail" style="background: rgba(255, 197, 0, 0.85)"><img src="{{ asset('images/hat.svg') }}"/></div>

    <!-- formulaire d'inscription  -->
    <form action="{{ url('register') }}" method="post" class="register-form" enctype="multipart/form-data">
        {{ csrf_field() }}
        @if ($errors->has('nom'))
            <span>
              <strong class="error">{{ $errors->first('nom') }}</strong>
            </span>
        @endif
        <input name="nom" type="text" placeholder="Nom" class="{{ $errors->has('nom') ? 'has-error' : '' }}" value="{{ old('nom') }}" required/>

        @if ($errors->has('prenom'))
            <span>
              <strong class="error">{{ $errors->first('prenom') }}</strong>
            </span>
        @endif
        <input name="prenom" type="text" placeholder="Prénom" class="{{ $errors->has('prenom') ? 'has-error' : '' }}" value="{{ old('prenom') }}" required/>

        @if ($errors->has('dateNaissance'))
            <span>
              <strong class="error">{{ $errors->first('dateNaissance') }}</strong>
            </span>
        @endif
        <input name="dateNaissance" type="date" placeholder="Date de naissance" class="{{ $errors->has('dateNaissance') ? 'has-error' : '' }}" value="{{ old('dateNaissance') }}" required/>

        @if ($errors->has('user'))
            <span>
              <strong class="error">{{ $errors->first('user') }}</strong>
            </span>
        @endif
        <input name="user" type="radio" onclick="uenseignant()" id="tenseignant" value="0" class="{{ $errors->has('user') ? 'has-error' : '' }}" required/>Enseignant
        <input name="user" type="radio" onclick="uetudiant()" id="tetudiant" value="1" class="{{ $errors->has('user') ? 'has-error' : '' }}" required/>Etudiant

        @if ($errors->has('cne'))
            <span>
              <strong class="error">{{ $errors->first('cne') }}</strong>
            </span>
        @endif
        <div id="ifetudiant" style="display: none;"><input name="cne" type="text" placeholder="CNE" class="{{ $errors->has('cne') ? 'has-error' : '' }}" value="{{ old('cne') }}"/></div>

        @if ($errors->has('email'))
            <span>
              <strong class="error">{{ $errors->first('email') }}</strong>
            </span>
        @endif
        <input name="email" type="email" placeholder="Adresse mail" class="{{ $errors->has('email') ? 'has-error' : '' }}" value="{{ old('email') }}" required/>

        @if ($errors->has('password'))
            <span>
              <strong class="error">{{ $errors->first('password') }}</strong>
            </span>
        @endif
        <input name="password" type="password" placeholder="Mot de passe" class="{{ $errors->has('password') ? 'has-error' : '' }}" required/>
        <input name="password_confirmation" type="password" placeholder="Confirmer votre mot de passe" class="{{ $errors->has('password_confirmation') ? 'has-error' : '' }}" required/>
        <label for="photo" style="float: left;">Photo d'identité:</label>

        @if ($errors->has('photo'))
            <span>
              <strong class="error">{{ $errors->first('photo') }}</strong>
            </span>
        @endif
        <input name="photo" type="file" accept="image/*" class="{{ $errors->has('photo') ? 'has-error' : '' }}" required/>
        <button type="submit">create</button>
        <p class="message">Déjà inscrit? <a href="#">S'authentifier</a></p>
    </form>

    <!-- formulaire d'authentification -->
    <form action="{{ url('login') }}" method="post" class="login-form">
        {{ csrf_field() }}
        @if ($errors->has('email'))
            <span>
              <strong class="error">{{ $errors->first('email') }}</strong>
            </span>
        @endif
        <input name="email" type="text" class="{{ $errors->has('email') ? 'has-error' : '' }}"
               placeholder="Adresse mail"  value="{{ old('email') }}"/>


        @if ($errors->has('password'))
            <span>
                <strong class="error">{{ $errors->first('password') }}</strong>
            </span>
        @endif
        <input name="password" type="password" class="{{ $errors->has('password') ? 'has-error' : '' }}" placeholder="Mot de passe" />

        <button type="submit">login</button>
        <p class="message">Vous n'êtes pas inscrits? <a href="#">Créez un compte</a></p>
    </form>
</div>

<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/Ajax.js') }}"></script>
<script src="{{ asset('js/dynamic.js') }}"></script>
<script>

//    var url = window.location.pathname;
//
//    $(document).ready(function () {
//        if(url === '/register')
//            $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
//    });

    function uenseignant() {
        document.getElementById('ifetudiant').style.display = "none";
    }
    function uetudiant() {
        document.getElementById('ifetudiant').style.display = "block";
    }
</script>

</body>
</html>
