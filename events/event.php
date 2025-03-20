<?php
include 'header.php';
require 'db.php';

if (
    isset($_POST['name']) && $_POST['name'] != '' &&
    isset($_POST['date']) && $_POST['date'] != '' &&
    isset($_POST['description']) && $_POST['description'] != ''
) {
    $name = htmlspecialchars($_POST['name']);
    $date = htmlspecialchars($_POST['date']);
    $description = htmlspecialchars($_POST['description']);
    $event = $db->prepare('INSERT INTO items (name, date, description) VALUES ( :name, :date, :description)');
    $event->bindParam('name', $name);
    $event->bindParam('date', $date);
    $event->bindParam('description', $description);
    $event->execute();
    header('Location:index.php');
} else {
    $error = "Remplir tous les champs";
}
?>

<form action="event.php" method="post">
    <?php if (isset($error)) {
        echo $error;
    } ?>
    <div>
        <label for="name">Name : </label>
        <input type="text" name="name" id="name">
    </div>
    <div>
        <label for="date"> Date : </label>
        <input type="date" name="date" id="date">
    </div>
    <div>
        <label for="description">Description : </label>
        <textarea name="description" id="description"></textarea>
    </div>
    <div>
        <button type="submit">Create</button>
    </div>
</form>





<?php
include 'footer.php';
?>