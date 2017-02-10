<?php
	session_start();
	require("../php/config/config.php"); 

	$query = "UPDATE mentor
			SET firstname = '$_POST[firstname]',
				surname = '$_POST[lastname]',
				email = '$_POST[email]'
			WHERE username = '$_SESSION[user]'";
	$result = $db->query($query);
	
	if($result)
	{
		$query2 = "UPDATE mentor M, educationinstitute E
				SET M.MentorInstituteId = E.InstituteId
				WHERE E.InstituteCode = '$_POST[institutecode]'
				AND M.username = '$_SESSION[user]'";
		$result2 = $db->query($query2);
		if($result2){
			header("Location: mymentoraccount.php"); 
			die("Redirecting to: mymentoraccount.php"); 
		}
	}
?>
