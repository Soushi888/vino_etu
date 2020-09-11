
var tableauBouteilles = [];
var reponse = fetch("api/bouteilles");
var reponseJson = reponse.then(function(res){
    return res.json();
});

let tableauNom = ["code_saq" ,"created_at" ,"description" ,"format" ,"id" ,"image" ,"image_url" ,"nom" ,"pays" ,"prix_saq" ,"type_id" ,"updated_at" ,"url_saq"]

function afficheLesBouteilles(bouteilles){
    tableauBouteilles.push(bouteilles);
    
     console.log(tableauBouteilles);
};

reponseJson.then(afficheLesBouteilles);




