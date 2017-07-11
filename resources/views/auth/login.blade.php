@extends('layouts.app')

@section('content')
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
    <p class="message">Vous n'êtes pas inscrits? <a href="/register">Créez un compte</a></p>
</form>
@endsection
