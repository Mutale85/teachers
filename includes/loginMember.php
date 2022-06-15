<?php

	include("db.php");
	if (isset($_POST['email'])) {
		$email 		= trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
		$password 	= trim(filter_var($_POST['password'], FILTER_SANITIZE_STRING));
	  	
		if ($email == "") {
			echo "email is empty";
			exit();
		}
		if ($password == "") {
			echo "password are empty";
			exit();
		}
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			echo "invalid email";
			exit();
		}

		$query = $connect->prepare("SELECT * FROM members WHERE email = ? ");
		$query->execute(array($email));
		if ($query->rowCount() > 0) {
			foreach ($query->fetchAll() as $row) {
				if($row['activate'] == 1){
					if (password_verify($password, $row['password'])) {
						$_SESSION['user_email_axis'] 	= $row['email'];
					    $_SESSION['user_id'] 		= $row['id'];
					    $_SESSION['fullnames'] 		= $row['fullnames'];
					    $_SESSION['parent_id'] 		= $row['parent_id'];
					    $password 					= $row['password'];
					    $parent_id 					= $row['parent_id'];
					    
					    setcookie("newLoggedIn", base64_encode($_SESSION['user_email_axis']. password_hash($_SESSION['user_email_axis'], PASSWORD_DEFAULT)), time()+60*60*24*30, '/');
					    
					    echo "Redirecting you in 1 Second";

					}else{
						echo "Incorrect password or email";
						exit();
					}
				}else{
					echo "Please Activate Your Account";
					exit();
				}
			}
		}else{
			echo 'User not found';
			exit();
		}

	}
?>