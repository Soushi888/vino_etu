<?php

namespace App\Http\Controllers;

use App\Bouteille;
use Illuminate\Http\Request;
use DOMDocument;
use Illuminate\Support\Facades\Response;
use stdClass;

/**
 * Interragit avec le site web de la SAQ pour extraire des données du DOM puis les formater JSON.
 * Methode GET et POST
 * @package App\Http\Controllers
 */
class SAQController extends Controller
{
    const DUPLICATION = 'duplication';
    const ERREURDB = 'erreurdb';
    const INSERE = 'Nouvelle bouteille insérée';

    /**
     * @var $_webpage DOMDocument le DOM de la page du site web de la SAQ qui sera parsé
     */
    private static $_webpage;

    /**
     * @var $_status int Code HTTP
     */
    private static $_status;


    /**
     * Retourne la liste des vins rouges
     * @param int $nombre Nombre de vins par page de recherche
     * @param int $page Nombre de page de recherche
     * @return \Illuminate\Http\JsonResponse
     */
    public function getProduits()
    {
        $request = $_GET;

        // Valeur de recherche par défaut.
        if (isset($request["type"]) == "") {
            $request["type"] = "rouge";
        }
        if (isset($request["page"]) == "") {
            $request["page"] = "1";
        }

        $url = "https://www.saq.com/fr/produits/vin/vin-" . $request['type'] . "?p=" . $request['page'] . "&product_list_limit=24&product_list_order=name_asc";
        $s = curl_init();

        curl_setopt($s, CURLOPT_URL, $url);
        curl_setopt($s, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($s, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($s, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($s, CURLOPT_SSL_VERIFYPEER, FALSE);

        self::$_webpage = curl_exec($s);
        self::$_status = curl_getinfo($s, CURLINFO_HTTP_CODE);
        curl_close($s);

        $doc = new DOMDocument("", "");
        $doc->recover = true;
        $doc->strictErrorChecking = false;
        libxml_use_internal_errors(true);
        $doc->loadHTML(self::$_webpage);

        $elements = $doc->getElementsByTagName("li");
        $i = 0;

        $infos = [];

        foreach ($elements as $key => $noeud) {
            if (strpos($noeud->getAttribute('class'), "product-item") !== false) {
                $info = self::recupereInfo($noeud);
                array_push($infos, $info);
            }
        }

        return response()->json($infos);
    }

    /**
     * Supprime les espaces d'une chaîne de caractère donnée
     * @param $chaine
     * @return string|string[]|null
     */
    static private function nettoyerEspace($chaine)
    {
        return preg_replace('/\s+/', ' ', $chaine);
    }


    /**
     * Formate le noeud HTML en paramètre pour en extraire le lien de l'image, l'url, le nom, la description, le type, le format, le pays, le code SAQ et le prix.
     * @param $noeud DOMNode Noeud HTML <li>
     * @return stdClass
     */
    static private function recupereInfo($noeud)
    {
        $formats = ["1 L", "1,5 L", "250 ml", "3 L", "375 ml", "750 ml"];
        $a_titre = $noeud->getElementsByTagName("a")->item(0);
        $info = new stdClass();
        $info->nom = self::nettoyerEspace(trim($a_titre->textContent));

        foreach ($formats as $format) {
            $titre = strpos($info->nom, $format);
            if ($titre > 1) {
                $nom = str_split($info->nom, $titre - 1);
                $info->nom = $nom[0];
            }
        }

        //Code SAQ
        $aElements = $noeud->getElementsByTagName("div");
        foreach ($aElements as $node) {
            if ($node->getAttribute('class') == 'saq-code') {
                if (preg_match("/\d+/", $node->textContent, $aRes)) {
                    $info->code_saq = trim($aRes[0]);
                }
            }
        }

        // Type, format et pays
        $aElements = $noeud->getElementsByTagName("strong");
        foreach ($aElements as $node) {
            if ($node->getAttribute('class') == 'product product-item-identity-format') {
                $info->description = $node->textContent;
                $info->description = self::nettoyerEspace($info->description);
                $aDesc = explode("|", $info->description); // Type, Format, Pays
                $info->pays = trim($aDesc[2]);
                if (count($aDesc) == 3) {

                    switch (trim($aDesc[0])) {
                        case 'Vin rouge':
                            $info->type_id = 1;
                            break;

                        case 'Vin blanc':
                            $info->type_id = 2;
                            break;

                        case 'Vin rosé':
                            $info->type_id = 3;
                            break;
                    }
                    $info->format = trim($aDesc[1]);
                }

                $info->description = trim($info->description);
            }
        }

        $aElements = $noeud->getElementsByTagName("span");
        foreach ($aElements as $node) {
            if ($node->getAttribute('class') == 'price') {
                $posPrix = strpos($node->textContent, "$");
                if ($posPrix > 1) {
                    $info->prix_saq = str_split($node->textContent, $posPrix);
                    $info->prix_saq = str_replace(",", ".", $info->prix_saq);
                    $info->prix_saq = floatval($info->prix_saq[0]);
                }
            }
        }

        if ($noeud->getElementsByTagName("img")->item(0)->getAttribute('class') !== 'product-image-photo') {
            $info->url_image = $noeud->getElementsByTagName("img")->item(1)->getAttribute('src');
        } else {
            $info->url_image = $noeud->getElementsByTagName("img")->item(0)->getAttribute('src');
        }

        // Récupération de l'URL sans les requêtes GET
        $urlLongueur = strpos($info->url_image, "?");
        if ($urlLongueur > 1) {
            $imgUrl = str_split($info->url_image, $urlLongueur);
            $info->url_image = $imgUrl[0];
        }

        // tableau des formats des bouteilles SAQ
        $info->url_saq = $a_titre->getAttribute('href');

        return $info;
    }

    /**
     * Ajoute un produit dans la table bouteille.
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajouterProduit(Request $request)
    {
        $resultat = count(Bouteille::where("code_saq", $request->code_saq)->get());

        if ($resultat > 0) {
            return Response::json("Déjà en inventaire");
        } else {
            return Response::json(BouteilleController::store($request)->original);
        }
    }
}
