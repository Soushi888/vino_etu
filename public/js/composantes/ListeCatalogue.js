function ListeBouteilles() {

    bouteilles = new Bouteille();
    bouteilles.index().then(data => {
        let tableau = document.querySelector(".info tbody")
        tableau.innerHTML = "";

        new Modal();
        let modalContent = document.getElementsByClassName("modal-content");


        data.map(b => {

            let date = new Date(b.created_at);
            date = `${date.getDate()} ${nomMois(date.getMonth())} ${date.getFullYear()}`

            let tr = document.createElement("tr")
            tr.innerHTML = `
                    <td aria-label="#">${b.id}</td>
                    <td aria-label="nom">${b.nom}</td>
                    <td aria-label="prenom">${b.code_saq}</td>
                    <td aria-label="email">${b.pays}</td>
                    <td aria-label="description">${b.description}</td>
                    <td aria-label="prix">${b.prix_saq}$</td>
                    <td aria-label="url"><a href="${b.url_saq}">${b.url_saq}</a></td>
                    <td aria-label="image"><img class="width-100px" src="${b.url_image}" alt="${b.description}"></td>
                    <td aria-label="format">${b.format}</td>
                    <td aria-label="type">${getType(b.type_id)}</td>
                    <td aria-label="created_at">${date}</td>
                    <td aria-label="actions" >
                        <button class="btn btn-boire inline btn_modal_window width-max-content" btn="modifier_${b.code_saq}" type="submit">Modifier</button>
                        <button class="btn btn-accepter inline btn_modal_window width-max-content" btn="supprimer_${b.code_saq}" type="submit">Supprimer</button>
                    </td>
                `;
            tableau.appendChild(tr);

            // Bouton supprimer
            let btnSupprimer = document.querySelector(`[btn="supprimer_${b.code_saq}"]`);
            // Modal bouton supprimer
            btnSupprimer.addEventListener("click", () => {
                modalContent[0].innerHTML = `
                        <span class="close-button">&times;</span>
                        <h2>Confirmation suppression</h2>
                        <p>Voulez vous vraiment supprimer la bouteille "${b.nom}" ?</p>
                        <button class="btn btn-accepter inline width-max-content" id="oui">Oui</button>
                        <button class="btn btn-accepter inline width-max-content" type="submit" id="non">Non</button>`;
                Modal.showModal();

                document.getElementById("oui").addEventListener("click", () => {
                    supprimerBouteille(b.id);
                    ListeBouteilles();
                })

                document.getElementById("non").addEventListener("click", () => {
                    Modal.closeModal();
                })


            })

            // TODO : Messages erreurs et modification
            // Bouton modifier
            let btnModifier = document.querySelector(`[btn="modifier_${b.code_saq}"]`);
            // Modal bouton modifier
            btnModifier.addEventListener("click", () => {
                modalContent[0].innerHTML = `
                        <span class="close-button">&times;</span>
                        <h2>Modifier une bouteille</h2>
                        <form class="form-ajouter" action="/" method="post">
                          <label for="nom">Nom : </label>
                          <input class="input-ajouter" type="text" id="nom" name="nom" value="${b.nom}"><br><br>
                          <label for="code_saq">Code : </label>
                          <input class="input-ajouter" type="text" id="code_saq" name="code_saq" value="${b.code_saq}"><br><br>
                          <label for="pays">Pays :</label>
                          <input class="input-ajouter" type="text" id="pays" name="pays" value="${b.pays}"><br><br>
                          <label for="description">Description :</label>
                          <textarea class="input-ajouter margin-bottom-10px" id="description" name="description">${b.description}</textarea>
                          <label for="url_saq">URL : </label>
                          <input class="input-ajouter" name="url_saq" id="url_saq" value="${b.url_saq}"><br><br>
                          <label for="url_image">URL de l'image : </label>
                          <input class="input-ajouter" name="url_image" id="url_image" value="${b.url_image}"><br><br>
                          <label for="format">Format : </label>
                          <input class="input-ajouter" name="format" id="format" value="${b.format}"><br><br>
                          <label for="type">Type de vin : </label>
                          <select class="input-ajouter" name="type" id="type">
                            <option name="rouge" id="rouge" value="1">Rouge</option>
                            <option name="blanc" id="blanc" value="1">Blanc</option>
                            <option name="rose" id="rose" value="1">Rosé</option>
                          </select>
                          <button class="btn btn-accepter margin-top-30px">Accepter</button>
                        </form>`;


                Modal.showModal();
            })
        })

        // TODO : Messages erreurs et ajout
        // Bouton ajouter
        let btnAjouter = document.querySelector(`[btn="ajouter"]`);

        // Modal bouton ajouter
        btnAjouter.addEventListener("click", () => {
            modalContent[0].innerHTML = `
                        <span class="close-button">&times;</span>
                        <h2>Ajouter une bouteille</h2>
                        <form class="form-ajouter" action="/" method="post">
                          <label for="nom">Nom : </label>
                          <input class="input-ajouter" type="text" id="nom" name="nom"><br><br>
                          <label for="code_saq">Code : </label>
                          <input class="input-ajouter" type="text" id="code_saq" name="code_saq"><br><br>
                          <label for="pays">Pays :</label>
                          <input class="input-ajouter" type="date" id="pays" name="pays"><br><br>
                          <label for="description">Description :</label>
                          <input class="input-ajouter" type="date" id="description" name="description"><br><br>
                          <label for="url_saq">ULR : </label>
                          <input class="input-ajouter" name="url_saq" id="url_saq"><br><br>
                          <label for="url_image">URL de l'image : </label>
                          <input class="input-ajouter" name="url_image" id="url_image"><br><br>
                          <label for="format">Format : </label>
                          <input class="input-ajouter" name="format" id="format"><br><br>
                          <label for="type">Type de vin : </label>
                          <select class="input-ajouter" name="type" id="type">
                            <option name="rouge" id="rouge" value="1">Rouge</option>
                            <option name="blanc" id="blanc" value="1">Blanc</option>
                            <option name="rose" id="rose" value="1">Rosé</option>
                          </select>
                          <button class="btn btn-accepter margin-top-30px">Accepter</button>
                        </form>`
            Modal.showModal();
        })

        console.log(data)
    })
}

function supprimerBouteille(id) {
    let bouteilles= new Bouteille();
    bouteilles.destroy(id);
    Modal.closeModal();
    ListeBouteilles();
}