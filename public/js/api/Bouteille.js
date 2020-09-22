class Bouteille {
    constructor() {
        this._URL_BOUTEILLES = `http://${window.location.hostname}/api/bouteilles`;
    }

    index = () => {
    };
    show = () => {
    };


    store = (bouteille) => {
        return axios.post(`${this._URL_BOUTEILLES}`, {
            nom: bouteille.nom,
            code_saq: bouteille.code_saq,
            // etc.
        })
            .then(function (response) { // succes
                console.log(response);
            })
            .catch(function (error) { // error
                console.log(error);
            });
    }

    update = () => {
    };

    destroy = () => {
    };
}