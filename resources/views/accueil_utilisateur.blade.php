<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700&display=swap&subset=cyrillic"
    rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/style.css">
  <script src={{asset("js/api/Bouteille.js")}}></script>
  <script src={{asset("js/api/CellierBouteille.js")}}></script>
  <script src={{asset("js/api/User.js")}}></script>
  
  <title></title>
</head>

</head>

<body>
  <input type="hidden" id="utilisateur" value="{{ Auth::user()->name }}">
  <input type="hidden" id="idUtilisateur" value="{{ Auth::user()->id }}">
  <a href="{{ url('/logout') }}"> logout </a>
  <section id="listCelliers">
    <h1>Un petit verre de vino?</h1>
  </section>
  <div class="container-index">
    <div class="main-content">
      <div class="content-wrap">
        <a href="#" class="logo_accueille"><img src="img/logo_vino.png" alt="vino"></a>
        <h2 class="slogan">Un petite verre de vino?</h2>
      </div>
      <aside>
        <nav class="header-nav accueille">
          <a class="header-nav-link active accueille" href="#">Mon celliere</a>
          <a class="header-nav-link active accueille" href="ajouter_bouteille.html">Ajouter une bouteille au cellier</a>
          <a class="header-nav-link" href="identification.html"><i class="fa fa-sign-out fa-2x"
              aria-hidden="true"></i></a>
        </nav>
        <div class="affichaListeBouteille"> </div>

        <div class="container_bouteille">
          <table>
            <tr>
              <div class="img_bouteille">
                <td><img src="img/bouteille.png" alt="bouteille"></td>
              </div>
              <td>
                <p>Nom : <b>Tenuta Il Falchetto Bricco Paradiso 2015</b></p>
                <p>Quantité : <b>5</b></p>
                <p>Pays : <b>Italie</b></p>
                <p>Type : <b>Vin rouge</b></p>
                <p>Millesime : <b>0</b></p>
                <a href="#">Voir SAQ</a>
                <div class="btn_bouteille">
                  <button class="btn btn-modifier inline" type="submit" formaction="#">Modifier</button>
                  <button class="btn btn-ajouter inline" type="submit" formaction="#">Ajouter</button>
                  <button class="btn btn-boire inline" type="submit" formaction="#">Boire</button>
                </div>
              </td>
            </tr>
          </table>
        </div>
      </aside>
    </div>
  </div>
  <footer>2020 Vino | Group 1</footer>

</body>
<script>
console.log("je suis dans cellier");
let eDivIndex = document.querySelector(".container-index");
eDivIndex.style.visibility = "hidden";
let listCelliers = document.querySelector("#listCelliers h1");
let eUl = document.createElement("ul");
let idUtilisateur = document.getElementById("idUtilisateur").value
let userApi = new User;
userApi.showCellier(idUtilisateur).then((data => {
              data.map(cellier => {   
               let eSpan = document.createElement("span");
               let eLi = document.createElement("li");
               eLi.setAttribute("id","idCellier"+cellier.id)
               eLi.innerHTML= cellier.nom;
               eSpan.style.cursor = "pointer";
               listCelliers.after(eUl);
               eUl.appendChild(eSpan).appendChild(eLi);
               eLi.addEventListener("click",bouteilles);              
            }) 
         }))

function bouteilles(evt){
  let eDivIndex = document.querySelector(".container-index");
  eDivIndex.style.visibility = "visible";
   let listCelliers = document.querySelector("#listCelliers");
  listCelliers.innerHTML = "";
  let idCellier = evt.target.id;
  console.log(idCellier);
  idCellier = idCellier.replace("idCellier","");
  let userCellierBouteilles = new CellierBouteille;
  userCellierBouteilles.index(idCellier).then((data => {
    console.log(data);
    data.map(bouteille => {
      console.log(bouteille.bouteille_id);
      
        let bouteilleUnite = new Bouteille;
        bouteilleUnite.show(bouteille.bouteille_id).then(data => {

        let eAffichaListeBouteille = document.querySelector(".affichaListeBouteille");
           console.log(data.nom," ",data.pays," ",data.prix_saq," ",data.type_id," ", data.url_image," ",data.url_saq);
           let containerBouteille = document.createElement("div");
           containerBouteille.className = "container_bouteille";
        let eTr =`
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
                <p>Type : <b>${data.url_image}</b></p>
                <a href="${data.url_saq}">Voir SAQ</a>
                <div class="btn_bouteille">
                  <button class="btn btn-modifier inline" type="submit" formaction="#">Modifier</button>
                  <button class="btn btn-ajouter inline" type="submit" formaction="#">Ajouter</button>
                  <button class="btn btn-boire inline" type="submit" formaction="#">Boire</button>
                </div>
              </td>
            </tr>
                      </table>
                `;
                containerBouteille.innerHTML = eTr;
                eAffichaListeBouteille.appendChild(containerBouteille);


         })
         
        // userCellierBouteilles.show(idCellier,bouteille.bouteille_id).then(data => {
        //   console.log(data);
        // })
    })    
  }));

  
  
}

</script>
</html>