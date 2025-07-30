<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log IN</title>
</head>
<body>
    
    <form action="#" method="POST">
        <input type="email" name="email" id="email" placeholder="email" required>
        <input type="password" name="password" id="password" placeholder="password" required>
        <input type="submit" name="submit" id="submit" value="Log In">
    </form>

</body>
</html>


<?php

    require_once('../config/config.php');

    //  On recup les éléments du formulaire 

    $email = $_POST['email'];
    $password = $_POST['password']; 

    $stmt = $pdo->prepare('SELECT password_hash FROM users WHERE email = :email');

    $stmt->execute(['email' => $email]);  // (https://www.php.net/manual/fr/pdo.prepare.php)
    $user = $stmt->fetch();

    if ($user) {
        if (password_verify($password, $user['password_hash'])) {
            echo "<br>";
            echo "Bienvenue $email<br><br>";
        } else {
            echo "Mot de passe incorrect";
        }
    } else {
        echo "Email non trouvé";
    }

?>