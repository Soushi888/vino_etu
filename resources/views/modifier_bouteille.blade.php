<?php 
function sortir(){
  die('<script>document.location.href=`//vino/`;</script>') ;
}

if( ! isset($_GET['bouteille'])) sortir();
$id_transaction = intval($_GET['bouteille']);
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700&display=swap&subset=cyrillic"
    rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/style.css">
  
  <script src="{{ asset('js/api/Transaction.js') }}"></script>
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
          <a class="header-nav-link active ajouter" href="{{ route("ajouter_bouteille") }}">Ajouter une bouteille au cellier</a>
        </nav>
        <h2 class="slogan-ajouter" data-id="${id_transaction}">Modifier Bouteille <?php if(isset($id_transaction)) echo intval($id_transaction); ?> </h2>
        

        
        <label for="name">Utilisateur: {{ Auth::user()->name }} </label><br><br>

        <form class="form-ajouter" name="form1" action="/" method="post">  
          <label for="quantite">Modifier Quantité:</label>
          <span><p class="fail" id="e.quantite" ></p></span>
          <input class="input-ajouter" type="text" id="quantite" name="quantite"><br><br>
          
          <label for="prix">Modifier Prix:</label>
          <span><p class="fail" id="e.prix" ></p></span>
          <input class="input-ajouter" type="text" id="prix" name="prix" ><br><br>

          <label for="millesime">Modifier Millesime:</label>
          <span><p class="fail" id="e.millesime" ></p></span>
          <input class="input-ajouter" type="text" id="millesime" name="millesime" ><br><br>

          <input type="hidden" class="input-ajouter" type="text" id="cellierId" name="cellierId" ><br><br>
          <input type="hidden" class="input-ajouter" type="text" id="bouteilleId" name="bouteilleId" ><br><br>
        </form>
          <button onclick="getValue()" id="modifierBtn">Modifier</button>
          <span><p class="fail" id="b.modification" ></p></span>
    </div>
  </div>
  <footer class="footer-ajouter">2020 Vino | Group 1</footer>
<script defer>


let id_transaction = document.getElementsByTagName("H2")[0].getAttribute("data-id");
console.log({id_transaction})





//Class Transaction
let transact = new Transaction;

//Appelle fonction show de class Transaction
transact.show(1).then(dataT => {
      document.getElementById('quantite').value = dataT.quantite;
      document.getElementById('prix').value = dataT.prix;
      document.getElementById('millesime').value = dataT.millesime;
      document.getElementById('cellierId').value = dataT.cellier_id;
      document.getElementById('bouteilleId').value = dataT.bouteille_id;
    
});

 
function getValue() {
  //Insertion des valeurs récupéré des champ input du serveur
  var quantite = document.getElementById("quantite").value;
  var prix = document.getElementById("prix").value;  
  var millesime = document.getElementById("millesime").value;  
  var cellierId = document.getElementById("cellierId").value;  
  var bouteilleId = document.getElementById("bouteilleId").value;  

  console.log(quantite);
  console.log(prix);
  console.log(millesime);
  console.log(cellierId);
  console.log(bouteilleId);


  // validation du formulaire
  var f = document.form1;
  var msgEr; 


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
  document.getElementById("e.quantite").innerHTML = msgErr;



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
      document.getElementById("e.millesime").innerHTML = msgErr;


  //Prix
  msgErr = "";
  prix = f.prix.value.trim();
  if (prix === "") {
    msgErr = "Prix Obligatoire";
  } else {

    if (!/^\-?\d+\.\d{2}$/.test(prix) ) {
      msgErr = !/^\-?\d+\.\d{2}$/.test(prix) ?
        "Prix non valide" :
        ""
    }
  }
  f.prix.value = prix;
  if (msgErr !== "") erreur = true;
  document.getElementById("e.prix").innerHTML = msgErr;   

  let transactionInfo = {
      quantite:quantite,
      prix:prix,
      millesime:millesime,
      cellier_id:cellierId,
      bouteille_id:bouteilleId
    }

  transact.update(1, transactionInfo).then(data => {
    console.log(data);

    // ajouter success
    document.getElementById("b.modification").innerHTML = "Modification effectué";
    //refresh la page
  //   setTimeout(function() {
  //   location.reload();
  //   window.location.href = "{{ route("accueil_utilisateur") }}" }, 900);
  })
}
  </script>
</body>
</html>


