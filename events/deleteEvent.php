<?php
include 'header.php';
require 'db.php';


if (isset($_GET['id'])) {
    $id = htmlspecialchars($_GET['id']);
} else {
    header('Location: index.php');
}

$stmt = $db->prepare('DELETE FROM items WHERE id=:id');
$stmt->bindParam('id', $id);
$stmt->execute();
header('Location: index.php');
exit;