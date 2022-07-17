<?php
	include('../../includes/db.php');

	if(!empty($_POST['client_id'])){
		extract($_POST);
		$sql = $connect->prepare("UPDATE `clients_details` SET `company_name` = ?, `email` = ?, `client_name` = ?, `phone` = ?, `city` = ?, `country` = ?, `address` = ?, `website` = ?, `business_type` = ? WHERE client_id = ? AND `parent_id` = ? ");
		$p = $sql->execute([$company_name, $client_email, $client_name, $phonenumber, $client_city, $client_country, $client_address, $client_website, $client_business, $client_id, $parent_id]);

		if($p){
			echo $company_name. ' info update successful ';
		}else{
			echo "Error uploading User";
			exit();
		}

	}else{
		extract($_POST);
		if ($company_name == "" ) {
			echo 'Please Company Name';
			exit();
		}

		if ($client_name == "" ) {
			echo 'Please add the name of the client';
			exit();
		}

		if ($client_email == "" ) {
			echo 'Please add the email of the client';
			exit();
		}
		
		$query = $connect->prepare("SELECT * FROM clients_details WHERE email = ? AND parent_id = ? ");
		$query->execute([$client_email, $parent_id]);
		if ($query->rowCount() > 0) {
			echo 'client with details email '. $client_email. '  is already added';
			exit();
		}
		$sql = $connect->prepare("INSERT INTO `clients_details`(`parent_id`, `company_name`, `email`, `client_name`, `phone`, `city`, `country`, `address`, `website`, `business_type`) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$p = $sql->execute([$parent_id, $company_name, $client_email, $client_name, $phonenumber, $client_city, $client_country, $client_address, $client_website, $client_business ]);

		if($p){
			echo $company_name. ' added to clients list';
		}else{
			echo "Error uploading User";
			exit();
		}	
	}
?>