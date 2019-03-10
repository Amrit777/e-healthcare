<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>E-HealthCare</title>
        <link rel="stylesheet" href="css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css"/>

<link href="css/flexslider.css" rel="stylesheet" type="text/css" media="all" />
        <script src="js/responsiveslides.min.js"></script>
        <script src="js/jquery.flexslider.js" type="text/javascript"></script>
          <script>
            // You can also use "$(window).load(function() {"
                $(function () {
            
                  // Slideshow 1
                  $("#slider1").responsiveSlides({
                    maxwidth: 16,
                    speed: 1;
                  });
            });
          </script>
        
    </head>
    <body style="padding-top: 75px; background-color: #F1F1F1">
        <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand page-scroll" href="index.php">
					<span>E-HealthCare</span>
					<!--<img scr=".../images/logo.png" alt="E-HealthCare" >--></a>
				</div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                    <li class="c1 active"><a href="index.php">Home</a>
					</li>
                                             
                        <?php
                            session_start();
                            if(isset($_SESSION['user']))
                            {
                        ?>
                                <li class="dropdown">
                                    <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="fa fa-user"></i> <?php echo $_SESSION['user'];?><span class="caret"></span></a>
                                    <ul role="menu" class="dropdown-menu">
                                        <?php
                                            if(isset($_SESSION['patient']))
                                            {
                                        ?>
                                                <li><a href="patient/index.php"><i class="fa fa-fw fa-user"></i> Profile</a></li>
                                        <?php
                                            }
                                            elseif(isse($_SESSION['doctor']))
                                            {
                                        ?>
                                                <li><a href="doctor/index.php"><i class="fa fa-fw fa-user"></i> Profile</a></li>
                                        <?php
                                            }
											else
											{
										?>
												<li><a href="Donor/index.php"><i class="fa fa-fw fa-user"></i> Profile</a></li>
										<?php
											}
                                        ?>
                                        </ul>
                                </li>
								<li><a href="logout.php?logout="><i class="fa fa-fw fa-power-off"></i></a></li>
                                    
                        <?php
                            }
                            else
                            {
                        ?>
						
					<li class="c2 dropdown">
						<a href="index.php" class="dropdown-toggle" data-toggle="dropdown">LogIn<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="pat_login.php">Patient</a></li>
							<li><a href="doc_login.php">Doctor</a></li>
						</ul>
					</li>
					<li class="c3 dropdown">
						<a href="index.php" class="dropdown-toggle" data-toggle="dropdown">Register<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="pat_reg.php">Patient</a></li>
							<li><a href="doc_reg.php">Doctor</a></li>
						</ul>
					</li>
					<li class="c4 dropdown">
						<a href="index.php" class="dropdown-toggle" data-toggle="dropdown">Blood-Donor<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="donor_login.php">LogIn</a></li>
							<li><a href="donor.php">Register</a></li>
						</ul>
					</li>
          <li class="c7"><a href="gallery.php">Gallery</a></li>
					<li class="c5"><a href="aboutus.php">About</a></li>
					<li class="c6"><a href="contactus.php">Contact</a></li>
					
                        <?php
                            }
                        ?>              
                    </ul>
                </div>
            </div>
        </nav>

                            <div class="clear"> </div>
        
     <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
              <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
              <li data-target="#myCarousel" data-slide-to="1"></li>
              <li data-target="#myCarousel" data-slide-to="2"></li>
              <li data-target="#myCarousel" data-slide-to="3"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
              <div class="item active">
                  <img src="images/banner.jpg" class="img-responsive" alt="E-HealthCare">
              </div>

              <div class="item">
                <img src="images/banner2.jpg" class="img-responsive" alt="E-HealthCare">
              </div>

              <div class="item">
                  <img src="images/BANNER3.jpg" class="img-responsive" alt="E-HealthCare">
              </div>

              <div class="item">
                  <img src="images/blood-group.png" class="img-responsive" alt="E-HealthCare">
              </div>

            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
        </div>

                            <div class="clear"> </div>


        <!-- Title -->
        <div class="row">
            <div class="col-lg-12">
                <h2 style="margin-left: 40px;">Our Services</h2>
            </div>
        </div>
        <hr>

        <!-- Page Features -->
        <div class="row text-center col-lg-12 col-md-12 col-sm-12">

            <div class="col-lg-3 col-md-3 col-sm-3 col-lg-offset-1 col-md-offset-1 thumb-feature" >
                <div class="thumbnail">
                    <img src="images/prr.jpg" alt="Search Doctor">
                    <div class="caption" style="height: 120px;"">
                        <h3>Search Doctors</h3>
                        <a href="pat_login.php" class="btn btn-default">More Info</a>
                        
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-3 col-md-offset-1 thumb-feature">
                <div class="thumbnail">
                    <img src="images/b2.jpg" alt="Blood Donation">
                    <div class="caption">
                        <h3>Blood Donation</h3>
                        <p>
                            <a href="donor_login.php" class="btn btn-default">More Info</a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-3 col-md-offset-1 thumb-feature">
                <div class="thumbnail">
                    <img src="images/4.jpg" alt="Doctor Specialization">
                    <div class="caption">
                        <h3>Doctor Specialization</h3>
                        <p>
                         <a href="doc_login.php" class="btn btn-default">More Info</a>
                        </p>
                    </div>
                </div>
            </div>
      </div>
        <!-- /.row -->

                            <div class="clear"> </div>
        <hr>
      	
        <script type="text/javascript" src="js/jquery.js"></script>
        <script>  
            $('#myCarousel').mouseenter(function(){
               $(this).children('a').css('visibility','visible'); 
            });
            $('#myCarousel').mouseleave(function(){$(this).children('a').css('visibility','hidden'); });
        </script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
    </body>
</html>
