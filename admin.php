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
    <title>Document</title>

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
            <div class="cards">
                <div class="card-single">
                    <div>
                        <h1>
                            <?php
                        $sql="select * from users where userType='advisor' ";
                        $result=mysqli_query($conn,$sql);
                        $row=mysqli_num_rows($result);
                        echo $row;
                        ?>

                        </h1>
                        <span>Total Advisor</span>
                    </div>
                    <div>
                        <span class="las la-users"></span>
                    </div>

                </div>
                <div class="card-single">
                    <div>
                        <h1>
                            <?php
                        $sql="select * from  faculty ";
                        $result=mysqli_query($conn,$sql);
                        $row=mysqli_num_rows($result);
                        echo $row;
                        ?>
                        </h1>
                        <span>Total Faculty</span>
                    </div>
                    <div>
                        <span class="las la-clipboard"></span>
                    </div>

                </div>
                <div class="card-single">
                    <div>
                        <h1>
                            <?php
                        $sql="select * from course";
                        $result=mysqli_query($conn,$sql);
                        $row=mysqli_num_rows($result);
                        echo $row;
                        ?>

                        </h1>
                        <span>Total Course</span>
                    </div>
                    <div>
                        <span class="las la-book"></span>
                    </div>

                </div>
                <div class="card-single">
                    <div>
                        <h1>
                            <?php
                        $sql="select * from classroom ";
                        $result=mysqli_query($conn,$sql);
                        $row=mysqli_num_rows($result);
                        echo $row;
                        ?>
                        </h1>
                        <span>Total Classroom</span>
                    </div>
                    <div>
                        <span class="las la-clipboard-list"></span>
                    </div>
                </div>
            </div>

        </main>

        <body>

        </body>


    </div>

</body>

</html>