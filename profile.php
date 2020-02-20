<?php
session_start();
if(!isset($_SESSION['prn']))
	header('location:index.php');
?>

<?php include 'header.php'; ?>

<?php
$username=$_SESSION['prn'];

$con=mysqli_connect("localhost","root");
mysqli_select_db($con,'exam_center');
$q="select * from student where prn='$username'";
$result=mysqli_query($con,$q);
$num=mysqli_num_rows($result);
mysqli_close($con);
$row=mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Profile</title>
	<style>
       #admin-reply hr + a{
        margin-left: auto;
        margin-right: auto;
        margin-top: 40px;
        height: 50px;
    }

    #admin-reply .upbtn{
		color: white;
		font-family: inherit;
        font-weight: lighter;    
        opacity: 0.7;
        border: none;
        background: none;
        background:linear-gradient(120deg, #808000,black);
        color: white;
        border: none;
        outline: none;
        padding: 10px 60px;  
        font-size: 140%;

    }
    #admin-reply input[type="text"]{
		font-weight: bold;
		font-size: 130%;
    }
    
	</style>
</head>

<body>

    <div class="container-fluid">
        <div class="row">
           <?php include 'left_column.php'; ?>

            <div class="col-md-6">
                <div id="admin-reply">
                    <div class="form-group">
                        <div class="form-group row">
                            <label for="name" style="margin-top: none;" class="col-md-2">Name: </label>
                                <div class="col-md-10">
                                <input type="text" readonly class="form-control-plaintext" id="name" value="<?php $name = $row['firstname'].' '.$row['middlename'].' '.$row['lastname']; echo $name;?>">
                            </div>
                            
                            <label for="prn" class="col-md-2">PRN: </label>
                            <div class="col-md-10">
                                <input type="text" readonly class="form-control-plaintext" id="prn" value="<?php echo $row['prn'];?>">
                                
                            </div>
                            <label for="branch" class="col-md-2">Branch: </label>
                            <div class="col-md-10">
                                <input type="text" readonly class="form-control-plaintext" id="branch" value="<?php echo $row['branch'];?>">
                                
                            </div>

                            <label for="year" class="col-md-2">Year:</label>
                            <div class="col-md-10">
                                <input type="text" readonly class="form-control-plaintext" id="year" value="<?php echo $row['year'];?>">
                                
                            </div>
                            <label for="mobile" class="col-md-2">Mobile Number: </label>
                            <div class="col-md-10">
                                <input type="text" readonly class="form-control-plaintext" id="mobile" value="<?php echo $row['number'];?>">
                            </div>
                            
                            <label for="email" class="col-md-2">E-mail: </label>
                            <div class="col-md-10">
                                <input type="text" readonly class="form-control-plaintext" id="email" value="<?php echo $row['email'];?>">
                                </label>
                            </div>

                            
                            <div class="col-md-6">
                                <a href="UpdateProfile.php"><button class="upbtn">Update Profile</button></a>
                            </div>
                            <div class="col-md-6">
                            <a href="ChangePassword.php"><button class="upbtn">Change Password</button></a>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            <?php include 'important_updates.php'; ?>
        </div>
    </div>

<?php include 'footer.php';?>
