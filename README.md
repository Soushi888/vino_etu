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
- [ ] Gérer son profil
    - [ ] Modifier son mot de passe
    - [ ] Modifier son nom et son prénom
    - [ ] Modifier son adresse courriel
- [ ] Gérer ses celliers
    - [X] [Afficher tous ses celliers](https://e1995086.webdev.cmaisonneuve.qc.ca/vino/public/)
    - [X] Afficher le contenu d'un cellier
    - [ ] Créer un nouveau cellier
    - [ ] Modifier le nom d'un cellier
    - [ ] Supprimer un cellier
- [ ] Gérer ses bouteilles
    - [ ] Afficher une bouteille du cellier
        - [ ] Historique des transactions
        - [ ] Quantité totale de bouteilles en stock
        - [ ] Notes écrites par l'utilisateur 
    - [ ] Boire une bouteille du cellier 
        - [ ] Quantité -1 
        - [ ] Possibilité d'écrire une note
    - [ ] Créer un modèle de bouteille personnalisé
    - [X] [Ajouter une ou plusieurs bouteilles à l'un de ses celliers](https://e1995086.webdev.cmaisonneuve.qc.ca/vino/public/ajouter_bouteille)
    - [ ] Modifier une transaction du cellier
    - [ ] Supprimer une transaction du cellier
- [ ] Consulter le catalogue
    - [ ] Afficher les bouteilles du catalogue
    - [ ] Afficher les bouteilles personnalisées
        - [ ] Supprimer une bouteille personnalisée
        - [ ] Modifier un modèle de bouteille personnalisée
    - [ ] Ajouter une bouteille à l'un de ses celliers
    - [ ] Signaler une erreur dans le catalogue

### Administrateurs

- [ ] Gérer son profil
    - [ ] Modifier son mot de passe
    - [ ] Modifier son nom et son prénom
    - [ ] Modifier son adresse courriel
- [ ] Gérer les utilisateurs
    - [X] [Afficher tous les utilisateurs](https://e1995086.webdev.cmaisonneuve.qc.ca/vino/public/admin/)
    - [ ] Afficher les détails d'un utilisateur
        - [ ] Historique des transactions
        - [ ] Bouteilles en stock
        - [ ] Notes écrites par l'utilisateur 
        - [ ] Bouteilles personnalisées
    - [ ] Créer un nouvel utilisateur ou administrateur
    - [ ] Modifier un utilisateur (incluant le type)
    - [X] Supprimer un utilisateur
- [ ] Gérer le catalogue
    - [X] [Afficher toutes les bouteilles](https://e1995086.webdev.cmaisonneuve.qc.ca/vino/public/admin/catalogue)
    - [ ] Afficher les détails d'une bouteilles
        - [ ] Liste des utilisateurs qui en possède une ou plusieurs unités
        - [ ] Liste des celliers dans lesquels elle se trouve
        - [ ] Nombre total d'unités présentent dans les celliers des utilisateurs
    - [ ] Afficher les bouteilles personnalisées des utilisateurs
    - [ ] Ajouter une nouvelle bouteille
    - [X] Supprimer une bouteille
    - [X] [Afficher le catalogue de la SAQ](https://e1995086.webdev.cmaisonneuve.qc.ca/vino/public/admin/catalogue/saq)
        - [X] Recherche par page et par type de vin
        - [X] Importer une bouteille de la SAQ manuellement
        - [X] Importer les bouteilles de toute la page
- [ ] Consulter les statistiques d'utilisation de l'Application
    - ...

## Démo

[Site web de la démo](https://e1995086.webdev.cmaisonneuve.qc.ca/vino/public)

Vous pouvez essayer les fonctionnalités en cliquant dessus dans la liste des fonctionnalités plus haute.

#### Compte test

- email : test@test.com
- mot de passe : "12345678"

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

## Routes
### Public

Les routes publiques se trouvent en grande partie dans le fichier routes/web.php

- `/` : Page d'Accueil
- `/login` : Écran de connexion
- `/register` : Écran de création de compte

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
