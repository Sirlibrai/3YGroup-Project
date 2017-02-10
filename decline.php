<?php
	session_start();
	require("../php/config/config.php");
	
	$id = $_POST['decline'];
	$temp = $_SESSION['MentorId'][$id];
	$query = "DELETE FROM mentorlist
			WHERE MentorId = '$_SESSION[id]'
			AND StudentId = '$temp'";
	$result = $db->query($query);
	
	if($result){
		header("Location: mymentoraccount.php#saved"); 
		die("Redirecting to: mymentoraccount.php#saved");
	}
?>
