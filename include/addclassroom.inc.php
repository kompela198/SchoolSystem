<?php
 require_once 'dbh.inc.php';
 require_once 'functions.inc.php';
 if(isset($_POST["submit"]))
 {    
    $ClassroomCode= htmlspecialchars( $_POST["ClassroomCode"]);
    $FacultyId= $_POST["FacultyId"];
   
   
  


    addClassroom($conn,$ClassroomCode,$FacultyId);
 }
?>