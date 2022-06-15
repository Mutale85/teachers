<?php
	include('../includes/db.php');
	extract($_POST);
	$ex = "";
	if (!empty($personnel_id)) {
		$del = $connect->prepare("DELETE FROM private_employees WHERE service_number = ? AND parent_id = ? ");
		$del->execute(array($service_number, $parent_id));
		foreach ($fullnames as $key => $value) {
			$fullnames = $value;
			$date_of_birth = date("Y-m-d", strtotime($date_of_birth[$key]));
			$sql = $connect->prepare("INSERT INTO `private_employees`( `service_number`, `fullnames`, `gender`, `date_of_birth`, `nrc`, `address`, `employee_type`, `parent_id`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
			$ex = $sql->execute(array($service_number, $fullnames, $gender[$key], $date_of_birth, $nrc[$key], $address[$key], $employee_type[$key], $parent_id));
			echo 'PVT employee: '.$fullnames .' inserted into database <br>';
		}
	}else{
		foreach ($fullnames as $key => $value) {
			$fullnames = $value;
			$date_of_birth = date("Y-m-d", strtotime($date_of_birth[$key]));
			$sql = $connect->prepare("INSERT INTO `private_employees`( `service_number`, `fullnames`, `gender`, `date_of_birth`, `nrc`, `address`, `employee_type`, `parent_id`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
			$ex = $sql->execute(array($service_number, $fullnames, $gender[$key], $date_of_birth, $nrc[$key], $address[$key], $employee_type[$key], $parent_id));
			echo 'PVT employee: '.$fullnames .' inserted into database <br>';
		}
	}
	
	
	

		
	