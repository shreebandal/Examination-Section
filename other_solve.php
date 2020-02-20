<?php
session_start();
if(!isset($_SESSION['username']))
	header('location: adminlogin.php');
?>

<?php include 'header.php'; ?>

<?php
$problem=$_GET['problem'];

$username=$_SESSION['username'];
$con=mysqli_connect("localhost","root");
mysqli_select_db($con,'exam_center');
$q="select * from other ";
$result=mysqli_query($con,$q);
$num=mysqli_num_rows($result);
mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Other Problems</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <?php include 'admin_leftcol.php'; ?>
            <div class="col-md-6">
                <div id="exam-problem">
                    <h2>Other Problems</h2>
					<?php
						for($i=1;$i<=$num;$i++)
						{
						$row=mysqli_fetch_array($result);
						if(!isset($row['reply'])){
						?><div>
						
						<details>
							<summary><?php echo $row['name']; ?></summary>
						<p><?php echo"QUERY: "; echo $row['query'];?> <a class="qview" href="admin_reply.php?name=<?php echo $row['name'];?>&problem=<?php echo $problem;?>&id=<?php echo $row['id'];?>">VIEW</a></p>
						</details>
						</div>
						
						
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
