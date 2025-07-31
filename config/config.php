<?php

    // création de la connexion PDO

    $host = 'localhost';  // Serveur
    $dbname = 'esports';  // Nom de la base de donnée
    $username = 'competitions';  // Nom du compte utilisateur
    $password = '1234';  // Mot de passe

    try {

        // création de la connexion PDO

        $pdo = new PDO(
            "mysql:host=$host;dbname=$dbname;charset=utf8",
            $username, 
            $password,
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]  
        );
    } catch(PDOException $e){
        die("Erreur de connexion : ".$e->getMessage());
    }

?>