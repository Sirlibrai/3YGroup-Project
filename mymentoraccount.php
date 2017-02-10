<?php
session_start();
require("../php/config/config.php"); 
	if(!isset($_SESSION['login']))
	{ 
		header("Location: http://callumquigley.com/Pathbuilder/LevelUp/");
	}
		
		
	$id = $_SESSION['id'];
	$result = $db->query("SELECT M.username, M.firstname, M.surname, M.email FROM mentor M WHERE M.MentorId = '$id'");
	$row = $result->fetch(PDO::FETCH_ASSOC)
		
	
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <title>LevelUp</title>
    <meta name="description" content="Mentor Account" />
    <meta name="author" content="5entier" />
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
								<li><a href="https://www.facebook.com/TeslaThemes"><i class="fa fa-facebook"></i></a></li>
								<li><a href="https://twitter.com/TeslaThemes"><i class="fa fa-twitter"></i></a></li>
								<li><a href="https://www.pinterest.com/teslathemes/"><i class="fa fa-pinterest"></i></a></li>
								<li><a href="https://dribbble.com/TeslaThemes/"><i class="fa fa-dribbble"></i></a></li>
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
							<a class="my-account" href="mymentoraccount.php"><span class="icon icon-MyAccount"></span><span class="popup">My account</span></a>
							<a class="my-account" href="logout.php"><span class="icon icon-log-out"></span><span class="popup">Logout</span></a>
						</div>
					</div>
				</div>
			</div>

			<nav>
				<ul>
					<li><a href="index.html">Home</a></li>
					<li>
						<a href="logout.php">Logout</a>
					</li>
					<li>
						<a href="mymentoraccount.php">My Account</a>
					</li>
					<li><a href="contact.html">Contact</a></li>
				</ul>
			</nav>
		</header>

		<!-- Main Content -->
		<div class="content-wrapper">
			<!-- Hero Section -->
			<section class="section-hero">
				<div class="hero-content my-account">
					<div class="container">
						<h1 class="heading">My profile</h1>
					</div>
				</div>
			</section>

			<!-- My account section -->
			<section class="section-myaccount">
				<div class="container">
					<div class="col-md-3">
						<div class="profile-box">
							<span class="icon icon-iconmale"></span>

							<div class="user-info-box">
								<a class="my-profile" href="#">My profile</a>
								<p class="name"><?php echo $row['firstname']; echo " "; echo $row['surname']; ?></p>
							</div>
						</div>

						<div class="menu">
							<ul>
								<li>
									<a href="#general-info">My Information</a>
								</li>
								
								<li>
									<a href="#edit-profile">Edit Profile</a>
								</li>

								<li>
									<a href="#current">Current Students</a>
								</li>

								<li>
									<a href="#saved">Student Requests</a>
								</li>

								<li>
									<a class="log-out" href="logout.php">Log out</a>
								</li>
							</ul>
						</div>
					</div>
					<div class="col-md-9 col-lg-8">
						<div class="tabs-box">
							<div id="general-info" class="tab-box visible">
								<h3 class="box-caption">General information</h3>

								<ul class="user-general-info">
									<li>
										<span>Username:</span>
										<p><?php echo $row['username']; ?></p>
									</li>
									<li>
										<span>Name:</span>
										<p><?php echo $row['firstname']; ?></p>
									</li>

									<li>
										<span>Last name:</span>
										<p><?php echo $row['surname']; ?></p>
									</li>

									<li>
										<span>E-mail:</span>
										<p><?php echo $row['email']; ?></p>
									</li>
									
									<li>
										<span>Institute:</span>
										<p><?php 
												$query = "SELECT InstituteCode, InstituteName, InstituteAddress3 FROM educationinstitute I, mentor M WHERE I.InstituteId = M.MentorInstituteId AND M.MentorId = '$_SESSION[id]'";
												$result = $db->query($query);
												while($row = $result->fetch(PDO::FETCH_ASSOC)){
													$instName = $row['InstituteName'];
													$instCode = $row['InstituteCode'];
													$instLocation = $row['InstituteAddress3'];
												}
												echo $instName;
											?></p>
									</li>
									
									<li>
										<span>Institute Code:</span>
										<p><?php echo $instCode; ?></p>
									</li>
									
									<li>
										<span>Location:</span>
										<p><?php echo $instLocation; ?></p>
									</li>
								</ul>
							</div>

							<div id="edit-profile" class="tab-box">
								<h3 class="box-caption">Edit profile</h3>

								<form class="edit-profile-form" method="POST" action="updatementor.php">
									<div class="row">
										<div class="col-sm-6">
											<label>
												<span>First Name *</span>
												<input type="text" class="js-input" name="firstname" />
											</label>
										</div>

										<div class="col-sm-6">
											<label>
												<span>Last Name *</span>
												<input type="text" class="js-input" name="lastname" />
											</label>
										</div>

										<div class="col-sm-6">
											<label>
												<span>E-mail address *</span>
												<input type="text" class="js-input" name="email" />
											</label>
										</div>
										
										<div class="col-sm-6">
											<label>
												<span>Institute Code</span>
												<input type="text" class="js-input" name="institutecode" />
											</label>
										</div>
									</div>

									<button class="btn theme-btn-3">Update</button>
								</form>
							</div>
							
							<div id="current" class="tab-box">
								<h3 class="box-caption">Current Students</h3>
								<ul class="profile-courses">
									<?php
										$tempSession = $_SESSION['id'];
										$query = "SELECT S.firstname, S.surname, S.StudentLocationPreference, S.StudentFieldPreference, S.budget, ML.MentorReqFilled FROM student S, mentor M, mentorlist ML WHERE M.MentorId = ML.MentorId AND S.id = ML.StudentId AND M.MentorId = '$_SESSION[id]'";
										$result = $db->query($query);
										$i = 0;
										while($row = $result->fetch(PDO::FETCH_ASSOC)){
											$forename[$i] = $row['firstname'];
											$surname[$i] = $row['surname'];
											$location[$i] = $row['StudentLocationPreference'];
											$field[$i] = $row['StudentFieldPreference'];
											$budget[$i] = $row['budget'];
											$req[$i] = $row['MentorReqFilled'];
											if ($req[$i] == 1){
												echo '<li class="course single-course">
														<div class="course-wrapper">

															<div class="course-details">
																<form method="POST" action="pathway.php">
																	<button name="student" type="submit" value="' . $i .'" class="btn theme-btn-3">' . $forename[$i] . ' ' . $surname[$i] . '</button>
																</form>
																

																<ul class="course-meta">
																	<li><span>Student Name:</span>' . $forename[$i] . ' ' . $surname[$i] . '</li>
																	<li><span>Location Preference:</span> ' . $location[$i] . '</li>
																	<li><span>Field Preference:</span>' . $field[$i] . '</li>
																	<li><span>Budget:</span> £' . $budget[$i] . '</li>
																</ul>
																
															</div>
														</div>
													</li>';
											}
											$i++;
										}
									?>
								</ul>
							</div>

							<div id="saved" class="tab-box">
								<h3 class="box-caption">Student Requests</h3>
								<ul class="profile-courses">
									<?php
										$query = "SELECT S.id, S.firstname, S.surname, S.StudentLocationPreference, S.StudentFieldPreference, S.budget, ML.MentorReqFilled FROM student S, mentor M, mentorlist ML WHERE M.MentorId = ML.MentorId AND S.id = ML.StudentId AND M.MentorId = '$_SESSION[id]'";
										$result = $db->query($query);
										$i = 0;
										while($row = $result->fetch(PDO::FETCH_ASSOC)){
											$forename[$i] = $row['firstname'];
											$surname[$i] = $row['surname'];
											$location[$i] = $row['StudentLocationPreference'];
											$field[$i] = $row['StudentFieldPreference'];
											$budget[$i] = $row['budget'];
											$_SESSION['MentorId'][$i] = $row['id'];
											$req[$i] = $row['MentorReqFilled'];
											if ($req[$i] == 0){
												echo '<li class="course single-course">
														<div class="course-wrapper">

															<div class="course-details">
																<h3 class="title">
																	<a href="pathway.html">'. $forename[$i] . ' ' . $surname[$i] . '</a>
																</h3>

																<ul class="course-meta">
																	<li><span>Student Name:</span>' . $forename[$i] . ' ' . $surname[$i] . '</li>
																	<li><span>Location Preference:</span> ' . $location[$i] . '</li>
																	<li><span>Field Preference:</span>' . $field[$i] . '</li>
																	<li><span>Budget:</span> £' . $budget[$i] . '</li>
																</ul>
																
																<form method="POST" action="accept.php">
																	<button name="accept" type="submit" value="' . $i .'" class="btn theme-btn-3">Accept</button>
																</form>
																<br/>
																<form method="POST" action="decline.php">
																	<button name="decline" type="submit" value="' . $i .'" class="btn theme-btn-3">Decline</button>
																</form></p>
															</div>
														</div>
													</li>';
											}
											$i++;
										}
									?>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
	

		<!-- Footer -->
		<footer class="fixed">
			
					<div class="copyrights">
						<p>Copyright 2016. Designed by <a href="" target="blank">5entier</a></p>
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

