<?php
	include "../../includes/db.php";

	if (isset($_POST['start_time'])) {
		extract($_POST);
		$sql = $connect->prepare("UPDATE `time_counter` SET start_time = ? WHERE timer_id = ? AND parent_id = ? ");
		$ex = $sql->execute(array($start_time, $timeID, $parent_id));
		if ($ex) {
			echo 'Time Started at: ' . date("H:m:s", strtotime($start_time));
		}
	}


	if (isset($_POST['stop_time'])) {
		extract($_POST);
		$total_hours = $hours + ($minutes/60)+($seconds/3600);
		$total_amount = $amount_per_hour * $total_hours;
		// echo $total_amount;
		$sql = $connect->prepare("UPDATE `time_counter` SET `stop_time`= ?, `hours`= ?, `minutes`= ?, `seconds`= ?, `total_hours`= ?, `total_amount`= ? WHERE timer_id = ? AND parent_id = ? ");
		$ex = $sql->execute(array($stop_time, $hours, $minutes, $seconds, $total_hours, $total_amount, $timeID, $parent_id));
		if ($ex) {
			echo 'Time spent working: ' . round($total_hours) . ' hours'. ' converting to '. $total_amount . ' at '. $amount_per_hour. ' / Hour';
		}
	}

	if (isset($_POST['action'])) {
		$action = $_POST['action'];
		$timer_id = $_POST['timer_id'];
		if ($action == 'editRow') {
			$query = $connect->prepare("SELECT * FROM time_counter WHERE timer_id = ? ");
			$query->execute(array($timer_id));
			$row = $query->fetch();
			echo json_encode($row);
		}
	}
	if (isset($_POST['action'])) {
		$action = $_POST['action'];
		$timer_id = $_POST['timer_id'];
		if ($action == 'deleteRow') {
			$query = $connect->prepare("UPDATE time_counter SET user_delete = '1' WHERE timer_id = ? ");
			$del = $query->execute(array($timer_id));
			if ($del) {
				echo "Record Deleted";
			}
		}
	}
	