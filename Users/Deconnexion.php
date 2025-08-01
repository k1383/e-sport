<?php

    session_start();

    // Je vide toutes les variables de la session

    unset($_SESSION);

    // Je détruis toutes les données de la session  (session_destroy() détruit toutes les données associées à la session courante)

    session_destroy();

    header('Location: ../public/index.php');
    exit();
?>

