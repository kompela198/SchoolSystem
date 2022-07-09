<?php

session_start();
if(empty($_SESSION['userLogin']) || $_SESSION['userLogin'] == ''){
    header("Location: login.php");
    die();
}
if($_SESSION['userData']['userType'] != "advisor"){ 
	header("Location: login.php");
	exit();
}
include "include/dbh.inc.php";

$id=$_GET['id'];
$sql = "UPDATE notif SET statuss='2' where notId=$id";

if (mysqli_query($conn, $sql)) {
    $query = "SELECT * FROM notif where notId=$id  ";
    $result = mysqli_query($conn, $query);

    $row = mysqli_fetch_assoc($result);
    
    $courseId =$row['courseId'];
    $start_time =$row['start_time'];
    $end_time =$row['end_time'];
    $FacultyId =$row['FacultyId'];
    $ClassroomId =$row['ClassroomId'];
    $gun =$row['gun'];
    $SemesterId =$row['semesterId'];
    
    echo "<script type='text/javascript'>
    alert(' Declined Class!');
    window.location='/Grad/advisornotification.php';
         </script>";
}

?>