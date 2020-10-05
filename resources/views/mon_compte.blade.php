<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700&display=swap&subset=cyrillic"
    rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/style.css">
  
  <script src="{{ asset('js/api/User.js') }}"></script>
  <script src="{{ asset('js/api/Cellier.js') }}"></script>
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
        <nav class="header-nav compte">
          <a class="header-nav-link active compte" href="{{ route("accueil_utilisateur") }}">Mon celliere</a>
          <a class="header-nav-link active compte" href="{{ route("ajouter_bouteille") }}">Ajouter une bouteille au cellier</a>
        </nav>
        <h2 class="titre-compte">Mon compte</h2>
        {{-- <button onclick="getValue()" class="btn btn-ajouter-bouteille2" type="submit" formaction="#">Ajouter la bouteille</button> --}}

        <input type="hidden" id="idUtilisateur" value="{{ Auth::user()->id }}">
        <label for="name" class="utilisateur">Utilisateur: {{ Auth::user()->name }} </label><br><br>

        <form class="form-compte" name="userF" action="/" method="post">
          
          <label for="email">Modifier Courriel:</label>
          <span><p class="fail" id="e.email"></p></span>
          <input class="input-ajouter" type="text" id="email" name="email">
          <input type="hidden" class="input-ajouter" type="text" id="emailHidden" name="emailHidden"><br><br>
          
          <label for="mdp">Modifier Mot de Passe:</label>
          <span><p class="fail" id="e.mdp"></p></span>
          <input class="input-ajouter" type="text" id="mdp" name="mdp" placeholder="Entrer mot de passe"><br><br>
        </form>
          <button id="modifierBtn" class="btn btn-modifier-compte">Modifier</button>
          <span><p class="fail" id="b.modifierBtn"></p></span>
        

        <form class="form-compte" name="userC" action="/" method="post">
          <label for="cellier">Modifier Nom Cellier:</label>
          <span><p class="fail" id="e.cellier"></p></span>
          <input class="input-ajouter" type="text" id="cellier" name="cellier"><br><br>
        </form> 
          <button id="modifierCellierBtn" class="btn btn-modifier-compte">Modifier</button>
          <span><p class="fail" id="b.modifierCellierBtn"></p></span>


        <form class="form-compte" name="suprimerF" action="/" method="delete">

          <label for="suprimer">Supprimer mon compte:</label>
          <span><p class="fail" id="e.suprimer"></p></span>
          <input class="input-ajouter" type="text" id="suprimer" name="suprimer" placeholder="Entrer courielle"><br><br>
        </form>
        <button id="supprimerBtn" class="btn btn-supprimer-compte">Supprimer mon compte</button>
        <span><p class="fail" id="b.supprimerBtn"></p></span>
    </div>
  </div>
  <footer class="footer-ajouter">2020 Vino | Group 1</footer>
<script defer>


var userId = document.getElementById("idUtilisateur").value;

let user = new User();
    user.show(userId).then(dataU => {
      console.log({dataU});

        var eemail, name;
        eemail = dataU.email
        console.log({eemail});
        document.getElementById('email').value = eemail;
        document.getElementById('emailHidden').value = eemail;
    });

let cell = new Cellier;
    cell.show(userId).then(dataC => {
    console.log({dataC});
      var cellier;
      cellier = dataC.nom
      console.log({cellier});
      document.getElementById('cellier').value = cellier;
    });


    document.getElementById("modifierBtn").addEventListener("click", function() {  

      var eemail = document.getElementById("email").value;
      var mdp = document.getElementById("mdp").value;
      var f = document.userF;
      var msgEr; 

      //Regex Email
      msgErr = "";
      e = f.email.value.trim();
      if (e === "") {
        msgErr = "Email Obligatoire";
      } else {

        if (!/(?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:(2(5[0-5]|[0-4][0-9])|1[0-9][0-9]|[1-9]?[0-9]))\.){3}(?:(2(5[0-5]|[0-4][0-9])|1[0-9][0-9]|[1-9]?[0-9])|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])/.test(e) ) {
          msgErr = !/(?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:(2(5[0-5]|[0-4][0-9])|1[0-9][0-9]|[1-9]?[0-9]))\.){3}(?:(2(5[0-5]|[0-4][0-9])|1[0-9][0-9]|[1-9]?[0-9])|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])/.test(e) ?
            "Email non valide" :
            ""
        }
			}
      f.email.value = e;
      if (msgErr !== "") erreur = true;
      document.getElementById("e.email").innerHTML = msgErr;


      //Regex Mot de passe
      msgErr = "";
      m = f.mdp.value.trim();
      if (m === "") {
        msgErr = "Mot de passe Obligatoire";
      } else {

        if (!/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/.test(m) ) {
          msgErr = !/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/.test(m) ?
            "8 caractères minimum et un nombre numérique" :
            ""
        }
      }
      f.mdp.value = m;
      if (msgErr !== "") erreur = true;
      document.getElementById("e.mdp").innerHTML = msgErr;
      
        // information pour le serveur
      let userInfo = {
        email:eemail,
        password:mdp
      }

    user.update(userId,userInfo).then(data => {
      //ajouter success
      document.getElementById("b.modifierBtn").innerHTML = "Modification effectué";
      //refresh la page
      setTimeout(function() {
      location.reload();
      }, 900);
    });
});

document.getElementById("modifierCellierBtn").addEventListener("click", function() {

  var f = document.userC;
  var msgEr; 
  var cellier = document.getElementById("cellier").value;

    // Regex Nom cellier
    msgErr = "";
        c = f.cellier.value.trim();
        if (c === "") {
          msgErr = "Cellier Obligatoire";
        } else {

        if (!/^[a-zA-Z0-9_.-]*$/.test(c) ) {
          msgErr = !/^[a-zA-Z0-9_.-]*$/.test(c) ?
            "Format autorisé a-zA-Z0-9_.- " :
            ""
        }
      }
      f.cellier.value = c;
      if (msgErr !== "") erreur = true;
      document.getElementById("e.cellier").innerHTML = msgErr;

      let userCellier =  {
        nom:cellier
      }

      cell.update(userId,userCellier).then(data => {
        document.getElementById("b.modifierCellierBtn").innerHTML = "Modification effectué";
        //refresh la page
        setTimeout(function() {
        location.reload();
        }, 900);
      });  
});  


document.getElementById("supprimerBtn").addEventListener("click", function() {

  var f = document.suprimerF;

  var eemailHidden = document.getElementById("emailHidden").value;
  var inputEmail = document.getElementById("suprimer").value;
  

  if(inputEmail == eemailHidden) { 
    //supression utilisateur userId
    user.destroy(userId).then(data => {
      console.log({data});
    })
    //supression cellier de l'utilisateur
    cell.destroy(userId).then(data => {
      document.getElementById("b.supprimerBtn").innerHTML = "Suppression effectué";
      //refresh la page
      setTimeout(function() {
      location.reload();
      window.location.href = "{{ route("logout") }}" }, 900);
    })
 }
});   



  </script>
</body>
</html>