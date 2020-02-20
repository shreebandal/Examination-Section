<?php session_start(); ?>

<?php include 'header.php'; ?>

<!DOCTYPE html>
<html lang = "en">
<head>
    <title>About Us</title>
</head>
<body>
    <section id    = "about">
    <div     class = "container-fluid">
    <div     class = "row">
        <?php 
            if(isset($_SESSION['username']))
                include 'admin_leftcol.php';
            elseif(isset($_SESSION['prn']))
                include 'left_column.php';
            else include 'home_left.php'; 
        
        ?>
              <div class = "col-md-6">
              <div class = "about">
                <h1>Developers</h1>
                <div class = "row">
                <div class = "col-md-4 col-sm-6 text-center">
                <div class = "profile">
                <img src   = "images/testi1.jpeg" alt = "profile" class = "user">
                            
                            <h3> Rishikesh Sutar</h3>
                            <h4>Fronted Developer</h4>
                        </div>
                    </div>
                    <div class = "col-md-4 col-sm-6 text-center">
                    <div class = "profile">
                    <img src   = "images/testi1.jpeg" alt = "profile" class = "user">
                            
                            <h3> Rishikesh Sutar</h3>
                            <h4>Fronted Developer</h4>
                        </div>
                    </div>
                    <div class = "col-md-4 col-sm-6 text-center">
                    <div class = "profile">
                    <img src   = "images/testi1.jpeg" alt = "profile" class = "user">
                            
                            <h3> Rishikesh Sutar</h3>
                            <h4>Fronted Developer</h4>
                        </div>
                    </div>
                </div>
                <div class = "row">
                <div class = "col-md-4 col-sm-6 text-center">
                <div class = "profile">
                <img src   = "images/testi1.jpeg" alt = "profile" class = "user">
                            
                            <h3> Rishikesh Sutar</h3>
                            <h4>Fronted Developer</h4>
                        </div>
                    </div>
                    <div class = "col-md-4 col-sm-6 text-center">
                    <div class = "profile">
                    <img src   = "images/testi1.jpeg" alt = "profile" class = "user">
                            
                            <h3> Rishikesh Sutar</h3>
                            <h4>Fronted Developer</h4>
                        </div>
                    </div>
                    <div class = "col-md-4 col-sm-6 text-center">
                    <div class = "profile">
                    <img src   = "images/testi1.jpeg" alt = "profile" class = "user">
                            
                            <h3> Rishikesh Sutar</h3>
                            <h4>Fronted Developer</h4>
                        </div>
                    </div>
                </div>
                
                </div>
              </div>

              <?php include 'important_updates.php';?>
              </div>
            </div>
        </section>

<?php include 'footer.php';?>
