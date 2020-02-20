<?php
session_start();
if(!isset($_SESSION['username']))
	header('location:adminlogin.php');
?>

<?php
$id=$_POST['id'];
$con=mysqli_connect("localhost","root");
mysqli_select_db($con,'exam_center');
$q="delete from setupdate where id='$id'";
$result=mysqli_query($con,$q);
mysqli_close($con);
header('location:set_update.php');
?>


