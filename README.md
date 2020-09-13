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

## Démo



#### Fonctionnalités disponibles
- [Page `/`](https://e1995086.webdev.cmaisonneuve.qc.ca/vino/) - Écran de connexion **OU** Page d'accueil (actuellement liste des bouteilles).
  
#### API

Pour les requêtes POST, PUT ou DELETE, veuillez tester avec un outil comme **POSTMAN**.

##### SAQ

[`GET` - api/saq](https://e1995086.webdev.cmaisonneuve.qc.ca/vino/public/index.php/api/saq)

##### adresses

[`GET` - api/adresses](https://e1995086.webdev.cmaisonneuve.qc.ca/vino/public/index.php/api/adresses)

[`GET` - api/saq/adresses/1](https://e1995086.webdev.cmaisonneuve.qc.ca/vino/public/index.php/api/adresses/1)

##### bouteilles

[`GET` - api/bouteilles](https://e1995086.webdev.cmaisonneuve.qc.ca/vino/public/index.php/api/bouteilles)

[`GET` - api/saq/bouteilles/1](https://e1995086.webdev.cmaisonneuve.qc.ca/vino/public/index.php/api/bouteilles/1)

##### celliers

[`GET` - api/celliers](https://e1995086.webdev.cmaisonneuve.qc.ca/vino/public/index.php/api/celliers)

[`GET` - api/saq/celliers/1](https://e1995086.webdev.cmaisonneuve.qc.ca/vino/public/index.php/api/celliers/1)


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

Les fichiers de vues se trouvent dans le dossier `/ressources/views`, les assets pré-compilés dans leurs sous-dossiers dans `/ressources` et les assets compilés se retrouve dans `/public`.

## Routes
### Public

Les routes publiques se trouvent dans le fichier routes/web.php

- `/` : Page d'Accueil
- `/login` : Écran de connection

### API

Les routes de l'api se trouvent dans le fichier routes/api.php

#### utilisateurs

- `GET`       - `api/utilisateurs`                   : Retourner tout les utilisateurs
- `GET`       - `api/utilisateurs/{id}`              : Retourner un utilisateur
- `POST`      - `api/utilisateurs`                   : Ajouter un utilisateur 
- `PUT`       - `api/utilisateurs/{id}`              : Modifier un utilisateur
- `DELETE`    - `api/utilisateurs/{id}`              : Supprimer un utilisateur

#### adresses      

- `GET`       - `api/adresses`                       : Retourner toutes les adresses
- `GET`       - `api/adresses/{id}`                  : Retourner une adresse
- `POST`      - `api/adresses`                       : Ajouter une adresse 
- `PUT`       - `api/adresses/{id}`                  : Modifier une adresse
- `DELETE`    - `api/adresses/{id}`                  : Supprimer une adresse

#### bouteilles

- `GET`       - `api/bouteilles`                     : Retourner toutes les bouteilles
- `GET`       - `api/bouteilles/{id}`                : Retourner une bouteille
- `POST`      - `api/bouteilles`                     : Ajouter une bouteille 
- `PUT`       - `api/bouteilles/{id}`                : Modifier une bouteille
- `DELETE`    - `api/bouteilles/{id}`                : Supprimer une bouteille

#### celliers

- `GET`       - `api/celliers`                       : Retourner tout les celliers
- `GET`       - `api/celliers/{id}`                  : Retourner un cellier
- `POST`      - `api/celliers`                       : Ajouter un cellier 
- `PUT`       - `api/celliers/{id}`                  : Modifier un cellier
- `DELETE`    - `api/celliers/{id}`                  : Supprimer un cellier

#### celliers/bouteilles

- `GET`       - `api/celliers/{id}/bouteilles`       : Retourner toutes les bouteilles d'un celliers 
- `GET`       - `api/celliers/{id}/bouteilles/{id}`  : Retourner une bouteille d'un celliers 
- `POST`      - `api/celliers/{id}/bouteilles`       : Ajouter une bouteille dans un cellier 
- `PUT`       - `api/celliers/{id}/bouteilles`       : Modifier une bouteille d'un cellier
- `DELETE`    - `api/celliers/{id}/bouteilles`       : Supprimer une bouteille d'un cellier

#### saq

- `GET`       - `api/saq`                            : Retourner les données de la saq
- `POST`      - `api/saq`                            : Mettre a jours la table bouteilles avec les données de la saq
