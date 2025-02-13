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
$cars2 = [
    [
        "marque" => "Mercedes",
        "modele" => "Classe C",
        "couleur" => "Argent",
        "prix" => 42000
    ],
    [
        "marque" => "Honda",
        "modele" => "Civic",
        "couleur" => "Rouge",
        "prix" => 22000
    ],
    [
        "marque" => "Nissan",
        "modele" => "Altima",
        "couleur" => "Bleu",
        "prix" => 25000
    ],
    [
        "marque" => "Chevrolet",
        "modele" => "Malibu",
        "couleur" => "Noir",
        "prix" => 27000
    ],
    [
        "marque" => "Volkswagen",
        "modele" => "Passat",
        "couleur" => "Blanc",
        "prix" => 30000
    ]
];
$cars = array_merge($cars, $cars2);
usort($cars, function($a, $b) {
    return $a["prix"] - $b["prix"];
});

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
    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>Indice</th>
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
                    $car["indice"]=rand(1,100);
                    echo "<tr>";
                    echo "<td>". number_format($car["indice"],0,'0','0')."</td>";
                    echo "<td>" . htmlspecialchars(strtoupper($car["marque"])) . "</td>";
                    echo "<td>" . htmlspecialchars($car["modele"]) . "</td>";
                    echo "<td>" . htmlspecialchars($car["couleur"]) . "</td>";
                    echo "<td>" . number_format($car["prix"], 2, ',', ' ') . " €</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <div class="back-link">
        <a href="index.php">Retour au menu</a>
    </div>

</body>
</html>
