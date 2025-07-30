<?php

    $host = 'localhost';
    $dbname = 'esports';  
    $username = 'competitions';  
    $password = '1234'; 

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