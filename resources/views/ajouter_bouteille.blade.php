<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700&display=swap&subset=cyrillic"
    rel="stylesheet">
  <link rel="stylesheet" href="https://unpkg.com/@trevoreyre/autocomplete-js/dist/style.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href={{ asset("css/style.css") }}>
  <style> #search {text-align: inherit} </style>

  <script src="https://unpkg.com/@trevoreyre/autocomplete-js"></script>
  <script src="{{ asset('js/api/Bouteille.js') }}"></script>
  <script src="{{ asset('js/api/Transaction.js') }}"></script>
  <script src="{{ asset('js/api/User.js') }}"></script>
  <title></title>
</head>

</head>

<body>
  <div class="container-ajouter">
    <div class="main-content-ajouter">
      <div class="content-wrap-ajouter">
        <a href="/" class="logo_ajouter"><img src="img/logo_vino.png" alt="vino"></a>
        <div class="img_b">
          <img src="img/bouteille2.png" alt="bouteille2">
        </div>
      </div>
      <aside class="section_deux">
        <nav class="header-nav ajouter">
          <a class="header-nav-link active ajouter" href="{{ route("accueil_utilisateur") }}">Mon cellier</a>
        </nav>
        <h3 class="slogan-ajouter">Ajouter une bouteille?</h3>
        <!-- <button onclick="getValue()" class="btn btn-ajouter-bouteille2" type="submit" formaction="#">Ajouter la bouteille</button> -->
        
        <form class="form-ajouter" name="form1" action="/" method="post">

          {{-- test: listeAutoComplete --}}

            <div id="autocomplete" class="autocomplete">
              <input class="autocomplete-input" />
              <ul class="autocomplete-result-list"></ul>
            </div>

          {{-- <label for="name">Nom: {{ Auth::user()->name }} </label><br><br> --}}
          <input type="hidden" id="idUtilisateur" value="{{ Auth::user()->id }}">

         
          <input type="hidden" class="input-ajouter" id="search" name="search" /><br><br>
          
          <label for="millesime">Millesime:</label>
          <span><p class="fail" id="b.millesime" style="margin-top: 20px"></p></span>
          <input class="input-ajouter" type="text" id="millesime" name="millesime"><br><br>
          

          <label for="quantite">Quantité:</label>
          <span><p class="fail" id="b.quantieRequis" style="margin-top: 20px"></p></span>
          <input class="input-ajouter" type="text" id="quantite" name="quantite"><br><br>

          <label for="price">Prix:</label>
          <span><p class="fail" id="b.prix" style="margin-top: 20px"></p></span>
          <input class="input-ajouter" type="text" id="price" name="price"><br><br>

          <label for="date">Date achat:</label>
          <span><p class="fail" id="b.dateAchatPasValide" style="margin-top: 20px"></p></span>
          <input class="input-ajouter" type="text" id="date" name="date" placeholder="2020-09-29"><br><br>

          <label for="garde">Garde:</label>
          <span><p  class="fail" id="b.gardeJustequa" style="margin-top: 20px"></p></span>
          <input class="input-ajouter" type="text" id="garde" name="garde" placeholder="2020-09-30"><br><br>

          <label for="cellier">Nom du cellier:</label>
          <select class="input-ajouter" name="cellier" id="cellier">
          </select><br><br>
          <label for="notes">Notes:</label>
          <input class="input-ajouter" name="notes" id="notes"><br><br>
          <button class="btn btn-ajouter-bouteille" type="button"  onclick="getValue()" id="boutton" type="submit" formaction="#">Ajouter la bouteille </button>
        
        </form>
       
      </aside>
      
    </div>
  </div>
  <footer class="footer-ajouter">2020 Vino | Group 1</footer>
<script defer>


console.log(Autocomplete);
let bouteilles = new Bouteille();
    
    bouteilles.index().then(dataB => {
      console.log(dataB);
        
        var sel = document.getElementById('search');
        var opt = null;

          var options = {
            search: input => {
              if (input.length < 1) { return [] }
              return dataB.filter(b => {
                return b.nom.toLowerCase()
                  .startsWith(input.toLowerCase())
              })  
            },
            onSubmit: result => {
              // mettre la valeur du ID dans le search input
              sel.value = result.id
            },
            getResultValue: (suggestion) => suggestion.nom
          }
          new Autocomplete('#autocomplete', options)
    });


// recuperation de l'id utilisateur connecter
var userId = document.getElementById("idUtilisateur").value;

let cellier = new User();

