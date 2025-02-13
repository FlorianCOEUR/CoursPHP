<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice de gestion de tableau et de boucles</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <h1>Gestion des Étudiants</h1>

    <div class="container">

        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $nbetudiants = $_POST["nbetu"];
                $etudiants = [];
                
                // Collecting students' information
                for ($i = 0; $i < $nbetudiants; $i++) {
                    $etudiants[] = [
                        "prenom" => $_POST["prenom" . $i],
                        "age" => intval($_POST["age" . $i])
                    ];
                }

                // Sorting students by age
                usort($etudiants, function($a, $b) {
                    return $a["age"] - $b["age"];
                });

                echo '<div class="result-container">';
                if (is_array($etudiants)) {
                    foreach ($etudiants as $etudiant) {
                        if ($etudiant["age"] >= 18) {
                            echo '<p class="majeur">L\'étudiant : <strong>' . $etudiant["prenom"] . '</strong> a ' . $etudiant["age"] . ' ans, il est donc <strong>Majeur</strong> !</p>';
                        } else {
                            echo '<p class="mineur">L\'étudiant : <strong>' . $etudiant["prenom"] . '</strong> a ' . $etudiant["age"] . ' ans, il est donc <strong>Mineur</strong> !</p>';
                        }
                    }
                } else {
                    echo "<p class='error'>Ce n'est pas un tableau valide.</p>";
                }
                echo '</div>';
            }
        ?>

        <?php
            if (isset($_GET["nbEtudians"])) {
                echo '<form action="exotableau.php" method="post">';
                $nbetudiants = $_GET["nbEtudians"];
                echo '<div class="form-container">';
                echo '<div class="form-group">';
                echo '<label for="nbetu">Nombre d\'étudiants :</label>';
                echo '<input type="number" name="nbetu" value="' . $nbetudiants . '" readonly><hr>';
                echo '</div>';
                for ($i = 0; $i < $nbetudiants; $i++) {
                    echo '<div class="form-group">';
                    echo '<label>Prénom :</label>';
                    echo '<input type="text" name="prenom' . $i . '" placeholder="Prénom"><br>';
                    echo '<label>Âge :</label>';
                    echo '<input type="number" name="age' . $i . '" placeholder="Âge"><br>';
                    echo '</div>';
                }
                echo '<div class="form-group"><input type="submit" value="Trier"></div>';
                echo '</div>';
                echo '</form>';
            } elseif ($_SERVER["REQUEST_METHOD"] != "POST") {
                echo '<form action="exotableau.php" method="get">
                        <div class="form-container">
                            <div class="form-group">
                                <label for="nbEtudians">Donnez le nombre d\'étudiants :</label>
                                <input type="number" name="nbEtudians" required>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="OK">
                            </div>
                        </div>
                    </form>';
            }
        ?>
        
    </div>

    <div class="back-link">
        <a href="index.php">Retour au menu</a>
    </div>

</body>
</html>
