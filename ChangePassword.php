<?php
session_start();
if(!isset($_SESSION['prn']))
	header('location:index.php');
?>

<?php include 'header.php'; ?>
<?php include 'functions.php'; ?>

<!doctype html>
<html lang = "en">
  <head>
    <title>Change Password</title>
</head>

<body>
    <div class = "container-fluid">
        <?php
            if(isset($_POST['change'])){
            
            $oldPass = escape($_POST['oldpassword']);
            $newpass = escape($_POST['newpassword']);
            $conpass = escape($_POST['conpassword']);

            $prn    = $_SESSION['prn'];

            $con = mysqli_connect("localhost", "root", "", "exam_center");

            $q      = "SELECT * FROM student WHERE prn='$prn'";

            $q_run =mysqli_query($con, $q);

            if(!$q_run)
                die("Unable to connect to database".mysqli_error($con));

            $result = mysqli_fetch_assoc($q_run);
            if(password_verify($oldPass, $result['password'])){

                if($newpass == $conpass){
                    $pattern_pass = "/^.*(?=.{6,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$/"; // . indicates all the characters. * indicates at least 0 times pattern should be repeated
                    if (!preg_match($pattern_pass, $newpass)) {
                        $errpass = "Must be at least 6 characters long, 1 upper case, 1 lower case and 1 number";
                    }
                }else{
                    $errpass = "Password doesn't match";
                    unset($oldPass);
                    unset($newpass);
                    unset($conpass);
                } 
                
                if(!isset($errpass)){

                    $password_hash = password_hash($newpass, PASSWORD_BCRYPT, ['cost'=>10]);
                    
                    //update password
                    $query1 = "UPDATE student SET password = '$password_hash' WHERE prn='$prn' ";
                    $query1_run = mysqli_query($con, $query1);

                    if(!$query1_run)
                        die("Connection to database failed! ". mysqli_error($con));
                    echo "<div class='notification'>Password has successfully updated.</div>";
                    header("Refresh:3;url=profile.php");    
                }
            }
            else{
                $errOp = "Wrong old password";
                unset($oldPass);
            }

            mysqli_close($con);

            }
        ?>
        <div class = "row">
            
            <?php include 'left_column.php'; ?>

                <div  class  = "col-md-6">
                <div  id     = "user-login">
                <form action = "ChangePassword.php" class = "login-form" method = "post">
                            <h1>Change Password</h1>
                            <div   class            = "txtb">
                            <input type             = "password" name = "oldpassword" required>
                            <span  data-placeholder = "OLD PASSWORD"></span>
                            </div>
                            <?php echo isset($errOp)? "<span class='error'>$errOp</span>": ""; ?>

                            <div   class            = "txtb">
                            <input type             = "password" name = "newpassword" required>
                            <span  data-placeholder = "NEW PASSWORD"></span>
                            </div>
                            <?php echo isset($errpass)? "<span class='error'>$errpass</span>": ""; ?>

                            <div   class            = "txtb">
                            <input type             = "password" name = "conpassword" required>
                            <span  data-placeholder = "COINFIRM PASSWORD"></span>
                            </div>

                            <input type = "submit" class = "lgnbtn" name = "change" value = "CHANGE"><br>
                        </form>
                    </div>
                </div>

            <?php include 'important_updates.php'; ?>   
        
        </div>
    </div>
<?php include 'animate_footer.php'; ?>
