
<?php 

    // Modifier, mettre les tournois de l'utilisateur pas tous les tournois de la base de donnée

    session_start();

    require_once('../config/config.php');

    // Je récup les tournois de l'utilisateur

    $stmt = $pdo->prepare('SELECT name, game, description, start_date as debut, end_date as fin FROM tournaments');
    $stmt->execute();
    $tournois = $stmt->fetchAll();

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Tournois</title>
</head>
<body>
    <h1>Mes tournois</h1>

    <div class="table_component" role="region" tabindex="0">
        <table> 
                
            <thead>
                <tr>
                    <th>Nom du tournois</th>
                    <th>Jeux</th>
                    <th>description</th>
                    <th>Date de début</th>
                    <th>Date de fin</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>

                <?php foreach($tournois as $tournoi): ?>

                    <tr>
                        <td><?=$tournoi['name']?></td> 
                        <td><?=$tournoi['game']?></td> 
                        <td><?=$tournoi['description']?></td> 
                        <td><?=$tournoi['debut']?></td> 
                        <td><?=$tournoi['fin']?></td> 
                        <td><a href="../Tournaments/ModifierTournois.php">Modifier</a></td>                  
                    </tr>

                <?php endforeach; ?>  

            </tbody>

        </table> 
    </div>   

    <br> <br>
    <a href="../Users/Accueil.php">Retour à la page d'accueil</a>

</body>
</html>

<style>
.table_component {
    margin:auto;
    overflow: auto;
    width: 80%;
}
.table_component table {
    border: 1px solid #dededf;
    height: 100%;
    width: 100%;
    table-layout: fixed;
    border-collapse: collapse;
    border-spacing: 1px;
    text-align: left;
}
.table_component caption {
    caption-side: top;
    text-align: left;
}
.table_component th {
    border: 1px solid #dededf;
    background-color: #eceff1;
    color: #000000;
    padding: 5px;
    text-align: center;
}
.table_component td {
    border: 1px solid #dededf;
    background-color: #ffffff;
    color: #000000;
    padding: 5px;
    text-align: center;
}

</style>