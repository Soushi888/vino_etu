<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700&display=swap&subset=cyrillic" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <title>Vino-Inscription</title>
</head>
<body>
    <div class="page">
        <div class="container">
            <main class="content">
               
                <h1 class="logo"><img src="img/logo_vino.png" alt="vino"></h1>
                <form class="form" action="/" method="post">
                    <div class="form-group">
                        <input class="input" type="text" name="prenom" placeholder="Prenom">
                    </div>
                    <div class="form-group">
                        <input class="input" type="text" name="nom" placeholder="Nom">
                    </div>
                    <div class="form-group">
                        <input class="input" type="text" name="rue" placeholder="Rue">
                    </div>
                    <div class="form-group">
                        <input class="input" type="text" name="ville" placeholder="Ville">
                    </div>
                    <div class="form-group">
                        <input class="input" type="text" name="pays" placeholder="Pays">
                    </div>
                    <div class="form-group">
                        <input class="input" type="text" name="code" placeholder="Code postale">
                    </div>
                    <div class="form-group">
                        <input class="input" type="text" name="tel" placeholder="Numéro de téléphone">
                    </div>
                    <div class="form-group">
                        <input class="input" type="email" name="courriel" placeholder="Courriel">
                    </div>
                    <div class="form-group">
                        <input class="input" type="password" name="mdp" placeholder="MDP">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-register" type="submit">S'inscrire</button>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-cancel" type="submit" formaction="identification.html">Annuler</button>
                    </div>
                </form>
            </main>
        </div>
    </div>
</body>
</html>
