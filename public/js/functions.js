/**
 * Fonctions utilitaires
 */


/**
 * Retourne le nom en français du numéro du mois donné en paramètre.
 * @param {number} mois
 */
function nomMois(mois) {
    switch (mois) {
        case 0:
            return "janvier";
        case 1:
            return "février";
        case 2:
            return "mars";
        case 3:
            return "avril";
        case 4:
            return "mai";
        case 5:
            return "juin";
        case 6:
            return "juillet";
        case 7:
            return "aôut";
        case 8:
            return "septembre";
        case 9:
            return "octobre";
        case 10:
            return "novembre";
        case 11:
            return "décembre";
    }
}

/**
 * Retourne une chaine de caractères contenant le nom du type de vin à partir de son ID.
 * @param type_id
 * @returns {string}
 */
function getType(type_id) {
    let type;
    switch (type_id) {
        case 1:
            type = "rouge";
            break;
        case 2:
            type = "blanc";
            break;
        case 3:
            type = "rosé";
            break;
    }
    return type;
}


/* Validations */

function isEmail(email) {
    // Regular Expression (Not accepts second @ symbol
    // before the @gmail.com and accepts everything else)
    let regexp = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

    // Converting the email to lowercase
    return regexp.test(String(email).toLowerCase());
}

function isURL(URL) {
    // Regular Expression (Not accepts second @ symbol
    // before the @gmail.com and accepts everything else)
    let regexp = /((([A-Za-z]{3,9}:(?:\/\/)?)(?:[\-;:&=\+\$,\w]+@)?[A-Za-z0-9\.\-]+|(?:www\.|[\-;:&=\+\$,\w]+@)[A-Za-z0-9\.\-]+)((?:\/[\+~%\/\.\w\-_]*)?\??(?:[\-\+=&;%@\.\w_]*)#?(?:[\.\!\/\\\w]*))?)/;

    // Converting the email to lowercase
    return regexp.test(String(URL).toLowerCase());
}

