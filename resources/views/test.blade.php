<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Vino - Front End Test</title>

    <link rel="stylesheet" href="{{ asset("css/style.css") }}">

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/api/Cellier.js') }}"></script>

    <script defer>
        let celliers = new Cellier();
        celliers.index().then(data => {
            console.log(data)
            data.map(c => {
                let nom = document.createElement("div");
                nom.innerHTML = `<div> Nom : ${c.nom}</div>`;
                document.getElementById("page-test").appendChild(nom);
            })
        })
    </script>
</head>
<body>
<div id="page-test"></div>
</body>
</html>