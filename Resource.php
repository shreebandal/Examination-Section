<?php
  session_start();
  if(!isset($_SESSION['username']))
    header('location:adminlogin.php');?>

<?php include 'header.php'; ?>

<?php include 'functions.php'; 
  makedir("resources");
?>

<?php

  $con = mysqli_connect('localhost','root','');
	mysqli_select_db($con , 'exam_center');

	if(isset($_POST['upload'])){
		$topic = escape($_POST['topic']);
		$files = $_FILES['file'];

		$filename =$files['name'];
		$fileerror = $files['error'];
		$filetmp = $files['tmp_name'];
    $filerand = uniqid();

		$fileext = explode('.',$filename);
		$filecheck = strtolower(end($fileext));

		$fileextstored = array('png','jpg','jpeg','pdf');

    $strFilename = 'resources/'.$filerand.'_'.$filename;

    $sq = "SELECT name, file FROM resources WHERE name='$topic' AND file='$strFilename'";
    $query1 = mysqli_query($con, $sq);

    if($query1){
    if($row = mysqli_num_rows($query1) == 0){
        if ($fileext[1] == 'png' || $fileext[1] == 'jpg' || $fileext[1] == 'jpeg' || $fileext[1] == 'pdf') {
            if (in_array($filecheck, $fileextstored)) {
                $destinationfile = 'resources/'.$filerand.'_'.$filename;
                move_uploaded_file($filetmp, $destinationfile);

                $q = "INSERT INTO `resources` (`name`, `file`) VALUES ('$topic', '$destinationfile')";

                $query = mysqli_query($con, $q);

                if(!$query){
                  $uploaderr = "Unable to upload resource";
                }

            }
        }else $uploaderr = "Only png, jpg, jpeg and png formats are supported";
    }else{
        $uploaderr = "File is already uploaded";
    }
  }else echo "Unable to run query";

	}

  if(isset($_GET['rid'])){
    extract($_REQUEST);
    // include("Resourse.php");
    $con = mysqli_connect('localhost','root','');
    mysqli_select_db($con , 'exam_center');

    $del = $_GET['rid'];

    $sql=mysqli_query($con, "SELECT * FROM resources WHERE id='$del'");
    $row = mysqli_fetch_array($sql);
    echo $row;
    mysqli_query($con, "DELETE FROM `resources` WHERE id = '$del'");
    unlink("./resources/$row[file]");
    mysqli_close($con);

    header('Location:Resource.php');

  }
?>


<!Doctype html>
<html>
<head>
    <title>Resource</title>

</head>

<body>

    <div class="container-fluid">
        <div class="row">
            
        <?php include 'admin_leftcol.php';?>
            <!--        Middle column (Loging/SignUp)       -->
            
            <div class="col-md-6">
                <div id="updates-table">

                <p><?php echo isset($uploaderr)? "<span class='error'>$uploaderr</span>" : ""; ?> </p>

                  <form action="Resource.php" method="post" enctype="multipart/form-data" >
                          
                      <h2>Upload Resource</h2>
                      <div class="form-row">
                      
                      <label for="upload" class="col-md-2">Title : </label>

                      <div class="col-md-10">
                          <input type="text" name="topic" required class="form-control">
                        </div>
                        </div>
                          <br>

                          <input type="file" name="file" required><br>
                          <button type="submit" name="upload">Upload</button>
                  </form> <br>


                  <table class="table table-hover" style="table-layout: fixed; margin-top:10%;">
                      <thead>
                          <tr>
                              <th scope="col">Previous Resources</th>
                              <th scope="col"></th>
                              <th scope="col"></th>
                          </tr>
                      </thead>

											<?php
												$displayquery = "SELECT * FROM resources";
												$querydisplay = mysqli_query($con, $displayquery);

												$row =mysqli_num_rows($querydisplay);

												while($result = mysqli_fetch_assoc($querydisplay)){
													if($result['name'])
                          
                          ?>
                        <!--           Resource update -->
                    <tbody>
                    <tr>
									<form action="Resource.php" action="POST">
                          <td scope="row">

                            <div class="text-wrap text-justify">
                                <?php echo $result['name'];?>
                              
                          </div>
                          </td>

													<td>
														<a href="<?php echo $result['file']?>" target="_blank" class="rview">View File</a>
                          </td>

                          <td>
                            <input type="hidden" value="<?php echo $result['id']?>" name="rid">
                            <input type="submit" value="Delete" class="rview">
                          </td>
											</form>
                    </tr>

                        <?php
                            }
                        ?>
                      </tbody>
                  </table>
                </div>
              </div>
            
                <?php include 'important_updates.php'; ?>
        </div>

    </div>


    <?php include 'footer.php';?>
