<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
</head>
<body>

    <h1>Sign Up</h1>

    <form action="Inscription.php" method="POST">
        <input type="text" name="username" id="username" placeholder="username" required>
        <br><br>
        <input type="email" name="email" id="email" placeholder="email" required>
        <br><br>
        <input type="password" name="password" id="password" placeholder="password" required>
        <br><br>
        <select name="role" id="role">
            <option value="player">Player</option>
            <option value="organizer">organizer</option>
            <option value="admin">admin</option>
        </select>
        <br><br>
        <input type="submit" name="submit" id="submit" value="Sign up">
    </form>

</body>
</html>

<?php

    if (!empty($_POST['submit'])) {
        
        // On récup les éléments du formulaire (nom d'utilisateur, email, mot de passe et rôle)

        $Nameuser = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $role = $_POST['role'];

        // Je teste si tous les champs sont remplis 

        if (empty($Nameuser) || empty($email) || empty($password)) {
            echo"<br>";
            exit ("Tous les champs doivent être remplis");
        } else {

            //  hashé le mot de passe de l'utilisateur 

            $hash = password_hash($password, PASSWORD_DEFAULT);
            // echo "$hash";

            require_once('../config/config.php');  // Connexion à la base de données par config.php

            // Insertion de mes éléments dans la basse de donnée → table `users`
            
            $stmt = $pdo->prepare('INSERT INTO users(username, email, password_hash, role) VALUES (:username, :email, :password_hash, :role)');
            $stmt->execute([
                'username' => $Nameuser,
                'email' => $email,
                'password_hash' => $hash,
                'role' => $role
            ]);
             
            header('Location: Accueil.php');
            exit();
        }
    }
?>
