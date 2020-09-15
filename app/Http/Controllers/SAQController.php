<?php

namespace App\Http\Controllers;

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
    public function getProduits($nombre = 24, $page = 1)
    {
        $s = curl_init();
        $url = 'https://www.saq.com/fr/produits/vin/vin-rouge?p=1&product_list_limit=24&product_list_order=name_asc';
        // $url = 'https://www.saq.com/fr/produits/vin/vin-rose?format_contenant_ml=1500';

        

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
        $info = new stdClass();
        $info->img = $noeud->getElementsByTagName("img")->item(0)->getAttribute('src');
        
        $urlLongueur = strpos($info->img , "?" );
        if ($urlLongueur > 1) {
            $imgUrl = str_split($info->img, $urlLongueur);
            $info->img = $imgUrl[0];
         }
       
        // tableau des formats des bouteilles SAQ
        $formats = ["1 L","1,5 L", "250 ml","3 L","375 ml","750 ml"];
    
        $a_titre = $noeud->getElementsByTagName("a")->item(0);
        $info->url = $a_titre->getAttribute('href');

        $info->nom = self::nettoyerEspace(trim($a_titre->textContent));    
        
        foreach($formats as $format) {
            $titre = strpos($info->nom , $format );
            if ($titre > 1) {
                $nom = str_split($info->nom, $titre - 1);
                $info->nom = $nom[0];

                
            }
        }
        
            
        // Type, format et pays
        $aElements = $noeud->getElementsByTagName("strong");
        foreach ($aElements as $node) {
            if ($node->getAttribute('class') == 'product product-item-identity-format') {
                $info->desc = new stdClass();
                $info->desc->texte = $node->textContent;
                $info->desc->texte = self::nettoyerEspace($info->desc->texte);
                $aDesc = explode("|", $info->desc->texte); // Type, Format, Pays
                if (count($aDesc) == 3) {

                    $info->desc->type = trim($aDesc[0]);
                    $info->desc->format = trim($aDesc[1]);
                    $info->desc->pays = trim($aDesc[2]);
                }

                $info->desc->texte = trim($info->desc->texte);
            }
        }

        //Code SAQ
        $aElements = $noeud->getElementsByTagName("div");
        foreach ($aElements as $node) {
            if ($node->getAttribute('class') == 'saq-code') {
                if (preg_match("/\d+/", $node->textContent, $aRes)) {
                    $info->desc->code_SAQ = trim($aRes[0]);
                }
            }
        }

        $aElements = $noeud->getElementsByTagName("span");
        foreach ($aElements as $node) {
            if ($node->getAttribute('class') == 'price') {
                $info->prix = trim($node->textContent);
            }
        }
        return $info;
    }

    // TODO : Methode à corriger
    //
    /**
     * Ajoute un produit dans la table bouteille.
     * @param $bte
     * @return stdClass
     */
    // private function ajouteProduits($bte)
    // {

        
    //     $retour = new stdClass();
    //     $retour->succes = false;
    //     $retour->raison = '';

    //     //var_dump($bte);
    //     // Récupère le type
    //     $rows = $this->_db->query("select id from vino_type where type = '" . $bte->desc->type . "'");

    //     if ($rows->num_rows == 1) {
    //         $type = $rows->fetch_assoc();
    //         //var_dump($type);
    //         $type = $type['id'];

    //         $rows = $this->_db->query("select id from vino_bouteille where code_saq = '" . $bte->desc->code_SAQ . "'");
    //         if ($rows->num_rows < 1) {
    //             $this->stmt->bind_param("sissssisss", $bte->nom, $type, $bte->img, $bte->desc->code_SAQ, $bte->desc->pays, $bte->desc->texte, $bte->prix, $bte->url, $bte->img, $bte->desc->format);
    //             $retour->succes = $this->stmt->execute();
    //             $retour->raison = self::INSERE;
    //             //var_dump($this->stmt);
    //         } else {
    //             $retour->succes = false;
    //             $retour->raison = self::DUPLICATION;
    //         }
    //     } else {
    //         $retour->succes = false;
    //         $retour->raison = self::ERREURDB;
    //     }
    //     return $retour;
    // }
}
