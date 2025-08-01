# Évaluation CP6 et CP7 
## Développer des composants d’accès aux données SQL et NoSQL + Développer des composants métier côté serveur

- GitHub : https://github.com/k1383/e-sport

### Création de la base de donnée 

- Création de la base de données à l'aide du fichier donné par le formateur, rangé dans `BDD.sql`
- Lancer le serveur Wamp / clic droit sur l'icône dans la barre des tâches, "phpMyAdmin" / Utilisateur : root, sans mot de passe / Création de la base de données `esports` avec toutes les tables nécessaires / Accueil / Comptes utilisateurs / "Ajouter un compte utilisateur" / "Nom d'utilisateur" = competitions, "Mot de passe" = **** / Base de données / Éditer les privilèges / Privilèges globaux : tout cocher / Se déconnecter et se reconnecter avec les identifiants.
- Utilisateur : competitions
- mot de passe : ****

### User Stories

| US1 | Création de compte | 
| :--------------- |:---------------:| 
| US2 | Connexion |  
| US3 | Déconnexion | 
| US4 | Modifier mon profil |   
| US5 | Créer une équipe |  
| US6 | Rejoindre une équipe |  
| US7 | Gérer les membres de mon équipe |
| US8 | Créer un tournoi |
| US9 | Modifier un tournoi |

### Création des dossier et fichiers suivant 

## config 
##### config.php
- Connexion à la base de donnée 
- Serveur / Nom de la base de donnée / Nom du compte utilisateur / Mot de passe
- Création de la connexion PDO
- Try Catch pour gérer les erreur de connexion 

## public
##### index.php
- Première page pour les utilisateurs 
- Deux boutons (Inscription / Connexion)

## Users

##### Inscription.php
- Formulaire contenant les champs `username`, `email`, `password` et `role` pour permettre à l'utilisateur de créer un nom d'utilisateur, renseigner son email et son mot de passe, ainsi que la possibilité de choisir son rôle (player, organizer, admin). Player est le rôle par défaut
- Récupération des éléments de notre formulaire
- Je test si tous les champs du formulaire sont remplis avant l'insertion de mes éléments dans la base de donnée
- Je hash le mot de passe de l'utilisateur avant de l'insertion afin de garantir sa confidentialité 
- Insertion de mes éléments grâce à `INSERT INTO` dans ma base de donnée → Table `users` (username, email, mot de passe hashé et rôle)

##### Connexion.php
- Formulaire contenant les champs `email` et `password` afin de se connecter
- Je vérifie que l'utilisateur a bien renseigner les champs du formulaire avant de continuer
- Récupération des éléments du formulaire afin de les comparer aux élements de la base de données
- ` password_verify()` retournera True si le hachage correspond ou False s'il ne correspond pas
- Je stock l'id de l'utilisateur connecté dans la sessions et je le réutilise dans la page Profil.php pour mettre à jour l'utilisateur
- Si le mot de passe est True, alors on arrive sur la page d'accueil
- Si le mot de passe ou l’email est incorrect, alors un message d’erreur apparaît

##### Accueil.php
- Regroupement de tous les liens nécessaires une fois que l'inscription ou la connexion est réussie selon le rôle de l'utilisateur 
- Tous les joueurs, organisateurs, administrateurs peuvent modifier leur profil, créer une équipe et rejoindre une équipe  
  - Profil.php
  - Déconnexion.php (Formulaire avec un bouton "Se déconnecter")
  - CreeUneEquipe.php
  - RejoindreUneEquipe.php

##### Profil.php
- Formulaire contenant les champs `username`, `email` et `password` dont l'utilisateur pourra modifier ce qu'il souhaite 
- Je test si tous les champs du formulaire sont remplis avant l'insertion de mes nouveaux éléments dans la base de donnée
- Je hash a nouveaux mot de passe de l'utilisateur afin de garantir une nouvelle fois sa confidentialité
- Insertion de mes nouveaux éléments avec `UPDATE` (mettre à jour) dans la base de donnée → Table `users`

##### Déconnexion.php
- Un bouton `Déconnexion` pour se déconnecter  
- Je lance `session_start` pour utiliser les données de session  
- Je vide toutes les variables de la session avec `unset($_SESSION)`  
- Je détruis toutes les données de la session courante avec `session_destroy()`  
- À l'aide du site [Stack Overflow / Déconnecter un utilisateur](https://stackoverflow.com/questions/17949713/how-to-logout-a-user-in-php#:~:text=In%20your%20script%20to%20log,php%20you%20have%20shown%20above.)

## Teams

##### CreerUneEquipe.php
- Formulaire contenant le champs `name` pour permettre à l'utilisateur de renseigner le nom de l'équipe 
- Récupération des éléments du formulaire
- Je teste si le champ du formulaire est rempli avant l'insertion de mon élément dans la base de données
- J'insert mon élément grâce à `INSERT INTO` dans ma base de donnée → Table `teams`

##### RejoindreUneEquipe.php
- J'affiche tous les équipes disponible dans ma base de donnée (noms d’équipes et les dates de création) de la table `teams` sous forme de tableau pour afficher toutes les équipe
- Je fais une boucle foreach pour afficher toutes les équipes ainsi que leur date de création
- J'ajoute un lien "Rejoindre" pour que les utilisateur puise rejoindre une équipe → MonEquipe.php (À finir)

##### MonEquipe.php
- J'affiche l'équipe que l'utilisateur vient de rejoindre, ainsi que la liste de tous ses membres (À faire)
- Le capitaine a la possibilité d'ajouter ou de supprimer des membres (À faire)

##### À finir ↓
## Tournaments

##### CreerUnTournois.php
- Formaulaire contenant les champs `name`, `game`, `description`, `start_date` et `end_date` afin de créer un tournoi
- Vérification de mes champs afin de tous prendre en compte 
- Insertion de mes éléments dans ma base de donnée → Table `tournaments` (À finir)

##### MesTournois.php
- Affichage des tournois de l'utilisateur avec son id (À finir)
- Liens "modifier" pour modifier les information du tournois → ModifierTournois.php

##### ModifierTournois.php
- Formulaire contenant les champs `name`, `game`, `description`, `start_date` et `end_date` afin de mettre à jour n'importe quel information concernant le tournois
- Insertion de mes nouveaux éléments avec `UPDATE` (mettre à jour) dans la base de donnée → Table `tournaments`