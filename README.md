# Évaluation CP6 et CP7 
## Développer des composants d’accès aux données SQL et NoSQL + Développer des composants métier côté serveur

- GitHub : https://github.com/k1383/e-sport

### Création de la base de donnée 
- Utilisateur : competitions
- mot de passe : ****

### Création des dossier et fichiers suivant 

## config 
##### config.php

## public
##### index.php

## Users

##### Inscription.php
- Formulaire contenant les champs `username`, `email`, `password` et `role` pour permettre à l'utilisateur de créer un nom d'utilisateur, renseigner son email et son mot de passe, ainsi que la possibilité de choisir son rôle (player, organizer, admin). Player est le rôle par défaut
- Récupération des éléments de notre formulaire
- Je test si tous les champs du formulaire sont remplis avant l'insertion de mes éléments dans la base de donnée
- Je hash le mot de passe de l'utilisateur avant de l'insertion afin de garantir sa confidentialité 
- Insertion de mes éléments grâce a `INSERT INTO` dans la base de donnée → Table `users` (username, email, mot de passe hashé et rôle)

##### Connexion.php
- Formulaire contenant les champs `email` et `password` afin de se connecter
- Je vérifie que l'utilisateur a bien renseigner les champs du formulaire avant de continuer
- Récupération des éléments du formulaire afin de les comparer aux élements de la base de données
- ` password_verify()` retournera True si le hachage correspond ou False s'il ne correspond pas
- Je stock l'id de l'utilisateur connecté dans la sessions et je le réutilise dans la page Profil.php pour mettre à jour l'utilisateur
- Si le mot de passe est True, alors on arrive sur la page d'accueil
- Si le mot de passe ou l’email est incorrect, alors un message d’erreur apparaît

##### Profil.php
- Formulaire contenant les champs `username`, `email` et `password` dont l'utilisateur pourra modifier ce qu'il souhaite 
- Je test si tous les champs du formulaire sont remplis avant l'insertion de mes nouveaux éléments dans la base de donnée
- Je hash a nouveaux mot de passe de l'utilisateur afin de garantir une nouvelle fois sa confidentialité
- Insertion de mes nouveaux éléments avec `UPDATE` (mettre à jour) dans la base de donnée → Table `users`
- Un bouton `Déconnexion` pour se déconnecter (pas encore fait)

##### Accueil.php
- Regroupement de tous les liens nécessaires une fois que l'inscription ou la connexion est réussie