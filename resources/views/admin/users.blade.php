<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700&display=swap&subset=cyrillic"
          rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src={{ asset("js/api/User.js") }}></script>
    <script src={{ asset("js/modal.js") }}></script>
    <script defer>
        users = new User();
        users.index().then(data => {
            let tableau = document.querySelector(".info tbody");
            data.map(u => {
                let tr = document.createElement("tr")
                tr.innerHTML = `
                    <td aria-label="#">${u.id}</td>
                    <td aria-label="nom">${u.name}</td>
                    <td aria-label="prenom">${u.prenom}</td>
                    <td aria-label="email">${u.email}</td>
                    <td aria-label="type">${u.type}</td>
                    <td aria-label="actions" style="display: flex">
                        <a style="margin-right: 10px" class="btn-update" href="/amin/users/${u.id}/update"><i class="fa fa-pencil-square" aria-hidden="true"></i></a>
                        <button style="width: max-content" class="btn btn-accepter inline" id="btn_modal_window" type="submit">Supprimer</button>
                    </td>
                `;

                tableau.appendChild(tr);

                let modalDiv = document.getElementById("my_modal")
                modalDiv.innerHTML = `
                    <div class="modal_content">
                        <span class="close_modal_window">×</span>
                        <h2>Confirmation suppression</h2>
                        <p>Voulez vous vraiment supprimer l'utilisateur dont l'email est ${u.email} ?</p>
                        <button style="width: max-content" class="btn btn-accepter inline" id="btn_modal_window">Oui</button>
                        <button style="width: max-content" class="btn btn-accepter inline" id="btn_modal_window" type="submit">Non</button>
                    </div>
            `;

            })

            console.log(data)


            modal();

        })
    </script>


    <title>Vino - Liste des utilisateurs</title>
</head>

<body>
<div class="page_admin">
    <a href="/" class="logo_admin"><img src={{ asset("img/logo_vino.png") }} alt="vino"></a>
    <nav id="nav" class="wrap">
        <input type="checkbox" name="toggle" id="toggle"/>
        <label for="toggle"><i class="icon-reorder"></i> <i class="fa fa-bars"></i></label>
        <ul id="menu">
            <a class="header-nav-link active" href="*">
                <li>Utilisateurs</li>
            </a>
            <a class="header-nav-link active" href="/admin/catalogue">
                <li>Catalogue</li>
            </a>
            <a class="header-nav-link active" href="/admin/statistiques">
                <li>Statistiques</li>
            </a>
            <a class="header-nav-link" href="/logout">
                <i class="fa fa-sign-out fa-1x" aria-hidden="true"></i>
            </a>
        </ul>
    </nav>

    <div style="margin-bottom: 50px" class="container">
        <button class="btn btn-ajouter inline" type="submit"
                onclick=window.location.href='{{ route('admin.user.ajouter') }}>Enregistrer un utilisateur
        </button>
    </div>

    <table class="info container">
        <thead>
        <tr>
            <th>#</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
            <th>type</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>

        </tbody>
    </table>

    <div id="my_modal" class="modal"></div>

</div>
</body>

</html>