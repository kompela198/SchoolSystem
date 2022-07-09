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
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/admin.css">
    <meta charset="UTF-8">


    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title> Add Classroom Properties</title>

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
                        <?php
                $sql="select * from users where userType='admin'";
                $result=mysqli_query($conn,$sql);
                $row=mysqli_fetch_array($result);
                echo $row[1];
                         ?>
                    </h3>

                    <small>
                        <?php
                $sql="select * from users where userType='admin'";
                $result=mysqli_query($conn,$sql);
                $row=mysqli_fetch_array($result);
                echo ucwords($row[4]);
                     ?>
                    </small>
                    <div class="navigation">

                        <a class="button" href="logout.php">

                            <h4>
                                <div class="logout">Logout</div>
                            </h4>
                        </a>

                    </div>
</div>
        </header>
        
        <main>

            <body>
            <form action="include/addproperties.inc.php" method="post">
            <div class="maincontext">
                <div class="classdiv">
                <h4>
                        <br>
                      <p>  Classroom</p>
                    </h4>
                    <br>
                    <select class="classdivselect" id="ClassroomId" name="ClassroomId">
                        <?php
                    $query = "SELECT * FROM classroom where ClassroomId NOT IN (select ClassroomId from classproperties)  ";
                    $result = mysqli_query($conn, $query);

                    while($row = mysqli_fetch_assoc($result))
                    {
                        $ClassroomId = $row['ClassroomId'];
                        $room_code = $row['ClassroomCode'];
                       
                        
                        ?>
                        <option value="<?php echo $ClassroomId  ?>">
                            <?php echo $room_code  ."<br>"; ?>
                        </option>
                        <?php
                    }
                 
                        
                     ?>
                     
                    </select>
                    <div class="leftdiv">
                <br><h4>
                        Capacity
                    </h4>
                    <br>                   
                    <input class="inputclass" type="number" min="0" max="500" id="capacity"  placeholder="0" required name="capacity">

                    <h4>
                        <br>
                        Number of Blackboard	
                    </h4>                   
                    <br>
                    <input class="inputclass" type="number" min="0" max="15" placeholder="0" id="numberofblackboard" required name="numberofblackboard">   
                    <h4>

                        <br>
                        Student Seat Type	
                    </h4>
                    <br>
                    
                    <select class="selectclass" name="studentseattype" id="studentseattype" >
                     <option value="Single">Single </option>
                      <option value="Double">Double	 </option>
                     
                    </select>
                    <h4>
                        <br>
                        Availability of Prof-Desk		
                    </h4>
                    <br>
                    <select class="selectclass" name="avaibilityofprofdesk" id="avaibilityofprofdesk" >
                     <option value="Available">Available </option>
                      <option value="Not available">Not Available	 </option>
                     
                    </select>
                    
                    <h4>
                        <br>
                        Projector	
                        	
                    </h4>
                    <br>
                    <select class="selectclass" name="projector" id="projector" >
                     <option value="Available">Available </option>
                      <option value="Not Available">Not Available	 </option>
   

</select>         
                </div>
                </div>
                
               
                <div class="rightdiv">

                <h4>
                        <br>
                        Smart-Board	
                    </h4>
                    <br>
                    <select class="selectclass" name="smartboard" id="smartboard" >
                     <option value="Available">Available </option>
                      <option value="Not Available">Not Available	 </option>
   
</select>
<h4>
                        <br>
                        Internet
                    </h4>
                    <br>
                    
                    <select class="selectclass" name="internet" id="internet">
                     <option value="Available">Available </option>
                      <option value="Not Available">Not Available	 </option>
                     
                    </select>
                    <h4>
                        <br>
                        PC	
                    </h4>
                
                    <br>
                    
                    <select class="selectclass" name="pc" id="pc">
                     <option value="Available">Available </option>
                      <option value="Not Available">Not Available	 </option>
                     
                    </select>
                     
                  <h4>
                    <br>
                    Speaker System		
                    </h4>
                
                    <br>
                    
                    <select class="selectclass" name="speakersystem" id="speakersystem"  >
                     <option value="Available">Available </option>
                      <option value="Not Available">Not Available	 </option>
                      
                     

                      </select>



                    <h4>
                        <br>
                        Climate
                    </h4>
                    <br>
                    <select class="selectclass" name="climate" id="climate" >
                     <option value="Available">Available </option>
                      <option value="Not Available">Not Available	 </option>
                     
                    </select>
                    <br>
                    <br>
                    
                </div>
                
                
              
                
                  </div>
                  <input class="addproperties" type="submit" name="submit" value="Add Properties">
                </div>
                </form>
                </body>
              
        </main>



  


</html>