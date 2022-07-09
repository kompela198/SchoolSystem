<?php
 require_once 'dbh.inc.php';
 require_once 'functions.inc.php';
 if(isset($_POST["submit"]))
 {   
 
     $userId= $_POST["userId"];
     $descriptions= $_POST["descriptions"];
     $subjects= $_POST["subjects"];

     addNotification($conn,$userId,$descriptions,$subjects);
 }
?>

