<?php

session_start();

session_unset();

session_destroy();

header("location:http://callumquigley.com/Pathbuilder/LevelUp/");
$message = "You have successfully logged out!";
echo "<script type='text/javascript'>alert('$message');</script>";

exit();

?>
