# Projet web final : Vino

## Introduction

Cecic est le projet web final des finissants du groupe 17612 de l'AEC en conception et programmation de sites web.

## Équipe

- Vladyslav Iefimov
- Christopher Parent-Paquette
- Samuel St-Jean
- Sacha Pignot

## Installation en local

1. Copiez le fichier .env.example et renommez le .env
2. Indiquez-y vos informations pour connecter votre base de données
3. Exécutez les commandes suivantes :

#### Bash

    $ composer install

    $ php artisan key:generate

    $ php artisan cache:clear

    $ php artisan config:clear

    $ php artisan migrate --seed

4. Pour travailler la partie front-end, vous avez besoins de node et de npm. Une fois les deux installés :

#### Bash

    $ npm install

    $ npm run watch

## Front-end

Les fichiers fichiers de vues se trouvent dans le dossier `/ressources/views`, les assets pré-compilés dans leurs sous-dossiers dans `/ressources` et les assets compilés se retrouve dans `/public`.

## API

Les routes de l'api se trouve dans le fichier routes/api.php

- `api/bouteilles` : Renvoie toutes les bouteilles
