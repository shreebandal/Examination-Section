<?php
session_start();
if(isset($_SESSION['prn']))
    header('location:profile.php');
else if (isset($_SESSION['username']))
    header('location: admin_complaint.php');
?>

<?php include 'header.php'; ?>
<?php include 'functions.php'; ?>

<!Doctype html>
<html lang="en">
  <head>
    <title>Admin Login</title>
</head>

<body>
    <div class="container-fluid">
    <?php
            if(isset($_POST['login'])){

            $username=escape($_POST['username']);
            $password=escape($_POST['password']);

            $con=mysqli_connect("localhost","root", "", "exam_center");

                $query = "SELECT * FROM teacher WHERE username='$username'";
                $query_run = mysqli_query($con, $query);

                if(!$query_run)
                    die("Unable to connect to databse".mysql_error($con));

                $result = mysqli_fetch_assoc($query_run);
                if(password_verify($password, $result['password'])){
                    $_SESSION['username']=$username;
                    echo "<div class='notification'>Logged In Successfull</div>";
                    unset($username);
                    unset($password);
                    header('location:admin_complaint.php');
                }else{
                    echo "<div class='notification'>Invalid User ID or Password</div> ";
                }
                
                mysqli_close($con);
                
                }
    ?>
        <div class="row">
            <?php include 'home_left.php';?>
            <div class="col-md-6">
                <div id="admin-login">
                    <form action="adminlogin.php" method="post" class="login-form">
                        <h1>Admin<br> Login </h1>
                        <div class="txtb">
                            <input type="text" name="username" value="<?php echo isset($username) ? $username : ''; ?>" required>
                            <span data-placeholder="ENTER USER ID"></span>
                        </div>

                        <div class="txtb">
                            <input type="password" name="password" required>
                            <span data-placeholder="ENTER PASSWORD"></span>
                        </div>
                        <input type="submit" class="lgnbtn" value="Login" name="login"><br>
                    </form>
                </div>
            </div>
            <?php include 'important_updates.php'; ?>

        </div>
    </div>

<?php include 'animate_footer.php'; ?>
