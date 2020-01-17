<?php

require("includes/connect.php");
session_start();

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="fontawesome/css/all.css" rel="stylesheet" media="all">
	<link href="js/jquery-ui-1.12.1/jquery-ui.css" rel="stylesheet">
	<!-- Core Style CSS 
    <link rel="stylesheet" href="css/core-style.css">-->

    <!-- Title -->
    <title>Event Planners</title>

    <!-- Favicon -->
    <link rel="icon" href="img/icon/glass-cheers.png">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="customStyle.css">

	
	<!--<script>
	  function cal() {
		$("#datepicker").datepicker();
	  } ;
	 </script>-->
</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- /Preloader -->

    <!-- Header Area Start -->
    <header class="header-area">
        <!-- Top Header Area Start -->
        <div class="top-header-area">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-5">
                        <div class="top-header-content">
                            <p>Welcome to Event Planners!</p>
                        </div>
                    </div>
                    <div class="col-7">
                        <div class="top-header-content text-right">
                            <p><i class="fa fa-clock-o" aria-hidden="true"></i> Mon-Sat: 8.00 to 17.00 <span class="mx-2"></span> | <span class="mx-2"></span> <i class="fa fa-phone" aria-hidden="true"></i> Call us: (+962) 345 678 910</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Top Header Area End -->

        <!-- Main Header Start -->
        <div class="main-header-area">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Classy Menu -->
                    <nav class="classy-navbar justify-content-between" id="akameNav">

                        <!-- Logo -->
                        <a class="nav-brand" href="index.php"><img src="./img/core-img/logo.png" alt=""></a>

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">
                            <!-- Menu Close Button -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>
                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul id="nav">
                                    <li class=""><a href="./index.php">Home</a></li>
                                    <!--<li><a href="#">Pages</a>
                                        <ul class="dropdown">
                                            <li><a href="./index.php">- Home</a></li>
                                            <li><a href="./about.php">- About Us</a></li>
                                            <li><a href="#">- Vendors</a></li>
                                            <li><a href="#">- Portfolio</a></li>
                                            <li><a href="./blog.html">- Blog</a></li>
                                            <li><a href="./single-blog.html">- Blog Details</a></li>
                                            <li><a href="./contact.html">- Contact</a></li>
                                            <li><a href="#">- Dropdown</a>
                                                <ul class="dropdown">
                                                    <li><a href="#">- Dropdown Item</a></li>
                                                    <li><a href="#">- Dropdown Item</a></li>
                                                    <li><a href="#">- Dropdown Item</a></li>
                                                    <li><a href="#">- Dropdown Item</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>-->
                                    <li><a href="./category.php">Services</a></li>
                                    <li><a href="about.php">About Us</a></li>
                                    <li><a href="contact.php">Contact Us</a></li>
									<?php
										if(!isset($_SESSION['user_id']) && !isset($_SESSION['v_id'])){
											echo "<li><a href='vendor_signup.php'>Vendor?</a></li>";
										}
										/*else if(!isset($_SESSION['v_id'])){
											echo "<li><a href='vendor_signup.php'>Vendor?</a></li>";
										}*/
										else{
											echo "";
										}
									?>
									<li>
										
                                            <!--<li><a href="#">Profile</a></li>-->
												
											<?php
												if(isset($_SESSION['user_id'])){
													echo "<a href='#'><i class='fas fa-user-circle' style='font-size: 30px;'></i></a>
														 <ul class='dropdown'>";
													echo "<li><a href='user_appoint.php'>Appointments</a></li>";
													echo "<li><a href='user_change_pass.php'>Change Password</a></li>";
													echo "<li><a href='logout.php'>Logout</a></li>
													</ul>";
												}
												else if(isset($_SESSION['v_id'])){
													echo "<a href='#'><i class='fas fa-user-circle' style='font-size: 30px;'></i></a>
														 <ul class='dropdown'>";
													echo "<li><a href='vendor_reserve.php'>Appointments</a></li>";
													echo "<li><a href='edit_form.php'>Edit Market</a></li>";
													echo "<li><a href='vendor_change_password.php'>Change Password</a></li>";
													echo "<li><a href='logout.php'>Logout</a></li>
													</ul>";
													
												}
											?>
                                            
                                            
                                        
									</li>
                                </ul>

                               

                                <!-- Book Icon -->
                                <div class="ml-5 mt-4 mt-lg-0 ml-md-4">
									<?php
																				
										if(isset($_SESSION['user_id'])){
											echo "Welcome {$_SESSION['user_name']}";
										}
										else if(isset($_SESSION['v_id'])){
											echo "Welcome {$_SESSION['v_name']}";
										}
									else{
										echo "";
									}
																		
									?>
                                    
                                </div>
								<!-- Book Icon -->
                                
                                    
								<?php
								if(!isset($_SESSION['user_id']) && !isset($_SESSION['v_id'])){
									echo "<div class='book-now-btn ml-5 mt-4 mt-lg-0 ml-md-4'>
											<a href='user_signup' class='btn akame-btn'>Join Us</a>
                                		  </div>";
								}
								else{
									 echo "";
									}
								
								?>
		
                            </div>
                            <!-- Nav End -->
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Header Area End -->