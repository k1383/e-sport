<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer une équipe</title>
</head>
<body>

    <h1>Créer une équipe</h1>

    <form action="#" method="POST">
        <input type="text" id="text" name="text" placeholder="Name of teams"><br><br>
        <input type="submit" name="submit" value="Créer Une équipe"><br><br>
        <a href="../Users/Accueil.php">Retour à la page d'accueil</a><br><br>
    </form>

</body>
</html>

<?php

    if(!empty($_POST['submit'])) {

        // On récup les élémetns du formulaire (Nom de l'équipe)

        $NameTeams = $_POST['text'];

        // Je teste si le champ est rempli avant de l'inserer dans ma base de donnée

        if(empty($NameTeams)) {
            echo "<br>";
            echo "Le nom de l'équipe doit être rempli";
        } else {

            // Insertion de mon éléments avec INSERT INTO dans ma base de donnée
            
            require_once('../config/config.php');
            
            $stmt = $pdo->prepare('INSERT INTO teams(name) VALUES (:name)');
            $stmt->execute([
                'name' => $NameTeams
            ]);

            echo "<br>";
            echo "Création de l'équipe $NameTeams, vous êtes désormais le capitaine<br><br>"; 
        }
        
    }

?>