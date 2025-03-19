<?php
include 'header.php';
require 'db.php';


$stmt=$db->query('SELECT * FROM items');
$events=$stmt->fetchAll(PDO::FETCH_ASSOC);

echo '<div class="list">';
foreach ($events as $event) {
    $dateEvent = new DateTime($event['date']);
    $today=new DateTime();
    echo "<div>";
    if( $dateEvent > $today){
        echo "<p>A venir</p>";
    }else{
        echo "<p>Passé</p>";
    }
    echo '<h2>'.$event['name'].'</h2>';
    echo '<p>'.$event['description'].'</p>';
    echo '<p>'.$dateEvent->format('d/m/y').'</p>';
    echo "<a class='modifier' href='joinEvent.php?id=".$event['id']."'>Participer</a>";
    echo "<a class='modifier' href='editEvent.php?id=".$event['id']."'>Modifier</a>";
    echo "<a class='supprimer' href='deleteEvent.php?id=".$event['id']."'>Supprimer</a>";
    echo "</div>";
}
echo "</div>";


include 'footer.php';
?>