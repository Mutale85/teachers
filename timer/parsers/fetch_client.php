<?php
	include '../../includes/db.php';

	if (isset($_POST['action'])) {
		$action = $_POST['action'];
		if ($action == 'fetchClients') {
			$parent_id = $_POST['parent_id'];
			$branch_id = $_POST['branch_id'];
			$output =  '<option value="">Select Client</option>';
			$query = $connect->prepare("SELECT * FROM `clients_details` WHERE parent_id = ? AND branch_id = ? ");
			$query->execute(array($parent_id, $branch_id));
			if ($query->rowCount() > 0) {
				foreach ($query->fetchAll() as $row) {
					extract($row);
			
				$output .=  '<option value="'.$client_id.'">'.$client_name.'</option>';
				}
			}
			echo $output;
		}
	}


	if (isset($_POST['action'])) {
		$action = $_POST['action'];
		if ($action == 'fetch_client') {
			$parent_id = $_POST['parent_id'];
			
			$output =  '<option value="">Select Client</option>';
			$query = $connect->prepare("SELECT * FROM `clients_details` WHERE parent_id = ? AND user_delete = '0' ");
			$query->execute(array($parent_id));
			if ($query->rowCount() > 0) {
				foreach ($query->fetchAll() as $row) {
					extract($row);
					$output .=  '<option value="'.$client_name.'" data-id="'.$client_id.'">'.$client_name.'</option>';
				}
			}
			echo $output;
		}
	}

	if (isset($_POST['client_id'])) {
		$client_id = $_POST['client_id'];
		$parent_id = $_POST['parent_id'];
		$branch_id = $_POST['branch_id'];
		$query = $connect->prepare("SELECT * FROM `clients_details` WHERE client_id = ? AND parent_id = ? AND branch_id = ? ");
		$query->execute(array($client_id, $parent_id, $branch_id));
		if ($query->rowCount() > 0) {
			$row = $query->fetch();
			extract($row);
			echo $address;
		}
	}

	if (isset($_POST['client_details_id'])) {
		$client_details_id = $_POST['client_details_id'];
		$parent_id = $_POST['parent_id'];
		$output = '';
		$query = $connect->prepare("SELECT * FROM `clients_details` WHERE client_id = ? AND parent_id = ?  ");
		$query->execute(array($client_details_id, $parent_id));
		if ($query->rowCount() > 0) {
			$row = $query->fetch();
			extract($row);
			if ($company_name == "") {
				$output = $client_name;
			}else{

			}
			$output =  $company_name;

			echo $output;
		}
	}
?>