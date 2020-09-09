<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/app.css">

        <title>Vino</title>
        
    </head>
    <body>
        <main id="pageAuthentification-main">
            <img src="img/logo_vino.png" alt="">
            <form action="">
                <input type="text" placeholder="Identifiant">
                <input type="password" placeholder="Mot de passe">
                <button id="bouton-bleu-main">Entrer</button>
                <button id="bouton-rouge-main">S'inscrire</button>
            </form>
        </main>
    </body>
</html>
