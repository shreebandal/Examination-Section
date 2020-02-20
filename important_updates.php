<?php
$con = mysqli_connect("localhost","root");
mysqli_select_db($con,'exam_center');
$a       = "select * from setupdate";
$result3 = mysqli_query($con,$a);
$num3    = mysqli_num_rows($result3);
mysqli_close($con);
?>

<div class = "col-md-3">
<div class = "updates">
        <h4>Important Updates</h4>
        <hr>
        <ul>
        <?php
        
            for($i=1;$i<=$num3;$i++){

            $row = mysqli_fetch_array($result3);
        ?>

        <li><span id="imp_n"> > </span><span id="up_li"><?php echo $row['setupdate'];?></span></li>
        <?php
            }
        ?>
        </ul> 
    </div>
</div>