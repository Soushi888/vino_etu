<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700&display=swap&subset=cyrillic"
          rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href={{ asset("css/style.css") }}>
    <script src={{ asset("js/api/SAQ.js") }}></script>
    <script src="{{ asset("js/functions.js") }}"></script>
    <script defer>
        const urlParams = new URLSearchParams(window.location.search);
        const recherche = {type: urlParams.get("type"), page: urlParams.get("page")};

        let recherche_type = document.getElementById("type");
        let recherche_page = document.getElementById("page");

        // TODO : Données de recherche persistantes
        // recherche_page.value = recherche.page;

        // console.log(recherche_type)

        saq = new SAQ();
        saq.index(recherche.type, recherche.page).then(data => {
            let tableau = document.querySelector(".info tbody")
            tableau.innerHTML = ""



            data.map(b => {
                let tr = document.createElement("tr")
                tr.innerHTML = `
                    <td aria-label="nom">${b.nom}</td>
                    <td aria-label="code_saq">${b.code_saq}</td>
                    <td aria-label="pays">${b.pays}</td>
                    <td aria-label="description">${b.description}</td>
                    <td aria-label="prix">${b.prix_saq}$</td>
                    <td aria-label="url"><a href="${b.url_saq}">${b.url_saq}</a></td>
                    <td aria-label="image"><img class="width-100px" src="${b.url_image}" alt="${b.description}"></td>
                    <td aria-label="format">${b.format}</td>
                    <td aria-label="type">${getType(b.type_id)}</td>
                    <td aria-label="actions">
                       <button class="btn btn-ajouter inline width-max-content" type="submit" id=${b.code_saq}>Ajouter</button>
                        <span><p id="message_${b.code_saq}" class="margin-top-20px"</p></span>
                    </td>
                `;
                tableau.appendChild(tr);

                document.getElementById(b.code_saq).addEventListener("click", (evt) => {
                    saq.store(b).then((json) => {
                        console.log(json)
                        if (json) {
                            let pMessage = document.getElementById(`message_${evt.target.id}`);
                            pMessage.innerHTML = "Ajout bien effectué !";
                            pMessage.className = "success"
                        } else {
                            let pMessage = document.getElementById(`message_${evt.target.id}`);
                            pMessage.innerHTML = "Déjà en inventaire";
                            pMessage.className = "fail"

                        }
                    })
                })
            })
            document.getElementById("ajouter_bouteilles_saq").addEventListener("click", (evt) => {
                saq.storeAll(recherche.type, recherche.page)
                    .then(data => {
                        console.log(data);
                    });
            })
        })
    </script>
    <title>Vino - Liste des bouteilles du catalogue</title>
</head>

<body>
<div class="page_admin">
    <div class="logo_admin"><a href="{{ route("accueil") }}"><img src={{ asset("img/logo_vino.png") }} alt="vino"></a></div>
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

    <div class="container margin-bottom-20px">
        <form action="">
            <legend class="color-white">Recherche</legend>
            <fieldset class="display-flex padding-bottom-18px">
                <label for="type">Type de vin : <select name="type" id="type" class="inline">
                        <option value="rouge">Rouge</option>
                        <option value="blanc">Blanc</option>
                        <option value="rose">Rosé</option>
                    </select></label>
                <label for="page" class="">Page :<input class="width-50px margin-left-20px inline margin-left-54px"
                                                                          name="page" id="page"
                                                                          type="number"
                                                                          min="1" value="1"></label>
                <button class="padding-8px height-50 width-max-content btn btn-boire" type="submit">Rechercher
                </button>
            </fieldset>
        </form>
    </div>

    <div class="container margin-bottom-20px display-flex justify-content-center">
        <button class="btn btn-supprimer inline width-max-content" type="submit" id="ajouter_bouteilles_saq">
            Ajouter toutes les bouteilles de la page
        </button>
        <span id="message" class="margin-left-20px font-weight-bold color-white"></span>
    </div>

    <table class="info container">
        <thead>
        <tr>
            <th>Nom</th>
            <th>code</th>
            <th>pays</th>
            <th>description</th>
            <th>prix</th>
            <th>url</th>
            <th>image</th>
            <th>format</th>
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