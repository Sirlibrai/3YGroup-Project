<?php session_start() ?>
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
<body data-smooth-scroll="on">
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
						<h1 class="heading">User Stories</h1>
					</div>
				</div>
			</section>

			<!-- Courses Section -->
			<section class="section-courses">
				<div class="filters-box">

					<div class="advanced-filters-box">
						<div class="container">
							<h2>Advanced filters</h2>

							<div class="row">
								<div class="col-xs-6 col-md-3">
									<div class="filter-input-box">
										<span class="caption">Course category</span>
										<div class="input-box selext-box">
											<input type="text" value="" readonly class="js-input no-select" data-selection="all" placeholder="All categories (95)" name="course-category" />

											<div class="dropdown">
												<ul class="list">
													<li data-option="all">All categories <span>(95)</span></li>
													<li data-option="culinary">Culinary <span>(34)</span></li>
													<li data-option="web-design">Web design <span>(17)</span></li>
													<li data-option="technology">Technology <span>(11)</span></li>
													<li data-option="sport">Sports <span>(9)</span></li>
													<li data-option="education">Education <span>(7)</span></li>
												</ul>
											</div>
										</div>
									</div>

									<div class="filter-input-box">
										<span class="caption">Sort by</span>
										<div class="input-box selext-box">
											<input type="text" value="" readonly class="js-input no-select" data-selection="new" placeholder="Newest courses" name="course-sorting" />

											<div class="dropdown">
												<ul class="list">
													<li data-option="new">Newest courses</li>
													<li data-option="low-to-high">Price low to high</li>
													<li data-option="high-to-low">Price high to low</li>
												</ul>
											</div>
										</div>
									</div>
								</div>

								<div class="col-xs-6 col-md-3">
									<div class="filter-input-box">
										<span class="caption">Keywords</span>
										<div class="input-box">
											<input type="text" value="" class="js-input" name="course-keywords" />
										</div>
									</div>

									<div class="filter-input-box">
										<span class="caption">Offline courses by date</span>
										<div class="input-box selext-box date-select">
											<input type="text" value="" readonly class="js-input no-select" data-selection="new" placeholder="Newest courses" name="course-date" />

											<div class="dropdown">
												<div id="calendar" class="calendar"></div>
											</div>
										</div>
									</div>
								</div>

								<div class="col-xs-6 col-md-3">
									<div class="filter-input-box">
										<span class="caption">Course instructor</span>
										<div class="input-box selext-box">
											<input type="text" value="" readonly class="js-input no-select" data-selection="all" placeholder="All instructors" name="course-instructor" />

											<div class="dropdown">
												<ul class="list">
													<li data-option="zack">Zack Thoumb</li>
													<li data-option="john">John Isner</li>
													<li data-option="barry">Barry Allen</li>
													<li data-option="armstrong">Joe Armstrong</li>
													<li data-option="cage">Elena Cage</li>
													<li data-option="chase">Alexandr Chase</li>
												</ul>
											</div>
										</div>
									</div>
								</div>

								<div class="col-xs-6 col-md-3">
									<div class="filters-action">
										<a href="#" class="apply btn theme-btn-1 blue">
											<span class="button">Apply filters</span>
										</a>
										<a class="reset" href="#">Reset filters</a>
									</div>
								</div>
							</div>
						</div>
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
							<div class="single-course list-course">
								<div class="row">
									<div class="col-md-4 col-sm-6">
										<div class="course-thumbnail">

											<img src="img/james.png" width="80%"/>
										</div>
									</div>

									<div class="col-md-4 col-sm-6">
										<div class="course-details">
											<h3 class="title">
												"I never knew how many careers I had to choose from!"
											</h3>

											<ul class="course-meta">
												<li><span>Name:</span> James</li>
												<li><span>Occupation:</span> Web Developer</li>
												<li><span>Next Step Use Date:</span> 2015</li>
											</ul>
										</div>
									</div>

									<div class="col-md-4 col-sm-12">
										<div class="course-description">
											<p>"I had just been made redundant in my previous job. I've had plenty of life experience but I wasn't sure what my options were. My friend suggested this website after signing up I found so many new opportunities and now I'm a successful web developer. I never knew how many careers I had to choose from!"</p>
										</div>
									</div>
								</div>
							</div>

							<div class="single-course list-course">
								<div class="row">
									<div class="col-md-4 col-sm-6">
										<div class="course-thumbnail">
											<img src="img/sara.png" width="80%"/>
										</div>
									</div>

									<div class="col-md-4 col-sm-6">
										<div class="course-details">
											<h3 class="title">
												"I couldn't be happier!"
											</h3>

											<ul class="course-meta">
												<li><span>Name:</span> Sara</li>
												<li><span>Occupation:</span> Student</li>
												<li><span>Next Step Use Date:</span> Ongoing</li>
											</ul>
										</div>
									</div>

									<div class="col-md-4 col-sm-12">
										<div class="course-description">
											<p>"After just leaving school I needed an idea of what I could do with my qualifications. I found a load of interesting courses at universities for Biology. Now I am a third year microbiology student and I couldn't be happier!"</p>
										</div>
									</div>
								</div>
							</div>

							<div class="single-course list-course">
								<div class="row">
									<div class="col-md-4 col-sm-6">
										<div class="course-thumbnail">
											<img src="img/sam.png" width="80%" />
										</div>
									</div>

									<div class="col-md-4 col-sm-6">
										<div class="course-details">
											<h3 class="title">
												"NextStep gave me multiple options... Thanks NextStep!"
											</h3>

											<ul class="course-meta">
												<li><span>Name:</span> Sam</li>
												<li><span>Occupation:</span> Games Developer</li>
												<li><span>Next Step Use Date:</span> 2014/15</li>
											</ul>
										</div>
									</div>

									<div class="col-md-4 col-sm-12">
										<div class="course-description">
											<p>"Since I can remember I loved playing games. I never thought I could do anything with them for a career. This website suggested a games programming course at university. I decided to enrol and after gaining my qualification I came back to find some career options. NextStep gave me multiple options and I ended up working at EA. Thanks NextStep!"</p>
										</div>
									</div>
								</div>
							</div>

							<ul class="page-numbers">
								<li>
									<span class="page-numbers">1</a>
								</li>
								<li>
									<a href="#" class="page-numbers">2</span>
								</li>
								<li>
									<a class="page-numbers" href="#">3</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</section>
			
		<!-- Footer -->
		<footer class="fixed">
			<div class="container">
		
					<div class="copyrights">
						<p>Copyright 2016. Designed by <a href="http://www.teslathemes.com" target="blank">5entier Software</a></p>
					</div>
				</div>
			</div>
		</footer>

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
