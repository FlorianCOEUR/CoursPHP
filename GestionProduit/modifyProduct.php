<?php
require 'config/dbconnect.php';
include 'produit.php';

if(isset($_POST["name"]) && isset($_POST["description"]) && isset($_POST["price"]) && isset($_POST["stock"])){
    $name=$_POST["name"];
    $desc=$_POST["description"];
    $price=$_POST["price"];
    $stock=$_POST["stock"];
    $id=$_POST["id"];
    $prod=new Produit($id, $db);
    $prod->setName($name);
    $query=$db->prepare('UPDATE produits SET description= :descr, prix= :prix, stock= :stock WHERE id= :id');
    $query->bindParam('descr', $desc);
    $query->bindParam('prix', $price);
    $query->bindParam('stock', $stock);
    $query->bindParam('id', $id);
    $query->execute();
    
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
</body>
</html>