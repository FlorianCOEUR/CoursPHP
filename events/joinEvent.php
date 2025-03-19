<?php
include 'header.php';
require 'db.php';


if (isset($_GET['id'])) {
    $id = htmlspecialchars($_GET['id']);
} else {
    header('Location: index.php');
}
$user = 2;

$query = $db->prepare('INSERT INTO items_users (id_item, id_user) VALUES (:id_item, :id_user)');
$query->bindParam(':id_item', $id);
$query->bindParam(':id_user', $user);
$query->execute();
header('Location: index.php');