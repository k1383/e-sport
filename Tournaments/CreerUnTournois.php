<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un tournois</title>
</head>
<body>

    <h1>Créer un tournois</h1>

    <form action="#" method="POST">
        <input type="text" name="name" id="name" placeholder="name of tournament" required>
        <br><br>
        <input type="text" name="game" id="game" placeholder="game" required>
        <br><br>
        <textarea name="description" id="description" placeholder="Description of tournament" required></textarea>        
        <br><br>
        <label for="start_date">Start date :</label>
        <input type="date" id="start_date" name="start_date" min="2025-08-01" required> 
        <br><br>
        <label for="end_date">End date :</label>
        <input type="date" id="end_date" name="end_date" min="2025-08-01" required>
        <br><br>
        <input type="submit" name="submit" id="submit" value="Créer le tournois">
    </form>
    <br><br>
    <a href="../Users/Accueil.php">Retour à la page d'accueil</a>

</body>
</html>

<?php

    if (!empty($_POST['submit'])) {

        // On récup les élement du formualaire

        $nameoftournament = $_POST['name'];
        $game = $_POST['game'];
        $description = $_POST['description'];
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];

       if(empty($nameoftournament) || empty($game) || empty($description) || empty($start_date) || empty($end_date)) {
            echo "<br>";
            exit ("Tous les champs doivent être remplis");
        } else {
            require_once('../config/config.php');

            $stmt = $pdo->prepare('INSERT INTO tournaments(name, game, description, start_date, end_date) VALUES (:name, :game, :description, :start_date, :end_date)');
            $stmt->execute([
                'name' => $nameoftournament,
                'game' => $game,
                'description' => $description,
                'start_date' => $start_date,
                'end_date' => $end_date
            ]);
        }
    }
?>