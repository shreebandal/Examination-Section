<?php
session_start();
if(!isset($_SESSION['prn']))
	header('location:index.php');
?>

<?php


if(isset($_POST['feequery']))
{
	$feequery=$_POST['feequery'];
	$feequery1=$_POST['feequery1'];
	$sem=$_POST['semester'];
	$year=$_POST['year'];
	$p="insert into fee(name,query,description,exam,year) values ('$name','$feequery','$feequery1','$sem','$year')";
	$result=mysqli_query($con,$p);
}
if(isset($_POST['resultquery']))
{
	$resultquery=$_POST['resultquery'];
	$resultquery1=$_POST['resultquery1'];
	$sem=$_POST['semester'];
	$year=$_POST['year'];
	$p="insert into result(name,query,description,exam,year) values ('$name','$resultquery','$resultquery1','$sem','$year')";
	$result=mysqli_query($con,$p);
}
if(isset($_POST['otherquery']))
{
	$otherquery=$_POST['otherquery'];
	$otherquery1=$_POST['otherquery1'];
	$sem=$_POST['semester'];
	$year=$_POST['year'];
	$p="insert into other(name,query,description,exam,year) values ('$name','$otherquery','$otherquery1','$sem','$year')";
	$result=mysqli_query($con,$p);
}


mysqli_close($con);
header('location:complaint_registration.php');
?>

















