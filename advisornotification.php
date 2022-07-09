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
    <title>Notification</title>

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
                                    Notifications
</h2>
                                    

                                 </div>
                                 <div class="card-body">
                                     <table width="100%">
                                    <thead>
                                        <tr>
                                       
                                            <td>Advisor Name</td>
                                            <td>Classroom Code</td>
                                            <td>Semester</td>
                                            <td>Date</td>
                                            <td>Start time</td>
                                            <td>End time</td>
                                            
                                           
                                            
                                            
                                          
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                      
                                        
                                            <td>
                                            <?php
                                             $result = mysqli_query($conn,"SELECT * FROM notif  
                                             INNER JOIN classroom ON notif.ClassroomId=classroom.ClassroomId
                                             INNER JOIN semester ON notif.semesterId=semester.SemesterId  
                                              where statuss='0' and userId=".$_SESSION['userData']["userId"] ." ");
                                             
                                            
                                          
                                           
                                          
                                             while($row=mysqli_fetch_array($result))
                                             {
                                                $select =mysqli_query($conn,"SELECT * from users where userId=".$row['senderId'] ." ");
                                                $row2=mysqli_fetch_array($select);
                                                echo "<tr>";
                                                    echo "<td>" . $row2['userFullName']. "</td>";
                                                    echo "<td>" . $row['ClassroomCode'] . "</td>";
                                                    echo "<td>" . $row['SemesterName'] . "</td>";
                                                    echo "<td> " . $row['gun'] . "</td>";
                                                    echo "<td>" . $row['start_time'] . "</td>";
                                                    echo "<td>" . $row['end_time'] . "</td>";
                                                  
                                                   echo "<td><button class='buttons'><a href='accept.php?id=".$row['notId']."'> Accept </a></td>";
                                                   echo "<td><button class='buttonsdecline'><a href='decline.php?id=".$row['notId']."'> Decline </a></td>";
                                                
                                                   
                
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
