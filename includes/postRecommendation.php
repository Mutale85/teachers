<?php
	include "db.php";
	$user_id = $_SESSION['user_id'];
	$user_email = $_SESSION['user_email'];
	if (isset($_POST['recommendation'])) {
		$recommendation = $_POST['recommendation'];
		$sql = $connect->prepare("INSERT INTO `recommendation`( `user_email`, `user_id`, `recommendation`) VALUES (?, ?, ?)");
		$sql->execute(array($user_email, $user_id, $recommendation));
		$last_id = $connect->lastInsertId();

		foreach ($_POST['choices'] as $key => $value) {
			$choice = $value;

			$sql = $connect->prepare("INSERT INTO `recommendation_options`(`rec_id`, `rec_options`) VALUES (?, ?)");
			$sql->execute(array($last_id, $choice));
		}

		echo "Recommendation posted";
	}
?>