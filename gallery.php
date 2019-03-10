<?php
    session_start();

    include_once './includes/config.php';
    include_once 'includes/header.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">

</head>

<body>
<div  style="background-color: #F1F1F1">
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-lg-12">
                <h1 class="page-header">Gallery</h1>
            </div>

            <div class="col-lg-6 col-md-6 col-xs-6 thumb">
                <a class="thumbnail" href="#">
                    <img class="img-responsive" src="images/g1.jpg" alt="">
                </a>
            </div>
            <div class="col-lg-6 col-md-6 col-xs-6 thumb">
                <a class="thumbnail" href="#">
                    <img class="img-responsive" src="images/g2.jpg" alt="">
                </a>
            </div>
            <div class="col-lg-6 col-md-6 col-xs-6 thumb">
                <a class="thumbnail" href="#">
                    <img class="img-responsive" src="images/g3.jpg" alt="">
                </a>
            </div>
            <div class="col-lg-6 col-md-6 col-xs-6 thumb">
                <a class="thumbnail" href="#">
                    <img class="img-responsive" src="images/g4.jpg" alt="">
                </a>
            </div>
            <div class="col-lg-6 col-md-6 col-xs-6 thumb">
                <a class="thumbnail" href="#">
                    <img class="img-responsive" src="images/g5.jpg" alt="">
                </a>
            </div>
            <div class="col-lg-6 col-md-6 col-xs-6 thumb">
                <a class="thumbnail" href="#">
                    <img class="img-responsive" src="images/g6.jpg" alt="">
                </a>
            </div>
        </div>
        

        <hr>

        <!-- Footer 
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    
                </div>
            </div>
        </footer>-->

    </div>
    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
