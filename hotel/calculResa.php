<?php
require 'dbconnection.php';
$add=false;
$error='';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user=$_SESSION["username"];
    $roomWanted=$_POST["nbRoom"];
    $dateStart=new DateTime($_POST["dateStart"]);
    $dateEnd=new DateTime($_POST["dateEnd"]);
    $nbStart=$dateStart->format("N");
    $nbDays=$dateEnd->diff($dateStart)->days;
    $optionPrice=0;
    $roomBooked=roomBook($_POST["room"]);
    if($roomBooked['available']>=$roomWanted){
        foreach(options() as $option){
            if(isset($_POST["opt".$option["id"]])){
                $optionPrice+=$option['price'];
            }
        }
        $mois=(int) $dateStart->format('m');
        if((6<=$mois && $mois<=8) || $mois==12){
            $saison+=0.25;
        }elseif((10<=$mois && $mois<=11) || $mois ==1){
            $saison-=0.15;
        }
        $percent=1;
        if($nbDays>6){
            $percent-=0.1;
        }
        if(($nbStart+$nbDays)>=6){
            $percent+=0.2;
        }
        if ((int)fidelity()){
            $percent-=0.1;
        }
        $total=($roomBooked['price']+$optionPrice)*$nbDays;
        $total*=$percent;
        $addBooking="INSERT INTO booking (begin_date, end_date, nb_rooms, user_id, price) VALUES  ('".$dateStart->format('Y-m-d')."', '".$dateEnd->format('Y-m-d')."', ".$roomWanted.", ".$_SESSION['user_id'].", ".$total.")";
        $roomAvailable=((int)$roomBooked['available'])-$roomWanted;
        $updateRoom="UPDATE room SET available=".$roomAvailable;
        $addBoRoom="INSERT INTO booking_room"
        $pdo->query($addBooking);
        $pdo->query($addBoRoom);
        foreach(options() as $option){
            if(isset($_POST["opt".$option["id"]])){
                $addBoOpt="INSERT INTO booking_option (id_booking, id_opt_in, quantity) VALUES (".($pdo->lastInsertId()).", ".$option['id_opt_in'].", 1)";
               $pdo->query($addBoOpt);
                echo $addBoOpt."<br>";
            }
        }
        $pdo->query($updateRoom);

    }else{
        $error.="Il n'y a pas assez de cambre disponible";
    }
    
    
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
    <?php 
    if($error==''){
        echo $user." ".$total."<br>".$roomAvailable."<br>";
        echo $addBooking."<br>".$updateRoom."<br>";
    }else{
        echo $error;
    }
    ?>
    <div><a href="resa.php">Retour aux choix de la réservation<a></div>
</body>
</html>