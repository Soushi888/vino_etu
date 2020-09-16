<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/app.css">

        <title>Vino</title>
        
    </head>
    <body>
        

<main id="login-main">
    <img src="img/logo_vino.png" alt="">
    <form method="POST" action="{{ route('login') }}">
    @csrf
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
            value="{{ old('email') }}" required autocomplete="email" autofocus>

        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
            name="password" required autocomplete="current-password">

        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <button id="bouton-bleu-main" type="submit" class="btn btn-primary">
            {{ __('Login') }}
        </button>

        <button id="bouton-rouge-main" onclick="window.location.href='{{ route('register') }}'"> S'inscrire</button>
    </form>
</main>
</body>
</html>