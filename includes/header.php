<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>
            E-HealthCare System
        </title>
        <!--<link rel="icon" href="images/logo.png" type="image/png"/>--> 
        <link rel="stylesheet" href="css/bootstrap.min.css"/>
        <link rel="stylesheet" href="css/style.css" />
        <link rel="stylesheet" href="css/contextual-popovers.css"/>
        <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css"/>
		<link rel="stylesheet" href="https://cdnjs.cloudfare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body style="padding-top: 50px;">
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
					<!--<img src="images/logo6612.png" width="100"/></a>-->
					<span>E-HealthCare</span>
					</a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right">
                    <li class="c1 active"><a href="index.php">Home</a>
					</li>
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
					</ul>
                    </div>
            </div>
        </nav>

        </body>
        </html>