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
| US3 / US4 | Déconnexion / Modifier mon profil |   
| US4 | Créer une équipe |  
| US5 | Rejoindre une équipe |  

### Création des dossier et fichiers suivant 

## config 
##### config.php
- Connexion à la base de donnée 
- Serveur / Nom de la base de donnée / Nom du compte utilisateur / Mot de passe
- Création de la connexion PDO
- Try Catch pour gérer les erreur 

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
- Regroupement de tous les liens nécessaires une fois que l'inscription ou la connexion est réussie
- Profil.php
- CreeUneEquipe.php

##### Profil.php
- Formulaire contenant les champs `username`, `email` et `password` dont l'utilisateur pourra modifier ce qu'il souhaite 
- Je test si tous les champs du formulaire sont remplis avant l'insertion de mes nouveaux éléments dans la base de donnée
- Je hash a nouveaux mot de passe de l'utilisateur afin de garantir une nouvelle fois sa confidentialité
- Insertion de mes nouveaux éléments avec `UPDATE` (mettre à jour) dans la base de donnée → Table `users`
- Un bouton `Déconnexion` pour se déconnecter (À faire)

## Teams

##### CreerUneEquipe.php
- Formulaire contenant le champs `name` pour permettre à l'utilisateur de renseigner le nom de l'équipe 
- Récupération des éléments du formulaire
- Je teste si le champ du formulaire est rempli avant l'insertion de mon élément dans la base de données
- J'insert mon élément grâce à `INSERT INTO` dans ma base de donnée Table → `teams`