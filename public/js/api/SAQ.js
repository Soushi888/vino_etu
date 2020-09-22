/**
 * Interface avec L'API saq
 */
class SAQ {
    constructor() {
        this._URL_SAQ = `http://${window.location.hostname}/api/saq`;
    }

    /**
     * Retourne sous forme de promesse les résultats d'une recherche dans le catalogue de la SAQ.
     * @param type Type de vin
     * @param page Numéro de la page
     * @returns {Promise<*>}
     */
    index(type = "rouge", page = 1) {
        return fetch(`${this._URL_SAQ}?type=${type}&page=${page}`)
            .then(res => res.json())
            .then(data => data);
    }

    /**
     * Enregistre une bouteille de la SAQ dans la table bouteilles si elle n'y est pas déjà présente
     * @param bouteille
     * @returns {Promise<void>}
     */
    store = (bouteille) => {
        return fetch(`${this._URL_SAQ}`, {
            method: "POST",
            body: JSON.stringify(bouteille),
            headers: {"Content-type": "application/json; charset=UTF-8"}
        })
            .then(response => response.json())
            .then(json => console.log(json))
            .catch(err => console.log(err));
    };

    /**
     * Enregistre toutes le bouteilles résultant d'une recherche dans le catalogue de la SAQ
     * @param type
     * @param page
     */
    storeAll = (type, page) => {
        this.index(type, page).then(data => {
            data.map(b => {
                this.store(b);
            })
        })
    };
}