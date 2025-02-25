<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $repCible= "img/";
    $namePic=basename($_FILES["pic"]["name"]);
    $cheminCible=$repCible.$namePic;
    $typePic=strtolower(pathinfo($cheminCible, PATHINFO_EXTENSION));
    $extAuto=  ["jpg", "jpeg", "png","gif"];
    if(in_array($typePic,$extAuto)){
        if(move_uploaded_file($_FILES["pic"]["tmp_name"], $cheminCible)){
            echo '<img src="'.$cheminCible.'" alt="image">';
        }else{
            echo "une erreur s'est produite";
        }
    }else{
        echo "Format non pris en charge";
    }
    ?>
</body>
</html>



