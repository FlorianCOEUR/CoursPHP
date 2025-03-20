<?php
include 'header.php';
require 'db.php';
if (!isset($_SESSION['id'])) {
    if (
        isset($_POST['email']) && $_POST['email'] !== '' &&
        isset($_POST['password']) && $_POST['password'] !== ''
    ) {
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $user = $db->prepare('SELECT * FROM users WHERE email= :email');
        $user->bindValue(':email', $email, PDO::PARAM_STR);
        $user->execute();
        $user = $user->fetch(PDO::FETCH_ASSOC);
        if (!$user) {
            $error = "Il n'y a pas d'utilisateur à cet email'";
        } else {
            if (password_verify($password, $user["password"])) {
                $_SESSION["email"] = $user["email"];
                $_SESSION["id"] = $user["id"];
                header("Location: index.php");
            } else {
                $error = "Erreur de champs";
            }
        }
    }
} else {
    header("Location: index.php");
}
?>

<form method="post" action="login.php">
    <?php
    if (isset($error)) {
        echo '<p>' . $error . '</p>';
    }
    ?>
    <label for="email">Email : </label>
    <input type="email" name="email" id="email">
    <label for="password">Mot de passe : </label>
    <input type="password" name="password" id="password">
    <input type="submit" value="Commencer">
</form>