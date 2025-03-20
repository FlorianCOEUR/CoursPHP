<?php
include 'header.php';
require 'db.php';

if (
    isset($_POST['email']) && $_POST['email'] !== '' &&
    isset($_POST['password']) && $_POST['password'] !== '' &&
    isset($_POST['check']) && $_POST['check'] !== ''
) {
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $check = htmlspecialchars($_POST['check']);
    if ($check == $password) {
        $users = $db->prepare('SELECT count(id) AS compte FROM users WHERE email= :email');
        $users->bindValue(':email', $email, PDO::PARAM_STR);
        $users->execute();
        $users = $users->fetchColumn();
        if ($users > 0) {
            $error = 'Il y a deja un user a cette adresse email';
        } else {
            $password = password_hash($password, PASSWORD_DEFAULT);
            $query = $db->prepare('INSERT INTO users (email, password) VALUE (:email, :password)');
            $query->bindValue(':email', $email, PDO::PARAM_STR);
            $query->bindValue(':password', $password);
            $query->execute();
            header('Location: index.php');
        }
    } else {
        $error = 'Les mots de passe ne correspondent pas';
    }

}
?>

<form method="post" action="register.php">
    <?php
    if (isset($error)) {
        echo '<p>' . $error . '</p>';
    }
    ?>
    <label for="email">Email : </label>
    <input type="email" name="email" id="email">
    <label for="password">Mot de passe : </label>
    <input type="password" name="password" id="password">
    <label for="check">Vérification : </label>
    <input type="password" name="check" id="check">
    <input type="submit" value="Commencer">
</form>