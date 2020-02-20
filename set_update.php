<?php
session_start();
if(!isset($_SESSION['username']))
	header('location:adminlogin.php');
?>

<?php include 'header.php'; ?>

<?php
$con=mysqli_connect("localhost","root");
mysqli_select_db($con,'exam_center');
$q="select * from setupdate";
$result=mysqli_query($con,$q);
$num=mysqli_num_rows($result);
mysqli_close($con);
?>

<!Doctype html>
<html>
<head>
    <title>Update</title>

    
    <script>
    
    function validation(){
        var del = document.getElementsByName("delete")[0].value;
        var con = confirm("Do you really want to permanently delete this update?");

        if(!con)
            return false;
        return true;
    }
    </script>
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <!--        First column (Student Resource) -->
         <?php include 'admin_leftcol.php'; ?>
            <!--        Middle column (Loging/SignUp)       -->
            <div class="col-md-6">
                <div id="updates-table">


                <label for="explaination"><strong>Update:</strong></label>
							<form action="NewUpdate.php" method="post">
                            <textarea class="form-control" id="explaination" name="newupdate" rows="5" placeholder="New update" required></textarea>
                            <button type="submit" class="upbtn">Update</button>                          
                            </form>
                            
                        <div class="form-group">

                            <table class="table table-hover" style="margin-top: 10%;">
								<thead>
                                    <tr>
                                        <th scope="col">Previous Updates</th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>								        
                                <tbody>
                                    <tr>
                                        
                                            <div class="text-wrap text-justify">
                                                <?php
												for($i=1;$i<=$num;$i++)
												{
												    $row=mysqli_fetch_array($result);
												?>
												<form action="Delete.php" method="post" onsubmit = "return validation()">
												<tr>
												<input type="hidden" name="id" value="<?php echo $row['id'];?>">
												<td><?php echo $row['setupdate'];?></td>
												<td><button type="submit" name="delete">Delete</button></td>
												</form>
												<td><button type="button" name="edit"><a href="Edit.php?id=<?php echo $row['id'];?>" style="text-decoration:none;color:white;">Edit</a></button></td>
												</tr>
												<?php
												    }
												?>
                                            </div>                                        
										</tr>
                                   </tbody>
                            </table>
                            
                        </div>
                    
                </div>
            </div>
            <!--        Third Column  (important dates)     -->
            <?php include 'important_updates.php'; ?>
        </div>

    </div>

    <?php include 'footer.php';?>

