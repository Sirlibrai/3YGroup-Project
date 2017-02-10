<?php session_start();
require("../php/config/config.php");
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="Homepage">
    <meta name="author" content="Yuanqi Zhu" >
    <link rel="icon" href="favicon.ico">

    <title>Next Step : Home</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/style.css" rel='stylesheet' type='text/css' />

	
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
	


    
    <div class="container">
     

  </body>
</html>
