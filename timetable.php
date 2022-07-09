<?php

include "include/dbh.inc.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
        
    <link rel="stylesheet" type="text/css" href="css/admin.css">
   
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Time Table</title>
    

</head>


<body>
      
        
                     <div class="recent-grid">
                         <div class="projects">
                             <div class="card">
                                 <div class="card-header">
                                    <h2> 
                                   TİME TABLE
</h2>

                                    

                                 </div>
                                 <div class="card-body">
                                     <table width="100%">
                                    <thead>
                                        <tr>
                                        
                                            <td>Faculty</td>
                                            <td>Course Name</td>
                                            <td>Classroom</td>
                                            <td>Capacity</td>
                                            <td>Start Time</td>
                                            <td>End Time</td>
                                            <td>Semester</td>
                                           
                                            
                                            
                                          
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                      
                                        
                                            <td>
                                            <?php
                                            
                                            $result = mysqli_query($conn,"SELECT * FROM coursetime INNER JOIN faculty ON coursetime.FacultyId = faculty.FacultyId 
                                            INNER JOIN course ON coursetime.courseId = course.CourseId  INNER JOIN classroom ON coursetime.ClassroomId = classroom.ClassroomId
                                             INNER JOIN classproperties ON coursetime.ClassroomId = classproperties.ClassroomId INNER JOIN 
                                             semester ON coursetime.SemesterId=semester.SemesterId");
                                          
                                           
                                          
                                            while($row=mysqli_fetch_array($result))
                                            {
                                             
                                                    echo "<tr>";
                                            
                                                    echo "<td>" . $row['FacultyName'] . "</td>";
                                                    echo "<td>" . $row['CourseName'] . "</td>";
                                                    echo "<td>" . $row['ClassroomCode'] . "</td>";
                                                    echo "<td>" . $row['capacity'] . "</td>";
                                                    echo "<td>" . $row['start_time'] . "</td>";
                                                    echo "<td>" . $row['end_time'] . "</td>";
                                                    echo "<td>" . $row['SemesterName'] . "</td>";
                                                    
                                                    echo "</tr>";
                                                 
                                                
                                        
                                          
                                           
                                        }
                                    
                                    
                                            
                                            
                                            mysqli_close($conn);
                                            
                                                ?>
                                                </td>
                                              
                                        </tr>
                                       
                                   
                                        
                                    </tbody>
                                    
                                     </table>
                                 </div>
                             </div>
                         </div>
                     </div>
        </body>


    </div>

    </body>
    </body>

</html>

