<?php
	include '../includes/db.php';
	if (isset($_POST['imageID'])) {
		$imageID = $_POST['imageID'];
		$sql = $connect->prepare("SELECT * FROM gallery WHERE id = ? ");
		$sql->execute(array($imageID));
		$row = $sql->fetch();
		$getIamgeName = $row['image'];
		
		$createDeletePath = "../../uploads/".$getIamgeName;
		
		if(unlink($createDeletePath)){
			$query = $connect->prepare("DELETE FROM gallery WHERE id = ?");
			$ex = $query->execute(array($imageID));
			if ($ex) {
				echo 'Date Removed ... Refreshing page in 1 Second';
			}
		}
	}
?>