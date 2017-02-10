<?php 
session_start(); 
if( !empty( $_REQUEST['Message'] ) ) {
	$message = $_REQUEST['Message'];
	echo "<script type='text/javascript'>alert('$message');</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <title>NextStep</title>
    <meta name="description" content="User Selection" />
    <meta name="author" content="NextStep" />
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon" />

    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <!-- Style CSS -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/icomoon.css" />
    <link rel="stylesheet" href="css/screen.css" />
</head>
</head>
<body data-smooth-scroll="on">
	<form class="global-search-form">
		<div class="container">
			<input type="text" name="search-input" class="search-input js-input" placeholder="Type here ..." />
		</div>
	</form>

	<!-- Page Wrapper -->
	<div id="page">
		<!-- Register Poup -->
		<div class="register-popup">
			<div class="popup-wrapper">
				<span class="close-popup-btn icon-cross"></span>

				<form id="register-form" method="POST" action="register.php" role="form">
					<div class="section-header">
						<h1>Register</h1>
					</div>

					<label>
						<span>Username *</span>
						<input type="text" class="form-control" name="username" value="" required="" title="Please enter your Username" placeholder="Username">
					</label>

					<label>
						<span>First Name *</span>
						<input type="text" class="form-control" name="firstname" value="" required="" title="Please enter your First Name" placeholder="First Name">
					</label>

					<label>
						<span>Surname *</span>
						<input type="text" class="form-control" name="surname" value="" required="" title="Please enter your Surname" placeholder="Surname">
					</label>
					
					<label>
						<span>E-mail address *</span>
						<input id="signupEmail" type="email" maxlength="50" class="form-control" name="email" value="">
					</label>

					<label>
						<span>Password *</span>
						<input id="signupPassword" type="password" maxlength="25" class="form-control" placeholder="At least 6 characters" length="40" name="password" value="">
					</label>

					<label>
						<span>Confirm Password *</span>
						<input id="signupPasswordagain" type="password" maxlength="25" class="form-control">
					</label>
					
					<label>
						<span>User Type *</span>
						<br>
						<span>Student</span>
							<label><input id="signupStudent" type="checkbox" name="registerStudent" value="Student"></label>
						<span>Mentor</span>
							<label><input id="signupStudent" type="checkbox" name="registerMentor" value="Mentor"></label>
						
					</label>

					<div class="btn-wrapper">
						<button type="submit" value="Register" name="submit" class="btn theme-btn-3">Register</button>
					</div>

					<div class="section-header small">
						<h1><span>or</span></h1>
					</div>

					<div class="social-buttons">
						<a href="#" class="facebook">facebook</a>
						<a href="#" class="google-plus">google+</a>
					</div>

					<p><a href="#" class="forgot-password">Forgot password?</a></p>
					<p>Have an account already? <a href="#" class="login-btn">Login here</a></p>
				</form>


				<form id="login-form" action="login.php" method="POST">
					<div class="section-header">
						<h1>Login</h1>
					</div>

					<label>
						<div class="form-group">
						<span>Username*</span>
						<input type="text" class="form-control" name="username" value="" required="" title="Please enter your username" placeholder="Username">
						<span class="help-block"></span>
						</div>
					</label>

					<label>
						 <div class="form-group">
						<span>Password *</span>
						<input type="password" class="form-control" name="password" placeholder="Password" value="" required="" title="Please enter your password">
						   </div>
					</label>

					<div class="btn-wrapper">
						<button type="submit" value="login" name="submit" class="btn theme-btn-3">Login</button>
					</div>

					<div class="section-header small">
						<h1><span>or</span></h1>
					</div>

					<div class="social-buttons">
						<a href="#" class="facebook">facebook</a>
						<a href="#" class="google-plus">google+</a>
					</div>
					
					<p><a href="#" class="forgot-password">Forgot password?</a></p>
					<p>Don't have an account? <a href="#" class="register-btn">Register here</a></p>
				</form>
			</div>
		</div>

		
		<!-- Header -->
		<header>
			<div class="container">
				<div class="row">
					<div class="col-xs-4 col-sm-2">
						<a class="brand" href="index.html">
							<img src="img/identity.png" alt="identity" />
						</a>
					</div>

					<div class="col-xs-8 col-sm-10">
						<div class="action-bar">
							<ul class="social-block">
								<li><a href=""><i class="fa fa-facebook"></i></a></li>
								<li><a href=""><i class="fa fa-twitter"></i></a></li>
								<li><a href=""><i class="fa fa-pinterest"></i></a></li>
								<li><a href=""><i class="fa fa-dribbble"></i></a></li>
							</ul>

							<span class="search-box-toggle no-select">
								<i class="icon fa fa-search"></i>
							</span>

							<span class="menu-toggle no-select">Menu
								<span class="hamburger">
									<span class="menui top-menu"></span>
									<span class="menui mid-menu"></span>
									<span class="menui bottom-menu"></span>
								</span>
							</span>
							<?php
							if(!isset($_SESSION['user'])) {
							} else {
							?>
							<a class="my-account" href="myaccount.html"><span class="icon icon-MyAccount"></span><span class="popup">My account</span></a>
							<a class="my-account" href="logout.php"><span class="icon icon-log-out"></span><span class="popup">Logout</span></a>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>

			<nav>
				<ul>
					<li><a href="index.html">Home</a></li>
					<?php
							if(!isset($_SESSION['user'])) { ?>
								<li>
								<a href="courses-grid.html">Login and Register</a>
								</li>
								<?php
								} else {
							?> 
							<li>
							<a href="logout.php">Logout</a>
							</li>
							<li>
							<a href="myaccount.html">My Account</a>
							</li>
							<?php } ?>
							<li><a href="courses-list.html">User Stories</a></li>
					<li><a href="contact.html">Contact</a></li>
				</ul>
			</nav>
		</header>

	
		<!-- Main Content -->
		<div class="content-wrapper">
			<!-- Hero Section -->
			<section class="section-hero">
				<div class="hero-content courses-list">
					<div class="container">
						<center><h1 class="heading">User Selection</h1></center>
					</div>
				</div>
			</section>

			<!-- Courses Section -->
			<section class="section-courses">
				<div class="filters-box">
					<div class="box-heading">
						<div class="container">
							<ul class="courses-filters">
								<li>
									<a class="current" href="#" data-target="grid-all"><span>User Selection</span></a>
								</li>
							</ul>

							
						</div>
					</div>

				<div class="projects">
					<div class="container">
						<div class="main-loader">
							<div class="loader-front">
								<img src="img/loader-front.png" alt="loader front" />
							</div>
						</div>

						<div class="ajax-target">
							<div class="row">
								<div class="col-md-4 col-sm-6">
									<div class="single-course grid-course">
										

										<div class="course-details">
											<h3 class="title">
												<center><a>New User</a></center>
											</h3>

											<div class="course-action">
												<a href="#" class="btn theme-btn-1 register-btn">
													<span class="button" onclick="changetoReg()">Register</span>
												</a>
											</div>
										</div>
									</div>	
								</div>

								<div class="col-md-4 col-sm-6">
									<div class="single-course grid-course">
										<div class="course-thumbnail">
											<a class="cover-info">
												<div class="text">
													<h4>Already a User?</h4>
													<p>Click below to login!</p>
												</div>
											</a>

										</div>

										<div class="course-details">
											<h3 class="title">
												<center><a>Registered User</a></center>
											</h3>

											<div class="course-action">
													<a href="#" class="btn theme-btn-1 register-btn">
														<span class="button" onclick="changetoLogin()">Login</span>
												</a>
											</div>
										</div>
									</div>	
								</div>

								<div class="col-md-4 col-sm-6">
									<div class="single-course grid-course">
										<div class="course-thumbnail">
											<a class="cover-info">
												<div class="text">
													<h4>Are you a Mentor?</h4>
													<p>If so then please use the login below.</p>
												</div>
											</a>

										</div>

										<div class="course-details">
											<h3 class="title">
												<center><a href="course.html">Mentor</a></center>
											</h3>
											<div class="course-action">
												<a href="#" class="btn theme-btn-1 register-btn">
													<span class="button" onclick="changetoLogin()">Mentor Login</span>
												</a>
											</div>
										</div>
									</div>	
								</div>
							</ul>
						</div>
					</div>
				</div>
			</section>


		<!-- Footer -->
		<footer class="fixed">
			<div class="container">
				<div class="footer-wrapper">
					

					<div class="copyrights">
						<p>Copyright 2015. Designed by <a target="blank">5entier</a></p>
					</div>
				</div>
			</div>
		</footer>
	</div>

<script>
function changetoReg() {
document.getElementById("login-form").style.opacity = "0";
document.getElementById("login-form").style.display = "none"
document.getElementById("register-form").style.opacity = "1";
document.getElementById("register-form").style.display = "block";
}
function changetoLogin() {
document.getElementById("register-form").style.opacity = "0";
document.getElementById("register-form").style.display = "none"
document.getElementById("login-form").style.opacity = "1";
document.getElementById("login-form").style.display = "block";
}
</script>
	<!-- Scripts -->
	<script src="js/jquery.js"></script>
	<script src="js/jquery-ui.js"></script>
	<script src="js/lightbox.js"></script>
	<script src="js/velocity.js"></script>
	<script src="js/modernizr.js"></script>
	<script src="js/smooth-scroll.js"></script>
	<script src="js/bxslider.js"></script>
	<script src="js/options.js"></script>
</body>
</html>
