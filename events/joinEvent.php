<?php
include 'header.php';
require 'db.php';


if (isset($_GET['id'])) {
    $id = htmlspecialchars($_GET['id']);
} else {
    header('Location: index.php');
}
$user = 1;

$query = $db->prepare('INSERT INTO items_users (id_items, id_user) VALUES (:id_item, :id_dser)');
$query->bindParam(':id_item', $id);
$query->bindParam(':id_user', $user);
$query->execute();
header('Location: index.php');