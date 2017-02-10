<?php
session_start();
require("../php/config/config.php");
					$l = $_SESSION['id'];
					$sql = "SELECT student.firstname, student.surname,course.CourseTitle,educationhistory.StartDate, educationhistory.EndDate FROM mentorlist, course,student,educationhistory WHERE educationhistory.CourseId = course.CourseId AND educationhistory.StudentId = student.id AND mentorlist.StudentId = student.id AND mentorlist.MentorId = {$l} ORDER BY student.firstname, student.surname";

					$result = $db->query($sql);	
					$temp = "";
					$count = 0;
					$arr = array();
					while( $row = $result->fetch(PDO::FETCH_ASSOC) ) { 
						$temp = array(
						"Forename" => $row[firstname],
						"Surname"  => $row[surname],
						"CourseTitle"  => $row[CourseTitle],
						"StartDate" => $row[StartDate],
						"EndDate" => $row[EndDate]
						);
						$arr[$count]= $temp; 
						$count = $count + 1;
					}
					
					$data = json_encode($arr);
					//echo $data;
?>
<!DOCTYPE HTML>
<html>
<head>
  <title>Timeline | Group example</title>

  <style>
    body, html {
      font-family: arial, sans-serif;
      font-size: 11pt;
    }

    #visualization {
      box-sizing: border-box;
      width: 100%;
      height: 300px;
    }
  </style>

  <!-- note: moment.js must be loaded before vis.js, else vis.js uses its embedded version of moment.js -->
  <script src="http://cdnjs.cloudflare.com/ajax/libs/moment.js/2.3.1/moment.min.js"></script>

  <script src="dist/vis.js"></script>
  <link href="dist/vis.css" rel="stylesheet" type="text/css" />
</head>
<body>

<div id="visualization"></div>
<script>
	var data = <?=$data?>;
	var cfname;
	var csname;
  // create a data set with groups
	console.log(data);

  var groups = new vis.DataSet();
  var items = new vis.DataSet();
  var gn = 0;
  var checklist = [];
  for (var g = 0; g < data.length; g++) {
	 var name = String(data[g].Forename +  data[g].Surname);
   if(checklist.indexOf(name) == -1){
		
		groups.add({id: gn, content: data[g].Forename + " " + data[g].Surname});
		cfname = data[g].Forename;
		csname = data[g].Surname;
		gn = gn+1;
		checklist.push(name);
		
	
	}
	
	
  }
  // create a dataset with items
   for (var g = 0; g < data.length; g++) {
	   var name = data[g].Forename + data[g].Surname;
	var index = checklist.indexOf(name);
	
	var startDate = String(data[g].StartDate).split('-');
	var endDate = String(data[g].EndDate).split('-');
	items.add({
	id: g,
	group: index ,
	content: ' <span style="color:#97B0F8;">' +  data[g].CourseTitle + '</span>',
	start: new Date(startDate[0], startDate[1], startDate[2]),
	end: new Date(endDate[0], endDate[1], endDate[2]),
	type: 'box'
    });
  }
  // create visualization
  var container = document.getElementById('visualization');
  var options = {
    groupOrder: 'content'
  };

  var timeline = new vis.Timeline(container);
  timeline.setOptions(options);
  timeline.setGroups(groups);
  timeline.setItems(items);
</script>
</body>
</html>

