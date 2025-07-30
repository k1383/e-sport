# Évaluation CP6 et CP7 
## Développer des composants d’accès aux données SQL et NoSQL + Développer des composants métier côté serveur

- GitHub : https://github.com/k1383/e-sport

### Création de la base de donnée 
- Utilisateur : competitions
- mot de passe : ****

### Création des dossier et fichiers suivant 
- config 
→ config.php
- public
→ index.php
## Users
### Inscription.php
- Formulaire contenant les champs `username`, `email`, `password` et `role` pour permettre à l'utilisateur de créer un nom d'utilisateur, renseigner son email et son mot de passe, ainsi que la possibilité de choisir son rôle (player, organizer, admin). Player est le rôle par défaut
- Récupération des éléments de notre formulaire
- Je test si tous les champs du formulaire sont remplis avant l'insertion de mes éléments dans la base de donnée
- Je hash le mot de passe de l'utilisateur avant de l'insertion afin de garantir sa confidantialité 
- Insertion de mes éléments dans la base de donnée → Table `users` (username, email, mot de passe hashé et rôle)


→ Connexion.html
(Formulaire contenant les champs email et mot de passe afin de se connecter)
→ Connexion.php
(Récupération des éléments du formulaire afin de comparer aux éléments de la base de données pour pouvoir se connecter et afficher un message en fonction de la connexion réussie ou non.
password_verify() retournera true si le hachage correspond, ou false s'il ne correspond pas.
Si le mot de passe est true, alors un message de bienvenue apparaît.
Si le mot de passe ou l’email est incorrect, alors un message d’erreur apparaît).
