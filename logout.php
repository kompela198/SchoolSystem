
<?php
ob_start();  
session_start();
session_unset();    
session_destroy();
unset($_SESSION['adminEmail']);
header("Location: ../Grad/index.php");
exit();
?>
