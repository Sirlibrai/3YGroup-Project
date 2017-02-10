<?php
session_start();
require("../php/config/config.php"); 
	if(!isset($_SESSION['login']))
	{ 
		header("Location: http://callumquigley.com/Pathbuilder/LevelUp/");
	}
		$data = array();
		$i = 0;
		$user = $_SESSION['user'];
		$result = $db->query("SELECT username, firstname, surname, email, StudentLocationPreference, StudentFieldPreference, budget FROM student WHERE username = '$user'");
		while( $row = $result->fetch(PDO::FETCH_ASSOC) ) { 
			$data[$i] = $row;
			$i++;
		}
		$sql = "SELECT CourseId, CourseTitle FROM course";
		$result = $db->query($sql);
	
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <title>NextStep</title>
    <meta name="description" content="Account Information" />
    <meta name="author" content="NextStep" />
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon" />

    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <!-- Style CSS -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/icomoon.css" />
    <link rel="stylesheet" href="css/screen.css" />
    <link href="css/style.css" rel='stylesheet' type='text/css' />
</head>
<body data-smooth-scroll="on" >
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
							<a class="my-account" href="myaccount.html"><span class="icon icon-MyAccount"></span><span class="popup">My account</span></a>
							<a class="my-account" href="logout.php"><span class="icon icon-log-out"></span><span class="popup">Logout</span></a>
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
								<p class="name"><?php echo $data[0]['firstname']; echo " "; echo $data[0]['surname']; ?></p>
							</div>
						</div>

						<div class="menu">
							<ul>
								<li>
									<a href="#edit-account">Edit Account</a>
								</li>

								<li>
									<a href="#edit-profile">Edit Profile</a>
								</li>
								<li>
									<a href="#timeline">My NextSteps</a>
								</li>
								<li>
									<a href="#mentor">Choose a Mentor</a>
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
										<p><?php echo $data[0]['username']; ?></p>
									</li>
									<li>
										<span>Name:</span>
										<p><?php echo $data[0]['firstname']; ?></p>
									</li>

									<li>
										<span>Last name:</span>
										<p><?php echo $data[0]['surname']; ?></p>
									</li>
 
									<li>
										<span>E-mail:</span>
										<p><?php echo $data[0]['email']; ?></p>
									</li>
									<li>
										<span>Prefered Location:</span>
										<p><?php echo $data[0]['StudentLocationPreference']; ?></p>
									</li>
									<li>
										<span>Prefered Vocation:</span>
										<p><?php echo $data[0]['StudentFieldPreference']; ?></p>
									</li>
									<li>
										<span>Budget:</span>
										<p>£<?php echo $data[0]['budget']; ?></p>
									</li>
								</ul>
							</div>

							<div id="edit-account" class="tab-box">
								<h3 class="box-caption">Edit Account</h3>
								<form class="edit-profile-form">
									<div class="row">
										<div class="col-sm-6">
											<label>
												<span>First Name *</span>
												<input type="text" class="js-input" name="first-name" />
											</label>
										</div>

										<div class="col-sm-6">
											<label>
												<span>Last Name *</span>
												<input type="text" class="js-input" name="last-name" />
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
												<span>Password *</span>
												<input type="password" class="js-input" name="password" />
											</label>
										</div>

										<div class="col-sm-6">
											<label>
												<span>New password</span>
												<input type="password" class="js-input" name="new-password" />
											</label>
										</div>
									</div>

									<button class="btn theme-btn-3">Update</button>
								</form>
							</div>
							
							<div id="edit-profile" class="tab-box">
								<h3 class="box-caption">Edit Profile</h3>
								<h4>Preferences</h4>
								<form class="edit-profile-form" method="POST" action="updatebasic.php" role="form">
									<div class="row">
										<div class="col-sm-6">
											<label>
												<span>Prefered Location *</span>
												<input id="location" type="text" maxlength="50" class="form-control" name="location" value="E.g. Edinburgh">
											</label>
										</div>

										<div class="col-sm-6">
											<label>
												<span>Prefered Vocation *</span>
												<input id="vocation" type="text" maxlength="50" class="form-control" name="vocation" value="E.g. Computing">
											</label>
										</div>

										<div class="col-sm-6">
											<label>
												<span>Study Budget Per Year *</span>
												<input id="budget" type="text" maxlength="50" class="form-control" name="budget" value="E.g. £1000">
											</label>
										</div>
									</div>
									<center>
									<button type="submit" value="Register" name="submitbasic" class="btn theme-btn-3">Update</button>
									</center>
								</form>
								
								
								
								<br>
								<h4>Education History</h4>
								<div id="edHist">
								<form class="edit-profile-form" action="updateeducation.php" method="POST">
									<div class="row">
										<div class="col-sm-6">
											<label>
												<span>Course Title *</span>
												 <select name="courses">
													 <?php
													while( $row = $result->fetch(PDO::FETCH_ASSOC) ) { 
													?>
													<option name = "courseid" value = <?php echo $row['CourseId']; ?> >
													<?php
													echo $row['CourseTitle'];
																
																	echo "</option>";
																	}?>
													</select>	
											</label>
										</div>
										<br>
										<br>
										<br>
										<div class="col-sm-6">
											<label>
												<span>Course Grade *</span>
												<input type="text" class="form-control" name="coursegrade" placeholder="A" value="" required="">
											</label>
										</div>
											<div class="col-sm-6">
											<label>
												<span>Course Start Date *</span>
												<input type="date" class="form-control" name="coursestartdate" placeholder="01/01/2000" value="" required="">
											</label>
										</div>
										<div class="col-sm-6">
											<label>
												<span>Course End Date *</span>
												<input type="date" class="form-control" name="courseenddate" placeholder="01/01/2001" value="" required="">
											</label>
										</div>
									</div>
								
								</div>
								<br/>
								<div id="edButtonsHere">
								<center>
								<button id="addMore" onclick="duplicateEd()" class="btn theme-btn-3">Add Another Course</button>
								<br>
								<br>
								<button type="submit" id="update" class="btn theme-btn-3">Update Education</button>
								</center>
								</form>
								</div>
								
								
								
								
								
								<br>
								<div id="jobTitle">
								<h4>Work History</h4>
								</div>
								<div id="jobHist">
								<form class="edit-profile-form">
									<div class="row">
										<div class="col-sm-6">
											<label>
												<span>Job Title *</span>
												<input type="text" class="js-input" name="job-title" />
											</label>
										</div>

										<div class="col-sm-6">
											<label>
												<span>Start Date *</span>
												<input type="text" class="js-input" name="job-start-date" />
											</label>
										</div>

										<div class="col-sm-6">
											<label>
												<span>End Date *</span>
												<input type="text" class="js-input" name="job-end-date" />
											</label>
										</div>
									</div>
								</form>
								</div>
								<div id="jobButtonsHere">
								<center>
								<button id="addMore" onclick="duplicateJobs()" class="btn theme-btn-3">Add Another Job</button>
								<br>
								<br>
								<button id="update" class="btn theme-btn-3">Update Work History</button>
								</center>
								</div>
								
							</div>
							
							<div id="mentor" class="tab-box">
								<h3 class="box-caption">View Mentors Below</h3>
								<form method="POST" action="members.php">
									<button name="mentors" type="submit" class="btn theme-btn-3">View Mentors</button>
								</form>
							</div>

							
		<div id="timeline" class="tab-box">
			<h3 class="box-caption">My NextSteps</h3>
			<div class="exp-devide">
				<?php			
					
					$userid = $_SESSION['id'];	
					$sql = "SELECT course.CourseTitle,educationhistory.StartDate,educationhistory.EndDate FROM student JOIN educationhistory ON educationhistory.StudentId = student.id JOIN course on educationhistory.CourseId = course.CourseId WHERE educationhistory.StudentId = {$userid} ORDER BY StartDate DESC, EndDate DESC";
					$result = $db->query($sql);			
					$count = 0;
					$two = 2;
					if ($result) {
						?><h4><a href="future.php">Education</a></h4><span class="devide-line"></span>
						<label class="book"></label><?php
					while( $row = $result->fetch(PDO::FETCH_ASSOC) ) { 
						$mod = fmod($count,$two);
						 		if($mod==0){
									?><div class="exp-devide-grid-right"><?php
									echo "<h5>".$row["CourseTitle"]."</h5><small>".$row["StartDate"]." to ".$row["EndDate"]."</small><p></p></div></div>";									
							
										?><div class="exp-devide"><span class="devide-line"></span><?php
	
								}
									
								if($mod==1){
									?><div class="exp-devide-grid-left"><?php
									echo "<h5>".$row["CourseTitle"]."</h5><small>".$row["StartDate"]." to ".$row["EndDate"]."</small><p></p></div></div>";									
							
										?><div class="exp-devide"><span class="devide-line"></span><?php
									
				
								}
						$count = $count + 1;
				    
				}
			}else{
				    ?><h1 class="noh">Nothing there plase add your <a href="#" class="noh1">experience</a> or <a href="#" class="noh1">choose your path way!</a></h1><?php
					}
				?>
		</div>
		</div>
		
	
		<!-- Footer -->
		<footer class="fixed">
			
					<div class="copyrights">
						<p>Copyright 2015. Designed by <a href="http://www.teslathemes.com" target="blank">TeslaThemes</a></p>
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
	<script>
		
	Element.prototype.remove = function() {
    this.parentElement.removeChild(this);
	}
	NodeList.prototype.remove = HTMLCollection.prototype.remove = function() {
    for(var i = this.length - 1; i >= 0; i--) {
        if(this[i] && this[i].parentElement) {
            this[i].parentElement.removeChild(this[i]);
        }
    }
}
	var i = 0;
	var j = 0;
	var edHist = document.getElementById('edHist');
	var edButton = document.getElementById('edButtonsHere');
	
	var jobHist = document.getElementById('jobHist');
	var jobButton = document.getElementById('jobButtonsHere');
	var jobTitle = document.getElementById('jobTitle');
	var linebreak = document.createElement("br");
	
	function duplicateEd() {
	document.getElementById("edButtonsHere").remove();
	document.getElementById("jobTitle").remove();
	document.getElementById("jobHist").remove();
    var clone = edHist.cloneNode(true); // "deep" clone
    clone.id = "edHistory" + ++i;
    // or clone.id = ""; if the divs don't need an ID
    edHist.parentNode.appendChild(linebreak);
    edHist.parentNode.appendChild(clone);
    edHist.parentNode.appendChild(edButton);
    edHist.parentNode.appendChild(linebreak);
    edHist.parentNode.appendChild(jobTitle);
    edHist.parentNode.appendChild(jobHist);
    edHist.parentNode.appendChild(jobButton);
	}
	
	function duplicateJobs() {
	document.getElementById("jobButtonsHere").remove();
    var clone = jobHist.cloneNode(true); // "deep" clone
    clone.id = "jobHist" + ++j;
    // or clone.id = ""; if the divs don't need an ID
    jobHist.parentNode.appendChild(clone);
    jobHist.parentNode.appendChild(jobButton);
	}
	</script>
	
</body>
</html>
