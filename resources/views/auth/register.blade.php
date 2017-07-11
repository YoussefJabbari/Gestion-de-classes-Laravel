@extends('layouts.app')

@section('content')
        <!-- formulaire d'inscription  -->
<form action="{{ url('register') }}" method="POST" class="register-form" enctype="multipart/form-data">
    {{ csrf_field() }}
    @if ($errors->has('nom'))
        <span>
              <strong class="error">{{ $errors->first('nom') }}</strong>
            </span>
    @endif
    <input name="nom" type="text" placeholder="Nom" class="{{ $errors->has('nom') ? 'has-error' : '' }}" value="{{ old('nom') }}" />

    @if ($errors->has('prenom'))
        <span>
              <strong class="error">{{ $errors->first('prenom') }}</strong>
            </span>
    @endif
    <input name="prenom" type="text" placeholder="Prénom" class="{{ $errors->has('prenom') ? 'has-error' : '' }}" value="{{ old('prenom') }}" />

    @if ($errors->has('dateNaissance'))
        <span>
              <strong class="error">{{ $errors->first('dateNaissance') }}</strong>
            </span>
    @endif
    <input name="dateNaissance" type="date" placeholder="Date de naissance" class="{{ $errors->has('dateNaissance') ? 'has-error' : '' }}" value="{{ old('dateNaissance') }}" />

    @if ($errors->has('user'))
        <span>
              <strong class="error">{{ $errors->first('user') }}</strong>
            </span>
    @endif
    <input name="user" type="radio" onclick="uenseignant()" id="tenseignant" value="0" class="{{ $errors->has('user') ? 'has-error' : '' }}" />Enseignant
    <input name="user" type="radio" onclick="uetudiant()" id="tetudiant" value="1" class="{{ $errors->has('user') ? 'has-error' : '' }}" />Etudiant

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
    <input name="email" type="text" placeholder="Adresse mail" class="{{ $errors->has('email') ? 'has-error' : '' }}" value="{{ old('email') }}" />

    @if ($errors->has('password'))
        <span>
              <strong class="error">{{ $errors->first('password') }}</strong>
            </span>
    @endif
    <input name="password" type="password" placeholder="Mot de passe" class="{{ $errors->has('password') ? 'has-error' : '' }}" />
    <input name="password_confirmation" type="password" placeholder="Confirmer votre mot de passe" class="{{ $errors->has('password_confirmation') ? 'has-error' : '' }}" />
    <label for="photo" style="float: left;">Photo d'identité:</label>

    @if ($errors->has('photo'))
        <span>
              <strong class="error">{{ $errors->first('photo') }}</strong>
            </span>
    @endif
    <input name="photo" type="file" accept="image/*" class="{{ $errors->has('photo') ? 'has-error' : '' }}" />
    <button type="submit">create</button>
    <p class="message">Déjà inscrit? <a href="/login">S'authentifier</a></p>
</form>
@endsection
