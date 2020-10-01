<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700&display=swap&subset=cyrillic"
          rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href={{ asset("css/style.css") }}>
    <script src={{ asset("js/api/Bouteille.js") }}></script>
    <script src="{{ asset("js/functions.js") }}"></script>
    <script src="{{ asset("js/modal.js") }}"></script>
    <script defer>
        function afficherListeBouteilles() {

            bouteilles = new Bouteille();
            bouteilles.index().then(data => {
                let tableau = document.querySelector(".info tbody")
                tableau.innerHTML = "";

                new Modal();
                let modalContent = document.getElementsByClassName("modal-content");


                data.map(b => {

                    let date = new Date(b.created_at);
                    date = `${date.getDate()} ${nomMois(date.getMonth())} ${date.getFullYear()}`

                    let tr = document.createElement("tr")
                    tr.innerHTML = `
                    <td aria-label="#">${b.id}</td>
                    <td aria-label="nom">${b.nom}</td>
                    <td aria-label="prenom">${b.code_saq}</td>
                    <td aria-label="email">${b.pays}</td>
                    <td aria-label="description">${b.description}</td>
                    <td aria-label="prix">${b.prix_saq}$</td>
                    <td aria-label="url"><a href="${b.url_saq}">${b.url_saq}</a></td>
                    <td aria-label="image"><img style="width: 100px" src="${b.url_image}" alt="${b.description}"></td>
                    <td aria-label="format">${b.format}</td>
                    <td aria-label="type">${getType(b.type_id)}</td>
                    <td aria-label="created_at">${date}</td>
                    <td aria-label="actions" >
                        <button style="width: max-content" class="btn btn-boire inline btn_modal_window" btn="modifier_${b.code_saq}" type="submit">Modifier</button>
                        <button style="width: max-content" class="btn btn-accepter inline btn_modal_window" btn="supprimer_${b.code_saq}" type="submit">Supprimer</button>
                    </td>
                `;
                    tableau.appendChild(tr);

                    // Bouton supprimer
                    let btnSupprimer = document.querySelector(`[btn="supprimer_${b.code_saq}"]`);
                    // Modal bouton supprimer
                    btnSupprimer.addEventListener("click", () => {
                        modalContent[0].innerHTML = `
                        <span class="close-button">&times;</span>
                        <h2>Confirmation suppression</h2>
                        <p>Voulez vous vraiment supprimer la bouteille "${b.nom}" ?</p>
                        <button style="width: max-content" class="btn btn-accepter inline" id="oui">Oui</button>
                        <button style="width: max-content" class="btn btn-accepter inline" type="submit" id="non">Non</button>`;
                        Modal.showModal();

                        document.getElementById("oui").addEventListener("click", () => {
                            supprimerBouteille(b.id);
                            afficherListeBouteilles();
                        })

                        document.getElementById("non").addEventListener("click", () => {
                            Modal.closeModal();
                        })


                    })

                    // TODO : Messages erreurs et modification
                    // Bouton modifier
                    let btnModifier = document.querySelector(`[btn="modifier_${b.code_saq}"]`);
                    // Modal bouton modifier
                    btnModifier.addEventListener("click", () => {
                        modalContent[0].innerHTML = `
                        <span class="close-button">&times;</span>
                        <h2>Modifier une bouteille</h2>
                        <form class="form-ajouter" action="/" method="post">
                          <label for="nom">Nom : </label>
                          <input class="input-ajouter" type="text" id="nom" name="nom" value="${b.nom}"><br><br>
                          <label for="code_saq">Code : </label>
                          <input class="input-ajouter" type="text" id="code_saq" name="code_saq" value="${b.code_saq}"><br><br>
                          <label for="pays">Pays :</label>
                          <input class="input-ajouter" type="text" id="pays" name="pays" value="${b.pays}"><br><br>
                          <label for="description">Description :</label>
                          <textarea style="margin-bottom: 10px" class="input-ajouter" id="description" name="description">${b.description}</textarea>
                          <label for="url_saq">URL : </label>
                          <input class="input-ajouter" name="url_saq" id="url_saq" value="${b.url_saq}"><br><br>
                          <label for="url_image">URL de l'image : </label>
                          <input class="input-ajouter" name="url_image" id="url_image" value="${b.url_image}"><br><br>
                          <label for="format">Format : </label>
                          <input class="input-ajouter" name="format" id="format" value="${b.format}"><br><br>
                          <label for="type">Type de vin : </label>
                          <select class="input-ajouter" name="type" id="type">
                            <option name="rouge" id="rouge" value="1">Rouge</option>
                            <option name="blanc" id="blanc" value="1">Blanc</option>
                            <option name="rose" id="rose" value="1">Rosé</option>
                          </select>
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
                        <h2>Ajouter une bouteille</h2>
                        <form class="form-ajouter" action="/" method="post">
                          <label for="nom">Nom : </label>
                          <input class="input-ajouter" type="text" id="nom" name="nom"><br><br>
                          <label for="code_saq">Code : </label>
                          <input class="input-ajouter" type="text" id="code_saq" name="code_saq"><br><br>
                          <label for="pays">Pays :</label>
                          <input class="input-ajouter" type="date" id="pays" name="pays"><br><br>
                          <label for="description">Description :</label>
                          <input class="input-ajouter" type="date" id="description" name="description"><br><br>
                          <label for="url_saq">ULR : </label>
                          <input class="input-ajouter" name="url_saq" id="url_saq"><br><br>
                          <label for="url_image">URL de l'image : </label>
                          <input class="input-ajouter" name="url_image" id="url_image"><br><br>
                          <label for="format">Format : </label>
                          <input class="input-ajouter" name="format" id="format"><br><br>
                          <label for="type">Type de vin : </label>
                          <select class="input-ajouter" name="type" id="type">
                            <option name="rouge" id="rouge" value="1">Rouge</option>
                            <option name="blanc" id="blanc" value="1">Blanc</option>
                            <option name="rose" id="rose" value="1">Rosé</option>
                          </select>
                          <button style="margin-top: 30px; cursor: not-allowed" class="btn btn-accepter" disabled>Accepter</button>
                        </form>`
                    Modal.showModal();
                })

                console.log(data)
            })
        }

        afficherListeBouteilles();

        function supprimerBouteille(id) {
            let bouteilles= new Bouteille();
            bouteilles.destroy(id);
            Modal.closeModal();
            afficherListeBouteilles();
        }
    </script>
    <title>Vino - Liste des bouteilles du catalogue</title>
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
        <button class="btn btn-ajouter inline" btn="ajouter">Ajouter une bouteille</button>
        <button class="btn btn-supprimer inline" type="submit" onclick=window.location.href='{{ route('admin.saq') }}'>
            Catalogue SAQ
        </button>
    </div>


    <table class="info container">
        <thead>
        <tr>
            <th>#</th>
            <th>Nom</th>
            <th>code</th>
            <th>pays</th>
            <th>description</th>
            <th>prix</th>
            <th>url</th>
            <th>image</th>
            <th>format</th>
            <th>type</th>
            <th>Ajouté le</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>

        </tbody>
    </table>

</div>

</body>

</html>