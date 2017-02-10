<?php
session_start();
include("../php/config/config.php");
					$user = $_SESSION['id'];
					$sql = "SELECT educationhistory.Grade FROM educationhistory, student WHERE educationhistory.StudentId = student.id AND student.id = {$user}";
					$result = $db->query($sql);		
					$temp = "";
					$count = 0;
					$arr = array();
					while( $row = $result->fetch(PDO::FETCH_ASSOC) ) { 
						//if ($row[Grade] == null){
							//echo "You have unfinished course";
							//exit();
						//}
						//else{
						$arr[$count]= $row[Grade]; 
						$count = $count + 1;
					//}
					}
					$g = json_encode($arr);
					$sql = "SELECT student.StudentLocationPreference, student.StudentFieldPreference FROM student WHERE student.id = {$user}";
					$result = $db->query($sql);	
					$l = "";
					$f = "";
					while( $row = $result->fetch(PDO::FETCH_ASSOC) ) { 
						$l = $row[StudentLocationPreference];
						$f = $row[StudentFieldPreference];
					}
					if($l == null || $f == null){
						echo "plesae update your personal information";
						exit();
					}
					$loc = json_encode($l);
					$fie = json_encode($f);
					//echo $loc;
					//echo $fie;
					//$l = "Glasgow";
					//$f = "Mathematics";
					$sql = "SELECT course.CourseId,course.CourseTitle, course.CourseLevel,course.CourseRequiredGrade, course.CourseUrl, educationinstitute.InstituteName FROM course,educationinstitute,educationhistory WHERE course.InstituteId =educationinstitute.InstituteId AND educationinstitute.InstituteAddress3 = '{$l}' AND course.CourseDiscipline LIKE '%{$f}%' AND educationhistory.CourseID != course.courseID GROUP BY course.courseID";
					$result = $db->query($sql);	
					$temp = "";
					$count = 0;
					$arr = array();
					while( $row = $result->fetch(PDO::FETCH_ASSOC) ) { 
						$temp = array(
						"courseID" => $row[CourseId],
						"CourseTitle" => $row[CourseTitle],
						"CourseLevel"  => $row[CourseLevel],
						"CourseTitle"  => $row[CourseTitle],
						"InstituteName" => $row[InstituteName],
						"CourseRequiredGrade" => $row[CourseRequiredGrade]
						);
						$arr[$count]= $temp; 
						$count = $count + 1;
					}
					$course = json_encode($arr);
					//echo $course;
					
?>
<!doctype html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Future pathway</title>
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/icomoon.css" />
    <link rel="stylesheet" href="css/screen.css" />
    <link rel="stylesheet" href="css/graph.css" />
 </head>



<body onload="draw();" data-smooth-scroll="on">
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

<div id="mygraph" class="mygraph"></div>

		<footer class="fixed">
			
					<div class="copyrights">
						<p>Copyright 2015. Designed by <a href="http://www.teslathemes.com" target="blank">TeslaThemes</a></p>
					</div>
			
		</footer>


<script type="text/javascript">

	
	  Array.prototype.clean = function(deleteValue) { 
		  for (var i = 0; i < this.length; i++) 
		  { 
			  if (this[i] == deleteValue) 
			  { 
				  this.splice(i, 1); i--; 
				  } 
			  } 
			  return this;
		  };
		  
		  function ajaxCall(nodeID) {
			$.ajax({
			  type: "POST",
			  url: "insert.php",
			  data: {'id' : nodeID}, 
		
			  success: function(data) {
				console.log(nodeID); 
			  }
			});}
	  function getpoints(a){
		  var b = 0; 
		  
			  for(var i= 0; i < a.length; i++){
				var c = 6 - (a.charCodeAt(i) -65);
				var b = b + c;
			  }
		
		  return b;
	  }
	  function yourgrade(a,b){
		var c = 0;
		for(var i = 0; i < b; i++){
			var c = c + getpoints(a[i]);
		}
		return c;
	  } 
	  function draw() {
	  var g = <?=$g?>;
	  g = jQuery.grep(g, function(n, i){
	  return (n !== "" && n != null);
	  });	  
	  var f = <?=$fie?>;
	  var l = <?=$loc?>;
	  var c = <?=$course?>;
	  var fl = [];
	  g.sort();
	  
	  
	 // var test = yourgrade(g,5)
	 // console.log(test);
	  
	  var gl = [];
	    
	  for(var i = 0; i < c.length; i++){
		  var temp = String(c[i].CourseRequiredGrade).split(/[ 0-9 /]/);
		  
		  temp.clean("");
		  gl.push(temp);
	  }
	  console.log(g);
	  console.log(c);
	   var rgp;
	  for(var i = 0; i < gl.length; i++){
		  var rgp = 0;
		  var gyh = 0;
		  for(var j = 0; j < gl[i].length; j++){
			if (String(gl[i][j]) == "N"){
				fl.push(c[i]);
				break;
			}else{
			var rgp = getpoints(String(gl[i][j]));
			//console.log(rgp);
			//console.log(String(gl[i][j]));
			if(g.length >= String(gl[i][j]).length){
				gyh = yourgrade(g,String(gl[i][j]).length);
				//console.log(gyh);
				if(rgp <= gyh){
					fl.push(c[i]);
					break;
					}
				}
			}
		  }
	  }
	   
	 console.log(fl);
	  if(fl.length == 0){
		alert("Not suitable course, please change your  Prefered Location or Prefered Vocation");
		//window.location.href = 'index.php';
	  }
    // Called on page load
		var idlist=[];
		var nodes = [
        {id: 1, label: f + ' in  ' + l ,color: 'orange'},
      ];
      for(var i= 0; i< 5; i++){
		  var idtemp = fl[i].courseID;
		//  console.log(idtemp);
		  var labeltemp = String(fl[i].CourseTitle + '\n' + fl[i].InstituteName + '\n course level: ' + fl[i].CourseLevel)
		nodes.push({id: idtemp, label:labeltemp});
	  }
	  var edges = [];
	  for(var i= 0; i< 5; i++){
		  var tol= fl[i].courseID;
		edges.push({from: 1, to: tol ,length: 250, value: 6,style: 'dash-line', dash: {length: 500, gap: 20}}); 
      }
		console.log(nodes);
		console.log(edges);
		
      // create the graph
      var container = document.getElementById('mygraph');
      var data = {
        nodes: nodes,
        edges: edges
      };
      var options = {
        nodes: {
          shape: 'box'
        },
        edges: {
          length: 180
        },
        stabilize: false
      };
      var graph = new vis.Graph(container, data, options);
      graph.on('select', function(params) {
        var a = 0 + params.nodes
        if (confirm('Are you sure you want to save '+a+' into the database?')) {
		ajaxCall(a);
		console.log(typeof(a));
        window.location.href = 'myaccount.php';
		} else {
    // Do nothing!
		}
        
      });
    }
  </script>

<script type="text/javascript" src="dist/vis.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

</body>
</html>
