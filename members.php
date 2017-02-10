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
						<h1 class="heading">Mentors List</h1>
					</div>
				</div>
			</section>

			<!-- Members Section -->
			<section class="section-members">
				<div class="container">

					<div class="row">
						<?php
							echo $_SESSION['id'];
							$query = "SELECT M.MentorId, M.firstname, M.surname FROM mentor M";
							$result = $db->query($query);
							$i = 0;
							while($row = $result->fetch(PDO::FETCH_ASSOC)){
								$forename[$i] = $row['firstname'];
								$surname[$i] = $row['surname'];
								$_SESSION['StudentId'][$i] = $row['MentorId'];
								echo '<div class="col-md-4 col-sm-6">
										<div class="team-member">
											<div class="photo">
												<a href="member.html">
													<img src="img/member-1.jpg" alt="member avatar" />
												</a>
											</div>
											<form method="POST" action="member.php">
											
												<button name="member" type="submit" value="' . $i .'" class="btn theme-btn-3">' . $forename[$i] . ' ' . $surname[$i] . '</button>
											</form>
											<ul class="social-block">
												<li><a href="#"><i class="fa fa-facebook"></i></a></li>
												<li><a href="#"><i class="fa fa-twitter"></i></a></li>
												<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
											</ul>
										</div>
									</div>';
								$i++;
							}
						?>
					</div>
				</div>
			</section>


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
