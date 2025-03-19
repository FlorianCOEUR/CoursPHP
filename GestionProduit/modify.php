<?php
require 'config/dbconnect.php';
if (isset($_POST["id"])){
    $query=$db->prepare('SELECT * FROM produits WHERE id= :id');
    $query->bindParam("id", $_POST["id"]);
    $query->execute();
    $produit=$query->fetch();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification du produit <?php echo $produit["nom"]?></title>
</head>
<body>
    <header>
        <a href="ajouter.php">Ajouter un produit</a>
    </header>
    <main>
        <form action="modifyProduct.php" method="post" class="produit">
            <div>
                <label for="name">Indiquer le nom du produit : </label>
                <input type="text" name="name" id="name" value="<?php echo $produit["nom"]; ?>">
            </div>
            <div>
                <label for="description">Entrer une description du produit : </label>
                <input type="text" name="description" id="description" value="<?php echo $produit["description"]; ?>">
            </div>
            <div>
                <label for="price">Entrer le prix du produit : </label>
                <input type="number" name="price" id="price" min="1" value="<?php echo $produit["prix"]; ?>">
            </div>
            <div>
                <label for="stock">Entrer le stock de votre produit : </label>
                <input type="number" name="stock" id="stock" min="0" value="<?php echo $produit["stock"]; ?>">
            </div>
            <button type="submit" name="id" value="<?php echo $_POST["id"];?>">Modifier</button>
        </form>
    </main>
        
</body>
</html>
