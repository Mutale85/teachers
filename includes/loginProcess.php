<?php

	include("db.php");
	if (isset($_POST['email'])) {
		$email 		= trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS ));
		$password 	= trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS));
	  	
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

		$query = $connect->prepare("SELECT * FROM table1_members WHERE email = ? ");
		$query->execute(array($email));
		if ($query->rowCount() > 0) {
			foreach ($query->fetchAll() as $row) {
				if($row['activate'] == 1){
					if (password_verify($password, $row['password'])) {
						$_SESSION['user_mail_bazity'] = $row['email'];
					    $_SESSION['user_id'] 	= $row['id'];
					    $_SESSION['user_role']  = $row['user_role'];
					    $_SESSION['firstname'] 	= $row['firstname'];
					    $_SESSION['lastname'] 	= $row['lastname'];
					    $_SESSION['parent_id'] 	= $row['parent_id'];
					    
					    setcookie("user_mail_bazity", base64_encode($_SESSION['user_mail_bazity']. password_hash($_SESSION['user_mail_bazity'], PASSWORD_DEFAULT)), time()+60*60*24*30, '/');
					    
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