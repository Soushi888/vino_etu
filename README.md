# Projet web final : Vino

## Introduction

Ceci est le projet web final de l'équipe 1 des finissants du groupe 17612 de l'AEC en conception et programmation de sites web du Cégep Maisonneuve. 

API faite avec Laravel et front end en AJAX.

[Documentation Laravel](https://laravel.com/docs/7.x)

## Équipe

- Vladyslav Iefimov
- Christopher Parent-Paquette
- Samuel St-Jean
- Sacha Pignot

## Installation en local

1. Copiez le fichier .env.example et renommez le .env
2. Indiquez-y vos informations pour connecter votre base de données
3. Exécutez les commandes suivantes :

Pour installer les dépendances, si pas déjà fait, installer [Composer](https://getcomposer.org/download/) puis :

    $ composer install

Générer le APP_KEY (encrypter les cookies) :

    $ php artisan key:generate

Nettoyer le cache et les configues

    $ php artisan cache:clear

    $ php artisan config:clear

Générer la BDD avec des données test

    $ php artisan migrate --seed

## Front-end

Pour travailler la partie front-end, vous avez besoins de node et de npm. Une fois les deux installés :

Installer les dépendances :

    $ npm install

Compiler le dossier ressources/ à chaque sauvegarde dedans :

    $ npm run watch

Les fichiers fichiers de vues se trouvent dans le dossier `/ressources/views`, les assets pré-compilés dans leurs sous-dossiers dans `/ressources` et les assets compilés se retrouve dans `/public`.

## Routes
### Public

- `/` : Page d'Accueil

### API

Les routes de l'api se trouve dans le fichier routes/api.php

`GET`       - `api/utilisateurs`                   : Renvoie toutes les utilisateurs
`GET`       - `api/utilisateurs/{id}`              : Renvoyer un utilisateur
`POST`      - `api/utilisateurs`                   : Ajout un utilisateur 
`PUT`       - `api/utilisateurs/{id}`              : Modifier un utilisateur
`DELETE`    - `api/utilisateurs/{id}`              : Delete un utilisateur
        
`GET`       - `api/adresses`                       : Renvoie toutes les adresses
`GET`       - `api/adresses/{id}`                  : Renvoyer une adresse
`POST`      - `api/adresses`                       : Ajout une adresse 
`PUT`       - `api/adresses/{id}`                  : Modifier une adresse
`DELETE`    - `api/adresses/{id}`                  : Delete une adresse
        
`GET`       - `api/bouteilles`                     : Renvoie toutes les bouteilles
`GET`       - `api/bouteilles/{id}`                : Renvoyer une bouteille
`POST`      - `api/bouteilles`                     : Ajout une bouteille 
`PUT`       - `api/bouteilles/{id}`                : Modifier une bouteille
`DELETE`    - `api/bouteilles/{id}`                : Delete une bouteille
        
`GET`       - `api/celliers`                       : Renvoie toutes les celliers
`GET`       - `api/celliers/{id}`                  : Renvoyer un cellier
`POST`      - `api/celliers`                       : Ajout un cellier 
`PUT`       - `api/celliers/{id}`                  : Modifier un cellier
`DELETE`    - `api/celliers/{id}`                  : Delete un cellier

`GET`       - `api/celliers/{id}/bouteilles`       : Renvoie toutes les bouteilles d'un celliers précis 
`GET`       - `api/celliers/{id}/bouteilles/{id}`  : Renvoie une bouteille d'un celliers précis 
`POST`      - `api/celliers/{id}/bouteilles`       : Ajout d'une bouteille dans un cellier 
`PUT`       - `api/celliers/{id}/bouteilles`       : Modifier une bouteille d'un cellier
`DELETE`    - `api/celliers/{id}/bouteilles`       : Delete une bouteille d'un cellier


`GET`       - `api/saq`                            : Renvoit les données de la saq
`POST`      - `api/saq`                            : Mettre a jours la BDD avec les données de la saq






