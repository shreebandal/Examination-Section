<?php include 'header.php'; ?>
<?php require_once 'functions.php'; ?>

<?php
session_start();
if(!isset($_SESSION['prn']))
	header('location:index.php');
?>


<?php
$username = $_SESSION['prn'];

$con = mysqli_connect("localhost","root");
mysqli_select_db($con,'exam_center');
$q      = "select * from student where prn='$username'";
$result = mysqli_query($con,$q);
$num    = mysqli_num_rows($result);
mysqli_close($con);
$row = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang = "en">
<head>
    <title>Update Profile</title>
    <!-- <script src = "../js/validation.js"></script> -->
</head>

<body>
    <div class = "container-fluid">
    <?php
        if(isset($_POST['update'])){
            
            $prn = $_SESSION['prn'];

            $firstname  = escape($_POST['firstname']);
            $middlename = escape($_POST["middlename"]);
            $lastname   = escape($_POST['lastname']);
            $branch     = escape($_POST['branch']);
            $year       = escape($_POST['year']);
            $number     = escape($_POST['number']);
            $email      = escape($_POST['email']);
    
            
    
            $con = mysqli_connect("localhost", "root", "", "exam_center");
            //First name validation
            $pattern_fn = "/^[a-zA-Z ]{2,12}$/";  // ^ indicates start of regular expression and $ indiacates end of regular expression
            if (!preg_match($pattern_fn, $firstname)) {
                $errFn = "First name must be at lest 2 character long, letter and space allowed";
            }

            //middle name validation
            $pattern_fn = "/^[a-zA-Z ]{2,12}$/";
            if (!preg_match($pattern_fn, $middlename)) {
                $errMn = "Last name must be at lest 2 character long, letter and space allowed";
            }

            //last name validation
            $pattern_fn = "/^[a-zA-Z ]{2,12}$/";
            if (!preg_match($pattern_fn, $lastname)) {
                $errLn = "Last name must be at lest 2 character long, letter and space allowed";
            }
            
            //mobile number validation
            $pattern_Num = "/^[0-9]{10,10}$/";
            if (!preg_match($pattern_Num, $number)) {
                $errNum = "Invalid Mobile Number";
            }
         
            //email validation
            $pattern_e = "/^([a-z0-9_\+\-]+)(\.[a-z0-9\+\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/i";  /*+ specifies at least once and * specifies at least 0 or more.
            \ is to escape the character. i specifies independent of the case*/
            if (!preg_match($pattern_e, $email)) {
                $errE = "Invalid email format!";
            }

            //Check valid branch
            if($branch == "Select Your Branch"){
                $errB = "Please select valid branch";
            }

            //Check valid year
            if($year == "Select Year"){
                $errY = "Please select valid year";
            }

            if(!isset($errFn) && !isset($errLn) && !isset($errMn) && !isset($errE) && !isset($errB) && !isset($errY) && !isset($errNum)){

                $q = "UPDATE student SET firstname='$firstname', middlename='$middlename', lastname='$lastname',branch='$branch', year='$year',number='$number', email='$email' where prn='$prn'";
                $q_run = mysqli_query($con, $q);
                
                if(!$q_run)
                    die("Unable to update data! ".mysqli_error($con));

                mysqli_close($con);

                echo "<div class='notification'>Profile has updated successfully.</div>";
                header('Refresh:2; url=profile.php');
            }else echo "<div class='notification'>Something went wrong:(</div>";

        }
        
    ?>

        <div class = "row">
           <?php include 'left_column.php'; ?>
            <div  class  = "col-md-6">
            <div  id     = "signup">
            <form action = "UpdateProfile.php" method = "post" onsubmit = "return validation()">
            <div  class  = "signup-form">
            <div  class  = "form-group">
                                <h1>Update Account </h1><br>
                                <div   class = "signup">
                                <div   class = "form-row">
                                <div   class = "col-md-4">
                                <label for   = "fname">First Name</label>
                                <input type  = "text" id = "fname" class = "form-control" value = "<?php echo $row['firstname'];?>" name = "firstname">
                                <?php echo isset($errFn)? "<span class='error'>$errFn</span>": ""; ?>
                                        </div><br>
                                        <div   class = "col-md-4">
                                        <label for   = "mname">Middle Name</label>
                                        <input type  = "text" id = "mname" class = "form-control" name = "middlename" value = "<?php echo $row['middlename'];?>">
                                        <?php echo isset($errMn)? "<span class='error'>$errMn</span>": ""; ?>
                                        </div>

                                        <div   class = "col-md-4">
                                        <label for   = "lname">Last Name</label>
                                        <input type  = "text" id = "lname" class = "form-control" name = "lastname" value = "<?php echo $row['lastname'];?>">
                                        <?php echo isset($errLn)? "<span class='error'>$errLn</span>": ""; ?>
                                        </div>
                                    </div> <br>
                                 
                                    <div class = "form-row">
                                    <div class = "col-md-8">
                                            <label>Branch</label>
                                            <select required class = "form-control" name = "branch" value = "Select your Department">
                                                <option><?php echo $row['branch'];?></option>
                                                <option value = "Chemical Engineering">Chemical Engineering</option>
                                                <option value = "Civil Engineering">Civil Engineering</option>
                                                <option value = "Computer Engineering">Computer Engineering</option>
                                                <option value = "Electrical Engineering">Electrical Engineering</option>
                                                <option value = "Electronics and Telecommunication Engineering">Electronics and Telecommunication Engineering</option>
                                                <option value = "Information Technology">Information Technology</option>
                                                <option value = "Instrumentation Engineering">Instrumentation Engineering</option>
                                                <option value = "Mechanical Engineering">Mechanical Engineering</option>
                                                <option value = "Petrochemical Engineering">Petrochemical Engineering</option>
                                            </select>
                                        </div>
                                        <div class = "col-md-4">
                                            <label>Year</label>
                                            <select class = "form-control" name = "year" value= "" required>
                                                <option><?php echo $row['year']; ?></option>
                                                <option value = "First Year(Sem-1)">First Year(Sem-1)</option>
                                                <option value = "First Year(Sem-2)">First Year(Sem-2)</option>
                                                <option value = "Second Year(Sem-3)">Second Year(Sem-3)</option>
                                                <option value = "SecondYear(Sem-4)">SecondYear(Sem-4)</option>
                                                <option value = "Third Year(Sem-5)">Third Year(Sem-5)</option>
                                                <option value = "Third Year(Sem-6)">Third Year(Sem-6)</option>
                                                <option value = "Fourth Year(Sem-7)">Fourth Year(Sem-7)</option>
                                                <option value = "Fourth Year(Sem-8)">Fourth Year(Sem-8)</option>

                                            </select>
                                        </div>
                                    </div>
                                    <?php echo isset($errB)? "<span class='error'>$errB</span>": ""; ?><br>
                                    <?php echo isset($errY)? "<span class='error'>$errY</span>": ""; ?>

                                    <br>
                                    <div class = "form-row">
                                    <div class = "col-md-6">
                                            <label>Mobile Number</label>
                                            <input type = "number" class = "form-control" name = "number" value = "<?php echo $row['number'];?>"><br>
                                            <?php echo isset($errNum)? "<span class='error'>$errNum</span>": ""; ?>
                                        </div>
                                        <div class = "col-md-6">
                                            <label>Email id</label>
                                            <input type = "email" class = "form-control" name = "email" value = "<?php echo $row['email'];?>"><br>
                                            <?php echo isset($errE)? "<span class='error'>$errE</span>": ""; ?>
                                        </div>
                                    </div>

                                    <input type = "submit" value = "Update" name = "update"><br>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <?php include 'important_updates.php'; ?>
        </div>
        
        
    </div>
<?php include 'footer.php';?>
