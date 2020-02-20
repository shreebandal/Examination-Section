<?php
session_start();
if(!isset($_SESSION['username']))
	header('location:adminlogin.php');
?>

<?php
$update=$_POST['newupdate'];
$con=mysqli_connect("localhost","root");
mysqli_select_db($con,'exam_center');
$q="insert into setupdate (setupdate) values ('$update')";
$result=mysqli_query($con,$q);
mysqli_close($con);
header('location:set_update.php');
?>

