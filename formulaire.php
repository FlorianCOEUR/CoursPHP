<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de Réduction de Commande</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>

    <h1>Gestion de Réduction de Commande</h1>

    <div class="container">
        <div class="form-container">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $prenom = $_POST["firstname"];
                $nom= $_POST["name"];
                $nbcommande = $_POST["nbcommandes"];
                $totalcommande = $_POST["total"];
                $commande = $_POST["cmd"];
                
                // Calcul du statut et de la réduction
                if($nbcommande >= 10 && $totalcommande >= 1000) {
                    $statut = "VIP";
                    $reduction = 10;
                } elseif ($nbcommande >= 5) {
                    $statut = "Régulier";
                    $reduction = 5;
                } else {
                    $statut = "Nouveau Client";
                    $reduction = 0;
                }

                // Vérification des conditions supplémentaires pour appliquer une réduction
                if ($commande >= 200) {
                    $reduction += 5;
                }
                if (date("l") == "Wednesday") {
                    $reduction += 5;
                }

                // Calcul du prix final après réduction
                $prixFinal = $commande - ($commande * $reduction / 100);
                echo "<div class='result-container'>
                        <h2>Bienvenue, " . htmlspecialchars($nom) . " " . htmlspecialchars($prenom) . " !</h2>
                        <p><strong>Votre réduction totale est de :</strong> " . $reduction . "%</p>
                        <p><strong>Votre statut :</strong> " . $statut . "</p>
                        <p><strong>Le prix final de votre commande :</strong> " . number_format($prixFinal, 2, ',', ' ') . " €</p>
                      </div>";
            }
            ?>

            <form action="formulaire.php" method="post">
                <div class="form-group">
                    <label for="nom">Votre nom :</label>
                    <input type="text" name="name" id="nom" required>
                </div>
                <div class="form-group">
                    <label for="prenom">Votre prénom :</label>
                    <input type="text" name="firstname" id="prenom" required>
                </div>
                <div class="form-group">
                    <label for="nbcommande">Combien de commandes avez-vous passées ?</label>
                    <input type="number" name="nbcommandes" id="nbcommande" required>
                </div>
                <div class="form-group">
                    <label for="total">Combien d'argent avez-vous dépensé ?</label>
                    <input type="number" name="total" required>
                </div>
                <div class="form-group">
                    <label for="cmd">Prix de la commande :</label>
                    <input type="number" name="cmd" required>
                </div>
                <div class="form-group">
                    <input type="submit" value="OK">
                </div>
            </form>
        </div>
    </div>

    <div class="back-link">
        <a href="index.php">Retour au menu</a>
    </div>

</body>
</html>
