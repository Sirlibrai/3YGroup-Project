<?php 
	session_start();
	require("../php/config/config.php"); 
	
	if(!isset($_SESSION['login']))
	{ 
		header("Location: http://callumquigley.com/Pathbuilder/LevelUp/");
	}
?>
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
				<div class="hero-content instructors">
					<div class="container">
						<h1 class="heading">Instructor</h1>
					</div>
				</div>
			</section>

			<!-- Members Section -->
			<section class="section-members">
				<div class="container">
					<div class="row">
						<div class="col-md-8">
							<div class="single-member-box">
								<div class="member-social-box">
									<div class="row">
										<div class="col-sm-6 col-md-7 col-lg-6">
											<div class="profile">
												<div class="avatar">
													<img src="img/single-avatar.jpg" alt="single member avatar" />
												</div>
												<div class="short-info">
													<?php 
														$id = $_POST['member'];
														$temp = $_SESSION['StudentId'][$id];
														$query = "SELECT M.MentorId, M.firstname, M.surname, M.email, I.InstituteName 
																	FROM mentor M, educationinstitute I
																	WHERE M.MentorInstituteId = I.InstituteId
																	AND M.MentorId = '$temp'";
														$result = $db->query($query);
														while($row = $result->fetch(PDO::FETCH_ASSOC)){
															$firstname = $row['firstname'];
															$surname = $row['surname'];
															$email = $row['email'];
															$inst = $row['InstituteName'];
															$mentorid = $row['MentorId'];
														}
													?>
													<h3 class="name"><?php echo $firstname . " " . $surname; ?></h3>
													<p class="covered-areas"><?php echo $inst; ?></p>
												</div>
											</div>
										</div>

										<div class="col-sm-6 col-md-5 col-lg-6">
											<div class="profile-info">
												<ul>
													<li class="mail"><?php echo $email; ?></li>
													<li>
														<form method="POST" action="request.php">
															<button name="request" type="submit" value="<?php echo $mentorid; ?>" class="btn theme-btn-3">Send a request to this mentor.</button>
														</form>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
								
								<h3>Students</h3>

								<ul class="instructor-courses">
									<li class="list-heading">
										<span class="start-date">Surname</span>
										<span class="name">First Name</span>
									</li>
									<?php
										$query = "SELECT S.firstname, S.surname FROM student S, mentorlist ML WHERE ML.StudentId = S.id AND ML.MentorId = '$this'";
										$result = $db->query($query);
										while($row = $result->fetch(PDO::FETCH_ASSOC)){
											echo '<li class="course">
													<div class="heading">
														<span class="date">' . $row['surname'] . '</span>
													</div>

													<div class="body">
														<p><a href="course.html">' . $row['firstname'] . '</a></p>
													</div>
												</li>';
										}
									?>


								<h3>Contact the instructor</h3>
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

						<div class="col-md-4">
							<div class="sidebar">
								<div class="row sidebar-isotope">
									<div class="col-md-12 col-sm-6 col-xs-12 sidebar-isotope-item">
										<div class="sidebar-widget widget_search">
											<form>
												<label>
													<input type="text" class="form-input js-input" />
													<span>Search</span>
												</label>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>


		<!-- Footer -->
		<footer class="fixed">
			<div class="container">
				<div class="footer-wrapper">
				
					<div class="copyrights">
						<p>Copyright 2015. Designed by <a href="" target="blank">NextStep</a></p>
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
