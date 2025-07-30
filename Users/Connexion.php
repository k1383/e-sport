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
            echo "Bienvenue $email<br><br>";
        } else {
            echo "Mot de passe incorrect";
        }
    } else {
        echo "Email non trouvé";
    }

?>