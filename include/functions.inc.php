<?php



  
    function  createUser($conn,$fullname,$email,$password,$FacultyId){

    

        $sql="INSERT INTO users(userFullName,userEmail,userPassword,FacultyIdS)VALUES(?,?,?,?)"; 
        
        $stmt =mysqli_stmt_init($conn);
        
        if (!mysqli_stmt_prepare($stmt,$sql)) {
            header("Location: ../createadvisor.php?error=createUserStmtFailed");
            exit();
        }
        
    
        mysqli_set_charset($conn,"utf8");
        mysqli_stmt_bind_param($stmt,"ssss", $fullname,$email,$password,$FacultyId);
      mysqli_stmt_execute($stmt);
         mysqli_stmt_close($stmt);
        echo "<script type='text/javascript'>
        alert('New advisor added successfuly');
           window.location='../createadvisor.php';
              </script>";
        exit();
         }

         function pwdMatch($password,$repeatpassword){
            $result;
            if ($password !== $repeatpassword){
                $result=true;
            }
            else{
                $result=false;
            }
            return $result;
            }
           

            function EmailExists($conn,$email){
                $sql="SELECT * FROM users WHERE userEmail = ?;";
                $stmt =mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt,$sql)) {
                    header("Location: ../createadvisor.php?error=emailStmtFailed");
                    exit();
                }
                mysqli_set_charset($conn,"utf8");
                mysqli_stmt_bind_param($stmt,"s",$email);
                mysqli_stmt_execute($stmt);
                $resultData=mysqli_stmt_get_result($stmt);
                if ($row = mysqli_fetch_assoc($resultData)) {
                    return $row;
                }
                else{
                    $result=false;
                    return $result;
                }
            
                mysqli_stmt_close($stmt);
                }
                function loginUser($conn,$email,$password){
              
                    $email= $_POST["email"];
                    $password= $_POST["password"];
                    include "dbh.inc.php";
                    $sql="select * from users where userEmail='".$email."'AND userPassword ='".$password ."'";
                    
                     $result=mysqli_query($conn,$sql);
                     $row=mysqli_fetch_array($result);
                    
                    if($row["userType"]=="admin")
                    {
                       
                        $_SESSION['userLogin'] = "Loggedin";
                        $_SESSION['userData'] = $row;
                     
                        header("Location: ../admin.php");
                    }
                    else if($row["userType"]=="advisor")
                    {
                      
                        $_SESSION['userLogin'] = "Loggedin";
                        $_SESSION['userData'] = $row; 
                       
                        
                        
                       
                        header("Location: ../advisor.php");
                    }
                    else{
                       
                        header("Location: ../login.php?error=wrongmailorpassword");
                        echo" Wrong Mail or password";
    
                    }
                }

                

             function  scheduleAdd($conn,$faculty,$course,$classroom,$start_time,$end_time,$gun,$SemesterId){
                
                $sql="INSERT INTO coursetime(FacultyId,courseId,ClassroomId,start_time,end_time,gun,SemesterId)VALUES(?,?,?,?,?,?,?);";
                
                $stmt =mysqli_stmt_init($conn);
                
                if (!mysqli_stmt_prepare($stmt,$sql)) {
                    header("Location: ../schedule.php?error=addScheduleStmtFailed");
                    exit();
                }
            
            
                mysqli_set_charset($conn,"utf8");
                mysqli_stmt_bind_param($stmt,"sssssss", $faculty,$course,$classroom,$start_time,$end_time,$gun,$SemesterId);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
                echo "<script type='text/javascript'>
                alert('New schedule added successfuly');
                   window.location='../addschedule.php';
                     </script>";
                exit();
                 }
                 
             function  AdvisorScheduleAdd($conn,$faculty,$course,$classroom,$start_time,$end_time,$gun,$SemesterId){
                
                $sql="INSERT INTO coursetime(FacultyId,courseId,ClassroomId,start_time,end_time,gun,SemesterId)VALUES(?,?,?,?,?,?,?);";
                
                $stmt =mysqli_stmt_init($conn);
                
                if (!mysqli_stmt_prepare($stmt,$sql)) {
                    header("Location: ../schedule.php?error=addScheduleStmtFailed");
                    exit();
                }
            
            
                mysqli_set_charset($conn,"utf8");
                mysqli_stmt_bind_param($stmt,"sssssss", $faculty,$course,$classroom,$start_time,$end_time,$gun,$SemesterId);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
                echo "<script type='text/javascript'>
                alert('New schedule added successfuly');
                   window.location='../advisoraddschedule.php';
                     </script>";
                exit();
                 }
                 
                 function   createCourse($conn,$CourseCode,$CourseName,$userId,$SemesterId){
                
                    $sql="INSERT INTO course (CourseCode,CourseName,userId,SemesterId)VALUES(?,?,?,?);";
                    
                    $stmt =mysqli_stmt_init($conn);
                    
                    if (!mysqli_stmt_prepare($stmt,$sql)) {
                        header("Location: ../faculty.php?error=addScheduleStmtFailed");
                        exit();
                    }
                
                
                    mysqli_set_charset($conn,"utf8");
                    mysqli_stmt_bind_param($stmt,"ssss", $CourseCode,$CourseName,$userId,$SemesterId);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_close($stmt);
                    echo "<script type='text/javascript'>
                    alert('New Course added successfuly');
                       window.location='../course.php';
                         </script>";
                    exit();
                     }
                 

                  

                         function  addClassroom($conn,$ClassroomCode,$FacultyId){
                
                            $sql="INSERT INTO classroom(ClassroomCode,FacultyId)VALUES(?,?);";
                            
                            $stmt =mysqli_stmt_init($conn);
                            
                            if (!mysqli_stmt_prepare($stmt,$sql)) {
                                header("Location: ../addclassroom.php?error=addScheduleStmtFailed");
                                exit();
                            }
                        
                        
                            mysqli_set_charset($conn,"utf8");
                            mysqli_stmt_bind_param($stmt,"ss", $ClassroomCode,$FacultyId);
                            mysqli_stmt_execute($stmt);
                            mysqli_stmt_close($stmt);
                            echo "<script type='text/javascript'>
                            alert('New Classroom added successfuly');
                               window.location='../addclassroom.php';
                                 </script>";
                            exit();
                             }
                             

                             function  addProperties($conn,$ClassroomId,$capacity,$numberofblackboard,$studentseattype,$avaibilityofprofdesk,$projector,$smartboard,$internet,$pc,$speakersystem,$climate){
   
                                $sql="INSERT INTO classproperties(ClassroomId,capacity,numberofblackboard,studentseattype,avaibilityofprofdesk,projector,smartboard,internet,pc,speakersystem,climate )VALUES(?,?,?,?,?,?,?,?,?,?,?);";
                                
                                $stmt =mysqli_stmt_init($conn);
                                
                                if (!mysqli_stmt_prepare($stmt,$sql)) {
                                    header("Location: ../addproperties.php?error=addScheduleStmtFailed");
                                    exit();
                                }
                            
                            
                                mysqli_set_charset($conn,"utf8");
                                mysqli_stmt_bind_param($stmt,"sssssssssss", $ClassroomId,$capacity,$numberofblackboard,$studentseattype,$avaibilityofprofdesk,$projector,$smartboard,$internet,$pc,$speakersystem,$climate);
                                mysqli_stmt_execute($stmt);
                                mysqli_stmt_close($stmt);
                                echo "<script type='text/javascript'>
                                alert('New Properties added successfuly');
                                   window.location='../addproperties.php';
                                     </script>";
                                exit();
                                 }
                                 function addNotification($conn,$userId,$description,$subject){
                
                                    $sql="INSERT INTO notifications (userId,descriptions,subjects)VALUES(?,?,?);";
                                    
                                    $stmt =mysqli_stmt_init($conn);
                                    
                                    if (!mysqli_stmt_prepare($stmt,$sql)) {
                                        header("Location: ../addnotification.php?error=addnotificationStmtFailed");
                                        exit();
                                    }
                                
                                
                                    mysqli_set_charset($conn,"utf8");
                                    mysqli_stmt_bind_param($stmt,"sss", $userId,$description,$subject);
                                    mysqli_stmt_execute($stmt);
                                    mysqli_stmt_close($stmt);
                                    echo "<script type='text/javascript'>
                                    alert(' Notification Posted');
                                       window.location='../adminnotification.php';
                                         </script>";
                                    exit();
                                     }

                                     function changeClass($conn,$courseId,$ClassroomId,$semesterId,$gun,$start_time,$end_time,$status,$FacultyId,$userId){
                                        session_start();
                                        ob_start();
                                        $sql="INSERT INTO notif (courseId,ClassroomId,semesterId,gun,start_time,end_time,statuss,FacultyId,userId,senderId)VALUES(?,?,?,?,?,?,?,?,?,?);";
                                        
                                        $stmt =mysqli_stmt_init($conn);
                                        
                                        if (!mysqli_stmt_prepare($stmt,$sql)) {
                                            header("Location: ../advisorchangeclass.php?error=changeClassStmtFailed");
                                            exit();
                                        }
                                    
                                    
                                        mysqli_set_charset($conn,"utf8");
                                        mysqli_stmt_bind_param($stmt,"ssssssssss",$courseId,$ClassroomId,$semesterId,$gun,$start_time,$end_time,$status,$FacultyId,$userId,$_SESSION['userData']['userId']);
                                        mysqli_stmt_execute($stmt);
                                        mysqli_stmt_close($stmt);
                                        echo "<script type='text/javascript'>
                                        alert(' Change Class Notification Sended');
                                           window.location='../advisorchangeclass.php';
                                             </script>";
                                        exit();
                                         }
                                 

                                    
    
                                   
                                    
                    

?>