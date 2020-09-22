// var reponse = fetch("api/bouteilles");
// var reponseJson = reponse.then(function(res){
//     return res.json();
// });


//  let tableauNomBouteilles = ["code_saq" ,"created_at" ,"description" ,"format" ,"id" 
// ,"image" ,"image_url" ,"nom" ,"pays" ,"prix_saq" ,"type_id" ,"updated_at" ,"url_saq"] 

// function afficheLesBouteilles(bouteilles){
//     console.log(bouteilles);

//     let pageAcceuil = document.querySelector("#pageAcceuil>h1");
//         for(let i=0; i<bouteilles.length;i++){
//         let eUl = document.createElement("ul");
//             for(let j=0;j<tableauNomBouteilles.length;j++){
//             let eLi = document.createElement("li");
//             let eTexte = document.createTextNode(bouteilles[i][tableauNomBouteilles[j]]);
//             pageAcceuil.appendChild(eUl).appendChild(eLi).appendChild(eTexte) 
//         }
//     }
// };

// reponseJson.then(afficheLesBouteilles);


/* var reponse = fetch("api/saq");
var reponseJson = reponse.then(function (res) {
    return res.json();
});

let tableauSaq = ["desc", "img", "nom", "prix", "url"];
let tableauSaqDesc = ["code_SAQ", "format", "pays", "texte", "type"]


function afficheSaq(saq) {
    //console.log(saq);

    let pageAcceuil = document.querySelector("#pageAcceuil");
    for (let i = 0; i < saq.length; i++) {
        //console.log(saq);
        let eUl = document.createElement("ul");
        for (let j = 0; j < tableauSaq.length; j++) {
            if (tableauSaq[j] === "desc") {
                for (let k = 0; k < tableauSaqDesc.length; k++) {
                    let eLi = document.createElement("li");
                    let eTexteDesc = document.createTextNode(saq[i].desc[tableauSaqDesc[k]]);
                    eLi.appendChild(eTexteDesc);
                    eUl.appendChild(eLi)

                }
            }

            let eLi = document.createElement("li");

            if (tableauSaq[j] === tableauSaq[1]) {
                let eImg = document.createElement("img");
                eImg.setAttribute("src", saq[i].img)
                console.log(eImg);
                eLi.appendChild(eImg);

            }else{
                let eTexte = document.createTextNode(saq[i][tableauSaq[j]]);
                eLi.appendChild(eTexte);
            }



            eUl.appendChild(eLi)
            pageAcceuil.appendChild(eUl)

        }

    }


}; 

reponseJson.then(afficheSaq);*/

let idUtilisateur = document.getElementById("idUtilisateur").value;

console.log(idUtilisateur);

var reponse = fetch("api/users/"+idUtilisateur+"/celliers"); 
var reponseJson = reponse.then(function (res) {
    return res.json();
});

function afficheCellierDunUtilisateur(cellierUtilisateur){
    console.log(cellierUtilisateur.data);
    // let eCacherColumnGauche = document.querySelector(".column_left").style.visibility= "hidden";
    // let eCacherColumnDroit = document.querySelector(".column_right").style.visibility= "hidden";
    let idCellier = "";
    let afficheCellier = document.querySelector("#pageAcceuil h1");
    let eUl = document.createElement("ul");
        eUl.setAttribute("id","listCellier")
        
    for(let i=0; i<cellierUtilisateur.data.length;i++){
        let eLi = document.createElement("li");
        eLi.setAttribute("id","idCellier"+cellierUtilisateur.data[i].id)
        eLi.innerHTML= cellierUtilisateur.data[i].nom;
        eLi.style.cursor = "pointer";
        afficheCellier.after(eUl);
        eUl.appendChild(eLi);
        console.log(afficheCellier);
        eLi.addEventListener("click",function(evt){
            idCellier = evt.target.id.replace("idCellier", " ");            
            console.log(idCellier);
            eUl.innerHTML="";
            eUl.setAttribute("id","listCellierAvecBouteilles");
            let reponseDesbouteilleDuCelliers = fetch("api/celliers/"+idCellier+"/bouteilles");
            let reponseDesbouteilleDuCelliersJson = reponseDesbouteilleDuCelliers.then(function (reponseHttp){                
                return reponseHttp.json();                  
            })
            reponseDesbouteilleDuCelliersJson.then(function(res){
                console.log(res.data);

                for(let i=0; i<res.data.length;i++){
                    console.log("donne le id d'un bouteille",res.data[i].bouteille_id," donne le millesime",res.data[i].millesime," donne le prix",res.data[i].prix);
                    let idBouteille = res.data[i].bouteille_id;
                    console.log(idBouteille);
                    let reponseDesbouteille = fetch("api/bouteilles/"+idBouteille); 
                    let reponseDesbouteilleJson = reponseDesbouteille.then(function (reponse){
                        return reponse.json();
                    })
                    reponseDesbouteilleJson.then(function(reponse){
                        console.log("je suis dans le fetch de bouteille",reponse.data)
                    })
                                  
                }
            });
        });
    }
}



reponseJson.then(afficheCellierDunUtilisateur)

