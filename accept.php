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
$sql = "UPDATE notif SET statuss='1' where notId=$id";

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
    
    $sql="INSERT INTO coursetime (courseId,start_time,end_time,FacultyId,ClassroomId,gun,SemesterId)VALUES(?,?,?,?,?,?,?);";
                                        
                                        $stmt =mysqli_stmt_init($conn);
                                        
                                        if (!mysqli_stmt_prepare($stmt,$sql)) {
                                            header("Location: ../advisorchangeclass.php?error=changeClassStmtFailed");
                                            exit();
                                        }
                                    
                                    
                                        mysqli_set_charset($conn,"utf8");
                                        mysqli_stmt_bind_param($stmt,"sssssss",$courseId,$start_time,$end_time,$FacultyId,$ClassroomId,$gun,$SemesterId);
                                        mysqli_stmt_execute($stmt);
                                        mysqli_stmt_close($stmt);
                                        echo "<script type='text/javascript'>
                                        alert(' Change Class!');
                                        window.location='/Grad/advisornotification.php';
                                             </script>";
                                        exit();
                                         }




?>