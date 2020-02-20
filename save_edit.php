<?php
session_start();
if(!isset($_SESSION['username']))
	header('location:adminlogin.php');
?>

<?php
$edit=$_POST['edit'];
$name=$_POST['name'];

$con=mysqli_connect("localhost","root");
mysqli_select_db($con,'exam_center');
$q="update setupdate SET setupdate='$edit' where id='$name'";
mysqli_query($con,$q);	
mysqli_close($con);
header('location:set_update.php');
?>


