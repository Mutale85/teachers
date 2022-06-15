<?php
	include('../includes/db.php');
	$user_email = $_SESSION['user_email_axis'];
	$x = 1;
	foreach ($_FILES["images"]["name"] as $key => $value) {
		$images = $value;
		$temp_image = $_FILES["images"]["tmp_name"][$key];
		$target_dir = "../../uploads/";
		$target_file = $target_dir . basename($images);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		$check = getimagesize($_FILES["images"]["tmp_name"][$key]);
		if($check !== false) {
			$uploadOk = 1;
		} else {
			echo htmlspecialchars( basename( $images))." File is not an image.<br>";
			$uploadOk = 0;
		}
	
		// Check if file already exists
		if (file_exists($target_file)) {
			echo htmlspecialchars( basename( $images))." Sorry, file already exists.<br>";
			$uploadOk = 0;
		}

		// Check file size
		if ($_FILES["images"]["size"][$key] > 5000000) {
			echo htmlspecialchars( basename( $images)). " Sorry, your file is too large<br>.";
			$uploadOk = 0;
		}

		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
			echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			$uploadOk = 0;
		}

		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
			echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
			$name = date("Y-m-d").$x++;
			$newname = $name.".".$imageFileType;
			$target_dir = "../../uploads/";
			$target_file = $target_dir . basename($newname);
			
			if (move_uploaded_file($_FILES["images"]["tmp_name"][$key], $target_file)) {
			
				$sql = $connect->prepare("INSERT INTO `gallery`(`user_email`, `image`)  VALUES (?, ?)");
				$ex = $sql->execute(array($user_email, $newname));
				echo "The file ". htmlspecialchars( basename( $newname)). " has been uploaded<br>.";
			} else {
				echo "Sorry, there was an error uploading your file.";
			}
		}
	}
	
	
	
	

		
	