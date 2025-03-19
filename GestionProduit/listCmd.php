<?php

require ('config/dbconnect.php');
$query=$db->prepare('SELECT * FROM commande ORDER BY date_cmd DESC');
$query->execute();
$commandes=$query->fetchAll();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include("header.php"); ?>
    <main>
        <?php foreach($commandes as $row): ?>
            <?php 
            $query=$db->prepare('SELECT * FROM produits p JOIN produits_commande pc ON pc.Id_produits=p.id JOIN commande c ON c.id=pc.id WHERE c.id = :id');
            $query->execute(['id'=>$row['id']]);
            $produit=$query->fetch();
            ?>
            <div class="commande">
                <h4><?= $produit['nom']; ?></h4>
                <p>Quantité : <?= $row["prix_total"]/$produit['prix'];?></p>
                <p>Total : <?= $row["prix_total"]; ?> €</p>
                <p>Le : <?= (new DateTime($row['date_cmd']))->format('d/m/y')?></p>
            </div>
        <?php endforeach;?>
    </main>
</body>
</html>