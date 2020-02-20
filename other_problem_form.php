<?php
session_start();
if(!isset($_SESSION['prn']))
	header('location:index.php');
?>

<?php include 'header.php'; ?>

<?php include 'functions.php'; 

    makedir("otherproof");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Other Problems</title>
</head>

<body>
    <div class="container-fluid">
    <?php

        if (isset($_POST['submit'])) {
            $name = $_SESSION['prn'];
            $otherquery  = escape($_POST['otherquery']);
            $otherquery1 = trim(escape($_POST['otherquery1']));
            $sem        = escape($_POST['semester']);
            $year       = escape($_POST['year']);
						$files = $_FILES['file'];

						$filesize =$files['size'];
						$filename =$files['name'];
						$fileerror = $files['error'];
						$filetmp = $files['tmp_name'];
				         $filerand = uniqid();

						$fileext = explode('.',$filename);
						$filecheck = strtolower(end($fileext));

						$fileextstored = array('png','jpg','jpeg','pdf');

            if($sem == "Select Exam")
                $errSm = "Select valid exam season";

            if($year == "Select Year")
                $errY = "Select valid year";

            if($otherquery == "Select Category")
                $errC = "Select valid category";

            if($otherquery1 == "")
                $errQ = "Please enter valid explaination";

						if ($fileext[1] != 'png' && $fileext[1] != 'jpg' && $fileext[1] != 'jpeg' && $fileext[1] != 'pdf')
								$errF = "Select valid file . Only png, jpg, jpeg and png formats are supported";
                    echo $filesize; 
						if($filesize > 256000)
								$errSz = "Upload file with size less than 256kb";

            $con = mysqli_connect("localhost", "root", "", "exam_center");

						if(!isset($errSm) && !isset($errY) && !isset($errC) && isset($name) && !isset($errQ) && !isset($errF) && !isset($errSz)){
											$destinationfile = 'otherproof/'.$filerand.'_'.$filename;
											move_uploaded_file($filetmp, $destinationfile);

											$p      = "INSERT INTO other(name,query,description,exam,year,file) values ('$name','$otherquery','$otherquery1','$sem','$year','$destinationfile')";
											$result = mysqli_query($con, $p);
											echo "<div class='notification'>Query Submitted.</div>";
											header("Refresh:2; url=complaints.php");


		        }else echo "<div class='notification'>Something went wrong.</div>";
		        mysqli_close($con);
		    }
    ?>
        <div class="row">

            <?php include 'left_column.php';?>

            <div class="col-md-6">
                <div id="exam-problem">
                    <h2>Other Problems</h2>

                    <form action="other_problem_form.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-4">
                                    <label for="exam">Exam </label>
                                    <select class="form-control" name="semester" required>
                                        <option>Select Exam</option>
                                        <option value="winter">Winter Semester</option>
                                        <option value="summer">Summer Semester</option>
                                        <option value="remedial">Remedial</option>
                                        <option value="supplentary">Supplementary</option>
                                    </select>
                                    <?php echo isset($errSm)? "<span class='error'>$errSm</span>": ""; ?>

                                </div>
                                <div class="col-md-5">
                                    <label for="problem-category">Problem Category</label>
                                    <select id="problem-category" class="form-control" name="otherquery" required>
                                        <option >Select Category</option>
                                        <option value="testing">Testing</option>
                                    </select>
                                    <?php echo isset($errC)? "<span class='error'>$errC</span>": ""; ?>

                                </div>
								<div class="col-md-3">
                                    <label for="year">Year</label>
                                    <select id="year" class="form-control" name="year" required>
                                        <option>Select Year</option>
										<option value="2016">2016</option>
										<option value="2017">2017</option>
										<option value="2018">2018</option>
										<option value="2019">2019</option>
                                    </select>
                                    <?php echo isset($errY)? "<span class='error'>$errY</span>": ""; ?>

                                </div>
                            </div>
														<div      class = "explaination-area">
														<label    for   = "explaination">Explaination</label>
														<textarea class = "form-control" id = "explaination" name = "otherquery1" cols = "50" rows = "10" placeholder = "Type your problem here" required></textarea>

														<?php echo isset($errQ)? "<span class='error'>$errQ</span>": ""; ?>
														</div><br>
														<div class = "upload-area">
																<div class="form-row">
																	<label for="upload">Proof : </label><br><br>
																</div>
																<div>
																	<input type="file" name="file" required><br>
																</div>
																<?php echo isset($errF)? "<span class='error'>$errF</span>": ""; ?>
																<?php echo isset($errSz)? "<span class='error'>$errSz</span>": ""; ?>
														</div>

                                <br><input type="submit" value="Submit" name="submit">
                                <input type="reset" value="Reset">
                            </div>

                    </form>
                </div>
            </div>

            <?php include 'important_updates.php'; ?>
        </div>
    </div>

    <?php include 'footer.php';?>
