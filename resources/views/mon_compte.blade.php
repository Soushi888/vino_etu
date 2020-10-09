@extends("layouts.app")

@section("header")
  <script src="{{ asset('js/api/User.js') }}"></script>
  <script src="{{ asset('js/api/Cellier.js') }}"></script>
  <script src="{{ asset('js/composantes/ModifierMonCompte.js') }}"></script>
  <title>Mon compte - Vino</title>
@endsection

@section("content")
  <div class="container-ajouter">
    <div class="main-content-ajouter">
      <div class="content-wrap-ajouter">
        <a href="/" class="logo_ajouter"><img src={{ asset("img/logo_vino.png") }} alt="vino"></a>
        <div class="img_b">
          <img src={{ asset("img/bouteille2.png") }} alt="bouteille2">
        </div>
      </div>
      <aside class="section_deux">
        <nav class="header-nav compte">
          <a class="header-nav-link active " href="{{ route("accueil") }}">Mon cellier</a>
          <a class="header-nav-link active " href="{{ route("ajouter_bouteille") }}">Ajouter une bouteille au cellier</a>
        </nav>
        <h2 class="titre-compte">Mon compte</h2>


        <input type="hidden" id="idUtilisateur" value="{{ Auth::user()->id }}">
        <label for="name" class="utilisateur">Utilisateur: {{ Auth::user()->name }} </label><br><br>

        <form class="form-compte" name="userF" action="/" method="post">
          <label for="email">Modifier Courriel:</label>
          <span><p class="fail" id="e.email"></p></span>
          <input class="input-ajouter" type="text" id="email" name="email" >
          <input type="hidden" class="input-ajouter" type="text" id="emailHidden" name="emailHidden"><br><br>
          
          <label for="mdp">Modifier Mot de Passe:</label>
          <span><p class="fail" id="e.mdp"></p></span>
          <input class="input-ajouter" type="password" id="mdp" name="mdp" placeholder="Entrer mot de passe"><br><br>
        </form>
          <button id="modifierBtn" class="btn btn-modifier-compte">Modifier</button>
          <span><p class="fail" id="b.modifierBtn"></p></span>
          <form class="form-compte" name="suprimerF" action="/" method="delete">
      </aside>
      <aside class="section_trois">
        <a class="header-nav-link aj" href={{ route("logout") }}><i class="fa fa-sign-out fa-2x"
            aria-hidden="true"></i></a>
        </nav>

      </aside>
    </div>
  </div>
  <script defer>importeModifierMonCompte()</script>
@endsection
