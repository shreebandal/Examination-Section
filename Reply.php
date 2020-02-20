<?php
session_start();
if(!isset($_SESSION['username']))
	header('location:adminlogin.php');
?>

<?php 
$name=$_POST['name'];
$problem=$_POST['problem'];
$answer=$_POST['reply'];


$con=mysqli_connect("localhost","root");
mysqli_select_db($con,'exam_center');

$q="update $problem SET reply='$answer' where id='$name'"; 

mysqli_query($con,$q);	
mysqli_close($con);

header('location:admin_complaint.php');
?>





