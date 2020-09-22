class Cellier {
    constructor() {
        this._URL_CELLIERS = `http://${window.location.hostname}/api/celliers`;
    }

    index = () => {
        console.log(this._URL_CELLIERS);
        return axios.get(`${this._URL_CELLIERS}`).then(res => {
            let data = res.data.data;
            return data;
        })
    }

    show = () => {

    };

    store = () => {
    }

    update = () => {
    };

    destroy = () => {
    };
}

// Cellier.index();