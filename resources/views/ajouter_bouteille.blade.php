@extends("layouts.app")

@section("header")
    <script src="https://unpkg.com/@trevoreyre/autocomplete-js"></script>
    <script src="{{ asset('js/api/Bouteille.js') }}"></script>
    <script src="{{ asset('js/api/Transaction.js') }}"></script>
    <script src="{{ asset('js/api/User.js') }}"></script>
    <script src="{{ asset('js/functions.js') }}"></script>
    <script src="{{ asset('js/composantes/ModifierAjouterBouteille.js') }}"></script>
    <link rel="stylesheet" href="https://unpkg.com/@trevoreyre/autocomplete-js/dist/style.css"/>

    <title>Ajouter une bouteille - Vino</title>
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
                <nav class="header-nav ajouter">
                    <a class="header-nav-link active ajouter" href="{{ route("accueil") }}">Mon cellier</a>
                    <a class="header-nav-link active ajouter" href="{{ route("ajouter_bouteille") }}">Ajouter une
                        bouteille au cellier</a>
                </nav>
                <h3 class="slogan-ajouter">Ajouter une bouteille?</h3>


                <form class="form-ajouter" name="form1" action="/" method="post">


                    <div id="autocomplete" class="autocomplete">
                        <input class="autocomplete-input"/>
                        <ul class="autocomplete-result-list"></ul>
                    </div>

                    <input type="hidden" id="idUtilisateur" value="{{ Auth::user()->id }}">


                    <input type="hidden" class="input-ajouter" id="search" name="search"/><br><br>

                    <label for="millesime">Millesime:</label>
                    <span><p class="fail margin-top-20px" id="b.millesime"></p></span>
                    <input class="input-ajouter margin-bottom-10px" type="text" id="millesime" name="millesime"><br><br>


                    <label for="quantite">Quantité:</label>
                    <span><p class="fail margin-top-20px" id="b.quantieRequis"></p></span>
                    <input class="input-ajouter margin-bottom-10px" type="text" id="quantite" name="quantite"><br><br>

                    <label for="price">Prix:</label>
                    <span><p class="fail margin-top-20px" id="b.prix"></p></span>
                    <input class="input-ajouter margin-bottom-10px" type="text" id="price" name="price"><br><br>

                    <label for="date">Date achat:</label>
                    <span><p class="fail margin-top-20px" id="b.dateAchatPasValide"></p></span>
                    <input class="input-ajouter margin-bottom-10px" type="date" id="date" name="date"
                           placeholder="2020-09-29"><br><br>

                    <label for="garde">Garde:</label>
                    <span><p class="fail margin-top-20px" id="b.gardeJustequa"></p></span>
                    <input class="input-ajouter margin-bottom-10px" type="text" id="garde" name="garde"><br><br>

                    <input type="hidden" id="cellier">

                    <label for="notes">Notes:</label>
                    <input class="input-ajouter margin-bottom-10px" type="text" name="notes" id="notes"><br><br>
                    <span><p class="fail margin-top-20px" id="b.ajouter"></p></span>
                    <button class="btn btn-ajouter-bouteille" type="button" id="btnAjouter" type="submit"
                            formaction="#">Ajouter la bouteille
                    </button>
                </form>


            </aside>
        </div>
    </div>
    <script defer>importeModifierAjouterBouteille()</script>
@endsection
