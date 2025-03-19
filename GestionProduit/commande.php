<?php
require 'config/dbconnect.php';

if(isset($_POST['qteCmd']) && $_POST['qteCmd']>0){
    $query=$db->prepare('SELECT * FROM produits WHERE id= :id');
    $query->bindValue('id', $_POST['id']);
    $query->execute();
    $produit=$query->fetch();
    if($produit['stock']>= $_POST['qteCmd']){
        $total= $produit['prix']*$_POST['qteCmd'];
        $query=$db->prepare('INSERT INTO commande (prix_total, date_cmd) VALUE (:prix, :date)');
        $query->bindValue('prix', $total);
        $query->bindValue('date', (new DateTime())->format('Y-m-d'));
        $query->execute();
        $query=$db->prepare('INSERT INTO produits_commande (Id_produits, id) VALUE (:idProd, :idCmd)');
        $query->bindValue('idProd', $_POST['id']);
        $query->bindValue('idCmd', $db->lastInsertId());
        $query->execute();
        $query=$db->prepare('UPDATE produits SET stock= :stock WHERE id= :id');
        $query->execute(['id'=>$_POST['id'], 'stock'=>$produit['stock']-$_POST['qteCmd']]);
    }else{
        header('location: index.php');
    }
}else{
    header('location: index.php');
}


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résumé de commande</title>
</head>
<body>
    <?php include 'header.php';?>
    <h2>Vous avez commandé : </h2>
    <h4><?= $produit['nom']; ?></h4>
    <p>Quantité : <?= $_POST['qteCmd'];?></p>
    <p>Total : <?= $total; ?> €</p>
</body>
</html>