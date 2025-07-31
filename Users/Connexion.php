<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log IN</title>
</head>
<body>
    
    <form action="Connexion.php" method="POST">
        <input type="email" name="email" id="email" placeholder="email" required>
        <br><br>
        <input type="password" name="password" id="password" placeholder="password" required>
        <br><br>
        <input type="submit" name="submit" id="submit" value="Log In">
    </form>

<?php

    require_once('../config/config.php');

    // Je vérifie si le formulaire a été soumis

    if (!empty($_POST['submit'])) {

        // On récup les éléments du formulaire 

        $email = $_POST['email'];
        $password = $_POST['password']; 

        $stmt = $pdo->prepare('SELECT id, password_hash FROM users WHERE email = :email');
        $stmt->execute(['email' => $email]);  // (https://www.php.net/manual/fr/pdo.prepare.php)
        $user = $stmt->fetch();

        // password_verify() retournera true si le hachage correspond, ou false s'il ne correspond pas.

        if ($user) {
            if (password_verify($password, $user['password_hash'])) {
                $_SESSION['user_id'] = $user['id'];  // Je stock l'id de l'utilisateur connecté dans la sessions et je le réutilise dans la page Profil.php pour mettre à jour l'utilisateur
                echo "<br>";
                header('Location: Accueil.php');
            exit();
            } else {
                echo "<br>";
                echo "Mot de passe incorrect";
            }
        } else {
            echo "<br>";
            echo "Email non trouvé";
        }
        echo "<br>";
        echo "<br>";
        echo '<a href="Profil.php">Profil</a><br>';

    }

?> 

</body>
</html>