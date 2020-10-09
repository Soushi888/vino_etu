/**
 * Récupère le données des bouteilles pour l'auto-complétion, valide les données et les enregistre dans la BDD en passant pas L'API REST
 */
function importeModifierAjouterBouteille() {
    let bouteilles = new Bouteille();

    // Formatage de la date du jour
    let date = new Date();
    date = `${date.getFullYear()}-${addZero(date.getMonth())}-${addZero(date.getDate())}`
    document.getElementById("date").value = date;

    bouteilles.index().then(dataB => {
        var sel = document.getElementById('search');
        var opt = null;

        var options = {
            search: input => {
                if (input.length < 1) {
                    return []
                }
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
        document.getElementById("cellier").value = dataC[0].id;
    });


    document.getElementById("btnAjouter").addEventListener("click", function () {

        // Sélectionner l'élément input et récupérer sa valeur
        var bouteilleId = document.getElementById("search").value;
        var millesime = document.getElementById("millesime").value;
        var quantite = document.getElementById("quantite").value;
        var date = document.getElementById("date").value;
        var garde = document.getElementById("garde").value;
        var cellier = document.getElementById("cellier").value;
        var notes = document.getElementById("notes").value;
        var price = document.getElementById("price").value;

        // validation du formulaire
        var f = document.form1;
        var msgErr;

        //Quantité
        msgErr = "";
        quanti = f.quantite.value.trim();
        if (quanti === "") {
            msgErr = "Quantité Obligatoire";
        } else {

            if (!/^[0-9]*$/.test(quanti)) {
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


        if (!/^\d{1,3}(?:[.,]\d{3})*(?:[.,]\d{2})$/.test(prix)) {
            msgErr = /^\d{1,3}(?:[.,]\d{3})*(?:[.,]\d{2})$/.test(prix) ?
                "Prix non valide" :
                ""
        }

        f.price.value = prix;
        if (msgErr !== "") erreur = true;
        document.getElementById("b.prix").innerHTML = msgErr;


        //Date D'achat
        msgErr = "";
        dateAchat = f.date.value.trim();
        if (dateAchat === "") {
            msgErr = "date d'achat Obligatoire";
        }

        f.date.value = dateAchat;
        if (msgErr !== "") erreur = true;
        document.getElementById("b.dateAchatPasValide").innerHTML = msgErr;

        let bouteille = {
            bouteille_id: bouteilleId,
            cellier_id: cellier,
            quantite: quantite,
            date_achat: date
        }

        if (garde) {
            bouteille.garde_jusqua = garde;
        }
        if (notes) {
            bouteille.notes = notes;
        }
        if (price) {
            bouteille.prix = price;
        }
        if (millesime) {
            bouteille.millesime = millesime;
        }

        //transaction
        let transaction = new Transaction();

        transaction.store(bouteille).then(data => {

            //ajouter success
            document.getElementById("b.ajouter").innerHTML = "Ajout effectué";
            //refresh la page
            setTimeout(function () {
                location.reload();
                window.location.href = "/";
            }, 900);
        });
    })
}    
