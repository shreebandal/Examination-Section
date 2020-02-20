<?php
session_start();
if(!isset($_SESSION['username']))
	header('location:adminlogin.php');
?>

<?php
$id=$_GET['name'];
$con=mysqli_connect("localhost","root");
mysqli_select_db($con,'exam_center');
$q="delete from studentblock where prn='$id'";
$result=mysqli_query($con,$q);
mysqli_close($con);

header('location:Blocklist.php');
?>


