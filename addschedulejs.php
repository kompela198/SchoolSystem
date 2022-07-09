<?php
include "include/dbh.inc.php";
if(isset($_GET['id'])){
 
  
    $PR_sql = $conn->prepare("SELECT * FROM course INNER JOIN users ON course.userId=users.userId where FacultyIdS=? ");
    $PR_sql->bind_param('s',$_GET['id']);
    $PR_sql->execute();
    $data = $PR_sql->get_result();
    while($row=mysqli_fetch_array($data))
    {
        echo "<option value='".$row['CourseId']."'>".$row['CourseName']."</option>";
     
     
        
    }       
}
if(isset($_GET['classroomId'])){
 
  
    $PR_sql = $conn->prepare("SELECT * FROM classroom  where FacultyId=?  ");
    $PR_sql->bind_param('s',$_GET['classroomId']);
    $PR_sql->execute();
    $data = $PR_sql->get_result();
    while($row=mysqli_fetch_array($data))
    {
        echo "<option value='".$row['ClassroomId']."'>".$row['ClassroomCode']."</option>";
     
     
        
    }       
}




?>