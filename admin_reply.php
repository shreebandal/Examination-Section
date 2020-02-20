<?php
session_start();
if(!isset($_SESSION['username']))
	header('location: adminlogin.php');
?>
<?php include 'header.php'; ?>



<?php
@$username=$_GET['name'];
@$problem=$_GET['problem'];
@$id=$_GET['id'];
$con=mysqli_connect("localhost","root");

mysqli_select_db($con,'exam_center');
$q="select * from student where prn='$username'";

$result=mysqli_query($con,$q);
$num=mysqli_num_rows($result);
mysqli_close($con);

$row=mysqli_fetch_array($result);
?>

<?php
$con=mysqli_connect("localhost","root");
mysqli_select_db($con,'exam_center');
$q="select * from $problem where id=$id";
$result5=mysqli_query($con,$q);
$num5=mysqli_num_rows($result);
mysqli_close($con);

@$row5=mysqli_fetch_array($result5);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Reply</title>
    <style>
    input[type="text"], textarea{
        font-size: 120%;
        font-weight: 600;
    }
    </style>
    <script> 
        
        function validation(){

            var con = confirm("Are you sure you want to block this student?");
            
            if(!con)
                return false;
            return true;
        }
    </script>

</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <?php include 'admin_leftcol.php'; ?>
            <div class="col-md-6">
                <div id="admin-reply">
                    <form action="Reply.php" method="post">
                        <div class="form-group">
                            <div class="form-group row">
							    <input type="hidden" name="name" value="<?php echo $id;?>">
								<input type="hidden" name="problem" value="<?php echo $problem;?>">
                                <label for="name" class="col-md-2">Name</label>
                                <div class="col-md-10">
                                    <input type="text" readonly class="form-control-plaintext" id="name" value="<?php echo $row['firstname'];echo " ";echo $row['middlename'];echo " ";echo $row['lastname'];?>">
                                </div>
								<label for="email" class="col-md-2">E-Mail</label>
                                <div class="col-md-10">
                                    <input type="text" readonly class="form-control-plaintext" id="email" value="<?php echo $row['email'];?>">
                                </div>
                                <label for="prn" class="col-md-2">PRN</label>
                                <div class="col-md-10">
                                    <input type="text" readonly class="form-control-plaintext" id="prn" value="<?php echo $row['prn'];?>">
                                </div>
                                <label for="branch" class="col-md-2">Branch</label>
                                <div class="col-md-10">
                                    <input type="text" readonly class="form-control-plaintext" id="branch" value="<?php echo $row['branch'];?>">
                                </div>

                                <label for="year" class="col-md-2">Year</label>
                                <div class="col-md-10">
                                    <input type="text" readonly class="form-control-plaintext" id="year" value="<?php echo $row['year'];?>">
                                </div>
                                <label for="sem" class="col-md-2">Mobile Number</label>
                                <div class="col-md-10">
                                    <input type="text" readonly class="form-control-plaintext" id="sem" value="<?php echo $row['number'];?>">
                                </div>
								<label for="sem" class="col-md-2">Semister</label>
                                <div class="col-md-10">
                                    <input type="text" readonly class="form-control-plaintext" id="sem" value="<?php echo $row5['year'];?>">
                                </div>
                                <label for="problem" class="col-md-2">Problem</label>
                                <div class="col-md-10">
                                    <input type="text" readonly class="form-control-plaintext" id="problem" row="10" value="<?php echo $row5['query']; ?>">
                                </div>
                                <label for="description" class="col-md-2">Description</label>
                                <div class="col-md-10">
                                    <textarea class="form-control-plaintext" rows="5" max-rows="30" id ="description" readonly><?php echo $row5['description'];?></textarea>
                                </div>
                                <label for="reply" class="col-md-2">Reply</label>
                                <div class="col-md-10">
                                    <textarea class="form-control" name="reply" rows="10" max-rows="30" value="" required></textarea>
                                </div>

                                <input type="submit" value="Submit">
								
                            </div>
                        </div>
                    </form>
					<a class="blockbtn" href="Block.php?id=<?php echo $username;?>"><button type="button" value="" onclick="return validation()">Block this PRN</button></a>
                </div>
            </div>
            
            <?php include 'important_updates.php'; ?>
        </div>
    </div>

<?php include 'footer.php';?>
