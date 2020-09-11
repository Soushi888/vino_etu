var reponse = fetch("api/bouteilles");
var reponseJson = reponse.then(function(res){
    return res.json();
});

 let tableauNom = ["code_saq" ,"created_at" ,"description" ,"format" ,"id" 
,"image" ,"image_url" ,"nom" ,"pays" ,"prix_saq" ,"type_id" ,"updated_at" ,"url_saq"] 

function afficheLesBouteilles(bouteilles){
    console.log(bouteilles);
    
    let pageAcceuil = document.querySelector("#pageAcceuil>h1");
        for(let i=0; i<bouteilles.length;i++){
        let eUl = document.createElement("ul");
            for(let j=0;j<tableauNom.length;j++){
            let eLi = document.createElement("li");
            let eTexte = document.createTextNode(bouteilles[i][tableauNom[j]]);
            pageAcceuil.appendChild(eUl).appendChild(eLi).appendChild(eTexte) 
        }
    }
};

reponseJson.then(afficheLesBouteilles);




