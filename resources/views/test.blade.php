<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Vino - Front End Test</title>

    <link rel="stylesheet" href="{{ asset("css/style.css") }}">

    <script src="{{ asset('js/api/User.js') }}"></script>
    <script src="{{ asset('js/api/Transaction.js') }}"></script>
    <script src="{{ asset('js/api/Cellier.js') }}"></script>
    <script src="{{ asset('js/api/Bouteille.js') }}"></script>
    <script src="{{ asset('js/api/SAQ.js') }}"></script>
    <script src="{{ asset('js/api/CellierBouteille.js') }}"></script>

    <script defer>
        // Tests SAQ

        // let saq = new SAQ();
        // saq.index("blanc", 2).then(data => {
        //     console.log(data)
        // });
        // saq.store({
        //     "nom": "1000 Stories Zinfandel Californie 2018",
        //     "code_saq": "134f8d4",
        //     "description": "Vin rouge | 750 ml | États-Unis",
        //     "pays": "États-Unis",
        //     "type_id": 1,
        //     "format": "2 L",
        //     "prix_saq": "28.85",
        //     "url_image": "https://www.saq.com/media/catalog/product/1/3/13584455-1_1578538222.png",
        //     "url_saq": "https://www.saq.com/fr/13584455"
        // })
        // saq.storeAll("blanc", 3);


        // Test CellierBouteille

        // let cellierBouteille = new CellierBouteille()
        // cellierBouteille.index(2).then(data => {
        //     console.log(data);
        // })
        // cellierBouteille.show(1, 2).then((data => {
        //     console.log(data);
        // }))
        // cellierBouteille.store(1, {
        //     bouteille_id: 20,
        //     cellier_id: 1,
        //     quantite: "1",
        //     date_achat: "2018-11-11 08:06:21",
        //     garde_jusqua: "2026-11-01 18:15:42",
        //     notes: "Ut voluptatem ut id deleniti corrupti. Sit placeat delectus ut enim.",
        //     prix: "36f",
        //     millesime: 1998
        // });


        // Tests User

        // let users = new User();
        // users.index().then(data => {
        //     console.log(data)
        //     data.map(c => {
        //         let nom = document.createElement("div");
        //         nom.innerHTML = `<div> Nom : ${c.name}</div>`;
        //         document.getElementById("page-test").appendChild(nom);
        //     })
        // })
        // users.show(1).then(data => {
        //     console.log(data);
        // })
        // users.store({
        //     "name": "Soushino",
        //     "prenom": "Souhior",
        //     "email": "laura89@example.com",
        //     "cellier_id": null,
        //     "password": "12345678",
        //     "type": "admin"
        // });


        // Tests Cellier

        // let celliers = new Cellier();
        // let cellier = {
        //     nom: "Lisette 1ere",
        //     user_id: 2,
        // };
        // celliers.store(cellier);


        // Tests transactions

        // let transactions = new Transaction();
        // transactions.show(1).then(data => {
        //     console.log(data)
        // })

        // Test

        // let bouteilles = new Bouteille();
        // bouteilles.index().then(data => {
        //     console.log(data)
        // })
        // bouteilles.store({
        //     "nom": "Mrs. Breana McLaughlin",
        //     "code_saq": "6743873973192",
        //     "pays": "Iraq",
        //     "description": "Rerum debitis et quidem vero incidunt. Recusandae ut et eum magni veritatis et qui. Ut fuga doloremque est et aut.\n\nEos dolorem et molestiae vel magni. Distinctio rem magnam optio in molestias ut et. Deleniti aut ex repellendus. Et sed tenetur sequi magnam.",
        //     "prix_saq": "31.45",
        //     "url_saq": "https://www.saq.com/page/fr/saqcom/vin-rouge/borsao-seleccion/10324623",
        //     "url_image": "https://www.saq.com/media/catalog/product/1/0/10324623-1_1584374899.png",
        //     "format": "voluptatem quos",
        //     "type_id": 1
        // })
    </script>
</head>

<body>
<div id="page-test"></div>
</body>
</html>