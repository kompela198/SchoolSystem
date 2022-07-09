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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/advisor.css">
   
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Time Table</title>

</head>

<body>

    <input type="checkbox" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
            <h2><a href="advisor.php"><img src="img/gau.png" width="50" height="50"> <span>Advisor Panel</span> </h2></a>
        </div>

        <div class="sidebar-menu">

           
        <ul>
                <li class="">
                    <a href="advisorchangeclass.php" class="active"><span class="las la-calendar-check"></span><span>Change Class</span></a>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="advisortimetable.php" class="active"><span
                            class="las la-calendar-check"></span><span>Time Table</span></a>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="advisornotification.php" class="active"><span
                            class="las la-calendar-check"></span><span>Notification</span></a>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="advisoraddschedule.php" class="active"><span
                            class="las la-calendar-check"></span><span>Add Class</span></a>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="advisorclassroomproperties.php" class="active"><span
                            class="las la-calendar-check"></span><span>Classroom Properties</span></a>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="advisoradminnotif.php" class="active"><span
                            class="las la-calendar-check"></span><span>Admin Notification</span></a>
                </li>
            </ul>
           
        </div>
    </div>



    <div class="main-content">
        <header>
            <h2>
                <label for="nav-toggle">
                    <span class="las la-bars"> </span>
                </label>
                DashBoard
            </h2>
            <div class="search-wrapper">
                <span> <?php

$PR_sql = $conn->prepare("SELECT * FROM faculty where FacultyId =? ");
$PR_sql->bind_param('s', $_SESSION['userData']["FacultyIdS"]); 

$PR_sql->execute();

  $data = $PR_sql->get_result();
  $row=mysqli_fetch_array($data);
  echo $row[1];
  
?></span>
               
            </div>
            <div class="user-wrapper">
                <img src="img/gau.png" width="40px" height="40px" />
                <div>
                    <h3>
                        <?= ucfirst($_SESSION['userData'][1]); ?>
                    </h3>

                    <small>
                    <?= ucfirst($_SESSION['userData'][4]); ?>
                    </small>
                    <div class="navigation">

                        <a class="button" href="logout.php">

                            <h4>
                                <div class="logout">Logout</div>
                            </h4>
                        </a>

                    </div>

        </header>
        <main>
          
        </main>

        <body>
                     <div class="recent-grid">
                         <div class="projects">
                             <div class="card">
                                 <div class="card-header">
                                    <h2> 
                                     <?php

                                      $PR_sql = $conn->prepare("SELECT * FROM faculty where FacultyId =? ");
                                      $PR_sql->bind_param('s', $_SESSION['userData']["FacultyIdS"]); 
                                     
                                      $PR_sql->execute();

                                        $data = $PR_sql->get_result();
                                        $row=mysqli_fetch_array($data);
                                        echo $row[1];
                                        
                                     ?>

                                    

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
                                           
                                            
                                            
                                          
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                      
                                        
                                            <td>
                                            <?php
                                            
                                            $PR_sql = $conn->prepare("SELECT * FROM coursetime INNER JOIN faculty ON coursetime.FacultyId = faculty.FacultyId INNER JOIN course ON coursetime.courseId = course.CourseId INNER JOIN classroom ON coursetime.ClassroomId = classroom.ClassroomId INNER JOIN classproperties ON coursetime.ClassroomId = classproperties.ClassroomId WHERE faculty.FacultyId=?");
                                            $PR_sql->bind_param('s', $_SESSION['userData']["FacultyIdS"]);
                                            $PR_sql->execute();
                                            $data = $PR_sql->get_result();
                                            
                                          
                                            while($row=mysqli_fetch_array($data))
                                            {
                                             
                                                    echo "<tr>";
                                            
                                                    echo "<td>" . $row['FacultyName'] . "</td>";
                                                    echo "<td>" . $row['CourseName'] . "</td>";
                                                    echo "<td>" . $row['ClassroomCode'] . "</td>";
                                                    echo "<td>" . $row['capacity'] . "</td>";
                                                    echo "<td>" . $row['start_time'] . "</td>";
                                                    echo "<td>" . $row['end_time'] . "</td>";
                
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

</html>
