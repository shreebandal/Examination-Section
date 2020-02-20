<?php 

    if(!isset($_SESSION['prn'])){
        session_start();
        unset($_SESSION['username']);
    } 
    header('Location: adminlogin.php');
    
    ?>