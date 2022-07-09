<?php
 require_once 'dbh.inc.php';
 require_once 'functions.inc.php';
 if(isset($_POST["submit"]))
 {    
    $ClassroomId= $_POST["ClassroomId"];
    $capacity= $_POST["capacity"];
    $numberofblackboard= $_POST["numberofblackboard"];
    $studentseattype=  $_POST["studentseattype"];
    $avaibilityofprofdesk=  $_POST["avaibilityofprofdesk"];
    $projector=$_POST["projector"];
    $smartboard=$_POST["smartboard"];
    $internet=$_POST["internet"];
    $pc=$_POST["pc"];
    $speakersystem=$_POST["speakersystem"];
    $climate=$_POST["climate"];

   
    addProperties($conn,$ClassroomId,$capacity,$numberofblackboard,$studentseattype,$avaibilityofprofdesk,$projector,$smartboard,$internet,$pc,$speakersystem,$climate);
   

   
 }
?>