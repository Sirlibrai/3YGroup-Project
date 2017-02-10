<?php
	session_start();
	require("../php/config/config.php");
	
        
    $id = $_POST['accept'];
    
    $temp = $_SESSION['MentorId'][$id];
	$query = "UPDATE mentorlist ML
			SET ML.MentorReqFilled = 1
			WHERE ML.MentorId = '$_SESSION[id]'
			AND ML.StudentId = '$temp'";
	$result = $db->query($query);
	if($result){
		header("Location: mymentoraccount.php#saved"); 
		die("Redirecting to: mymentoraccount.php#saved");
	}
?>