//recupere les cellier de l'utilisateur
cellier.showCellier(userId).then(dataC => {
  console.log(dataC);
    
    var sel = document.getElementById('cellier');
    var opt = null;

      for(i = 0; i<dataC.length; i++) { 
        // console.log(dataC[i]);
        opt = document.createElement('option');
        opt.setAttribute("value", dataC[i].id);
        opt.nom = dataC[i].nom;
        opt.innerHTML = dataC[i].nom
        sel.appendChild(opt);
      }
});    

function getValue() {
    // Sélectionner l'élément input et récupérer sa valeur
    var bouteilleId = document.getElementById("search").value;
    var millesime = document.getElementById("millesime").value;  
    var quantite = document.getElementById("quantite").value;  
    var date = document.getElementById("date").value;
    var garde = document.getElementById("garde").value;
    var cellier = document.getElementById("cellier").value;
    var notes = document.getElementById("notes").value;
    var price = document.getElementById("price").value;
    // Afficher la valeur
    // alert(bouteilleId + millesime + quantite + price + date + garde +  cellier + notes);

    
    // validation du formulaire
    var f = document.form1;
      var msgEr; 

      //Millesime
    	msgErr = "";
				milles = f.millesime.value.trim();
				if (milles === "") {
					msgErr = "valeurs obligatoire"
				} else if (milles.length > 4){
          msgErr = "entrer 4 valeurs numériques"
        } else if (!/^\d{4}$/.test(milles)) {
          msgErr = "Millesime non valide"
        }


				f.millesime.value = milles;
				if (msgErr !== "") erreur = true;
				document.getElementById("b.millesime").innerHTML = msgErr;
        

        //Quantité
        msgErr = "";
				quanti = f.quantite.value.trim();
				if (quanti === "") {
					msgErr = "Quantité Obligatoire";
				} else {

          if (!/^[0-9]*$/.test(quanti) ) {
            msgErr = !/^[0-9]*$/.test(quanti) ?
							"Quantité non valide" :
              ""
					}
				}
				f.quantite.value = quanti;
				if (msgErr !== "") erreur = true;
        document.getElementById("b.quantieRequis").innerHTML = msgErr;
        

        //Prix
        msgErr = "";
				prix = f.price.value.trim();
				if (prix === "") {
					msgErr = "Prix Obligatoire";
				} else {

          if (!/^\-?\d+\.\d{2}$/.test(prix) ) {
            msgErr = !/^\-?\d+\.\d{2}$/.test(prix) ?
							"Prix non valide" :
              ""
					}
				}
				f.price.value = prix;
				if (msgErr !== "") erreur = true;
        document.getElementById("b.prix").innerHTML = msgErr;
        

        //Date D'achat
        msgErr = "";
				dateAchat = f.date.value.trim();
				if (dateAchat === "") {
					msgErr = "date d'achat Obligatoire";
				} else {

          if (!/^\d{4}\-(0?[1-9]|1[012])\-(0?[1-9]|[12][0-9]|3[01])$/.test(dateAchat) ) {
            msgErr = !/^\d{4}\-(0?[1-9]|1[012])\-(0?[1-9]|[12][0-9]|3[01])$/.test(dateAchat) ?
							"date d'achat non valide" :
              ""
					}
				}
				f.date.value = dateAchat;
				if (msgErr !== "") erreur = true;
        document.getElementById("b.dateAchatPasValide").innerHTML = msgErr;

      
        //Garde justequa
        msgErr = "";
				gardeJusqua = f.garde.value.trim();
				if (gardeJusqua === "") {
					msgErr = "Date de Garde Obligatoire";
				} else {

          if (!/^\d{4}\-(0?[1-9]|1[012])\-(0?[1-9]|[12][0-9]|3[01])$/.test(gardeJusqua) ) {
            msgErr = !/^\d{4}\-(0?[1-9]|1[012])\-(0?[1-9]|[12][0-9]|3[01])$/.test(gardeJusqua) ?
							"date d'achat non valide" :
              ""
					}
				}
				f.garde.value = gardeJusqua;
				if (msgErr !== "") erreur = true;
        document.getElementById("b.gardeJustequa").innerHTML = msgErr;


    let bouteille = {
      bouteille_id:bouteilleId,
      cellier_id:cellier,
      quantite:quantite,
      date_achat:date,
      garde_jusqua:garde,
      notes:notes,
      prix:price,
      millesime:millesime
    }

    //transaction
    let transaction = new Transaction();
    
    transaction.store(bouteille).then(data => {
    console.log(data);

      //ajouter success
      document.getElementById("b.ajouter").innerHTML = "Ajout effectué";
      //refresh la page
      setTimeout(function() {
      location.reload();
      window.location.href = "{{ route("accueil_utilisateur") }}" }, 900);
    });
}
  </script>
</body>
</html>