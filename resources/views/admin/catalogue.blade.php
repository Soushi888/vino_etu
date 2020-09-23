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
    <script defer>
        bouteilles = new Bouteille();
        bouteilles.index().then(data => {
            let tableau = document.querySelector(".info tbody")


            data.map(b => {

                let date = new Date(b.created_at);
                date = `${date.getDate()} ${nomMois(date.getMonth())} ${date.getFullYear()}`

                let tr = document.createElement("tr")
                let trContent = `
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
                        <a style="margin-bottom: 10px" class="btn-update" href="/admin/bouteilles/${b.id}/update"><i class="fa fa-pencil-square fa-1x" aria-hidden="true"></i></a>
                        <a class="btn-supprimer" href="/admin/bouteilles/${b.id}/delete"><i class="fa fa-trash fa-1x" aria-hidden="true"></i></a>
                    </td>
                `;

                tr.innerHTML = trContent;
                tableau.appendChild(tr);
            })


            console.log(data)
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

    <div style="margin-bottom: 50px" class="container">
        <button class="btn btn-ajouter inline"  type="submit" onclick=window.location.href='{{ route('admin.catalogue.ajouter') }}>Ajouter une bouteille</button>
        <button class="btn btn-supprimer inline"  type="submit" onclick=window.location.href='{{ route('admin.saq') }}'>Catalogue SAQ</button>
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