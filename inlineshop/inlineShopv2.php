<?php
$commandes = [
    ["articles" => [
        ["nom" => "Ordinateur portable", "prix" => 800, "quantite" => 1],
        ["nom" => "Souris sans fil", "prix" => 25, "quantite" => 2],
    ]],
    ["articles" => [
        ["nom" => "Clavier mécanique", "prix" => 100, "quantite" => 1],
        ["nom" => "Écran 24 pouces", "prix" => 200, "quantite" => 1],
        ["nom" => "Casque audio", "prix" => 50, "quantite" => 1],
    ]],
    ["articles" => [
        ["nom" => "Tablette 10 pouces", "prix" => 300, "quantite" => 1],
        ["nom" => "Clé USB 64Go", "prix" => 15, "quantite" => 3],
    ]],
    ["articles" => [
        ["nom" => "Imprimante laser", "prix" => 150, "quantite" => 1],
        ["nom" => "Ramette de papier", "prix" => 5, "quantite" => 10],
    ]],
    ["articles" => [
        ["nom" => "Onduleur", "prix" => 120, "quantite" => 1],
        ["nom" => "Multiprise parafoudre", "prix" => 30, "quantite" => 2],
    ]],
    ["articles" => [
        ["nom" => "Télescope", "prix" => 500, "quantite" => 1],
        ["nom" => "Guide d’astronomie", "prix" => 40, "quantite" => 1],
    ]],
    ["articles" => [
        ["nom" => "Colle", "prix" => 5, "quantite" => 6],
        ["nom" => "Feuille A4 500 pages", "prix" => 6, "quantite" => 6],
    ]],
];
function freeShip($price) {
    return $price >= 100;
}

function sortCmd($total) {
    if ($total < 100) return "Petite Commande";
    if ($total < 500) return "Moyenne Commande";
    return "Grosse Commande";
}

function reduction($total){
    if($total>=500){
        return 20;
    }elseif($total>=200){
        return 10;
    }else{
        return 0;
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Commandes</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <h1>Liste des Commandes</h1>
    <div class="container">
        <table>
            <tr>
                <th>#</th>
                <th>Articles</th>
                <th>Total</th>
                <th>Réduction</th>
                <th>Total Final</th>
                <th>Type</th>
                <th>Frais de Livraison</th>
            </tr>
            <?php foreach ($commandes as $index => $commande):
                $total = 0;
                foreach ($commande["articles"] as $article) {
                    $total += $article["prix"] * $article["quantite"];
                }
                $reduction = reduction($total);
                $totalFinal = $total * (1 - $reduction / 100);
                $type = sortCmd($total);
                $fraisLivraison = freeShip($total) ? "✅" : "💩";
                ?>
                <tr>
                    <td><?php echo $index + 1; ?></td>
                    <td>
                        <?php foreach ($commande["articles"] as $article): ?>
                            <?php echo "{$article["quantite"]}x {$article["nom"]} ({$article["prix"]}€)<br>"; ?>
                        <?php endforeach; ?>
                    </td>
                    <td><?php echo number_format($total, 2, ',', ' '); ?> €</td>
                    <td><?php echo $reduction; ?>%</td>
                    <td><?php echo number_format($totalFinal, 2, ',', ' '); ?> €</td>
                    <td><?php echo $type; ?></td>
                    <td><?php echo $fraisLivraison; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <div class="back-link">
        <a href="index.php">Retour au menu</a>
    </div>
</body>
</html>
