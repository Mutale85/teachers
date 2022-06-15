<?php
		include("includes/db.php");
		unset($_SESSION['user_id']);
		unset($_SESSION['fullnames']);
		setcookie("newLoggedIn", "", time() - 3600, '/');
		setcookie("parentID", "", time() - 3600, '/');
		unset($_SESSION['parent_id']);
		unset($_SESSION['user_email']);
		// unset($_SESSION['user_logged_id']);
		if(session_destroy()) {
        	header("location:./");
        }

	?>