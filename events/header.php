<?php
include("session.php");
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion d'évènements</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="event.php">Ajouter</a></li>
                <?php
                if (!isset($_SESSION['id'])) {
                    ?>
                    <li><a href="register.php">S'incrire</a></li>
                    <li><a href="login.php">Se connecter</a></li>
                <?php } else { ?>
                    <li><a href="logout.php">Se déconnecter</a> Bonjour <?= $_SESSION['email'] ?></li>
                <?php } ?>
            </ul></a>
        </nav>
    </header>
    <main>