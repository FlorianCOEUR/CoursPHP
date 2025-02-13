<?php
$cars = [
    [
        "marque" => "Toyota",
        "modele" => "Corolla",
        "couleur" => "Rouge",
        "prix" => 20000
    ],
    [
        "marque" => "Ford",
        "modele" => "Focus",
        "couleur" => "Bleu",
        "prix" => 18000
    ],
    [
        "marque" => "BMW",
        "modele" => "Série 3",
        "couleur" => "Noir",
        "prix" => 35000
    ],
    [
        "marque" => "Audi",
        "modele" => "A4",
        "couleur" => "Blanc",
        "prix" => 40000
    ],
    [
        "marque" => "Tesla",
        "modele" => "Model 3",
        "couleur" => "Gris",
        "prix" => 45000
    ]
];

$length = count($cars);
for ($i = 0; $i < $length - 1; $i++) {
    for ($j = 0; $j < $length - $i - 1; $j++) {
        if ($cars[$j]["prix"] > $cars[$j + 1]["prix"]) {
            $temp = $cars[$j];
            $cars[$j] = $cars[$j + 1];
            $cars[$j + 1] = $temp;
        }
    }
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau des Voitures - Trié par Prix</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>

    <h1>Liste des Voitures Triées par Prix</h1>

    <table>
        <thead>
            <tr>
                <th>Marque</th>
                <th>Modèle</th>
                <th>Couleur</th>
                <th>Prix (€)</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Afficher les données triées par prix
            foreach ($cars as $car) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($car["marque"]) . "</td>";
                echo "<td>" . htmlspecialchars($car["modele"]) . "</td>";
                echo "<td>" . htmlspecialchars($car["couleur"]) . "</td>";
                echo "<td>" . number_format($car["prix"], 2, ',', ' ') . " €</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    <div class="back-link">
        <a href="index.php">Retour au menu</a>
    </div>

</body>
</html>
