<?php
session_start();
if(!isset($_SESSION['prn']))
	header('location: index.php');
?>

<?php include 'header.php'; ?>

<?php
$username=$_SESSION['prn'];

$con=mysqli_connect("localhost","root");
mysqli_select_db($con,'exam_center');
$q="select * from exams ";
$result=mysqli_query($con,$q);
$num=mysqli_num_rows($result);
mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Track Exam Problems</title>

	<style>
	
	
	</style>
</head>

<body>
<div class="container-fluid">
        <div class="row">

           <?php include 'left_column.php'; ?>

            <div class="col-md-6">
                <div id="exam-problem">
                    <h2>Track Exam Problems</h2>
						<?php
						for($i=1;$i<=$num;$i++)
						{
						?>
						<?php
						$row=mysqli_fetch_array($result);
						 if($row['name']==$username) {
						?>
						<details>
							<summary><?php echo "($i) QUERY: "; echo $row['query'];?></summary>
						
						<p><?php echo "ANSWER: "; echo $row['reply'];?></p>
						</details>
						
						
						
						
						<?php
						 }
						}
						?>
                    
                </div>
            </div>

            <?php include 'important_updates.php'; ?>
        </div>
    </div>

    <?php include 'footer.php';?>
