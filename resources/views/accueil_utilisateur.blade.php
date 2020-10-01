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
                <a class="header-nav-link active accueille" href="#">Mon compte</a>
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
        let celliers = new Cellier();
        let cellier = {
            nom: "cellier",
            user_id: idUtilisateur,
        };
        celliers.store(cellier);
        

        }else{
            
            data.map(cellier => {
                bouteilles(cellier.id)
        })
        }
    

    }))

    function bouteilles(evt) {
        
        let eDivIndex = document.querySelector(".container-index");
        eDivIndex.style.visibility = "visible";
        let listCelliers = document.querySelector("#listCelliers");
        listCelliers.innerHTML = "";
        let idCellier = evt;
        console.log(idCellier);
        let messageBienvenu = document.getElementById("message-bienvenu h2");
        console.log(messageBienvenu)


        let userCellierBouteilles = new CellierBouteille;
        userCellierBouteilles.index(idCellier).then((data => {
            new Modal();
            let modalContent = document.getElementsByClassName("modal-content");

            console.log(data);
            data.map(bouteille => {
                console.log(bouteille.bouteille_id);

                let bouteilleUnite = new Bouteille;
                bouteilleUnite.show(bouteille.bouteille_id).then(data => {
                    let eAffichaListeBouteille = document.querySelector(".affichaListeBouteille");
                    console.log(data.nom, " ", data.pays, " ", data.prix_saq, " ", data.type_id, " ", data.url_image, " ", data.url_saq);
                    let containerBouteille = document.createElement("div");
                    containerBouteille.className = "container_bouteille";
                    containerBouteille.innerHTML = `
                        <table>
                          <tr>
                            <div class="img_bouteille">
                              <td>
                                 <img src="${data.url_image}" alt="bouteille" witdh="150" height="225">
                              </td>
                            </div>
                            <td>
                            <p>Nom : <b>${data.nom}</b></p>
                            <p>Pays : <b>${data.pays}</b></p>
                            <p>Type : <b>${getType(data.type_id)}</b></p>
                            <a href="${data.url_saq}">Voir SAQ</a>
                            <div class="btn_bouteille">
                              <button class="btn btn-modifier inline" btn="modifier_${data.code_saq}">Modifier</button>
                              <button class="btn btn-ajouter inline" btn="ajouter_${data.code_saq}">Ajouter</button>
                              <button class="btn btn-boire inline" btn="boire_${data.code_saq}">Boire</button>
                            </div>
                          </td>
                        </tr>
                      </table>
                `;
                    eAffichaListeBouteille.appendChild(containerBouteille);

                    // Bouton modifier
                    let btnModifier = document.querySelector(`[btn="modifier_${data.code_saq}"]`);
                    // Modal bouton modifier
                    btnModifier.addEventListener("click", () => {
                        modalContent[0].innerHTML = `
                        <span class="close-button">&times;</span>
                        <h2>Modifier </h2>
                        <p>Voulez vous vraiment modifier la bouteille dont le nom est ${data.nom} ?</p>
                        <button style="width: max-content;" class="btn btn-accepter inline" id="oui">Oui</button>
                        <button style="width: max-content" class="btn btn-accepter inline" type="submit" id="non">Non</button>`;
                        Modal.showModal();

                        // document.getElementById("oui").addEventListener("click", () => {
                        //     supprimerBouteille(b.id);
                        //     afficherListeBouteilles();
                        // })

                        document.getElementById("non").addEventListener("click", () => {
                            Modal.closeModal();
                        })
                    })

                    // Bouton ajouter
                    let btnAjouter = document.querySelector(`[btn="ajouter_${data.code_saq}"]`);
                    // Modal bouton ajouter
                    btnAjouter.addEventListener("click", () => {
                        modalContent[0].innerHTML = `
                        <span class="close-button">&times;</span>
                        <h2>Ajouter une bouteille de ce type</h2>
                        <p>Combien de bouteilles de ${data.nom} voulez vous ajouter ?</p>
                        <form action="">
                               <label for="quantite">Quantité : <input type="number" min="1"></label>
                        </form>
                        <button style="width: max-content;" class="btn btn-ajouter inline" type="submit" id="non">Ajouter</button>`;
                        Modal.showModal();
                    })

                    // Bouton boire
                    let btnBoire = document.querySelector(`[btn="boire_${data.code_saq}"]`);
                    // Modal bouton boire
                    btnBoire.addEventListener("click", () => {
                        modalContent[0].innerHTML = `
                        <span class="close-button">&times;</span>
                        <h2>Boire</h2>
                        <p>Voulez vous vraiment boire une bouteille dont le nom est ${data.nom} ?</p>
                        <textarea style="margin-bottom: 10px" class="textarea" placeholder="Laisser une note"></textarea>
                        <button style="width: max-content;" class="btn btn-accepter inline" id="oui">Oui</button>
                        <button style="width: max-content" class="btn btn-accepter inline" type="submit" id="non">Non</button>`;
                        Modal.showModal();

                        // document.getElementById("oui").addEventListener("click", () => {
                        //     supprimerBouteille(b.id);
                        //     afficherListeBouteilles();
                        // })

                        document.getElementById("non").addEventListener("click", () => {
                            Modal.closeModal();
                        })
                    })

                })

                // userCellierBouteilles.show(idCellier,bouteille.bouteille_id).then(data => {
                //   console.log(data);
                // })
            })
        }));


    }

</script>
</html>