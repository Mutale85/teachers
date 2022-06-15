<?php
	include('../includes/db.php');
	extract($_POST);
	if (!empty($personnel_id)) {
		$del = $connect->prepare("DELETE FROM children_and_dependants WHERE service_number = ? AND parent_id = ? ");
		$del->execute(array($service_number, $parent_id));
		foreach ($fullnames as $key => $value) {
			$fullnames = $value;
			$date_of_birth = date("Y-m-d", strtotime($date_of_birth[$key]));
			$sql = $connect->prepare("INSERT INTO `children_and_dependants`(`service_number`, `fullnames`, `gender`, `relationship`, `nrc`, `occupation`, `level_of_education`, `date_of_birth`, `parent_id`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
			$ex = $sql->execute(array($service_number, $fullnames, $gender[$key], $relationship[$key], $nrc[$key], $occupation[$key], $level_of_education[$key], $date_of_birth, $parent_id));
			echo $fullnames .' Update into database <br>';
		}
	}else{
		$ex = "";
		foreach ($fullnames as $key => $value) {
			$fullnames = $value;
			$date_of_birth = date("Y-m-d", strtotime($date_of_birth[$key]));
			$sql = $connect->prepare("INSERT INTO `children_and_dependants`(`service_number`, `fullnames`, `gender`, `relationship`, `nrc`, `occupation`, `level_of_education`, `date_of_birth`, `parent_id`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
			$ex = $sql->execute(array($service_number, $fullnames, $gender[$key], $relationship[$key], $nrc[$key], $occupation[$key], $level_of_education[$key], $date_of_birth, $parent_id));
			echo $fullnames .' inserted into database <br>';
		}
	}
	
	
	

		
	