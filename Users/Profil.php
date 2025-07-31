<?php 
    session_start();  // Chaque utilisateur connecté aure ses propres données de sessions, indépendammment des autres 
     /*  les sessions 
        pour utiliser les sessions, vous devez ABSOLUMENT déclarer une fois par page : 
        session_start()

        cette fonction permet de dire à votre programme que vous allez utiliser les sessions 
        ATTENTION : le déclaration du début doit se faire AVANT TOUT CODE HTML 
    */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
</head>
<body>
    <h1>Mon profil</h1>

    <p>Modifier mon profil</p>

    <form action="#" method="POST">
        <input type="text" name="username" id="username" placeholder=" Update username" required>
        <br><br>
        <input type="email" name="email" id="email" placeholder="Update email" required>
        <br><br>
        <input type="password" name="password" id="password" placeholder="Update password" required>
        <br><br>
        <input type="submit" name="submit" id="submit" value="Mettre à jour mon profil">
    </form>
    <br><br>
    <button><a href="../public/index.php">Déconnexion</a></button>
    <br><br>
    <a href="../Users/Accueil.php">Retour à la page d'accueil</a>
</body>
</html>

<?php

    // Je vérifie si le formulaire a été soumis

    if (!empty($_POST['submit'])) {

        // On récup les éléments du formulaire pour le mettre à jour par la suite 

        $Nameuser = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Je teste si tous les champs sont remplis 

        if (empty($Nameuser) || empty($email) || empty($password)) {
            echo"<br>";
            exit ("Tous les champs doivent être remplis");
        } else {

            //  hashé le mot de passe de l'utilisateur 

            $hash = password_hash($password, PASSWORD_DEFAULT);
            // echo "$hash";

            require_once('../config/config.php');

            // Insertion de mes éléments mis à jour par l'utilisateur dans la basse de donnée → table `users`

            
                $stmt = $pdo->prepare('UPDATE users SET username = :username, email = :email, password_hash = :password_hash WHERE id = :id');
                $stmt->execute(array(
                    'username' => $Nameuser,
                    'email' => $email,
                    'password_hash' => $hash,
                    'id' =>  $_SESSION['user_id']
                ));

            echo"<br>";
            echo"<br>";
            echo("$Nameuser, votre profil à bien été mis à jour");  // Message indiquant la réussite de la mise à jour du profil  
        }
    }

?>