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
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
        
    <link rel="stylesheet" type="text/css" href="css/advisor.css">
   
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Schedule</title>

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
        <div>
                                    </div>
                     <div class="card-header">
                                    <h2>  Class Properties </h2>
                                 </div>
                                <div class="card-body">
                                     <table width="100%">

                                    <thead>
                                                                        <form action="" method="GET">
                                  
                                        <input type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Search data">
                                        <button type="submit" class="searching"> Search</button><br>
                                    
                                </form>
                                
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
                                        </div>
                                    </thead>
                                    <tbody>
                                <?php 
                                    $conn = mysqli_connect("localhost","root","","graduationproject");

                                    if(isset($_GET['search']))
                                    {
                                        $filtervalues = $_GET['search'];
                                        $query = "SELECT * FROM classproperties INNER JOIN classroom ON classproperties.ClassroomId = classroom.ClassroomId WHERE CONCAT(ClassroomCode,capacity,numberofblackboard,studentseattype,avaibilityofprofdesk,projector,smartboard,internet,pc,speakersystem,climate) LIKE '%$filtervalues%' ";

                                        $query_run = mysqli_query($conn, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $items)
                                            {
                                                ?>
                                                <tr>
                                                    <td><?= $items['ClassroomCode']; ?></td>
                                                    <td><?= $items['capacity']; ?></td>
                                                    <td><?= $items['numberofblackboard']; ?></td>
                                                    <td><?= $items['studentseattype']; ?></td>
                                                    <td><?= $items['avaibilityofprofdesk']; ?></td>
                                                    <td><?= $items['projector']; ?></td>
                                                    <td><?= $items['smartboard']; ?></td>
                                                    <td><?= $items['internet']; ?></td>
                                                    <td><?= $items['pc']; ?></td>
                                                    <td><?= $items['speakersystem']; ?></td>
                                                    <td><?= $items['climate']; ?></td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            ?>
                                                <tr>
                                                    <td colspan="4">No Record Found</td>
                                                </tr>
                                            <?php
                                        }
                                    }
                                ?>
                            </tbody>
                                    
                                     </table>
        </body>
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