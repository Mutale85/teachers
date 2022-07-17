<?php
	include "../../includes/db.php";


	if (isset($_POST['currency'])) {
		extract($_POST);
		$date_added = date("Y-m-d", strtotime($start_date));
		if (!empty($timer_id)) {
			$sql = $connect->prepare("UPDATE time_counter SET date_added = ?, client_id = ?, client_names = ?, description = ?, currency = ?, amount_per_hour = ? WHERE timer_id = ? ");
			$ex = $sql->execute(array($date_added, $client_id, $client_names, $description, $currency, $amount_per_hour, $timer_id));
			if ($ex) {
				echo 'Details updated';
			}
		}else{
			$date_added = date("Y-m-d", strtotime($start_date));
			$sql = $connect->prepare("INSERT INTO `time_counter`( `parent_id`, `date_added`, `client_id`, `client_names`, `description`, `currency`, `amount_per_hour`) VALUES (?, ?, ?, ?, ?, ?, ?) ");
			$ex = $sql->execute(array($parent_id, $date_added, $client_id, $client_names, $description, $currency, $amount_per_hour));
			if ($ex) {
				echo 'Details submitted';
			}
		}
	}

?>