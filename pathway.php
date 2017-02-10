<?php
	session_start();
	require("../php/config/config.php");
	
	$id = $_POST['student'];
    
    $temp = $_SESSION['MentorId'][$id];
    $tempSession = $_SESSION['id'];
    $_SESSION['id'] = $temp;
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
								<li><a href=""><i class="fa fa-facebook"></i></a></li>
								<li><a href=""><i class="fa fa-twitter"></i></a></li>
								<li><a href="/"><i class="fa fa-pinterest"></i></a></li>
								<li><a href="/"><i class="fa fa-dribbble"></i></a></li>
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
						<h1 class="heading">Student Timeline</h1>
					</div>
				</div>
			</section>
		<br>
		<br>
			<div class="container">
			
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
	
</body>
</html>
		<?php 
		$_SESSION['id'] = $tempSession;
		?>
	

