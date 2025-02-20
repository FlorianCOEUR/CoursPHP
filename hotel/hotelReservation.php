<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel des coeurs Brises</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>
    <h1>Bienvenue à l'hotel des coeurs Brisés!</h1>
    <form action="calculResa.php" method="post">
        <h3>Votre désir de réservation :</h3>
        <div>
            <label for="nbPeople">Veuillez indiquer le nombre de personnes pour cette reservation : </label>
            <input type="number" name="nbPeople" id="nbPeople" min="1" required>
        </div>
        <div>
            <div>
                <label for="dateStart">Date de début:</label>
                <input type="date" name="dateStart" id="dateStart" required>
            </div>
            <div>
                <label for="dateEnd">Date de fin : </label>
                <input type="date" name="dateEnd" id="dateEnd" required>
            </div>
        </div>
        <h3>Options : </h3>
        <div>
            <div>
                <label for="ptDej">Petit déjeuner</label>
                <input type="checkbox" name="ptDej" id="ptDej">
            </div>
            <div>
                <label for="spa">Spa</label>
                <input type="checkbox" name="spa" id="spa">
            </div>
            <div>
                <label for="viewSea">Vue sur la mer</label>
                <input type="checkbox" name="viewSea" id="viewSea">
            </div>
        </div>
        <input type="submit" value="Je lance mon Devis">
    </form>
</body>
</html>