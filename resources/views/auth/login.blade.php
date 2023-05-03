@extends('components.loginregisterlayout')
@section('content')

@if(session('status'))
    {{ session('status') }}
@endif

<div class="login-page">
    <div class="form">
      <form class="login-form" method="POST" action="/login">
        @csrf
        <input type="email" name="email" placeholder="Email"/>
        <input type="password" name="password" placeholder="Mot de passe"/>
        <button type="submit">Se connecter</button>
      </form>
      <p class="message">Pas encore inscrit ? <a href="/register">Créer un compte</a></p>
    </div>
    <div class="footer">
      <p>© 2023 {{ $title }}. Tous droits réservés.</p>
    </div>
</div>

@endsection