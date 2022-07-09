<?php
 require_once 'dbh.inc.php';
 require_once 'functions.inc.php';
 if(isset($_POST["submit"]))
 {   
    $faculty= $_POST["faculty"];
    $course= $_POST["course"];
    $classroom= $_POST["classroom"];
    $start_time=  $_POST["start_time"];
    $end_time=  $_POST["end_time"];
    $gun=$_POST["gun"];
    $SemesterId= $_POST["SemesterId"];
    
   
  
 
   

    AdvisorScheduleAdd($conn,$faculty,$course,$classroom,$start_time,$end_time,$gun,$SemesterId);
 }
?>