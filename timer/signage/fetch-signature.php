<?php
include("../../includes/db.php");
	
	if (isset($_POST['action'])) {
		$action = $_POST['action'];
		if($action == "getSignanture"){
			$parent_id = $_POST["parent_id"];
			$email = $_POST["email"];
			$sql = $connect->prepare("SELECT * FROM `signatures` WHERE parent_id = ? AND email = ? ");
			$sql->execute(array($parent_id, $email));
			if ($sql->rowCount() > 0) {
				
				foreach ($sql->fetchAll() as $row) {
					$name = $row['Name'];
					echo '<img src="signatures/'.$name.'" alt="'.$name.'" class="img-fluid invoice__img">' ;
					
				}
			}else{
				echo "";
			}
		}

		if($action == "getSignantureForCroping"){
			$parent_id = $_POST["parent_id"];
			$email = $_POST["email"];
			$sql = $connect->prepare("SELECT * FROM `signatures` WHERE parent_id = ? AND email = ? ");
			$sql->execute(array($parent_id, $email));
			if ($sql->rowCount() > 0) {
				
				foreach ($sql->fetchAll() as $row) {
					$name = $row['Name'];
					echo 'signatures/'.$name.'' ;
					
				}
			}else{
				echo "";
			}
		}

		if($action == "downloadSignanture"){
			$parent_id = $_POST["parent_id"];
			$email = $_POST["email"];
			$sql = $connect->prepare("SELECT * FROM `signatures` WHERE parent_id = ? AND email = ? ");
			$sql->execute(array($parent_id, $email));
			if ($sql->rowCount() > 0) {
				
				foreach ($sql->fetchAll() as $row) {
					$name = $row['Name'];
					echo '<img src="signatures/'.$name.'" alt="'.$name.'" class="img-fluid mb-2 invoice__img"><br> <a href="signatures/'.$name.'" class="btn btn-outline-primary"><i class="bi bi-cloud-download" style="font-size:18px;"></i> Download</a>' ;
					
				}
			}else{
				echo "";
			}
		}

		
		
	}


?>