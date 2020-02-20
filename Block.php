<?php
session_start();
if(!isset($_SESSION['username']))
	header('location:adminlogin.php');
?>

<?php
$name=$_GET['id'];

$con=mysqli_connect("localhost","root");
mysqli_select_db($con,'exam_center');

$d="delete from exams where name='$name'";
mysqli_query($con,$d);
$e="delete from result where name='$name'";
mysqli_query($con,$e);
$f="delete from other where name='$name'";
mysqli_query($con,$f);
$g="delete from fee where name='$name'";
mysqli_query($con,$g);

$c="insert into studentblock (prn) values ('$name')";
mysqli_query($con,$c);

$b="delete from student where prn='$name'";
mysqli_query($con,$b);

mysqli_close($con);
header('location:admin_complaint.php');
?>