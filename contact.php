<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <title>LevelUp</title>
    <meta name="description" content="Here goes description" />
    <meta name="author" content="author name" />
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon" />

    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <!-- Style CSS -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/icomoon.css" />
    <link rel="stylesheet" href="css/screen.css" />
</head>
<body data-smooth-scroll="on" onunload="GUnload()">
	<form class="global-search-form">
		<div class="container">
			<input type="text" name="search-input" class="search-input js-input" placeholder="Type here ..." />
		</div>
	</form>

	<!-- Page Wrapper -->
	<div id="page">
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
				<div class="hero-content contact">
					<div class="container">
						<h1 class="heading">contact us</h1>
					</div>
				</div>
			</section>

			<!-- Contact Section -->
			<center>
			<section class="section-contact">
				<div class="contact-info-wrapper">
					<div class="container">
						<div class="row">
							<div class="col-md-6">
								<form class="contact-form">
									<label>
										<input type="text" class="form-input js-input" name="username" />
										<span>Your name</span>
									</label>

									<label>
										<input type="text" class="form-input js-input" name="email" />
										<span>E-mail address</span>
									</label>

									<label>
										<input type="text" class="form-input js-input" name="subject" />
										<span>Subject</span>
									</label>

									<label>
										<textarea class="form-input js-input" name="message"></textarea>
										<span>Message</span>
									</label>

									<button class="btn theme-btn-1">
										<span class="button">Send message</span>
									</button>
								</form>
							</div>

						</div>
					</div>
				</div>
</center>
				<div class="row row-fit">
					<div class="col-sm-4">
						<div class="contact-info-block">
							<div class="block-meta">
								<h4>Phone number</h4>
								<p>07738666874</p>
							</div>
						</div>
					</div>

					<div class="col-sm-4">
						<div class="contact-info-block has-icon"></div>
					</div>

					<div class="col-sm-4">
						<div class="contact-info-block">
							<div class="block-meta">
								<h4>Email contact</h4>
								<p><a href="#">contact@nextstep.com</a></p>
							</div>
						</div>
					</div>
				</div>
			</section>

		

		<!-- Footer -->
		<footer class="fixed">
					<div class="copyrights">
						<p>Copyright 2015. Designed by 5entier</a></p>
					</div>
				</div>
			</div>
		</footer>
	</div>

	<!-- Scripts -->
	<script src="http://maps.googleapis.com/maps/api/js"></script>
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
