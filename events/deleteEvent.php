<?php
include 'header.php';
require 'db.php';


if (isset($_GET['id'])) {
    $id = htmlspecialchars($_GET['id']);
} else {
    header('Location: index.php');
}

$envetJoined = $db->prepare('SELECT * FROM items_users WHERE id_item = :id');
$envetJoined->bindParam(':id', $id);
$envetJoined->execute();
$envetJoined = $envetJoined->fetchAll();
if (count($envetJoined) > 0) {
    echo "Vous ne pouvez pas supprimer un évènement qui a au moin sun utilisateur inscrit<br>";
    echo "<a href='show.php?id=" . $id . "'>Afficher les Partipants</a>";
    die;
}


$stmt = $db->prepare('DELETE FROM items WHERE id=:id');
$stmt->bindParam('id', $id);
$stmt->execute();
header('Location: index.php');
exit;