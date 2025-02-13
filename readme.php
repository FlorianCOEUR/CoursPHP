<?php
// Inclure la bibliothèque Parsedown
include 'include/Parsedown.php';

// Créer une instance de Parsedown
$Parsedown = new Parsedown();

// Lire le fichier Markdown
$markdown = file_get_contents('README.md');

// Convertir le Markdown en HTML
$htmlContent = $Parsedown->text($markdown);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Afficher Markdown</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>
    <div class="markdown-content">
        <?php echo $htmlContent; ?>
    </div>
    <div class="back-link">
        <a href="index.php">Retour au menu</a>
    </div>
</body>
</html>