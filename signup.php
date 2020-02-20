<?php if(isset($_SESSION['prn']))
        header('location:profile.php');
        else if(isset($_SESSION['username']))
            header('location:admin_complaint.php');
?>

<?php include 'header.php'; ?>
<?php require_once 'functions.php'; ?>

<?php
if (isset($_POST['register'])) {

    $firstname       = escape($_POST['firstname']);
    $middlename      = escape($_POST['middlename']);
    $lastname        = escape($_POST['lastname']);
    $prn             = escape($_POST['prn']);
    $branch          = escape($_POST['branch']);
    $year            = escape($_POST['year']);
    $email           = escape($_POST['email']);
    $password        = escape($_POST['password']);
    $confirmPassword = escape($_POST['pass']);
    $number          = escape($_POST['number']);

    $con = mysqli_connect("localhost", "root", "", "exam_center");
    
    if(!$con)
        die("Unable to connect database.");

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

   //PRN validation
         $pattern_Prn = "/^[0-9]{8,20}$/";
         if (!preg_match($pattern_Prn, $prn)) {
             $errPrn = "Invalid PRN";
         }else {
            $query_b = "SELECT * FROM studentblock WHERE prn='$prn'";
            $query_b_run = mysqli_query($con, $query_b);
            if(!$query_b_run)
                die("Unable to connect to database! ".mysqli_error($con));

            if (mysqli_num_rows($query_b_run) == 0) {
                $query         = "SELECT * FROM student WHERE prn ='$prn'";
                $query_run_prn = mysqli_query($con, $query);
                if (!$query_run_prn) {
                    die("Connection to database failed" . mysqli_error($con));
                } else {
                    $row_num = mysqli_num_rows($query_run_prn);
                    if ($row_num == 1) {
                        $errPrn = "PRN already registered.";
                    }
                }
            }else $errPrn = "This PRN is blocked by Admin";
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
        }else {     //check if email is already present in database
            $query = "SELECT * FROM student WHERE email ='$email'";
            $query_run_email = mysqli_query($con, $query);
            
            if(!$query_run_email){
                die("Connection to database failed" . mysqli_error($con));
            }else {
                $row_num = mysqli_num_rows($query_run_email);
                if($row_num >= 1){
                    $errE = "Email has already taken.";
                }
            }
        }
        
        //password validation
        if ($password==$confirmPassword) {
            $pattern_pass = "/^.*(?=.{6,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$/"; // . indicates all the characters. * indicates at least 0 times pattern should be repeated
            if (!preg_match($pattern_pass, $password)) {
                $errpass = "Password must be at least 6 characters long, 1 upper case, 1 lower case and 1 number";
            }
        }else {
            $errpass ="Password doesn't matched";
        }

        //Check valid branch
        if($branch == "Select Your Branch"){
            $errB = "Please select valid branch";
        }

        //Check valid year
        if($year == "Select Year"){
            $errY = "Please select valid year";
        }


        if (!isset($errFn) && !isset($errLn) && !isset($errMn) && !isset($errPrn) && !isset($errE) && !isset($errpass) && !isset($errB) && !isset($errY) && !isset($errNum)) {
            $hash = password_hash($password, PASSWORD_BCRYPT, ['cost'=>10]);
            
            $query = "INSERT INTO student (firstname, middlename, lastname, prn, branch, year, number, email, password) VALUES('$firstname', '$middlename', '$lastname', '$prn', '$branch', '$year', '$number', '$email', '$hash')";
            $query_run = mysqli_query($con, $query);
            
            if (!$query_run) {
                die("Query failed ".mysqli_error($con));
            } else {
                echo "<div class='notification'>Sign up successful.</div>";
                //resetting values entered by user after successful sign up
                unset($firstname);
                unset($lastname);
                unset($middlename);
                unset($prn);
                unset($email);
                unset($password);
                unset($confirmPassword);
                unset($branch);
                unset($year);
                
                mysqli_close($con);
                header('location:index.php');
            }
        }else echo "<div class='notification'>Something went wrong:(</div>";
    }         

    

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Sign Up</title>
   <script src = "../js/javascript.js"></script>
</head>

