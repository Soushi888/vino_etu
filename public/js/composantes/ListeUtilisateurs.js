function ListeUtilisateurs() {
    let users = new User();
    users.index().then(data => {
        new Modal();
        let modalContent = document.getElementsByClassName("modal-content");

        // Injection des données des bouteilles
        let tableau = document.querySelector(".info tbody");
        tableau.innerHTML = "";
        data.map(u => {
            let tr = document.createElement("tr")
            tr.innerHTML = `
                    <td aria-label="#">${u.id}</td>
                    <td aria-label="nom">${u.name}</td>
                    <td aria-label="email">${u.email}</td>
                    <td aria-label="type">${u.roles[0] ? u.roles[0].name : "utilisateur"}</td>
                    <td aria-label="actions">
                        <button class="btn btn-boire inline btn_modal_window width-max-content" btn="modifier_${u.email}" type="submit">Modifier</button>
                        <button class="btn btn-accepter inline btn_modal_window width-max-content" btn="supprimer_${u.email}" type="submit">Supprimer</button>
                    </td>`;

            tableau.appendChild(tr);

            // Bouton supprimer
            let btnSupprimer = document.querySelector(`[btn="supprimer_${u.email}"]`);
            // Modal bouton supprimer
            btnSupprimer.addEventListener("click", () => {
                modalContent[0].innerHTML = `
                        <span class="close-button">&times;</span>
                        <h2>Confirmation suppression</h2>
                        <p>Voulez vous vraiment supprimer l'utilisateur dont l'email est ${u.email} ?</p>
                        <button class="btn btn-accepter inline width-max-content" id="oui">Oui</button>
                        <button class="btn btn-accepter inline width-max-content" type="submit" id="non">Non</button>`;
                Modal.showModal();

                document.getElementById("oui").addEventListener("click", () => {
                    supprimerUtilisateur(u.id);
                    tr.remove();
                })

                document.getElementById("non").addEventListener("click", () => {
                    Modal.closeModal();
                })
            })

            // TODO : Messages erreurs et modification
            // Bouton modifier
            let btnModifier = document.querySelector(`[btn="modifier_${u.email}"]`);
            // Modal bouton modifier
            btnModifier.addEventListener("click", () => {
                modalContent[0].innerHTML = `<span class="close-button">&times;</span>
                        <h2>Modifier un utilisateur</h2>
                        <form class="form-ajouter" action="/" method="post">
                          <label for="name">Nom : </label>
                          <input class="input-ajouter" type="text" id="name" name="name" value="${u.name}"><br><br>
                          <label for="email">Adresse courriel : </label>
                          <input class="input-ajouter" type="text" id="email" name="email" value="${u.email}"><br><br>
                          <label for="type">rôle :</label>
                            <select class="input-ajouter margin-bottom-5px">
                                <option>Utilisateur</option>
                                <option ${u.roles[0] ? "selected" : ""}>Administrateur</option>
                            </select>
                          <label for="password">Mot de passe :</label>
                          <input class="input-ajouter" type="password" id="password" name="password"><br><br>
                          <label for="password_confirm">Confirmation du Mot de passe :</label>
                          <input class="input-ajouter" type="password" id="password_confirm" name="password_confirm"><br><br>
                          <button class="btn btn-accepter margin-top-30px" id="accepter">Accepter</button>
                        </form>`;
                Modal.showModal();

                document.getElementById("accepter").addEventListener("click", (evt) => {
                    evt.preventDefault();
                    console.log("modifier !");

                    Modal.closeModal();
                })
            })
        })

        // TODO : Messages erreurs et ajout
        // Bouton ajouter
        let btnAjouter = document.querySelector(`[btn="ajouter"]`);

        // Modal bouton ajouter
        btnAjouter.addEventListener("click", () => {
            modalContent[0].innerHTML = `
                        <span class="close-button">&times;</span>
                        <h2>Enregistrer un utilisateur</h2>
                        <form class="form-ajouter" action="/" method="post">
                          <label for="name">Nom : </label>
                          <input class="input-ajouter" type="text" id="name" name="name"><br><br>
                          <label for="email">Adresse courriel : </label>
                          <input class="input-ajouter" type="text" id="email" name="email"><br><br>
                          <label for="type">rôle :</label>
                            <select class="input-ajouter margin-bottom-5px" id="role" name="role">
                                <option value="1">Utilisateur</option>
                                <option value="2">Administrateur</option>
                            </select>
                          <label for="password">Mot de passe :</label>
                          <input class="input-ajouter" type="password" id="password" name="password"><br><br>
                          <label for="password_confirm">Confirmation du Mot de passe :</label>
                          <input class="input-ajouter" type="password" id="password_confirm" name="password_confirm"><br><br>
                          <button class="btn btn-accepter margin-top-30px" id="accepter">Accepter</button>
                        </form>`;
            Modal.showModal();

            document.getElementById("accepter").addEventListener("click", (evt) => {
                evt.preventDefault();
                console.log("enregistré !");
                let user = {
                    name: document.getElementById("name").value,
                    email: document.getElementById("email").value,
                    role: document.getElementById("role").value,
                    password: document.getElementById("password").value
                }
                console.log(user);
                ajouterUtilisateur(user);
            })
        })

        console.log(data)

    })
}

function ajouterUtilisateur(user) {
    let users = new User();




    // Validation des données
    if (!isEmail(user.email)) {

    }

    users.store({
        name: user.name,
        email: user.email,
        role: user.role,
        password: user.password
    }).then(() => {
        Modal.closeModal();
    })
}

function supprimerUtilisateur(id) {
    let users = new User();
    users.destroy(id)
        .then(() => {
            Modal.closeModal();
        });
}