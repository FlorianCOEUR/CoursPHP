<?php
require 'db.php';
require 'session.php';


if (isset($_GET['id'])) {
    $id = htmlspecialchars($_GET['id']);
} else {
    header('Location: index.php');
}
if (!isset($_SESSION['id'])) {
    header('Location: login.php');
    exit;
}
$user = $_SESSION['id'];
$participate = $db->prepare('SELECT COUNT(*) FROM items_users WHERE id_item=:item AND id_user=:user');
$participate->bindValue(':item', $id);
$participate->bindValue(':user', $user);
$participate->execute();
$participate = $participate->fetchColumn();
if ($participate > 0) {
    header('Location: index.php');
} else {
    $query = $db->prepare('INSERT INTO items_users (id_item, id_user) VALUES (:id_item, :id_user)');
    $query->bindParam(':id_item', $id);
    $query->bindParam(':id_user', $user);
    $query->execute();
    header('Location: index.php');
}