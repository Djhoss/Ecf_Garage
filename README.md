# Ecf_Garage

Projet Garage Automobile
Description
Le Projet Garage Automobile est une application web conçue pour gérer une gamme de voitures, leurs caractéristiques, des témoignages de clients, et plus encore. Il a été construit en utilisant le framework PHP Symfony.

Prérequis
PHP >= 8.2 / 7.4
Composer
Symfony CLI
Serveur MySQL

Installation
Cloner le dépôt
$ git clone https://github.com/votre-nom-utilisateur/projet-garage.git

Naviguer dans le dossier du projet
$ cd projet-garage

Installer les dépendances avec Composer
$ composer install

Configurer la base de données

Ouvrez le fichier .env et modifiez la ligne commençant par DATABASE_URL pour y mettre vos informations de connexion à la base de données.
Créer la base de données
$ symfony console doctrine:database:create

Effectuer les migrations pour créer les tables
$ symfony console doctrine:migrations:migrate

Création d'un utilisateur administrateur
Créer un utilisateur
Vous pouvez utiliser la commande suivante pour créer un nouvel utilisateur :
$ symfony console app:create-user votre-email@example.com votreMotDePasse

Promouvoir l'utilisateur en tant qu'administrateur
$ symfony console app:promote-admin votre-email@example.com

Utilisation
Lancer le serveur de développement Symfony
$ symfony server:start

Accéder à l'application
Ouvrez votre navigateur et naviguez vers http://localhost:8000.

Accéder à l'espace d'administration
Naviguez vers http://localhost:8000/admin et utilisez vos identifiants administrateur pour vous connecter.
