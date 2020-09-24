<!DOCTYPE html>
<html lang="fr">s
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

        saq = new SAQ();
        saq.index(recherche.type, recherche.page).then(data => {
            let tableau = document.querySelector(".info tbody")


            data.map(b => {
                let tr = document.createElement("tr")
                let trContent = `
                    <td aria-label="nom">${b.nom}</td>
                    <td aria-label="code_saq">${b.code_saq}</td>
                    <td aria-label="pays">${b.pays}</td>
                    <td aria-label="description">${b.description}</td>
                    <td aria-label="prix">${b.prix_saq}$</td>
                    <td aria-label="url"><a href="${b.url_saq}">${b.url_saq}</a></td>
                    <td aria-label="image"><img style="width: 100px" src="${b.url_image}" alt="${b.description}"></td>
                    <td aria-label="format">${b.format}</td>
                    <td aria-label="type">${getType(b.type_id)}</td>
                    <td aria-label="actions" >
                       <button style="width: max-content" class="btn btn-ajouter inline" type="submit" id=${b.code_saq}>Ajouter</button>
                        <span id="message"></span>
                    </td>
                `;

                tr.innerHTML = trContent;
                tableau.appendChild(tr);

                document.getElementById(b.code_saq).addEventListener("click", (evt) => {
                    saq.store(b);
                })
            })

            document.getElementById("ajouter_bouteilles_saq").addEventListener("click", (evt) => {
                saq.storeAll(recherche.type, recherche.page);
            })

        })
    </script>
    <title>Vino - Liste des bouteilles du catalogue</title>
</head>

<body>
<div class="page_admin">
    <a href="/" class="logo_admin"><img src={{ asset("img/logo_vino.png") }} alt="vino"></a>
    <nav id="nav" class="wrap">
        <input type="checkbox" name="toggle" id="toggle"/>
        <label for="toggle"><i class="icon-reorder"></i> <i class="fa fa-bars"></i></label>
        <ul id="menu">
            <a class="header-nav-link active" href="/admin">
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

    <div class="container" style="margin-bottom: 20px">
        <form action="">
            <legend style="color: white">Recherche</legend>
            <fieldset style="display: flex">
                <label for="type"><select name="type" id="type">
                        <option value="rouge">Rouge</option>
                        <option value="blanc">Blanc</option>
                        <option value="rose">Rosé</option>
                    </select></label>
                <label for="page"><input style="width: 50px; margin-left: 20px" name="page" id="page" type="number"
                                         min="1" value="1"></label>
                <button style="margin-left: 20px" type="submit">Rechercher</button>
            </fieldset>
        </form>
    </div>

    <div style="margin-bottom: 20px; display: flex; justify-content: center" class="container">
        <button style="width: max-content" class="btn btn-supprimer inline" type="submit" id="ajouter_bouteilles_saq">
            Ajouter toutes les bouteilles de la page
        </button>
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