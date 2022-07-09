<?php
 require_once 'dbh.inc.php';
 require_once 'functions.inc.php';
 if(isset($_POST["submit"]))
 {   
    

      $CourseCode= $_POST["CourseCode"];
      $CourseName= $_POST["CourseName"];
      $userId = $_POST["userId"];
  $SemesterId = $_POST["SemesterId"];
  

      createCourse($conn,$CourseCode,$CourseName,$userId,$SemesterId);
 }
?>

