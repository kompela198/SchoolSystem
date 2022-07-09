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
    <title>Advisor Add Schedule</title>

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
            <form action="include/advisorscheduleadd.inc.php" method="post">
               
                    <h4>
                        <p>Faculty</p>
                    </h4>
                    <br>
                    <select class="dropdown-select" id="faculty" name="faculty">
                        <?php
                     
                    $query = "SELECT * FROM faculty WHERE FacultyId='".$_SESSION['userData'][5]."'";
                   
                    $result = mysqli_query($conn, $query);

                    while($row = mysqli_fetch_assoc($result))
                    {
                        $faculty_id = $row['FacultyId'];
                        $faculty_name = $row['FacultyName'];
                     
                        
                        ?>
                        <option value="<?php echo $faculty_id ?>">
                            <?php echo $faculty_name  ."<br>"; ?>
                        </option>
                        <?php
                    }
                 
                        
                     ?>



                    </select>
                    <br>
                    <h4>
                        <p>Course</p>
                    </h4>
                    <br>

                    <select class="dropdown-select" id="course" name="course">
                        <?php
                      $query = "SELECT * FROM course WHERE userId='".$_SESSION['userData'][0]."'";
                    $result = mysqli_query($conn, $query);

                    while($row = mysqli_fetch_assoc($result))
                    {
                        $course_id = $row['CourseId'];
                        $course_code = $row['CourseCode'];
                        $course_name = $row['CourseName'];
                       
                        
                        ?>
                        <option value="<?php echo $course_id  ?>">
                            <?php echo $course_name  ."<br>"; ?>
                        </option>
                        <?php
                    }
                 
                        
                     ?>



                    </select>
                    <br>
                    <h4>
                        <p>Classroom</p>
                    </h4>
                    <br>
                    <select class="dropdown-select" id="classroom" name="classroom">
                        <?php
                      $query = "SELECT * FROM classroom WHERE FacultyId='".$_SESSION['userData'][5]."'";
                    $result = mysqli_query($conn, $query);

                    while($row = mysqli_fetch_assoc($result))
                    {
                        $room_id = $row['ClassroomId'];
                        $room_code = $row['ClassroomCode'];
                       
                        
                        ?>
                        <option value="<?php echo $room_id  ?>">
                            <?php echo $room_code  ."<br>"; ?>
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
                    <select class="dropdown-select" id="SemesterId" name="SemesterId">
                        <?php
                    $query = "SELECT * FROM semester  ";
                    $result = mysqli_query($conn, $query);

                    while($row = mysqli_fetch_assoc($result))
                    {
                        $SemesterId = $row['SemesterId'];
                        $SemesterName = $row['SemesterName'];
                        
                        ?>
                        <option value="<?php echo $SemesterId ?>">
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
                    <option value="Monday">Monday</option>
                    <option value="Tuesday">Tuesday</option>
                    <option value="Wednesday">Wednesday</option>
                    <option value="Thursday">Thursday</option>
                    <option value="Friday">Friday</option>
                    <option value="Saturday">Saturday</option>
                    <option value="Sunday">Sunday </option>
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

                    <input class="setbutton" type="submit" name="submit" value="Set">

                
            </form>

            <script>
                const faculty = document.querySelector("#faculty")
                const course = document.querySelector("#course")
                const classroom = document.querySelector("#classroom")
                faculty.addEventListener("change", () => {
                    console.log(faculty.value)
                    const url = "http://localhost/Grad/addschedulejs.php?id="+faculty.value
                    const xhttp = new XMLHttpRequest();
                    xhttp.onload = function() {
                        course.innerHTML = this.responseText
                        
                    }
                    xhttp.open("GET", url);
                    xhttp.send();
                })

                faculty.addEventListener("change", () => {
                    console.log(faculty.value)
                    const url = "http://localhost/Grad/addschedulejs.php?classroomId="+faculty.value
                    const xhttp = new XMLHttpRequest();
                    xhttp.onload = function() {
                        console.log(this.responseText)
                        classroom.innerHTML = this.responseText
                        
                    }
                    xhttp.open("GET", url);
                    xhttp.send();
                })
            </script>
            
        </body>


    </div>



</html>