<?php
include 'produit.php';
require 'config/dbconnect.php';
$query=$db->prepare('SELECT * FROM produits');
$query->execute();
$products=$query->fetchALL();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de produits</title>
</head>
<body>
    <?php include 'header.php';?>
    <main>
    <?php
    foreach($products as $product):
        $prod=new Produit($product["id"], $db);
    ?>
        <div class="produit">
            <h3><?php echo $product["nom"]; ?></h3>
            <p> <?php echo $product["description"]; ?></p>
            <span> <?php echo $product["prix"];?></span>
            <span>Stock :  <?php echo $product["stock"];?></span>
            <form action="modify.php" method="post">
                <button type="submit" name="id" value="<?php echo $prod->getId();?>">Modifier</button>
            </form>
            <form action="commande.php" method="post">
                <label for="qteCmd">Combien en souhaitez-vous?</label>
                <input type="number" id="qteCmd" name="qteCmd" max="<?= $product["stock"]; ?>">
                <button type="submit" name="id" value="<?php echo $product["id"];?>">Commander</button>
            </form>
        </div>
    <?php endforeach;?>
    </main>
</body>
</html>