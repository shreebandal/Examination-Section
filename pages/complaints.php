<?php include 'header.php'; ?>

<?php
session_start();
if(!isset($_SESSION['prn']))
	header('location:index.php');
?>

<!Doctype html>
<html>
<head>

    <title>View Complaint</title>
    <style>
        body {
            padding: 0;
            margin: 0;
            background-color: #FFFFF0;
        }
    </style>
</head>

<body>
    <section id="complaint_registration">
        <div class="container-fluid">
            <div class="row">
                <!--        First column (Student Resource) -->
                <?php include 'left_column.php';?>
                <!--        Middle column (Loging/SignUp)       -->
                <div class="col-md-6">
                        <div class="form-group">
                            <div class="complaint_options">
                                <h1>Track Complaint</h1>
                                <ul>
                                    <a href="exam_problem.php"><li>
                                        <div class="custom-control custom-button">
                                            Exams
                                        </div>
                                    </li></a>

                                    <a href="fee_problem.php"><li>
                                        <div class="custom-control custom-button">
                                            Fees
                                        </div>
                                    </li></a>

                                    <a href="result_problem.php"><li>
                                        <div class="custom-control custom-button">
                                            Result
                                        </div>
                                    </li></a>
                                    <a href="other_problem.php"><li>
                                        <div class="custom-control custom-button">
                                           Other
                                        </div>
                                    </li></a>
                                </ul>
                            </div>
                        </div>
                </div>
                <!--        Third Column  (important dates)     -->
               <?php include 'important_updates.php'; ?>
            </div>

        </div>
    </section>
<?php include 'footer.php';?>