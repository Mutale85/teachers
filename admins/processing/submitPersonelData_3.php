<?php
	include('../includes/db.php');
	extract($_POST);
	if (!empty($personnel_id)) {
		$del = $connect->prepare("DELETE FROM motor_vehicles WHERE service_number = ? AND parent_id = ? ");
		$del->execute(array($service_number, $parent_id));
		foreach ($make as $key => $value) {
			$make = $value;
			$sql = $connect->prepare("INSERT INTO `motor_vehicles`(`service_number`, `make`, `model`, `year`, `reg_number`, `color`, `remarks`, `parent_id`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
			$ex = $sql->execute(array($service_number, $value, $model[$key], $year[$key], $reg_number[$key], $color[$key], $remarks[$key], $parent_id));
			echo 'Vehicle reg number: '. $reg_number[$key] .' updated into database <br>';
		}
	$ex = "";
	}else{
		foreach ($make as $key => $value) {
			$make = $value;
			$sql = $connect->prepare("INSERT INTO `motor_vehicles`(`service_number`, `make`, `model`, `year`, `reg_number`, `color`, `remarks`, `parent_id`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
			$ex = $sql->execute(array($service_number, $value, $model[$key], $year[$key], $reg_number[$key], $color[$key], $remarks[$key], $parent_id));
			echo 'Vehicle reg number: '. $reg_number[$key] .' inserted into database <br>';
		}
	}
	
	
	

		
	