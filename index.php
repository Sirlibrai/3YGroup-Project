<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <title>Next Step</title>
    <meta name="description" content="Discover your potential" />
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
<body id="front-page" data-smooth-scroll="on">
	<form class="global-search-form">
		<div class="container">
			<input type="text" name="search-input" class="search-input js-input" placeholder="Type here ..." />
		</div>
	</form>
		

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
		</header>

		<!-- Main Content -->
		<div class="content-wrapper">
			<!-- Hero Section -->
			<section class="section-hero">
				<!-- Main Slider -->
				<div class="hero-slider">
					<ul class="container custom-nav">
						<li class="prev">
							<i class="icon-arrowleft"></i>
						</li>
						<li class="next">
							<i class="icon-arrowright"></i>
						</li>
					</ul>
					<ul class="slides">
						<li class="slide">
							<div class="container">
								<div class="slide-content">
									<h1 class="heading slider-component">Shape your future. Join us <a class="popup-holder" href="courses-grid.html">
										<span class="typed">Today</span>
										<span class="popup">
											<span class="title">We are currently in the Beta Stage!</span>
											Please bear with us whilst we update the site.
										</span>
									</a></h1>
												<a href="courses-grid.html" class="btn theme-btn-1 register-btn">
													<span class="button">Register</span>
												</a>
						</li>

						<li class="slide">
							<div class="container">
								<div class="slide-content">
									<h1 class="heading slider-component">User Stories<a class="popup-holder" href="#">
										<span class="popup">
											<span class="title">We thrive on feedback</span>
											A lot of our users continually give us fantastic feedback about their experiences with us. Read more here.
										</span>
									</a></h1>

									<a href="courses-list.html" class="slider-component second-row btn theme-btn-1">
										<span class="button">Read User Experiences</span>
									</a>
								</div>
							</div>
						</li>

						<li class="slide">
							<div class="container">
								<div class="slide-content">
									<h1 class="heading slider-component">Build Your Future. Continue Your Pathway Today<a class="popup-holder" href="#">
										<span class="popup">
											<span class="title">Login</span>
											Already have an account with us? Login to view your pathway now using the button below.
										</span>
									</a></h1>

									<a href="courses-grid.html" class="btn theme-btn-1 register-btn">
										<span class="button">Login</span>
									</a>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</section>

			<!-- Services Section -->
			<section class="section-services">
				<div class="container">
					<div class="section-header">
						<h1>Services</h1>
					</div>

					<div class="row">
						<div class="col-xs-6 col-md-3 x-small">
							<div class="simple-service">
								<i class="icon icon-book-open"></i>
								<h4 class="title">Opportunities added daily</h4>
								<p>Keep updated with the latest jobs, careers and qualifications</p>
							</div>
						</div>

						<div class="col-xs-6 col-md-3 x-small">
							<div class="simple-service">
								<i class="icon icon-gears"></i>
								<h4 class="title">Change your persona as you go</h4>
								<p>Everytime you update your personal information and achievements we update your next steps</p>
							</div>
						</div>

						<div class="col-xs-6 col-md-3 x-small">
							<div class="simple-service">
								<i class="icon icon-calendar"></i>
								<h4 class="title">Keep track of time</h4>
								<p>We are currently developing a calendar so you can track your progress</p>
							</div>
						</div>

						<div class="col-xs-6 col-md-3 x-small">
							<div class="simple-service">
								<i class="icon icon-flag"></i>
								<h4 class="title">Understand your potential</h4>
								<p>We want to be the flagship of your achievements and guide you in the right path.</p>
							</div>
						</div>
					</div>

					<div class="services-description">
						<div class="section-header">
							<h1>What can we do for you?</h1>
						</div>
						<div class="row">
							<div class="col-md-6">
								<p class="highlighted-start">Next Step is a government funded project which will allow you (a school leaver) to visualise your future. Simply enter some basic information and details about your education and employment history and we will provide you with a visual pathway representation of your career so far as well as suggestions for your future.</p>

								<p>We also provide academic mentors the opportunity to guide a student through their future choices with the mentor section. Once you have been assigned as a user's mentor you will be able to view their pathway and can use this to help them make decisions about their future careers.</p>

								<ul class="list-services">
									<li>Virtual Pathway</li>
									<li>Mentor System</li>
									<li>Past Users' Stories</li>
								</ul>
							</div>

							<div class="col-md-6 col-lg-offset-1 col-lg-5">
								<div class="showcase-box">
									<div class="box-wrapper" data-parallax-bg="img/showcase-bg.jpg">
										<div class="box-img"><span></span></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>

			<br>
		
			<!-- Testimonials Section -->
			<section class="section-testimonial">
				<div class="container">
					<div class="section-header">
						<h1>Testimonials</h1>
					</div>
				</div>

				<ul class="testimonials-list">
					<li class="slide">
						<div class="container">
							<div class="testimonial">
								<div class="testimonial-wrapper">
									<p class="message">"I had just been made redundant in my previous job. I've had plenty of life experience but I wasn't sure what my options were. My friend suggested this website after signing up I found so many new opportunities and now I'm a successful web developer. I never knew how many careers I had to choose from! "</p>
									<p class="author">James, <span class="title">Web Developer</span></p>
								</div>
							</div>
						</div>
					</li>

					<li class="slide">
						<div class="container">
							<div class="testimonial">
								<div class="testimonial-wrapper">
									<p class="message">"After just leaving school I needed an idea of what I could do with my qualifications. I found a load of interesting courses at universities for Biology. Now I am a third year microbiology student and I couldn't be happier! "</p>
									<p class="author">Sara, <span class="title">Student</span></p>
								</div>
							</div>
						</div>
					</li>

					<li class="slide">
						<div class="container">
							<div class="testimonial">
								<div class="testimonial-wrapper">
									<p class="message">"Since I can remember I loved playing games. I never thought I could do anything with them for a career. This website suggested a games programming course at university. I decided to enrol and after gaining my qualification I came back to find some career options. NextStep gave me multiple options and I ended up working at EA. Thanks NextStep!"</p>
									<p class="author">Sam, <span class="title">Games Developer</span></p>
								</div>
							</div>
						</div>
					</li>
				</ul>
			</section>


		<!-- Footer -->
		<footer class="fixed">
			<div class="container">
		
					<div class="copyrights">
						<p>Copyright 2016. Designed by <a href="" target="blank">5entier</a></p>
					</div>
				</div>
			</div>
		</footer>
	</div>

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
