<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700&display=swap&subset=cyrillic"
    rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/style.css">
  <style> #search {text-align: inherit}</style>

  <script src="{{ asset('js/api/Bouteille.js') }}"></script>
  <script src="{{ asset('js/api/Transaction.js') }}"></script>
  <script src="{{ asset('js/api/Cellier.js') }}"></script>
  <title></title>
</head>

</head>

<body>
  <div class="container-ajouter">
    <div class="main-content-ajouter">
      <div class="content-wrap-ajouter">
        <a href="accueil_utilisateur.html" class="logo_ajouter"><img src="img/logo_vino.png" alt="vino"></a>
        <div class="img_b">
          <img src="img/bouteille2.png" alt="bouteille2">
        </div>
      </div>
      <aside class="section_deux">
        <nav class="header-nav ajouter">
          <a class="header-nav-link active ajouter" href="#">Mon celliere</a>
          <a class="header-nav-link active ajouter" href="#">Ajouter une bouteille au cellier</a>
        </nav>
        <h2 class="slogan-ajouter">Un petite verre de vino?</h2>
        <button class="btn btn-ajouter-bouteille2" type="submit" formaction="#">Ajouter la bouteille</button>
        <form class="form-ajouter" action="/" method="post">
          <label for="name">Nom: {{ Auth::user()->name }} </label><br><br>
          <input type="hidden" id="idUtilisateur" value="{{ Auth::user()->id }}">

          <label for="search">Recherche:</label>
          <select class="input-ajouter" id="search" name="search" ></select><br><br>
          <label for="millesime">Millesime:</label>
          <input class="input-ajouter" type="text" id="millesime" name="millesime"><br><br>
          <label for="quantite">Quantité:</label>
          <input class="input-ajouter" type="text" id="quantite" name="quantite"><br><br>
          <label for="price">Prix:</label>
          <input class="input-ajouter" type="text" id="price" name="price"><br><br>
          <label for="date">Date achat:</label>
          <input class="input-ajouter" type="date" id="date" name="date"><br><br>
          <label for="garde">Garde:</label>
          <input class="input-ajouter" type="date" id="garde" name="garde"><br><br>
          <label for="cellier">Nom du cellier:</label>
          <select class="input-ajouter" name="cellier" id="cellier">
            <option value="1">vin rouge</option>
            <option value="2">vin blanc</option>
            <option value="3">vin rosé</option>
          </select><br><br>
          <label for="notes">Notes:</label>
          <input class="input-ajouter" name="notes" id="notes"><br><br>
        </form>
      </aside>
      <aside class="section_trois">
        <a class="header-nav-link aj" href="identification.html"><i class="fa fa-sign-out fa-2x"
            aria-hidden="true"></i></a>
        </nav>
        <div class="img_marg">
          <img src="img/bouteille3.png" alt="bouteille">
        </div>
        <button class="btn btn-ajouter-bouteille" type="button"  onclick="getValue()" id="boutton" type="submit" formaction="#">Ajouter la bouteille</button>
      </aside>
    </div>
  </div>
  <footer class="footer-ajouter">2020 Vino | Group 1</footer>
 
  {{-- petit exemple pour afficher les erreurs formulaire --}}
  {{-- <td aria-label="actions">
    <button style="width: max-content" class="btn btn-ajouter inline" type="submit" id=${b.codesaq}>Ajouter</button>
     <span><p id="message${b.code_saq}" style="margin-top: 20px"></p></span>
 </td> --}}


<script defer>

let bouteilles = new Bouteille();
    
    bouteilles.index().then(dataB => {
      console.log(dataB);
        
        var sel = document.getElementById('search');
        var opt = null;

          for(i = 0; i<dataB.length; i++) { 
            // console.log(dataB[i]);
            opt = document.createElement('option');
            opt.setAttribute("value", dataB[i].id);
            opt.nom = dataB[i].nom;
            opt.innerHTML = dataB[i].nom
            console.log(opt);
            opt.prix_saq = dataB[i].id;
            sel.appendChild(opt);
          }
    });


// let cellier = new Cellier();

// cellier.show().then(dataC => {
//   console.log(dataC);
    
//     var sel = document.getElementById('cellier');
//     var opt = null;

//       for(i = 0; i<dataC.length; i++) { 
//         // console.log(dataC[i]);
//         opt = document.createElement('option');
//         // opt.setAttribute("value", dataC[i].id);
//         opt.nom = dataC[i].nom;
//         opt.innerHTML = dataC[i].nom
//         sel.appendChild(opt);
//       }
// });    

function getValue() {
    // Sélectionner l'élément input et récupérer sa valeur
    var bouteilleId = document.getElementById("search").value;
    var millesime = document.getElementById("millesime").value;;  
    var quantite = document.getElementById("quantite").value;  
    var date = document.getElementById("date").value;
    var garde = document.getElementById("garde").value;
    var cellier = document.getElementById("cellier").value;
    var notes = document.getElementById("notes").value;
    var price = document.getElementById("price").value;
    // Afficher la valeur
    // alert(bouteilleId + millesime + quantite + price + date + garde +  cellier + notes);

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

    let transaction = new Transaction();
    
    transaction.store(bouteille).then(data => {
      console.log(data);
    });
}
  </script>
</body>
</html>