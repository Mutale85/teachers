<?php
	include '../../includes/db.php';
	if (isset($_POST['clientID'])) {
		$client_id = preg_replace("#[^0-9]#", "", $_POST['clientID']);
		$output = "";
		$query = $connect->prepare("SELECT * FROM clients_details WHERE client_id = ? ");
		$query->execute(array($client_id));
		$row = $query->fetch();
		if ($row) {
			$output = json_encode($row);
		}
		echo $output;
	}

	if (isset($_POST['clientID_delete'])) {
		$client_id = preg_replace("#[^0-9]#", "", $_POST['clientID_delete']);
		$sql = $connect->prepare("UPDATE clients_details SET user_delete = '1' WHERE client_id = ?");
		if($sql->execute([$client_id])) {
			echo 'Client deleted';
		}

	}

	if (isset($_POST['organisation_id'])) {
		$ID = $_POST['organisation_id'];
		$output = "";
		$query = $connect->prepare("SELECT * FROM organisations WHERE id = ? AND parent_id = ? ");
		$query->execute(array($ID, $_SESSION['parent_id']));
		$row = $query->fetch();
		if ($row) {
			$output = json_encode($row);
		}
		echo $output;
	}
?>