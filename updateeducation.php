<?php 
	session_start();
	ob_start();
    require("../php/config/config.php");
    if(!empty($_POST)) 
    { 
		$startdate = $_POST[coursestartdate];
		$startdate = str_replace('/', '-', $startdate);
		$enddate = $_POST[courseenddate];
		$enddate = str_replace('/', '-', $enddate);
		$correctstartdate = date('Y-m-d', strtotime($startdate));
		$correctenddate = date('Y-m-d', strtotime($enddate));
		
        $query = "INSERT INTO educationhistory (CourseId, StudentId, StartDate, EndDate, Grade) VALUES (
		'$_POST[courses]', 
		'$_SESSION[id]',
		'$correctstartdate', 
		'$correctenddate',
		'$_POST[coursegrade]'
	)"; 
	$result = $db->query($query);
	if($result)
	{
		header("Location: myaccount.php"); 
		die("Redirecting to: myaccount.php"); 
	}
}
?>
