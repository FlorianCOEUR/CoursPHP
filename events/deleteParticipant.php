<?php
require 'db.php';


if (isset($_GET['id']) && $_GET['id'] != '') {
    $id = $_GET['id'];
} else {
    header('Location: index.php');
    exit;
}
$delete = $db->prepare('DELETE FROM items_users WHERE id_item= :id');
$delete->bindValue(':id', $id);
$delete->execute();

header('Location: show.php?id=' . $id);
