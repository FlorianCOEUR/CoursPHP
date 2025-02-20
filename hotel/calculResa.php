<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $post=true;
    $people=$_POST["nbPeople"];
    $dateStart=new DateTime($_POST["dateStart"]);
    $dateEnd=new DateTime($_POST["dateEnd"]);
    $nbDays=$dateEnd->diff($dateStart)->days;
    $dej=!empty($_POST["ptDej"]);
    $nbStart=$dateStart->format("N");
    $spa=!empty($_POST["spa"]);
    $sea=!empty($_POST["viewSea"]);
    $price=100;
    $total=$nbDays*$price;
    $percent=1;
    if($nbDays>6){
        $percent-=0.1;
    }
    if(($nbStart+$nbDays)>=6){
        $percent+=0.2;
    }
    if ($spa){
        $total+=30*$nbDays;
    }
    if($dej){
        $total+=10*$nbDays;
    }
    if($sea){
        $total+=20*$nbDays;
    }
    $total*=$people;
    $total*=$percent;
    $post=true;
}else{
    $post=false;
}
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
    <?php
    if($post):
        ?>
        <div class="devis">
            <h2>Voici votre devis :</h2>
            <div>
                <h3>Résumé de votre réservation : </h3>
                <p>Nombre de personnes : <?php echo $people ?></p>
                <p>Date de début : <?php echo $dateStart->format('d-m-Y')?></p>
                <p>Date de fin : <?php echo $dateEnd->format('d-m-Y')?></p>
                <p>Nombre de jour : <?php echo $nbDays ?></p>
                <?php if($nbDays>6){ echo "<p> Une réduction de 10% a été appliquée</>";} ?>
                <?php if(($nbStart+$nbDays)>=6){ echo "<p> Une surcharge de 20% a été appliquée</>";} ?>
                <p>Options choisies :<?php  if($sea){ echo "Vue sur la mer ";} if($dej){ echo "Petit déjeuner ";} if($spa){echo "Spa ";}?></p>
                <p>Prix total : <?php echo $total?> €</p>
            </div>
        </div>
    <?php endif;?>
    <div><a href="hotelReservation.php">Retour aux choix de la réservation<a></div>
</body>
</html>