<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700&display=swap&subset=cyrillic" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <title>Identification</title>
</head>
<body>
    <div class="page">
        <div class="container">
            <main class="content">
                <div class="content-header">
                   
                </div>
                <h1 class="logo"><img src="img/logo_vino.png" alt="vino"></h1>
                <form class="form" action="/" method="post">
                    @csrf
                        <div class="form-group">
                            <input class="input @error('email') is-invalid @enderror" type="text" name="email" value="{{ old('email') }}"  placeholder="email">
                        </div>
                        <div class="form-group">
                            <input class="input @error('password') is-invalid @enderror" type="password" name="mdp"   placeholder="MDP">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-enter" type="submit">Entrer</button>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-cancel" onclick="window.location.href='{{ route('register') }}'" type="submit" formaction="register.blade.php">S'inscrire</button>
                        </div>
                </form>
            </main>
        </div>
    </div>
</body>
</html>
