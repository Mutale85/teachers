<?php
	include('db.php');

	if(!empty($_POST['ID'])){
		$ID 					= $_POST['ID'];
		$parent_id 				= $_SESSION['parent_id'];
		$customer_id 			= filter_var($_POST['customer_id'], FILTER_SANITIZE_STRING);
		$firstname				= filter_var($_POST['firstname'], FILTER_SANITIZE_STRING);
		$lastname 				= filter_var($_POST['lastname'], FILTER_SANITIZE_STRING);
		$phone 					= filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
		$email 					= filter_var($_POST['email'], FILTER_SANITIZE_STRING);
		$address 				= filter_var($_POST['address'], FILTER_SANITIZE_STRING);
		$license 				= filter_var($_POST['licence'], FILTER_SANITIZE_STRING);
		$vehicle_reg_number     = filter_var($_POST['vehicle_reg_number'], FILTER_SANITIZE_STRING);
		$defaulted 				= filter_var($_POST['defaulted'], FILTER_SANITIZE_STRING);
		$date_defaulted 		= date("Y-m-d", strtotime($_POST['date_defaulted']));
		$amount 				= filter_var($_POST['amount'], FILTER_SANITIZE_STRING);
		$currency 				= filter_var($_POST['currency'], FILTER_SANITIZE_STRING);
		$remarks 				= filter_var($_POST['remarks'], FILTER_SANITIZE_STRING);

		$update = $connect->prepare("UPDATE `car_hiring_customers` SET `customer_id`= ?, `firstname` = ?, `lastname`= ?, `phone` = ?, `email` = ?, `address` = ?, `licence`= ?, `vehicle_reg_number`= ?, `defaulted` = ?, `date_defaulted`= ?, `amount`= ?, `currency`= ?, remarks = ? WHERE id = ? AND company_id = ? ");
		$ex = $update->execute(array($customer_id, $firstname, $lastname, $phone, $email, $address, $license, $vehicle_reg_number, $defaulted, $date_defaulted, $amount, $currency, $remarks, $ID, $parent_id));
		if($ex){
			echo $firstname . ' Information Updated Car Hiring Reference Bureau';
		}else{
			echo "Error uploading customer";
			exit();
		}

	}else{
	
		$parent_id 				= $_SESSION['parent_id'];
		$customer_id 			= filter_var($_POST['customer_id'], FILTER_SANITIZE_STRING);
		$firstname				= filter_var($_POST['firstname'], FILTER_SANITIZE_STRING);
		$lastname 				= filter_var($_POST['lastname'], FILTER_SANITIZE_STRING);
		$phone 					= filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
		$email 					= filter_var($_POST['email'], FILTER_SANITIZE_STRING);
		$address 				= filter_var($_POST['address'], FILTER_SANITIZE_STRING);
		$license 				= filter_var($_POST['licence'], FILTER_SANITIZE_STRING);
		$vehicle_reg_number     = filter_var($_POST['vehicle_reg_number'], FILTER_SANITIZE_STRING);
		// $defaulted 				= filter_var($_POST['defaulted'], FILTER_SANITIZE_STRING);
		$date_defaulted 		= date("Y-m-d", strtotime($_POST['date_defaulted']));
		$amount 		= filter_var($_POST['amount'], FILTER_SANITIZE_STRING);
		$currency 				= filter_var($_POST['currency'], FILTER_SANITIZE_STRING);
		$remarks 				= filter_var($_POST['remarks'], FILTER_SANITIZE_STRING);

		if ($customer_id == "" ) {
			echo 'Please add NRC or Passport Number';
			exit();
		}
		if ($license == '') {
			echo "license Number s required";
			exit();
		}

		if ($amount == "") {
			$amount = 0.00;
		}
		
		$query = $connect->prepare("SELECT * FROM car_hiring_customers WHERE licence = ? AND company_id = ? ");
		$query->execute(array($license, $parent_id));
		if ($query->rowCount() > 0) {
			echo 'You have already Listed '. $firstname.' holder of license number '. $license;
			exit();
		}

		$sql = $connect->prepare("INSERT INTO `car_hiring_customers`(`customer_id`, `firstname`, `lastname`, `phone`, `email`, `address`, `licence`, `vehicle_reg_number`, `date_defaulted`, `company_id`, `amount`, `currency`, `remarks`) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?) ");
		$ex = $sql->execute(array($customer_id, $firstname, $lastname, $phone, $email, $address, $license, $vehicle_reg_number, $date_defaulted, $parent_id, $amount, $currency, $remarks));
	
		if($ex){
			echo $firstname . ' Addred to the checklist';
			// give 3 searches
			$earned_tokens = 3;
			$email = $_SESSION['email'];
			$sql = $connect->prepare("INSERT INTO `tokens`(`parent_id`, `earned_tokens`, `email`, `phone`) VALUES (?, ?, ?, ?)");
			$w = $sql->execute(array($parent_id, $earned_tokens, $email, $phone));
			if ($w) {
				$update = $connect->prepare("UPDATE tokens SET total_tokens = paid_for_tokens + earned_tokens WHERE parent_id = ? ");
				$update->execute(array($parent_id));
			}

		}else{
			echo "Error uploading customer";
			exit();
		}	
	}
?>