<?php
session_start();
if(!isset($_SESSION['username']))
	header('location:adminlogin.php');
?>

<?php include 'header.php'; ?>

<?php
$username = $_SESSION['username'];
$con      = mysqli_connect("localhost","root");
mysqli_select_db($con,'exam_center');
$q      = "select * from studentblock ";
$result = mysqli_query($con,$q);
$num    = mysqli_num_rows($result);
mysqli_close($con);
?>

<!DOCTYPE html>
<html lang = "en">

<head>
    <title>Block List</title>

    <style>
    #updates-table h2 {
        text-align: center;
        font-size : 230%;
    }

    #updates-table .unblockbtn {
        text-decoration: none;
        color          : white;
        padding        : 10px;
    }
    </style>
</head>

<body>
    <div class = "container-fluid">
    <div class = "row">
            <?php include 'admin_leftcol.php';?>

            <div class = "col-md-6">
            <div id    = "updates-table">
            <div class = "form-group">
                        <h2>Block List</h2>
                            <table class = "table table-hover ">
                                <thead>
                                    <tr>
                                        <th scope = "col">PRN</th>
                                        <th scope = "col"></th>
                                        <th scope = "col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                            <?php
                                                for($i=1;$i<=$num;$i++)
                                                {
                                                    $row = mysqli_fetch_array($result);
                                                ?>
                                        </tr>
                                        <tr>
                                        <td><?php echo $row['prn']; ?></td>
                                        <td><button type  = "button"><a href = "Unblock.php?name=<?php echo $row['prn']; ?>"
                                                    class = "unblockbtn">Unblock</a></button></td>
                                    <?php
                                            }
                                        ?>
                                    </tr>
                                </tbody>
                            </table>
                    </div>
                 </div>
                </div>
    <?php include 'important_updates.php'; ?>
    </div>
    </div>

    <?php include 'footer.php';?>