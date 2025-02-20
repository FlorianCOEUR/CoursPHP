


<?php
date_default_timezone_set('UTC');
$events = [
    ["nom" => "Nouvel An", "date" => new DateTime("2025-01-01")],
    ["nom" => "Éclipse Solaire", "date" => new DateTime("2024-04-08")],
    ["nom" => "Jeux Olympiques Paris", "date" => new DateTime("2025-07-26")],
    ["nom" => "Halloween", "date" => new DateTime("2024-10-31")],
    ["nom" => "Noël", "date" => new DateTime("2025-12-25")],
    ["nom" => "Événement du jour", "date" => new DateTime("2025-02-18")]
];
usort($events, function ($a, $b) {
    return $a["date"] <=> $b["date"];
});
function diffJours($date2, $date){
    return ($date->diff($date2))->days;
}
$formatter = new IntlDateFormatter('fr_FR', IntlDateFormatter::NONE, IntlDateFormatter::NONE, NULL, NULL, 'EEEE dd/MM/YYYY');
$date=new DateTime();
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tri d'un tableau d'évènement avec des dates</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Liste des Évènements</h1>
        <table>
            <thead>
                <tr>
                    <th>Événement</th>
                    <th>Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($events as $event):
                    $eventDate = $event["date"];
                    $statusClass = "";
                    if ($eventDate > $date) {
                        $statusClass = "majeur";
                        $statusText = diffJours($date, $eventDate) . " Jours restants";
                    } elseif (diffJours($date,$event["date"])==0) {
                        $statusClass = "aujourdhui";
                        $statusText = "Aujourd'hui";
                    } else {
                        $statusClass = "mineur";
                        $statusText = "Passé";
                    }
                    ?>
                    <tr>
                        <td><?= htmlspecialchars($event["nom"]) ?></td>
                        <td><?= htmlspecialchars($formatter->format($event["date"])) ?></td>
                        <td class="<?= $statusClass ?>">
                            <?= $statusText ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="back-link">
        <a href="index.php">Retour au menu</a>
    </div>
</body>
</html>