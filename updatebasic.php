<?php 
	session_start();
    require("../php/config/config.php");
    if(!empty($_POST)) 
    { 
        $query = "
    UPDATE 
		student
	SET 
		StudentFieldPreference='$_POST[vocation]', 
		budget='$_POST[budget]', 
		StudentLocationPreference='$_POST[location]'
	WHERE 
		username='$_SESSION[user]'; 
	"; 
	$result = $db->query($query);
	if($result)
	{
		header("Location: myaccount.php"); 
		die("Redirecting to: myaccount.php"); 
	}
}
?>
