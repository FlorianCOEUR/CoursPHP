<?php
$commandes = [
    [
        "articles" => [
            ["nom" => "Ordinateur portable", "prix" => 800, "quantite" => 1],
            ["nom" => "Souris sans fil", "prix" => 25, "quantite" => 2],
        ]
    ],
    [
        "articles" => [
            ["nom" => "Clavier mécanique", "prix" => 100, "quantite" => 1],
            ["nom" => "Écran 24 pouces", "prix" => 200, "quantite" => 1],
            ["nom" => "Casque audio", "prix" => 50, "quantite" => 1],
        ]
    ],
    [
        "articles" => [
            ["nom" => "Tablette 10 pouces", "prix" => 300, "quantite" => 1],
            ["nom" => "Clé USB 64Go", "prix" => 15, "quantite" => 3],
        ]
    ],
    [
        "articles" => [
            ["nom" => "Imprimante laser", "prix" => 150, "quantite" => 1],
            ["nom" => "Ramette de papier", "prix" => 5, "quantite" => 10],
        ]
    ],
    [
        "articles" => [
            ["nom" => "Onduleur", "prix" => 120, "quantite" => 1],
            ["nom" => "Multiprise parafoudre", "prix" => 30, "quantite" => 2],
        ]
    ],
    [
        "articles" => [
            ["nom" => "Télescope", "prix" => 500, "quantite" => 1],
            ["nom" => "Guide d’astronomie", "prix" => 40, "quantite" => 1],
        ]
        ],
    [
        "articles" => [
            ["nom" => "colle", "prix" => 5, "quantite" => 1],
            ["nom" => "Guide d’astronomie", "prix" => 40, "quantite" => 1],
        ]
    ]
];
function freeShip($price){
    if($price>=100){
        return true;
    }else{
        return false;
    }
}
function sortCmd($cmd){
    if($cmd["total"]<100){
        return "Petite Commande";
    }elseif($cmd["total"]< 500){
        return "Moyenne Commande";
    }else{
        return "Grosse Commande";
    }
}
function reduction($total){
    if($total>=500){
        return 20;
    }elseif($total>=200){
        return 10;
    }else{
        return 0;
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon magasin en ligne</title>
</head>
<body>
    <?php
    $i=0;
    foreach($commandes as $commande){
        $total=0;
        foreach($commande["articles"] as $article){
            $total += $article["prix"]*$article["quantite"];
        }
        $commandes[$i]["total"]=$total;
        $commandes[$i]["reduction"]=reduction($total);
        $commandes[$i]["totalFinal"]=$total*(1-$commandes[$i]["reduction"]/100);
        $commandes[$i]["type"]=sortCmd($commandes[$i]);
        if (freeShip($total)){
            $frais= "Offerts";
        }else{
            $frais= "Payants";
        }
        echo 'Voici le montant total de la commande (sans reduction): '.$commandes[$i]["total"].' €<br>';
        echo 'La reduction appliquée est de : '.$commandes[$i]["reduction"].'% pour un total final de : '.$commandes[$i]["totalFinal"].' €<br>';
        echo 'La commande est considérée comme : '.$commandes[$i]["type"].'<br>';
        echo 'Les frais de livraison pour cette commandes sont : '.$frais.'<hr>';
        $i++;
    }
    ?>
    <a href="index.php">Retour au menu</a>
</body>
</html>