<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700&display=swap&subset=cyrillic"
        rel="stylesheet">
    <link rel="stylesheet" href="css/app.css">

    <title>Vino</title>

</head>

<body>
    <div class="page">
        <div class="container">
            <main class="content">
                <div class="content-header">

                </div>
                <h1 class="logo">
                    <img src="img/logo_vino.png" alt="vino">
                </h1>

                <form method="POST" class="form" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <input class="input" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email"  placeholder="Courriel" autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input class="input" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password" required
                            autocomplete="current-password" placeholder="MDP">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button class="btn btn-enter" id="bouton-bleu-main" type="submit" class="btn btn-primary">
                            {{ __('Login') }}
                        </button>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-cancel" onclick="window.location.href='{{ route('register') }}'">
                            S'inscrire</button>

                    </div>
                </form>
            </main>
        </div>
    </div>
</body>

</html>


