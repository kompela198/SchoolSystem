<?php
session_start();  

?>
<link rel="stylesheet" href="css/login.css">
<link rel="icon" href="img/gau.png" sizes="16x16" />



<section class= "login-form"> 
<div class="center">
    <h2>Login</h2>
    <form action="include/login.include.php" method="post">
    <div class="txt_field">
            <input type="text" name="email" required>
            <label>Email</label>
        </div>
        <div class="txt_field">
            <input type="password" name="password"  required>
            <label>Password</label>
        </div>
        <input type="submit" name="submit" value="Login" ></input>
       
       
    </form>
    
    </div>
</section>

 