<?php
	include 'db.php';
	
	if (isset($_POST['action'])) {
		$action = $_POST['action'];
		$service_number = $_POST['service_number'];
		if ($action == 'delete_service_personnel') {
			
			$query = $connect->prepare("DELETE FROM motor_vehicles WHERE service_number = ? AND parent_id = ?");
			$query->execute(array($service_number, $_SESSION['parent_id']));
			
			$query = $connect->prepare("DELETE FROM children_and_dependants WHERE service_number = ? AND parent_id = ?");
			$query->execute(array($service_number, $_SESSION['parent_id']));
			
			$query = $connect->prepare("DELETE FROM private_employees WHERE service_number = ? AND parent_id = ?");
			$query->execute(array($service_number, $_SESSION['parent_id']));
			
			$query = $connect->prepare("DELETE FROM civilian_residents WHERE service_number = ? AND parent_id = ?");
			$query->execute(array($service_number, $_SESSION['parent_id']));
		}
	}
?>