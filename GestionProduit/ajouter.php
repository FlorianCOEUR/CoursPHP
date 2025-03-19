<?php

require 'config/dbconnect.php';
if(isset($_POST["name"]) && isset($_POST["description"]) && isset($_POST["price"]) && isset($_POST["stock"])){
    $name=$_POST["name"];
    $desc=$_POST["description"];
    $price=$_POST["price"];
    $stock=$_POST["stock"];
    $query=$db->prepare('INSERT INTO produits (nom, description, prix, stock) VALUES (:name, :desc, :price, :stock)');
    $query->bindParam('name', $name);
    $query->bindParam('desc', $desc);
    $query->bindParam('price', $price);
    $query->bindParam('stock', $stock);
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
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include 'header.php';?>
    <main>
        <form action="ajouter.php" method="post" class="produit">
            
                <label for="name">Indiquer le nom du produit : </label>
                <input type="text" name="name" id="name">
                <label for="description">Entrer une description du produit : </label>
                <input type="text" name="description" id="description">
                <label for="price">Entrer le prix du produit : </label>
                <input type="number" name="price" id="price" min="1">
                <label for="stock">Entrer le stock de votre produit : </label>
                <input type="number" name="stock" id="stock" min="0">
            <button type="submit">Ajouter</button>
        </form>
    </main>
</body>
</html>