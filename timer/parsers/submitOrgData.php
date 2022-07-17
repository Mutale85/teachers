<?php
	include '../../includes/db.php';
	extract($_POST);
	if (!empty($ID)) {
		
		$query = $connect->prepare("SELECT * FROM `organisations` WHERE parent_id = ? ");
		$query->execute(array($parent_id));
		$row = $query->fetch();
		if ($row) {
			$logo = $row['org_logo'];
		}

		if ($_FILES['org_logo']['name'] == "") {
			$org_logo = $logo;
		}else{
			$org_logo = $_FILES['org_logo']['name'];
			$filename = $_FILES['org_logo']['tmp_name'];
			$destination = 'uploads/'.$org_logo;
			move_uploaded_file($filename, $destination);
		}

		$update = $connect->prepare("UPDATE `organisations` SET `org_logo` = ?, `organisation_name`= ? , `organisation_type` = ?, `admin_email`= ?,`hq_phone`= ?,`hq_address`= ?, website = ?,  background_color = ?, text_color = ? WHERE id = ? AND parent_id = ? ");
		$ex = $update->execute(array($org_logo, $organisation_name, $organisation_type, $admin_email, $hq_phone, $hq_address, $website, $bg_color, $text_color, $ID, $parent_id));
		if ($ex) {
			echo 'Information Updated successfully';
		}
	}else{
		$date_added = date("Y-m-d");
		$query = $connect->prepare("SELECT * FROM `organisations` WHERE parent_id = ? ");
		$query->execute(array($parent_id));
		if ($query->rowCount() > 0) {
			echo $organisation_name . ' is already saved';
			exit();
		}
		$org_logo = $_FILES['org_logo']['name'];
		$filename = $_FILES['org_logo']['tmp_name'];
		$destination = 'uploads/'.$org_logo;
		move_uploaded_file($filename, $destination);
		$sql = $connect->prepare("INSERT INTO `organisations`(`org_logo`, `organisation_name`, `organisation_type`, `parent_id`, `admin_email`, `hq_phone`, `hq_address`, `date_added`, `website`, `background_color`, `text_color`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?) ");
		$ex = $sql->execute(array($org_logo, $organisation_name, $organisation_type, $parent_id, $admin_email, $hq_phone, $hq_address, $date_added, $website, $bg_color, $text_color));
		if ($ex) {
			echo 'Information Posted successfully';
		}
	}
?>