@extends('layouts.app')


<input type="hidden" id="utilisateur" value="{{ Auth::user()->name }}">
<input type="hidden" id="idUtilisateur" value="{{ Auth::user()->id }}">

@section('content')
<a href="{{ route("logout") }}"> logout </a>
<section id="pageAcceuil">
    <h1>Un petit verre de vino?</h1>
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

</section>

@endsection
