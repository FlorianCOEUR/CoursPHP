<?php
include 'header.php';
require 'db.php';


if(isset($_GET['id'])){
    $id = htmlspecialchars($_GET['id']);
}else{
    header('Location: index.php');
}
if(isset($_POST['name']) && $_POST['name']!='' &&
    isset($_POST['date']) && $_POST['date']!= ''&&
    isset($_POST['description']) && $_POST['description']!= ''
    ){
    $name = htmlspecialchars($_POST['name']);
    $date = htmlspecialchars($_POST['date']);
    $description = htmlspecialchars($_POST['description']);
    $event=$db->prepare('UPDATE items SET name=:name, date=:date, description=:description WHERE id=:id');
    $event->bindParam('name', $name);
    $event->bindParam('date', $date);
    $event->bindParam('description', $description);
    $event->bindParam('id', $id);
    $event->execute();
    header('Location:index.php');
}else{
    echo "Remplir tous les champs";
}
$event=$db->prepare('SELECT * FROM items WHERE id= :id');
$event->bindValue('id', $id);
$event->execute();
$event=$event->fetch(PDO::FETCH_ASSOC);
$date=new DateTime($event['date']);
$event['date']=$date->format('Y-m-d');
?>
<form action="editEvent.php?id=<?= $id?>" method="post">
    <label for="name">Name : </label>
    <input type="text" name="name" id="name" value="<?= $event['name']?>">
    <label for="date"> Date : </label>
    <input type="date" name="date" id="date" value="<?=$event['date']?>">
    <label for="description">Description : </label>
    <textarea name="description" id="description"><?= $event['description']?></textarea>
    <button type="submit">Modifier</button>
</form>