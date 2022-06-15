<?php
	include 'db.php';
	if (isset($_POST['getCustomerId'])) {
		$getCustomerId = $_POST['getCustomerId'];
		$query = $connect->prepare("SELECT * FROM customers WHERE id = ? AND company_id = ?");
		$query->execute(array($getCustomerId, $_SESSION['parent_id']));
		$row = $query->fetch();
		if ($row) {
			$data = json_encode($row);
		}
		echo $data;
	}

	if (isset($_POST['removeCustomerId'])) {
		$removeCustomerId = $_POST['removeCustomerId'];
		$query = $connect->prepare("DELETE FROM customers WHERE id = ? AND company_id = ?");
		if($query->execute(array($removeCustomerId, $_SESSION['parent_id']))){
			echo "done";
		}
	}
?>