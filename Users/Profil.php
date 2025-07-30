

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
    <button>Déconnexion</button>
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

            function updateUser($pdo, $username, $email, $hash) {
                $stmt = $pdo->prepare('UPDATE users SET username = :username, email = :email, password_hash = :password WHERE id = :id');
                $stmt->execute([
                    'username' => $username,
                    'email' => $email,
                    'password' => $hash
                ]);
            }
            updateUser($pdo, $Nameuser, $email, $hash);

            echo"<br>";
            echo("$Nameuser, votre profil a bien été mis à jour");  // Message indiquant la réussite de la mise à jour du profil 
        }
    }

    // faire un update 
    // faire les vérifications "tester si le champs est remplis", hashage du nouveau mot de passe 


?>