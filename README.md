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

Pour installer les dépendances :

    $ composer install

Générer le APP_KEY (encrypté les cookies) :

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

- `api/bouteilles` : Renvoie toutes les bouteilles
