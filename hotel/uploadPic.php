<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload de la photo de l'hotel.</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>
    <h1>Ma plus belle photo de l'hotel</h1>
    <form action="stockPic.php" method="post" enctype="multipart/form-data">
        <label for="pic">Veuillez selectionner la photo à envoyer : </label>
        <input type="file" name="pic" id="pic">
        <input type="submit" value="Télécharger" name="submit">

    </form>
</body>
</html>