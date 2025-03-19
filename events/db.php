<?php
try{
    $db=new PDO('mysql:host=localhost;dbname=events','root', '');
}catch(PDOException $e){
    print "error".$e->getMessage()."<br/>";
}