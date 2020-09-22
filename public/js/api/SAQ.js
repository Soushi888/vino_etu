class SAQ {
    constructor() {
        this._URL_SAQ = `http://${window.location.hostname}/api/saq`;
    }

    index = () => {}; // GET  /api/saq
    store = () => {}; // POST /api/saq

    storeAll = () => {}; // Combinaison de index et de store pour ajouter toute une page à la BDD
}