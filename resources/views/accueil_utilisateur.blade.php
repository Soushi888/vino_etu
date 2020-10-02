<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700&display=swap&subset=cyrillic"
          rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href={{ asset("css/style.css") }}>
    <script src={{asset("js/api/Bouteille.js")}}></script>
    <script src={{asset("js/api/CellierBouteille.js")}}></script>
    <script src={{asset("js/api/User.js")}}></script>
    <script src={{asset("js/functions.js")}}></script>
    <script src={{asset("js/api/Cellier.js")}}></script>
    <script src={{asset("js/modal.js")}}></script>
    <title></title>
</head>

</head>

<body>
<input type="hidden" id="utilisateur" value="{{ Auth::user()->name }}">
<input type="hidden" id="idUtilisateur" value="{{ Auth::user()->id }}">

<section id="listCelliers">
    <h1>Un petit verre de vino?</h1>
</section>

<div class="container-index">
    <div class="main-content">
        <div class="content-wrap">
            <a href="#" class="logo_accueille"><img src={{ asset("img/logo_vino.png") }} alt="vino"></a>
            <h2 class="slogan">Un petite verre de vino?</h2>
        </div>
        <aside>
            <nav class="header-nav accueille">
                <a class="header-nav-link active accueille" href="{{ route("mon_compte") }}">Mon compte</a>
                <a class="header-nav-link active accueille" href="{{ route("ajouter_bouteille") }}">Ajouter une bouteille au
                    cellier</a>
                <a class="header-nav-link" href="{{route("logout")}}"><i class="fa fa-sign-out fa-2x" aria-hidden="true"></i></a>
            </nav>

{{--            <div class="message-bienvenu"><h2>Cellier : <span id="nom_cellier"></span></h2></div>--}}

            <div class="affichaListeBouteille"></div>
            </div>
        </aside>
    </div>
</div>
<footer>2020 Vino | Group 1</footer>

</body>
<script>
    let eDivIndex = document.querySelector(".container-index");
    eDivIndex.style.visibility = "hidden";
    let listCelliers = document.querySelector("#listCelliers h1");
    let eUl = document.createElement("ul");
    let idUtilisateur = document.getElementById("idUtilisateur").value
    let userApi = new User;
    userApi.showCellier(idUtilisateur).then((data => {
    console.log(data.length);
        if(data.length === 0){
            creeCellier();
            location.reload();
        }else{            
            data.map(cellier => {
                bouteilles(cellier.id)
        })
        }
    }))


function creeCellier(){
    let celliers = new Cellier();
        let cellier = {
            nom: "cellier",
            user_id: idUtilisateur,
        };
        celliers.store(cellier);
}

    function bouteilles(evt) {
        
        let eDivIndex = document.querySelector(".container-index");
        eDivIndex.style.visibility = "visible";
        let listCelliers = document.querySelector("#listCelliers");
        listCelliers.innerHTML = "";
        let idCellier = evt;
        console.log(idCellier);
        let messageBienvenu = document.getElementById("message-bienvenu h2");
 
                   
            var reponse = fetch("http://vino-etu/api/affichageDetails/"+idCellier);
            var reponseJson = reponse.then(function(res){
                return res.json();
            });
            reponseJson.then(function(reponse){
                        console.log("je suis dans le fetch de bouteille",reponse)
                    })
    }

</script>
</html>