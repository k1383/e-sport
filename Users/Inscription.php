<?php

    // On récup les éléments du formulaire

    $Nameuser = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    echo"Bienvenue $Nameuser";


    //  hashé le mot de passe de l'utilisateur 

    $hash = password_hash($password, PASSWORD_DEFAULT);
    // echo "$hash";

    require_once('../config/config.php');

    function addUser ($pdo, $Nameuser, $email, $hash, $role) {
        $stmt = $pdo->prepare('INSERT INTO users(username, email, password_hash, role) VALUES (:username, :email, :password_hash, :role)');
        $stmt->execute([
            'username' => $Nameuser,
            'email' => $email,
            'password_hash' => $hash,
            'role' => $role
        ]);
    }
    addUser($pdo, $Nameuser, $email, $hash, $role)

?>