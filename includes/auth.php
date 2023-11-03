<?php 
session_start();
// check if the user is logged in 
    if(!isset($_SESSION['id'])){
         $_SESSION['err']="login, stop going through the corners";
        header("location:login.php");
       

    }
    // don't let the user route back to the login page if already logged in


?>