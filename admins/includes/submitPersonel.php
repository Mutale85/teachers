<?php
	include('db.php');
	extract($_POST);
	if(!empty($ID)){
		// extract($_POST);

		// $sql = $connect->prepare("INSERT INTO `service_personnel`(`service_number`, `rank`, `firstname`, `surname`, `trade_branch`, `phone_number`, `unit`, `marital_status`, `gender`, `spouse_firstname`, `spouse_surname`, `spouse_service_number`, `spouse_rank`, `spouse_nrc`, `spouse_phone_number`, `spouse_occupation`, `spouse_employer`, `quarter_number`, `parent_id`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
		// $sql->execute(array());


		// $update = $connect->prepare("UPDATE `car_hiring_customers` SET `customer_id`= ?, `firstname` = ?, `lastname`= ?, `phone` = ?, `email` = ?, `address` = ?, `licence`= ?, `vehicle_reg_number`= ?, `defaulted` = ?, `date_defaulted`= ?, `amount`= ?, `currency`= ?, remarks = ? WHERE id = ? AND company_id = ? ");
		// $ex = $update->execute(array($customer_id, $firstname, $lastname, $phone, $email, $address, $license, $vehicle_reg_number, $defaulted, $date_defaulted, $amount, $currency, $remarks, $ID, $parent_id));
		// if($ex){
		// 	echo $firstname . ' Information Updated Car Hiring Reference Bureau';
		// }else{
		// 	echo "Error uploading customer";
		// 	exit();
		// }

	}else{
	
		
		$query = $connect->prepare("SELECT * FROM service_personnel WHERE service_number = ? AND parent_id = ? ");
		$query->execute(array($license, $parent_id));
		if ($query->rowCount() > 0) {
			echo  $firstname.' with service number '. $service_number. ' is already registered';
			exit();
		}

		$sql = $connect->prepare("INSERT INTO `service_personnel`(`service_number`, `rank`, `firstname`, `surname`, `trade_branch`, `phone_number`, `unit`, `marital_status`, `gender`, `spouse_firstname`, `spouse_surname`, `spouse_service_number`, `spouse_rank`, `spouse_nrc`, `spouse_phone_number`, `spouse_occupation`, `spouse_employer`, `quarter_number`, `parent_id`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$ex = $sql->execute(array($service_number, $rank, $firstname, $surname, $trade_branch, $phone_number, $unit, $marital_status, $gender, $spouse_firstname, $spouse_surname, $spouse_service_number, $spouse_rank, $spouse_nrc, $spouse_phone_number, $spouse_occupation, $spouse_employer, $quarter_number, $parent_id));
	
		if($ex){
			echo $firstname . ' Added to database';


		}else{
			// echo "Error uploading Service";
			exit();
		}	
	}
?>