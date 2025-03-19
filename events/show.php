<?php
include 'header.php';
require 'db.php';

if (isset($_GET['id'])) {
    $id = htmlspecialchars($_GET['id']);
} else {
    header('Location: index.php');
}
if (isset($_GET['id_user']) && isset($_GET['id'])) {
    $id_user = htmlspecialchars($_GET['id_user']);
    $id = htmlspecialchars($_GET['id']);
    $delete = $db->prepare('DELETE FROM items_users WHERE id_item=:id_item AND id_user=:id_user');
    $delete->bindValue(':id_user', $id_user);
    $delete->bindValue(':id_item', $id);
    $delete->execute();
}

$show = $db->prepare('SELECT * FROM users left JOIN items_users ON items_users.id_user=users.id WHERE id_item=:id');
$show->bindValue(':id', $id);
$show->execute();
$result = $show->fetchAll(PDO::FETCH_ASSOC);
$event = $db->prepare('SELECT * FROM items WHERE id = :id');
$event->bindValue(':id', $id);
$event->execute();
$event = $event->fetch(PDO::FETCH_ASSOC);

?>
<?php if (count($result) > 0) { ?>
    <table>
        <caption>Liste des participants à : <?= $event['name'] ?> </caption>
        <thead>
            <tr>
                <th>Email</th>
                <th>Id user</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($result as $row) { ?>
                <tr>
                    <td><?= htmlspecialchars($row['email']) ?></td>
                    <td><?= htmlspecialchars($row['id_user']) ?></td>
                    <td><a href="show.php?id=<?= $id ?>&id_user=<?= $row['id_user'] ?>">Supprimer</a>
                    </td>
                </tr>


            <?php } ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3"> <a href="deleteParticipant.php?id=<?= $id ?>">Supprimer tous les participants</a></td>
            </tr>
        </tfoot>
    <?php } else {
    echo "<h2>Il n'y a pas de participants pour cet évenement</h2>";
} ?>
</table>