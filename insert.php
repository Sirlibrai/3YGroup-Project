<?php
require("../php/config/config.php");
    if(isset($_POST['id'])){
            // Don't use array($_POST['id']) as id is already an array
            $id = $_POST['id'];
            foreach($id as $value){
                    echo $value; 
                    // Here you'll get the array values   
            }
        }
	session_start();
date_default_timezone_set('UTC');
$sid = $_SESSION['id'];
$date = date("d-m-Y");
echo $date;
$query="INSERT INTO `educationhistory` (`CourseId`, `StudentId`, `StartDate`) VALUES ('$id', '$sid', now())";
if ($db->query($query) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}  echo("Subject could not be inserted. Might be, the subject already exists.");
?>
