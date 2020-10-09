# Projet web final : Vino

## Introduction

Ceci est le projet web final de l'équipe 1 des finissants du groupe 17612 de l'AEC en conception et programmation de sites web du Cégep Maisonneuve. 

Application web qui permet à ses utilisateurs de créer et de gérer des celliers. L'administrateur peut gérer le catalogue et le synchroniser avec celui de la SAQ.

Base de données : SQL

API REST : Laravel 

Front end : AJAX

[Documentation Laravel](https://laravel.com/docs/7.x)

## Équipe

- Vladyslav Iefimov
- Christopher Parent-Paquette
- Samuel St-Jean
- Sacha Pignot

## Fonctionnalités

### Utilisateurs

- [X] [Se créer un compte](https://e1995086.webdev.cmaisonneuve.qc.ca/vino/public/register)
- [X] [Se connecter](https://e1995086.webdev.cmaisonneuve.qc.ca/vino/public/login)
- [X] Gérer son profil
    - [X] Modifier son mot de passe
    - [X] Modifier son adresse courriel
- [X] Gérer son cellier
    - [X] [Afficher le contenu d'un cellier](https://e1995086.webdev.cmaisonneuve.qc.ca/vino/public/)
    - [X] Afficher une bouteille du cellier
        - [X] Quantité totale de bouteilles en stock
    - [X] Boire une bouteille du cellier 
        - [X] Quantité -1 
    - [X] [Ajouter une ou plusieurs bouteilles à son cellier](https://e1995086.webdev.cmaisonneuve.qc.ca/vino/public/ajouter_bouteille)
    - [X] Modifier une transaction du cellier

### Administrateurs

- [X] Gérer les utilisateurs
    - [X] [Afficher tous les utilisateurs](https://e1995086.webdev.cmaisonneuve.qc.ca/vino/public/admin/)
    - [X] Créer un nouvel utilisateur ou administrateur
    - [X] Modifier un utilisateur (incluant le type)
    - [X] Supprimer un utilisateur
- [X] Gérer le catalogue
    - [X] [Afficher toutes les bouteilles](https://e1995086.webdev.cmaisonneuve.qc.ca/vino/public/admin/catalogue)
    - [X] Modifier une bouteille
    - [X] Ajouter une nouvelle bouteille
    - [X] Supprimer une bouteille
    - [X] [Afficher le catalogue de la SAQ](https://e1995086.webdev.cmaisonneuve.qc.ca/vino/public/admin/catalogue/saq)
        - [X] Recherche par page et par type de vin
        - [X] Importer une bouteille de la SAQ manuellement
        - [X] Importer les bouteilles de toute la page

## Démo

[Site web de la démo](https://e1995086.webdev.cmaisonneuve.qc.ca/vino/public)

Vous pouvez essayer les fonctionnalités en cliquant dessus dans la liste des fonctionnalités plus haute.

#### Comptes test

- utilisateur
    - email : user@test.com
    - mot de passe : "12345678"
- administrateur
    - email : admin@test.com
    - mot de passe : 12345678
    
## Installation en local

### Installation avec le script shell

#### Windows

Double cliquez sur l'icone du script `install-laravel.sh` qui se trouve à la racine de votre répertoire.
Vous pouvez aussi le lancer en ligne de commande avec les commandes : 
  
    > install-laravel.sh
ou 

    > .\install-laravel.sh`.

#### Linux

Faites la commande :
  
    > ./install-laravel.sh

---

Une fois le script exécuté, configurer votre fichier .env et faites la commande
    
    > php artisan migrate:fresh --seed
    
Lancer le serveur

    > php artisan serve
### Installation manuelle

1. Copiez le fichier .env.example et renommez le .env
2. Indiquez-y vos informations pour connecter votre base de données
3. Exécutez les commandes suivantes :

Pour installer les dépendances, si pas déjà fait, installer [Composer](https://getcomposer.org/download/) puis :

    > composer install

Générer le APP_KEY (encrypter les cookies) :

    > php artisan key:generate

Nettoyer le cache et les configues

    > php artisan cache:clear

    > php artisan config:clear

Générer la BDD avec des données test

    > php artisan migrate --seed

Lancer le serveur

    > php artisan serve
    
## Front-end

Les fichiers de vues se trouvent dans le dossier `/ressources/views`, les assets pré-compilés dans leurs sous-dossiers dans `/ressources` et les assets compilés se retrouve dans `/public`.

Si vous n'utilisez pas `npm`, Vous pouvez mettre vos fichiers HTML dans le dossier `/ressources/views` et vos fichiers CSS/JS et autres assets directement dans le dossier `/public`.

### Interface avec l'API

Dans le dossier `public/js/api` se trouve des classes javascript servant d'interface avec l'API.

### Composantes graphiques

Les scripts JavaScript pour gérer dynamiquement les données de certaines composantes graphiques se trouvent dans le dossier `public/js/composantes`.

### Gabarit

Le gabarit HTML qui encadre l'ensemble des pages du site web se trouve dans le fichier `ressources/views/layouts/app.blade.php`.

Les pages utilisent ce gabarit avec les commandes blade suivantes :

- `@extends("layouts.app")` : Appelle le gabarit.
- `@section("header")` : Section pour intégrer des balises supplémentaire dans la section `<head>`
- `@section("content")` : Contenu principal de la page qui est intégré dans la balise `<main>`
- `@endsection` : Cloture une section

## Routes
### Public

Les routes publiques se trouvent en grande partie dans le fichier routes/web.php

- `/` : Page d'Accueil
- `/login` : Écran de connexion
- `/register` : Écran de création de compte
- `/ajouter_bouteille` : Écran d'ajout de bouteille
- `/mon_compte` : Écran de modification du compte

- `/admin` : Page Admin - gestion des utilisateurs
- `/admin/catalogue` : Page Admin - gestion du catalogue
- `/admin/catalogue/saq` : Page Admin - gestion du catalogue SAQ

### API

Les routes de l'api se trouvent dans le fichier routes/api.php

#### users

- `GET`       - `api/utilisateurs`                   : Retourner tout les utilisateurs
- `GET`       - `api/utilisateurs/{id}`              : Retourner un utilisateur
- `GET`       - `api/utilisateurs/{id}/celliers`     : Retourner les celliers d'un utilisateur
- `POST`      - `api/utilisateurs`                   : Ajouter un utilisateur 
- `PUT`       - `api/utilisateurs/{id}`              : Modifier un utilisateur
- `DELETE`    - `api/utilisateurs/{id}`              : Supprimer un utilisateur

#### saq

- `GET`       - `api/saq`                            : Retourner les données de SAQ  
    - requêtes de recherche possibles (ex : `api/saq?type=blanc&page=2`) :
        - type : rouge | blanc | rose
            - Défaut : rouge
        - page : 1 et plus
            - Défaut : 1
- `POST`      - `api/saq`                            : Ajouter une bouteille de la SAQ

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

#### transactions

- `GET`       - `api/transactions/`                  : Retourne toutes les transactions liées aux bouteilles
- `GET`       - `api/transactions/{id}`              : Retourne une transaction liée à une bouteille
- `POST`      - `api/transactions/`                 : Ajouter une transaction liée à une bouteille
- `PUT`       - `api/transactions/{id}`              : Modifier une transaction liée à une bouteille dans un cellier
- `DELETE`    - `api/transactions/{id}`              : Supprimer une transaction liée à une bouteille dans un cellier

#### celliers/bouteilles

- `GET`       - `api/celliers/{id}/bouteilles`       : Retourner toutes les transactions liées aux bouteilles d'un cellier
- `GET`       - `api/celliers/{id}/bouteilles/{id}`  : Retourner les transactions liées à une bouteille d'un cellier
- `POST`      - `api/celliers/{id}/bouteilles`       : Enregistrer une transaction liée à une bouteille dans un cellier