<body>
    <div class = "container-fluid">
    <div class = "row">

           <?php include 'home_left.php'; ?>
           
            <div  class  = "col-md-6">
            <div  id     = "signup">
            <form action = "signup.php" method = "post" onsubmit = "return validation()">
            <div  class  = "signup-form">
            <div  class  = "form-group">
                                <h1>Create Your Account </h1><br>
                                <div   class = "signup">
                                <div   class = "form-row">
                                <div   class = "col-md-4">
                                <label for   = "fname">First Name</label>
                                <input type  = "text" id      = "fname" class = "form-control" value="<?php echo isset($firstname)? $firstname: ""?>" name = "firstname" placeholder = "First Name" required>
                                <span  id    = "fname1" class = "text-danger font-weight-bold"></span>
                                
                                        </div><br>
                                        <div   class = "col-md-4">
                                        <label for   = "mname">Middle Name</label>
                                        <input type  = "text" id      = "mname" class = "form-control" value="<?php echo isset($middlename)? $middlename: ""?>" name = "middlename" placeholder = "Middle Name" required>
                                        <span  id    = "mname1" class = "text-danger font-weight-bold"></span>
                                        <?php echo isset($errMn)? "<span class='error'>$errMn</span>": ""; ?>
                                        
                                        </div>

                                        <div   class = "col-md-4">
                                        <label for   = "lname">Last Name</label>
                                        <input type  = "text" id      = "lname" class = "form-control" value="<?php echo isset($lastname)? $lastname: ""?>" name = "lastname" placeholder = "Last Name" required>
                                        <span  id    = "lname1" class = "text-danger font-weight-bold"></span>
                                        <?php echo isset($errLn)? "<span class='error'>$errLn</span>": ""; ?>
                                        </div>
                                    </div> <br>
                                    <label>PRN</label>
                                    <input type  = "text" class = "form-control" placeholder = "PRN" value ="<?php echo isset($prn)? $prn: ""?>" name = "prn" required><br>
                                    <span  id    = "prnnum" class = "text-danger font-weight-bold"></span>
                                    <?php echo isset($errPrn)? "<span class='error'>$errPrn</span>": ""; ?>

                                    <div   class = "form-row">
                                    <div   class = "col-md-8">
                                            <label>Branch</label>
                                            <select required class = "form-control" name = "branch" value = "">
                                                <option><?php echo isset($branch)? $branch: "Select Your Branch"?></option>
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
                                            <?php echo isset($errB)? "<span class='error'>$errB</span>": ""; ?><br>

                                        </div>

                                        <div class = "col-md-4">
                                            <label>Year</label>
                                            <select class = "form-control" name = "year" value= "" required>
                                                <option><?php echo isset($year)? $year: "Select Year"?></option>
                                                <option value = "First Year(Sem-1)">First Year(Sem-1)</option>
                                                <option value = "First Year(Sem-2)">First Year(Sem-2)</option>
                                                <option value = "Second Year(Sem-3)">Second Year(Sem-3)</option>
                                                <option value = "SecondYear(Sem-4)">SecondYear(Sem-4)</option>
                                                <option value = "Third Year(Sem-5)">Third Year(Sem-5)</option>
                                                <option value = "Third Year(Sem-6)">Third Year(Sem-6)</option>
                                                <option value = "Fourth Year(Sem-7)">Fourth Year(Sem-7)</option>
                                                <option value = "Fourth Year(Sem-8)">Fourth Year(Sem-8)</option>

                                            </select>
                                    <?php echo isset($errY)? "<span class='error'>$errY</span>": ""; ?>
                                        
                                        </div>
                                    </div><br>

                                    <br>
                                    <div class = "form-row">
                                    <div class = "col-md-6">
                                            <label>Mobile Number</label>
                                            <input type = "text" class = "form-control" value="<?php echo isset($number)? $number: ""?>" name = "number" placeholder = "Enter Your Mobile Number" required><br>
                                            <span  id   = "num" class    = "text-danger font-weight-bold"></span>
                                            <?php echo isset($errNum)? "<span class='error'>$errNum</span>": ""; ?>
                                        </div>
                                        <div class = "col-md-6">
                                            <label>Email id</label>
                                            <input type = "email" class   = "form-control" value="<?php echo isset($email)? $email: ""?>" name = "email" placeholder = "Enter Your email address" required><br>
                                            <span  id   = "emailid" class = "text-danger font-weight-bold"></span>
                                            <?php echo isset($errE)? "<span class='error'>$errE</span>": ""; ?>
                                        </div>
                                    </div>
                                    <div class = "form-row">
                                    <div class = "col-md-6">
                                            <label>Password</label>
                                            <input type = "password" class = "form-control" min = "6" name = "password" placeholder = "Password" required>
                                            <span  id   = "pass" class     = "text-danger font-weight-bold"></span>
                                            <?php echo isset($errpass)? "<span class='error'>$errpass</span>": ""; ?>
                                        </div>
                                        <div class = "col-md-6">
                                            <label>Confirm Password</label>
                                            <input type = "password" class    = "form-control" min = "6" name = "pass" placeholder = "Confirm password" required>
                                            <span  id   = "confirmpass" class = "text-danger font-weight-bold"></span>
                                        </div>
                                    </div>

                                    <input type = "submit" value = "Register" name = "register"><br>
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