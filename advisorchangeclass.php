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
    <title>Change Class</title>

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
        <body>
        <br>
        <form action="include/changeclass.inc.php" method="post">
                    <h4>
                        <p>My Course</p>
                    </h4>
                    <br>

                    <select class="dropdown-select" id="courseId" name="courseId">
                        <?php
                     $PR_sql = $conn->prepare("SELECT * FROM course INNER JOIN users ON course.userId = users.userId where course.userId=?");
                     $PR_sql->bind_param('s', $_SESSION['userData']["userId"]);
                     $PR_sql->execute();
                     $data = $PR_sql->get_result();
                     
                   
                     while($row=mysqli_fetch_array($data))
                     {
                        $courseId = $row['CourseId'];
                        $course_code = $row['CourseName'];
                       
                        
                        ?>
                        <option value="<?php echo $courseId  ?>">
                            <?php echo $course_code  ."<br>"; ?>
                        </option>
                        <?php
                    }
                 
                        
                     ?>



                    </select>
                    <h4>
                        <br>
                        <p>Advisor Name</p>
                    </h4>
                    <br>
                    <select class="dropdown-select" id="userId" name="userId">
                        <?php
                         
                    $query = "select * from users where userId!=".$_SESSION['userData']['userId']." and userType='advisor' ";
                    $result = mysqli_query($conn, $query);

                    while($row = mysqli_fetch_assoc($result))
                    {
                        $userId = $row['userId'];
                        $userFullName = $row['userFullName'];
                        
                        ?>
                        <option value="<?php echo $userId ?>">
                        
                            <?php echo $userFullName  ."<br>"; ?>
                        </option>
                        
                        <?php
                    }
                 
                        
                     ?>
                     
                    </select>   
                    <br>
                    <h4>
                        <p>Need Classroom</p>
                    </h4>
                    <br>

                    <select class="dropdown-select" id="ClassroomId" name="ClassroomId">
                        <?php
                     $PR_sql = $conn->prepare("SELECT  * FROM classroom where FacultyId !=".$_SESSION['userData']['FacultyIdS']."  AND ClassroomId   NOT IN (select ClassroomId from coursetime)  ");
                     
                     $PR_sql->bind_param('s', $_SESSION['userData']["ClassroomId"]);
                     $PR_sql->execute();
                     $data = $PR_sql->get_result();
                     
                   
                     while($row=mysqli_fetch_array($data))
                     {
                        $ClassroomId = $row['ClassroomId'];
                        $ClassroomCode = $row['ClassroomCode'];
                       
                        
                        ?>
                        <option value="<?php echo $ClassroomId  ?>">
                            <?php echo $ClassroomCode  ."<br>"; ?>
                        </option>
                        <?php
                    }
                    
                     ?>



                    </select>
                    <h4>
                        <br>
                        <p>Semester</p>
                    </h4>
                    <br>
                    <select class="dropdown-select" id="semesterId" name="semesterId">
                        <?php
                    $query = "SELECT * FROM semester  ";
                    $result = mysqli_query($conn, $query);

                    while($row = mysqli_fetch_assoc($result))
                    {
                        $semesterId = $row['SemesterId'];
                        $SemesterName = $row['SemesterName'];
                        
                        ?>
                        <option value="<?php echo $semesterId ?>">
                            <?php echo $SemesterName  ."<br>"; ?>
                        </option>
                        <?php
                    }
                 
                        
                     ?>
                    </select>

                    <br>
                    <h4>
                        <p>Days</p>
                    </h4>
                    <br>
                    <select class="form-select" id="gun" name="gun">
                    <option value="Monday"id="01">Monday</option>
                    <option value="Tuesday"id="02">Tuesday</option>
                    <option value="Wednesday"id="03">Wednesday</option>
                    <option value="Thursday"id="04">Thursday</option>
                    <option value="Friday"id="05">Friday</option>
                    <option value="Saturday"id="06">Saturday</option>
                    <option value="Sunday"id="07">Sunday </option>
                    </select>
                        
                 
                        
                    



                    </select>

                    <br>
                    <h4>
                        <p>Start Time</p>
                    </h4>
                    <br>
                    <select class="dropdown-select" id="start_time" name="start_time">
                        <?php
                    $query = "SELECT * FROM timer  ";
                    $result = mysqli_query($conn, $query);

                    while($row = mysqli_fetch_assoc($result))
                    {
                        $start_time = $row['start_time'];
                       
                       
                        
                        ?>
                        <option value="<?php echo $start_time;?>">
                            <?php echo $start_time ;?>
                        </option>
                        <?php
                    }
                 
                        
                     ?>

                    </select>
                    <br>
                    <h4>
                        <p>End Time</p>
                    </h4>
                    <br>
                    <select class="dropdown-select" id="end_time" name="end_time">
                        <?php
                    $query = "SELECT * FROM timer  ";
                    $result = mysqli_query($conn, $query);

                    while($row = mysqli_fetch_assoc($result))
                    {
                        $end_time = $row['end_time'];
                       
                        
                        ?>
                        <option value="<?php echo $end_time  ;?>">
                            <?php echo $end_time ;?>
                        </option>
                        <?php
                    }
                 
                        
                     ?>

                    </select>
                    <input class="" type="hidden" value="<?php echo $_SESSION['userData']["FacultyIdS"]; ?>" name="FacultyId">
           
                   
                    <input class="setbutton" type="submit" name="submit" value="Change Class">
                </form>
                <script>
                const users = document.querySelector("#userId")
                const classroom = document.querySelector("#ClassroomId")
                users.addEventListener("change", () => {
                    console.log(users.value)
                    const url = "http://localhost/Grad/advisorchangeclassjs.php?id="+users.value
                    const xhttp = new XMLHttpRequest();
                    xhttp.onload = function() {
                        classroom.innerHTML = this.responseText
                        
                    }
                    xhttp.open("GET", url);
                    xhttp.send();
                })
                </script>
        </body>

        </main>

</html>
