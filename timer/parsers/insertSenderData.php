<?php
	include '../../includes/db.php';

	if(isset($_POST['userID'])){
		$user_id = filter_input(INPUT_POST, 'userID', FILTER_SANITIZE_SPECIAL_CHARS);
		$data = filter_input(INPUT_POST, 'collectedData', FILTER_SANITIZE_SPECIAL_CHARS);
		$field = filter_input(INPUT_POST, 'field', FILTER_SANITIZE_SPECIAL_CHARS);

		$query = $connect->prepare("SELECT * FROM `sender_data` WHERE user_id = ?");
		$query->execute([$user_id]);
		$count = $query->rowCount();
		if ($count > 0) {
			// Update 
			$update = $connect->prepare("UPDATE sender_data SET $field = ? WHERE user_id = ? ");
			$update->execute([$data, $user_id]);
		}else{
			$sql = $connect->prepare("INSERT INTO sender_data (`user_id`, $field) VALUES (?, ?) ");
			$sql->execute([$user_id, $data]);
		}
	}