<?php session_start(); ?>

<?php include 'header.php'; ?>
<?php

  $con = mysqli_connect('localhost','root','');
	mysqli_select_db($con , 'exam_center');

?>


<!Doctype html>
<html>
<head>
    <title>Resource</title>

</head>

<body>

    <div class="container-fluid">
        <div class="row">
            
        <?php 
            if(isset($_SESSION['username']))
                include 'admin_leftcol.php';
            elseif(isset($_SESSION['prn']))
                include 'left_column.php';
            else include 'home_left.php'; 
        
        ?>
            <!--        Middle column (Loging/SignUp)       -->
            <div class="col-md-6">
                <div id="updates-table">

                  <h2> Resources </h2>
                  <table class="table table-hover" ">

                    <?php
                        $displayquery = "select * from resources";
                        $querydisplay = mysqli_query($con, $displayquery);

                        $row =mysqli_num_rows($querydisplay);

                        while($result = mysqli_fetch_assoc($querydisplay)){
                            if($result['name'] )
                            ?>

                        <!--           Resource update -->

                    <tbody>
                    <tr>
					        <td scope="row">
                              <div class="text-wrap text-justify">
                                  <?php echo $result['name'];?>
                              </div>
                          </td>
							<td>
                            <a class="rview" href="<?php echo $result['file']?>" target="_blank">View</a>
                            </div>
                          </td>
						 </tr>

                        <?php
                            }
                        ?>
                    </tbody>
                </table>
                </div>
            </div>
            <!--        Third Column  (important dates)     -->
            <?php include 'important_updates.php'; ?>
        </div>

    </div>

    <?php include 'footer.php';?>
