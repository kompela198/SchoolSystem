<?php

session_start();
if(empty($_SESSION['userLogin']) || $_SESSION['userLogin'] == ''){
    header("Location: login.php");
    die();
}
if($_SESSION['userData']['userType'] != "admin"){ 
	header("Location: login.php");
	exit();
}
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
    <title>Class Properties</title>

</head>

<body>

    <input type="checkbox" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
            <h2><a href="admin.php"><img src="img/gau.png" width="50" height="50"> <span>Admin Panel</span> </h2></a>
        </div>

        <div class="sidebar-menu">

        <ul>
                <li class="">
                    <a href="createadvisor.php" class="active"><span class="las la-user-check"></span><span>Create
                            Advisor</span></a>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="course.php" class="active"><span
                            class="las la-calendar-check"></span><span>Course</span></a>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="addproperties.php" class="active"><span
                            class="las la-calendar-check"></span><span>Add Classroom Properties</span></a>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="classroom.php" class="active"><span
                            class="las la-calendar-check"></span><span>Classroom Properties</span></a>
                </li>
            </ul>
            

            <ul>
                <li>
                    <a href="addschedule.php" class="active"><span
                            class="las la-calendar-check"></span><span>Add Schedule</span></a>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="addclassroom.php" class="active"><span
                            class="las la-calendar-check"></span><span>Add Classroom</span></a>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="admintimetable.php" class="active"><span class="las la-calendar-check"></span><span>Time Table</span></a>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="adminnotification.php" class="active"><span
                            class="las la-calendar-check"></span><span>Send Notification</span></a>
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
                                    <h2> Class Properties </h2>
                                 </div>
                                 <div class="card-body">
                                     <table width="100%">
                                    <thead>
                                        <tr>
                                            
                                            <td>Classroom Name</td>
                                            <td>Capacity</td>
                                            <td>Number of Blackboard</td>
                                            <td>Student Seat Type</td>
                                            <td>Availability of Prof-Desk</td>
                                            <td>Projector</td>
                                            <td>Smart-Board</td>
                                            <td>Internet</td>
                                            <td>Pc</td>
                                            <td>Speaker System</td>
                                            <td>Climate</td>
                                          
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                      
                                        
                                            <td>
                                            <?php
                                            $result = mysqli_query($conn,"SELECT * FROM classproperties INNER JOIN classroom ON classproperties.ClassroomId = classroom.ClassroomId");
                                            
                                           
                                          
                                            while($row=mysqli_fetch_array($result))
                                            {
                                               
                                            echo "<tr>";
                                            
                                            echo "<td>" . $row['ClassroomCode'] . "</td>";
                                            echo "<td>" . $row['capacity'] . "</td>";
                                            echo "<td>" . $row['numberofblackboard'] . "</td>";
                                            echo "<td>" . $row['studentseattype'] . "</td>";
                                            echo "<td>" . $row['avaibilityofprofdesk'] . "</td>";
                                            echo "<td>" . $row['projector'] . "</td>";
                                            echo "<td>" . $row['smartboard'] . "</td>";
                                            echo "<td>" . $row['internet'] . "</td>";
                                            echo "<td>" . $row['pc'] . "</td>";
                                            echo "<td>" . $row['speakersystem'] . "</td>";
                                            echo "<td>" . $row['climate'] . "</td>";
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