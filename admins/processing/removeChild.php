<?php
	include '../includes/db.php';
	if (isset($_POST['children_and_dependants_id'])) {
		$children_and_dependants_id = $_POST['children_and_dependants_id'];
		$query = $connect->prepare("DELETE FROM children_and_dependants WHERE id = ?");
		$ex = $query->execute(array($children_and_dependants_id));
		if ($ex) {
			echo 'Date Removed ... Refreshing page in 1 Second';
		}
	}
?>