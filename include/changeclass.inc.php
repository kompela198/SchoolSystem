<?php
 require_once 'dbh.inc.php';
 require_once 'functions.inc.php';
 if(isset($_POST["submit"]))
 {    
   $courseId=  $_POST["courseId"];
   $ClassroomId= $_POST["ClassroomId"];
   $semesterId= $_POST["semesterId"];
   $gun=$_POST["gun"];
   $start_time=  $_POST["start_time"];
   $end_time=  $_POST["end_time"];
   $status=  "0";
   $FacultyId=  $_POST["FacultyId"];
   $userId=  $_POST["userId"];

   

   changeClass($conn,$courseId,$ClassroomId,$semesterId,$gun,$start_time,$end_time,$status,$FacultyId,$userId);
 }
?>