<?php 
    require("../php/config/config.php");
    if(!empty($_POST)) 
    { 
        // Ensure that the user fills out fields 
        if(empty($_POST['username'])) 
        { die("Please enter a username."); } 
        if(empty($_POST['password'])) 
        { die("Please enter a password."); } 
          if(empty($_POST['firstname'])) 
        { die("Please enter a password."); } 
          if(empty($_POST['surname'])) 
        { die("Please enter a password."); } 
        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) 
        { die("Invalid E-Mail Address"); } 
          
          
          
        // Check if the username is already taken
        $query = " 
            SELECT 
                1 
            FROM student
            WHERE 
                username = :username 
        "; 
        $query_params = array( ':username' => $_POST['username'] ); 
        try { 
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex){ die("Failed to run query: " . $ex->getMessage()); } 
        $row = $stmt->fetch(); 
        if($row){ die("This username is already in use"); } 
        
        
        //check if email taken
        $query = " 
            SELECT 
                1 
            FROM student 
            WHERE 
                email = :email 
        "; 
        $query_params = array( 
            ':email' => $_POST['email'] 
        ); 
        try { 
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex){ die("Failed to run query: " . $ex->getMessage());} 
        
        
        $row = $stmt->fetch(); 
        if($row){ die("This email address is already registered"); } 
       
       
		$user_permissions = 0;
		// Check what type of user is registering.
		if($_POST['registerStudent'] == 'Student'){
			$user_permissions = 1;
			$query = " 
			INSERT INTO student ( 
				username, 
				password,
				firstname,
				surname, 
				salt, 
				email
			) VALUES ( 
				:username, 
				:password,
				'$_POST[firstname]',
				'$_POST[surname]', 
				:salt, 
				:email
			) "; 
		} else if($_POST['registerMentor'] == 'Mentor'){
			$user_permissions = 2;
			$query = " 
			INSERT INTO mentor ( 
				username, 
				firstname,
				surname,
				email, 
				password, 
				salt
			) VALUES ( 
				:username, 
				'$_POST[firstname]',
				'$_POST[surname]', 
				:email,
				:password,
				:salt
			)";
		} else {
			die("No user type entered.");
		}
		
		
		// Security measures
		$salt = dechex(mt_rand(0, 2147483647)) . dechex(mt_rand(0, 2147483647)); 
		$password = hash('sha256', $_POST['password'] . $salt); 
		for($round = 0; $round < 65536; $round++){ $password = hash('sha256', $password . $salt); } 
		$query_params = array( 
			':username' => $_POST['username'], 
			':password' => $password, 
			':salt' => $salt, 
			':email' => $_POST['email'] 
		); 
		try {  
			$stmt = $db->prepare($query); 
			$result = $stmt->execute($query_params); 
		} 
		catch(PDOException $ex){ die("Failed to run query: " . $ex->getMessage()); } 
	
			
		session_start();
		if($user_permissions == 1){
			$query = "
			SELECT 
					id, 
					username, 
					password, 
					salt, 
					email 
				FROM student 
				WHERE 
					username = :username 
		"; 
		} else if($user_permissions == 2){
			$query = " 
			SELECT 
					MentorId, 
					username, 
					password, 
					salt, 
					email 
				FROM mentor
				WHERE 
					username = :username
			";
		} else {
			die("No user type entered.");
		}
		
			$query_params = array( 
				':username' => $_POST['username'] 
			); 
			  
			try{ 
				$stmt = $db->prepare($query); 
				$result = $stmt->execute($query_params); 
			} 
			catch(PDOException $ex){ die("Failed to run query: " . $ex->getMessage()); } 
			$login_ok = false; 
			$row = $stmt->fetch(); 
			if($row){ 
				$check_password = hash('sha256', $_POST['password'] . $row['salt']); 
				for($round = 0; $round < 65536; $round++){
					$check_password = hash('sha256', $check_password . $row['salt']);
				} 
				if($check_password === $row['password']){
					$login_ok = true;
				} 
			} 
			
			if($login_ok)
			{ 
				unset($row['salt']); 
				unset($row['password']); 
				$_SESSION['user'] = $_POST['username'];
				$_SESSION['login'] = "1";
			
				if($user_permissions == 1)
				{
					$idquery = "SELECT id, username FROM student WHERE username = '$_POST[username]'";
		
					$result = $db->query($idquery); 
					$row = $result->fetch(PDO::FETCH_ASSOC);
					
					$id = $row['id'];
					$_SESSION['id'] = $id;
					header("Location: myaccount.php"); 
					die("Redirecting to: myaccount.php"); 
				} 	
				if($user_permissions == 2)
				{
					$idquery = "SELECT MentorId, username FROM mentor WHERE username = '$_POST[username]'";
		
					$result = $db->query($idquery); 
					$row = $result->fetch(PDO::FETCH_ASSOC);
					
					$id = $row['MentorId'];
					$_SESSION['id'] = $id;
					header("Location: mymentoraccount.php"); 
					die("Redirecting to: mymentoraccount.php"); 
				}
			}else{ 
				die(header("location:index.php?loginFailed=true&reason=password"));
				$submitted_username = htmlentities($_POST['username'], ENT_QUOTES, 'UTF-8'); 
			} 
			
}
?>
