<?php
	if (session_status() == PHP_SESSION_NONE) {
	$message = "You have not logged in, you will now be redirected.";
	echo "<script type='text/javascript'>alert('$message');</script>";
    header( 'Location: http://callumquigley.com/Pathbuilder/LevelUp/login.html' ) ;
	}
	?>
