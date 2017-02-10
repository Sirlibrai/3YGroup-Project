<?php
	session_start();
	require("../php/config/config.php");
	
        
    $id = $_POST['requests'];
    
	$query = "INSERT INTO mentorlist ( 
				MentorId, 
				StudentId,
				MentorReqFilled
			) VALUES ( 
				'$id', 
				'$_SESSION[id]',
				0
			) ";
	$result = $db->query($query);
	if($result){
		header("Location: myaccount.php"); 
		die("Redirecting to: myaccount.php");
	}
?>
