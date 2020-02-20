<?php
session_start();
if(!isset($_SESSION['username']))
	header('location: adminlogin.php');
?>

<?php include 'header.php'; ?>

<?php
$id=$_GET['id'];

$con=mysqli_connect("localhost","root");
mysqli_select_db($con,'exam_center');
$q="select * from setupdate where id='$id'";
$result=mysqli_query($con,$q);
$num=mysqli_num_rows($result);
mysqli_close($con);
$row=mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            
        <?php include 'admin_leftcol.php'; ?>

            <div class="col-md-6">
                <div id="signup">
                    <form action="save_edit.php" method="post">
                        <div class="signup-form">
                            <div class="form-group">
                                <h1>Edit</h1><br>
                                <div class="signup">
                                    <div class="form-row">
                                        <div class="col-md-4">
                                            <input type="text" id="fname" class="form-control" value="<?php echo $row['setupdate'];?>" name="edit">
											<input type="hidden" name="name" value="<?php echo $id;?>">
                                        </div>
                                    <input type="submit" value="Update"><br>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <?php include 'important_updates.php'; ?>
    </div>
<?php include 'footer.php';?>
