<?php
session_start();
if(isset($_SESSION['prn']))
    header('location:profile.php');
else if (isset($_SESSION['username']))
    header('location: admin_complaint.php');
?>

<?php include 'header.php'; ?>

<?php require_once 'functions.php'; ?>


<!doctype html>
<html lang="en">
  <head>
    <title>Login Page</title>
</head>

<body>
    <div class="container-fluid">
    <?php
            if(isset($_POST['login'])){
                $prn=escape($_POST['prn']);
                $password=escape($_POST['password']);

                $con=mysqli_connect("localhost","root", "", "exam_center");
                $query = "SELECT * FROM studentblock WHERE prn='$prn'";
                $query_run = mysqli_query($con, $query);
                if(!$query_run)
                    die("Unable to connect to database! ".mysqli_error($con));

                if(mysqli_num_rows($query_run) == 0){
                    $q="SELECT * FROM student WHERE prn='$prn' ";
                    $q_run =mysqli_query($con, $q);

                    if(!$q_run)
                        die("Unable to connect to database".mysqli_error($con));

                    $result = mysqli_fetch_assoc($q_run);
                    if(password_verify($password, $result['password'])){
                        $_SESSION['prn']=$prn;
                        echo "<div class='notification'>Logged In Successfull</div>";
                        unset($prn);
                        unset($password);
                        header('location:profile.php');
                    }else{
                        echo "<div class='notification'>Invalid PRN or Password</div> ";
                    }
                }else echo "<div class='notification'>You have been blocked by Admin</div>";
                
                mysqli_close($con);
                
                }
            ?>

        <div class="row">

            <?php include 'home_left.php'; ?>
            
            <div class="col-md-6">
                <div id="user-login">
                    <div class="login-form">
                    <form action="index.php" class="" method="post">
                        <h1>Login </h1>
                        <div class="txtb">
                            <input type="text" name="prn" required>
                            <span data-placeholder="ENTER YOUR PRN"></span>
                        </div>

                        <div class="txtb">
                            <input type="password" name="password" required>
                            <span data-placeholder="PASSWORD"></span>
                        </div>

                        <input type="submit" class="lgnbtn" value="LOGIN" name="login"><br>
                        <hr><br>

                    </form>
                    <a href="signup.php" style="color:white;text-decoration:none;"><button class="sgn">REGISTER</button></a>
                    </div>
                </div>
            </div>

            <?php include 'important_updates.php'; ?>
        </div>
    </div>
<?php include 'animate_footer.php'; ?>
