<?php 
    session_start();
    require("../php/config/config.php"); 
    $submitted_username = ''; 
    if(!empty($_POST)){ 
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
        $query_params = array( 
            ':username' => $_POST['username'] 
        ); 
          
        try{ 
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex){ die("Failed to run query: " . $ex->getMessage()); } 
        $login_ok = false; 
        $mentor = false;
        $row = $stmt->fetch(); 
        if($row){ 
            $check_password = hash('sha256', $_POST['password'] . $row['salt']); 
            for($round = 0; $round < 65536; $round++){
                $check_password = hash('sha256', $check_password . $row['salt']);
            } 
            if($check_password === $row['password']){
                $login_ok = true;
            } 
        } else {
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
			$query_params = array( 
				':username' => $_POST['username'] 
			); 
			  
			try{ 
				$stmt = $db->prepare($query); 
				$result = $stmt->execute($query_params); 
			} 
			catch(PDOException $ex){ die("Failed to run query: " . $ex->getMessage()); } 
			$row = $stmt->fetch(); 
			if($row){ 
				$check_password = hash('sha256', $_POST['password'] . $row['salt']); 
				for($round = 0; $round < 65536; $round++){
					$check_password = hash('sha256', $check_password . $row['salt']);
				} 
				if($check_password === $row['password']){
					$login_ok = true;
					$mentor = true;
				} 
			}
		}
 
        if($login_ok){ 
            unset($row['salt']); 
            unset($row['password']); 
            $_SESSION['user'] = $_POST['username'];
            $_SESSION['login'] = "1";  
            if ($mentor){
				$idquery = "SELECT MentorId, username FROM mentor WHERE username = '$_POST[username]'";
			
				$result = $db->query($idquery); 
				$row = $result->fetch(PDO::FETCH_ASSOC);
				
				$id = $row['MentorId'];
				$_SESSION['id'] = $id;
				header("Location: mymentoraccount.php"); 
				die("Redirecting to: mymentoraccount.php"); 
			} else {
				$idquery = "SELECT id, username FROM student WHERE username = '$_POST[username]'";
			
				$result = $db->query($idquery); 
				$row = $result->fetch(PDO::FETCH_ASSOC);
				
				$id = $row['id'];
				$_SESSION['id'] = $id;
				header("Location: myaccount.php"); 
				die("Redirecting to: myaccount.php"); 
			}
        } 
        else{ 
			$Message = urlencode("Either Login or Password is invalid, please try again. ");
            die(header("location:courses-grid.php?Message=".$Message));
            $submitted_username = htmlentities($_POST['username'], ENT_QUOTES, 'UTF-8'); 
        } 
    } 
?>
