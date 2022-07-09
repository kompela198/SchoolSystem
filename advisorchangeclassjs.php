<?php
include "include/dbh.inc.php";
if(isset($_GET['id'])){
 
  
    $PR_sql = $conn->prepare("SELECT * FROM classroom INNER JOIN faculty ON classroom.FacultyId=faculty.FacultyId where userId=?  ");
    $PR_sql->bind_param('s',$_GET['id']);
    $PR_sql->execute();
    $data = $PR_sql->get_result();
    while($row=mysqli_fetch_array($data))
    {
        echo "<option value='".$row['ClassroomId']."'>".$row['ClassroomCode']."</option>";
     
     
        
    }       
}

?>