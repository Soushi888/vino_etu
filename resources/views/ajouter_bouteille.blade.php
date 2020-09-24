<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700&display=swap&subset=cyrillic"
    rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/style.css">
  {{-- <script src="{{ asset('js/api/SAQ.js') }}"></script> --}}

  <style> #search {text-align: inherit}</style>

  <script src="{{ asset('js/api/Bouteille.js') }}"></script>
  <script src="{{ asset('js/api/Transaction.js') }}"></script>
  <script defer>
   //JS en bas de la page!

   
           // let transaction = new Transaction(); 
       
  //     transaction.store().then(dataT => {
  //       opt.id = dataT['bouteille_id']
  //       console.log(dataT)

          // let trans = [];
          //   for(i = 0; i<dataT.length; i++) { 
          //     if( opt.id == dataT[i].bouteille_id){
          //       trans = dataT[i].bouteille_id;
          //       trans = dataT[i].millesime;
                
          //       console.log(trans);
          //       // console.log(dataT[i].bouteille_id + "ddd" + opt.id + trans);
          //     }
          //   }
        // });
      // });    


  </script>

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

          <label for="search">Recherche:</label>
          <select  class="input-ajouter" id="search" name="search" ></select><br><br>

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
            <option value="1">cellier1</option>
            <option value="2">cellier2</option>
            <option value="3">cellier3</option>
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
 

<script defer>

let bouteilles = new Bouteille();
    
    bouteilles.index().then(dataB => {
      console.log(dataB)
        
        var sel = document.getElementById('search');
        var opt = null;

          for(i = 0; i<dataB.length; i++) { 

            opt = document.createElement('option');
            opt.nom = dataB[i].nom;
            opt.id = dataB[i].id;
            opt.innerHTML = dataB[i].nom;
            sel.appendChild(opt);


            sel.addEventListener("change", function() {
                var price = document.getElementById("price");
                price.value = opt.prix_saq;  
            })
          }
    });
        
         

function getValue() {
    // Sélectionner l'élément input et récupérer sa valeur
    var search = document.getElementById("search").value;
    var millesime = document.getElementById("millesime").value;;  
    var quantite = document.getElementById("quantite").value;  
    var date = document.getElementById("date").value;
    var garde = document.getElementById("garde").value;
    var cellier = document.getElementById("cellier").value;
    var notes = document.getElementById("notes").value;
    var price = document.getElementById("price").value;
    // Afficher la valeur
    alert(search + millesime + quantite + price + date + garde +  cellier + notes);
}


  </script>
</body>
</html>