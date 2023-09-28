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

Note : Si la création d'un administrateur ou d'un utilisateur ne fonctionne pas, suivez les étapes ci-dessous :

Création manuelle d'un utilisateur administrateur :

Accédez au fichier de configuration config/packages/security.yaml.

Commentez la ligne (ligne 37) :
- { path: ^/admin, roles: ROLE_ADMIN } -> //- { path: ^/admin, roles: ROLE_ADMIN }
Dans votre navigateur, saisissez l'URL suivante : http://localhost:8000/admin Cela vous redirigera vers l'interface administrateur, mais sans un profil administrateur actif.

Cliquez sur le menu "Ajouter un employé", remplissez le formulaire avec votre email et votre mot de passe, puis validez. Cela créera votre premier utilisateur.

Retournez à http://localhost:8000/admin, puis accédez à la section "Les utilisateurs". Modifiez l'utilisateur que vous venez de créer en lui attribuant le rôle 'Administrateur' ou 'ROLE_ADMIN'.

Une fois ces étapes réalisées, retournez au fichier de configuration config/packages/security.yaml.

Décommentez la ligne que vous aviez précédemment commentée (ligne 37) : 
//- { path: ^/admin, roles: ROLE_ADMIN } -> - { path: ^/admin, roles: ROLE_ADMIN }
Vous pouvez désormais vous connecter à votre compte en utilisant le bouton "Login" situé dans le footer. Une fois connecté, essayez d'accéder à votre espace administrateur via http://localhost:8000/admin

Utilisation : 
Lancer le serveur de développement Symfony
$ symfony server:start

Accéder à l'application
Ouvrez votre navigateur et naviguez vers http://localhost:8000.

Accéder à l'espace d'administration
Naviguez vers http://localhost:8000/admin et utilisez vos identifiants administrateur pour vous connecter.
