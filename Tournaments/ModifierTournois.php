<?php 
    session_start(); 
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification Tournois</title>
</head>
<body>
    <h1>Modifier les information du tournois</h1>

    <form action="#" method="POST">
        <input type="text" name="name" id="name" placeholder=" Update name of tournament" required>
        <br><br>
        <input type="text" name="game" id="game" placeholder=" Update game" required>
        <br><br>
        <textarea name="description" id="description" placeholder="Update description of tournament" required></textarea>        
        <br><br>
        <label for="start_date">Start date update :</label>
        <input type="date" id="start_date" name="start_date" min="2025-08-01" required> 
        <br><br>
        <label for="end_date">Start end update :</label>
        <input type="date" id="end_date" name="end_date" min="2025-08-01" required>
        <br><br>
        <input type="submit" name="submit" id="submit" value="Mettre à jour">
    </form>
    <br><br>
    <a href="../Users/Accueil.php">Retour à la page d'accueil</a>
</body>
</html>

<?php

    // Je vérifie si le formulaire à été fournis

    if(!empty($_POST['submit'])) {

        // On récup nos éléments du formulaire pour faire la mise à jour 

        $nameoftournament = $_POST['name'];
        $game = $_POST['game'];
        $description = $_POST['description'];
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];

        if(empty($nameoftournament) || empty($game) || empty($description) || empty($start_date) || empty($end_date)) {
            echo"<br>";
            exit ("Tous les champs doivent être remplis");
        } else {

            require_once('../config/config.php');

            $stmt = $pdo->prepare('UPDATE tournaments SET name = :name, game = :game, description = :description, start_date = :start_date,  end_date = :end_date');
            $stmt->execute(array(
                'name' => $nameoftournament,
                'email' => $game,
                'description' => $description,
                'start_date' => $start_date,
                'end_date' => $end_date
            ));

            echo"<br>";
            echo"<br>";
            echo"Mise à jour du tournois";
        }
    }

?>