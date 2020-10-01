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
    <script defer>
        function afficherListeUtilisateurs() {
            let users = new User();
            users.index().then(data => {
                new Modal();
                let modalContent = document.getElementsByClassName("modal-content");

                // Injection des données des bouteilles
                let tableau = document.querySelector(".info tbody");
                tableau.innerHTML = "";
                data.map(u => {
                    let tr = document.createElement("tr")
                    tr.innerHTML = `
                    <td aria-label="#">${u.id}</td>
                    <td aria-label="nom">${u.name}</td>
                    <td aria-label="email">${u.email}</td>
                    <td aria-label="type">${u.type}</td>
                    <td aria-label="actions">
                        <button style="width: max-content" class="btn btn-boire inline btn_modal_window" btn="modifier_${u.email}" type="submit">Modifier</button>
                        <button style="width: max-content" class="btn btn-accepter inline btn_modal_window" btn="supprimer_${u.email}" type="submit">Supprimer</button>
                    </td>`;

                    tableau.appendChild(tr);

                    // Bouton supprimer
                    let btnSupprimer = document.querySelector(`[btn="supprimer_${u.email}"]`);
                    // Modal bouton supprimer
                    btnSupprimer.addEventListener("click", () => {
                        modalContent[0].innerHTML = `
                        <span class="close-button">&times;</span>
                        <h2>Confirmation suppression</h2>
                        <p>Voulez vous vraiment supprimer l'utilisateur dont l'email est ${u.email} ?</p>
                        <button style="width: max-content" class="btn btn-accepter inline" id="oui">Oui</button>
                        <button style="width: max-content" class="btn btn-accepter inline" type="submit" id="non">Non</button>`;
                        Modal.showModal();

                        document.getElementById("oui").addEventListener("click", () => {
                            supprimerUtilisateur(u.id);
                            afficherListeUtilisateurs();
                        })

                        document.getElementById("non").addEventListener("click", () => {
                            Modal.closeModal();
                        })

                    })

                    // TODO : Messages erreurs et modification
                    // Bouton modifier
                    let btnModifier = document.querySelector(`[btn="modifier_${u.email}"]`);
                    // Modal bouton modifier
                    btnModifier.addEventListener("click", () => {
                        modalContent[0].innerHTML = `<span class="close-button">&times;</span>
                        <h2>Modifier un utilisateur</h2>
                        <form class="form-ajouter" action="/" method="post">
                          <label for="name">Nom : </label>
                          <input class="input-ajouter" type="text" id="name" name="name" value="${u.name}"><br><br>
                          <label for="email">Adresse courriel : </label>
                          <input class="input-ajouter" type="text" id="email" name="email" value="${u.email}"><br><br>
                          <label for="type">type :</label>
                            <select style="margin-bottom: 5px" class="input-ajouter">
                                <option>Utilisateur</option>
                                <option>Administrateur</option>
                            </select>
                          <label for="password">Mot de passe :</label>
                          <input class="input-ajouter" type="password" id="password" name="password"><br><br>
                          <label for="password_confirm">Confirmation du Mot de passe :</label>
                          <input class="input-ajouter" type="password" id="password_confirm" name="password_confirm"><br><br>
                          <button style="margin-top: 30px; cursor: not-allowed" class="btn btn-accepter" disabled>Accepter</button>
                        </form>`;
                        Modal.showModal();
                    })
                })

                // TODO : Messages erreurs et ajout
                // Bouton ajouter
                let btnAjouter = document.querySelector(`[btn="ajouter"]`);

                // Modal bouton ajouter
                btnAjouter.addEventListener("click", () => {
                    modalContent[0].innerHTML = `
                        <span class="close-button">&times;</span>
                        <h2>Enregistrer un utilisateur</h2>
                        <form class="form-ajouter" action="/" method="post">
                          <label for="name">Nom : </label>
                          <input class="input-ajouter" type="text" id="name" name="name"><br><br>
                          <label for="email">Adresse courriel : </label>
                          <input class="input-ajouter" type="text" id="email" name="email"><br><br>
                          <label for="type">type :</label>
                            <select style="margin-bottom: 5px" class="input-ajouter">
                                <option>Utilisateur</option>
                                <option>Administrateur</option>
                            </select>
                          <label for="password">Mot de passe :</label>
                          <input class="input-ajouter" type="password" id="password" name="password"><br><br>
                          <label for="password_confirm">Confirmation du Mot de passe :</label>
                          <input class="input-ajouter" type="password" id="password_confirm" name="password_confirm"><br><br>
                          <button style="margin-top: 30px; cursor: not-allowed" class="btn btn-accepter" disabled>Accepter</button>
                        </form>`;
                    Modal.showModal();
                })

                console.log(data)

            })
        }

        afficherListeUtilisateurs();

        function supprimerUtilisateur(id) {
            let users = new User();
            users.destroy(id);
            Modal.closeModal();
            afficherListeUtilisateurs();
        }

    </script>
    <title>Vino - Liste des utilisateurs</title>
</head>

<body>
<div class="page_admin">
    <div class="logo_admin"><a href="{{ route("accueil") }}"><img src={{ asset("img/logo_vino.png") }} alt="vino"></a></div>
    <nav id="nav" class="wrap">
        <input type="checkbox" name="toggle" id="toggle"/>
        <label for="toggle"><i class="icon-reorder"></i> <i class="fa fa-bars"></i></label>
        <ul id="menu">
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

    <div style="margin-bottom: 50px" class="container">
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
            <th>type</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
</div>
</body>

</html>