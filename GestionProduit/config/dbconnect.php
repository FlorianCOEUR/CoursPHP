<?php
$host = 'localhost'; // Adresse du serveur MariaDB
$dbname = 'produit'; // Remplacez par le nom de votre base de données
$user = 'root'; // Remplacez par votre nom d'utilisateur
$password = ''; // Remplacez par votre mot de passe

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}