<?php
$host = 'localhost'; // Adresse du serveur MariaDB
$dbname = 'hotel'; // Remplacez par le nom de votre base de données
$user = 'root'; // Remplacez par votre nom d'utilisateur
$password = ''; // Remplacez par votre mot de passe
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}

session_start();

function fidelity(){
    global $pdo;
    $fidel=($pdo->query("SELECT has_fidelity FROM user WHERE id=".$_SESSION["user_id"]))->fetch(PDO::FETCH_ASSOC);
    return $fidel["has_fidelity"];
}
function options(){
    global $pdo;
    $option=($pdo->query("SELECT * FROM opt_in"))->fetchAll(PDO::FETCH_ASSOC);
    return $option;
}
function rooms(){
    global $pdo;
    $option=($pdo->query("SELECT * FROM room"))->fetchAll(PDO::FETCH_ASSOC);
    return $option;
}
function roomBook($idRoom){
    global $pdo;
    $price=($pdo->query("SELECT * FROM room WHERE id=".$idRoom))->fetch(PDO::FETCH_ASSOC);
    return $price;
}
?>