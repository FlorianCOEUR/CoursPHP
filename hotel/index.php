<?php
$host = 'localhost'; // Adresse du serveur MariaDB
$dbname = 'hotel'; // Remplacez par le nom de votre base de données
$user = 'root'; // Remplacez par votre nom d'utilisateur
$password = ''; // Remplacez par votre mot de passe

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connexion réussie !";
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue à l'hotel des coeurs Brisés</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
     <form action="resa.php" method="post">
        <div>
        <label for="user">Nom d'utilisateur : </label>
        <input type="text" name="user" id="user">
    </div>
    <div>
        <label for="mdp">Mot de passe : </label>
        <input type="password" name="mdp" id="mdp">
    </div>
    <input type="submit" value="Se connecter">
     </form>
</body>
</html>