<?php
if (!isset($_SESSION['username'])) {
    session_start();
    unset($_SESSION['prn']);
}
header('location:index.php');
?>

