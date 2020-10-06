<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700&display=swap&subset=cyrillic"
          rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href={{ asset("css/style.css") }}>
    <script src={{ asset("js/api/User.js") }}></script>
    <script src={{ asset("js/modal.js") }}></script>
    <script src={{ asset("js/composantes/ListeUtilisateurs.js") }}></script>
    <title>Vino - Liste des utilisateurs</title>
</head>

<body>
<div class="page_admin">
    <div class="logo_admin"><a href="{{ route("accueil") }}"><img src={{ asset("img/logo_vino.png") }} alt="vino"></a>
    </div>
    <nav class="nav" class="wrap">
        <input type="checkbox" name="toggle" id="toggle"/>
        <label for="toggle"><i class="icon-reorder"></i> <i class="fa fa-bars"></i></label>
        <ul class="menu">
            <a class="header-nav-link active" href="{{ route("admin") }}">
                <li>Utilisateurs</li>
            </a>
            <a class="header-nav-link active" href="{{ route("admin.catalogue") }}">
                <li>Catalogue</li>
            </a>
            <a class="header-nav-link" href="{{ route("logout") }}">
                <i class="fa fa-sign-out fa-1x sign" aria-hidden="true"></i>
            </a>
        </ul>
    </nav>

    <div class="container margin-bottom-50px">
        <button class="btn btn-ajouter inline btn_modal_window" btn="ajouter" type="submit">
            Enregistrer un utilisateur
        </button>
    </div>

    <table class="info container">
        <thead>
        <tr>
            <th>#</th>
            <th>Nom</th>
            <th>Email</th>
            <th>rôle</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
            <script defer>ListeUtilisateurs();</script>
        </tbody>
    </table>
</div>
</body>

</html>