<?php
session_start();
$username=$_POST['username'];
$password=$_POST['password'];

$con=mysqli_connect("localhost","root");
mysqli_select_db($con,'exam_center');

$q="select * from teacher where username='$username' && password='$password'";
$result=mysqli_query($con,$q);
$num=mysqli_num_rows($result);
if($num==1)
{
	$_SESSION['username']=$username;
	header('location:admin_complaint.php');
}
else
{
	header('location:adminlogin.php');
}

	
mysqli_close($con);
?>



