

<?php
require 'dbconnection.php';
$connected=false;
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $query="SELECT * FROM user WHERE user.email= :email";
    $stmt=$pdo->prepare($query);
    $stmt->execute(['email' => $_POST["user"]]);
    $result=$stmt->fetch(PDO::FETCH_ASSOC);
    if ($result!=false){
        if($result["password"]==$_POST["mdp"]){
            $_SESSION["user_id"]=$result["id"];
            $_SESSION["username"]=$result["email"];
            $connected=true;
        }
    }
}
if (session_status()==PHP_SESSION_ACTIVE){
    $connected=true;
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation | Coeurs Brisés</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    if(!$connected):?>
        <form action="resa.php" method="post">
            <div>
                <label for="user">Nom d'utilisateur : </label>
                <input type="text" name="user" id="user">
            </div>
            <div>
                <label for="mdp">Mot de passe : </label>
                <input type="password" name="mdp" id="mdp">
            </div>
            <p>L'email et le mdp ne matchent pas</p>
            <input type="submit" value="Se connecter">
     </form>
     <?php else:?>
        <h1>Bienvenue à l'hotel des coeurs Brisés!</h1>
        <form action="calculResa.php" method="post">
            <h3>Qui êtes vous :</h3>
            <div>
                <label for="name">Entrez votre nom : <?php echo $_SESSION["username"]?></label>
            </div>
            <h3>Votre réservation : </h3>
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
                    foreach(rooms() as $room):?>
                    <option value="<?php echo $room["id"]?>"><?php echo $room["type"]." ".$room["price"]." €/ Jours"?></option>
                    <?php endforeach?>
                </select>
                <label for="nbRoom">Combien de chambre voulez vous?</label>
                <input type="number" name="nbRoom" id="nbRoom" min="1">
            </div>
            <h3>Options : </h3>
            <div>
                <?php foreach( options() as $option):?>
                <div>
                    <label for="opt<?php echo $option['id']?>"><?php echo $option["name"]?></label>
                    <input type="checkbox" name="opt<?php echo $option['id']?>" id="opt<?php echo $option['id']?>">
                    <span><?php echo $option["price"]?> € / Jour</span>
                </div>
                <?php endforeach?>
            </div>
            <input type="submit" value="Je lance mon Devis">
        </form>
    <?php endif?>
</body>
</html>