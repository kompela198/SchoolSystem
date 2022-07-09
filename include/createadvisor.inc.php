
<?php
 require_once 'dbh.inc.php';
 require_once 'functions.inc.php';

if (isset($_POST["submit"])) {
  $fullname= $_POST["fullname"];
  $email= $_POST["email"];
  $password= $_POST["password"];
  $FacultyId=$_POST["FacultyId2"];
  $repeatpassword =$_POST["repeatpassword"];

 
if (pwdMatch($password,$repeatpassword)!==false) {
      header("Location: ../createadvisor.php?error=pwdMatch");
        exit();
  }
  if (EmailExists($conn,$email)!==false) {
    header("Location: ../createadvisor.php?error=EmailExists");
    exit();
}
   createUser($conn,$fullname,$email,$password,$FacultyId);
  
}
else{
  header("Location: ../createadvisor.php");
  
}
?>