<?php
try {
    $db = new PDO('mysql:host=localhost;dbname=events;charset=utf8mb4', 'root', '');
} catch (PDOException $e) {
    print "error" . $e->getMessage() . "<br/>";
}