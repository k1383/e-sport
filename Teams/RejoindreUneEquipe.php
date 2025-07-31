<?php 
    session_start();

    require_once('../config/config.php');

    // Je récup les noms des équipes et la date de création dans la table `teams`

    $stmt = $pdo->prepare('SELECT name as NomEquipe,  created_at as date FROM teams ');
    $stmt->execute();
    $equipes = $stmt->fetchAll();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Rejoindre une équipe</title>
</head>
<body>
        <h1>Rejoindre une équipe</h1>

        <div class="table_component" role="region" tabindex="0">
            <table> <!-- Ouverture du tab -->
                    
                <thead>
                    <tr>
                        <th>Nom de l'équipe</th>
                        <th>Date de création de l'équipe</th>
                        <th>Rejoindre une équipe</th>
                    </tr>
                </thead>

                <tbody>

                    <?php foreach($equipes as $equipe): ?>

                        <tr>
                            <td><?=$equipe['NomEquipe']?></td> 
                            <td><?=$equipe['date']?></td>
                            <td><a href="">Rejoindre</a></td>                  
                        </tr>

                    <?php endforeach; ?>  

                </tbody>

            </table> <!-- Fermeture du tab -->
        </div>   

        <br>
        <br>
        <a href="../Users/Accueil.php">Retour à la page d'accueil</a>

</body>
</html>