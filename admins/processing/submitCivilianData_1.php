<?php
	include('../includes/db.php');
	extract($_POST);
	$deployment_station = "";
	// $date_of_birth = date("Y-m-d", strtotime($date_of_birth));
	if (!empty($personnel_id)) {

		$update = $connect->prepare("UPDATE civilian_residents SET `service_number`= ?, `occupation` = ?, `firstname` = ?, `surname` = ?, `phone_number` = ?, `deployment_station` = ?, `marital_status` = ?, `gender` = ?, `spouse_firstname` = ?, `spouse_surname` = ?, `spouse_service_number` = ?, `spouse_rank` = ?, `spouse_nrc` = ?, `spouse_phone_number` = ?, `spouse_occupation` = ?, `spouse_employer` = ?, `quarter_number` = ? WHERE id = ? AND parent_id = ? ");
		$ex = $update->execute(array($service_number, $occupation, $firstname, $surname, $phone_number, $deployment_station, $marital_status, $gender, $spouse_firstname, $spouse_surname, $spouse_service_number, $spouse_rank, $spouse_nrc, $spouse_phone_number, $spouse_occupation, $spouse_employer, $quarter_number, $personnel_id, $parent_id));
		if($ex){
			echo $firstname . ' Details  updated to database';
		}
	}else{

		$query = $connect->prepare("SELECT * FROM civilian_residents WHERE service_number = ? AND parent_id = ? ");
		$query->execute(array($service_number, $parent_id));
		if ($query->rowCount() > 0) {
			echo  $firstname.' with man number '. $service_number. ' is already registered';
			exit();
		}

		$sql = $connect->prepare("INSERT INTO `civilian_residents`(`service_number`, `occupation`, `firstname`, `surname`, `phone_number`, `deployment_station`, `marital_status`, `gender`, `spouse_firstname`, `spouse_surname`, `spouse_service_number`, `spouse_rank`, `spouse_nrc`, `spouse_phone_number`, `spouse_occupation`, `spouse_employer`, `quarter_number`, `parent_id`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$ex = $sql->execute(array($service_number, $occupation, $firstname, $surname, $phone_number, $deployment_station, $marital_status, $gender, $spouse_firstname, $spouse_surname, $spouse_service_number, $spouse_rank, $spouse_nrc, $spouse_phone_number, $spouse_occupation, $spouse_employer, $quarter_number, $parent_id));
	
		if($ex){
			echo $firstname . ' Added to database';
			$personnel_id = $connect->lastInsertId();
			setcookie("man_number", base64_encode($personnel_id), time()+60*60*24*7, '/');
		}else{
			exit();
		}	
	}