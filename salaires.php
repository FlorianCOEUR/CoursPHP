<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Salaires</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>

    <h1>Gestion des Salaires des Employés</h1>

    <div class="container">

        <div class="form-container">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $poste = $_POST["poste"];
                $annee = $_POST["years"];
                $hsupp = $_POST["hsup"];
                $absence = $_POST["ai"];

                switch ($poste) {
                    case "Développeur":
                        $salaire = 3000;
                        break;
                    case "Designer":
                        $salaire = 2800;
                        break;
                    case "Manager":
                        $salaire = 4000;
                        break;
                    case "stagiaire":
                        $salaire = 1200;
                        break;
                    default:
                        echo "<p>Poste inconnu</p>";
                        exit;
                }

                if ($annee >= 10) {
                    $salaire = $salaire * 1.2;
                } elseif ($annee >= 5) {
                    $salaire = $salaire * 1.1;
                }

                $salaire = $salaire + 25 * $hsupp - 50 * $absence;
                echo "<div class='result-container'>
                        <h2>Votre collaborateur percevra une rémunération de : " . number_format($salaire, 2, ',', ' ') . " €</h2>
                      </div>";
            }
            ?>

            <form action="salaires.php" method="post">
                <div class="form-group">
                    <label for="poste">Quel est le poste de l'employé ?</label>
                    <input type="text" name="poste" required>
                </div>
                <div class="form-group">
                    <label for="anciennete">Depuis combien de temps il est présent ? (en année)</label>
                    <input type="number" name="years" required>
                </div>
                <div class="form-group">
                    <label for="heure">Combien d'heures supp a-t-il fait ?</label>
                    <input type="number" name="hsup" required>
                </div>
                <div class="form-group">
                    <label for="absence">Combien de jours d'AI ?</label>
                    <input type="number" name="ai" required>
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
