<?php
$disponibilites=[
    [
        "type"=>"Chambre double",
        "dispo"=> 8
    ],
    [
        "type"=>"Chambre simple",
        "dispo"=>2
    ],
    [
        "type"=>"VIP",
        "dipo"=>"1"
    ]
    ];
?>

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
        <h3>Qui êtes vous :</h3>
        <div>
            <label for="name">Entrez votre nom : </label>
            <input type="text" name="name" id="name">
        </div>
        <div>
        <label for="firstname">Entrez votre prénom</label>
        <input type="text" name="firstname" id="firstname">
        </div>
        <div>
            <label for="nbResa">Combien de réservation avez vous déjà effectuée?</label>
            <input type="number" name="nbResa" id="nbResa" min="0">
        </div>
        <h3>Votre réservation : </h3>
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
        <div>
            <label for="room">Veuillez choisir votre chambre : </label>
            <select name="room" id="room" required>
                <?php
                foreach($disponibilites as $dispo):?>
                <option value="<?php echo $dispo["type"]?>"><?php echo $dispo["type"]?></option>
                <?php endforeach?>
            </select>
            <label for="nbRoom">Combien de chambre voulez vous?</label>
            <input type="number" name="nbRoom" id="nbRoom" min="1">
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