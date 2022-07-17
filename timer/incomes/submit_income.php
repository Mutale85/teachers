<?php
	include '../../includes/db.php';
	extract($_POST);

	if (!empty($ID)) {
		
		$update = $connect->prepare("UPDATE income_table SET  `income_date` = ?, `income_name` = ?, `income_amount` = ?, `currency` = ? WHERE id = ? ");
		$ex = $update->execute(array($date, $name, $amount, $currency, $ID));
		if($ex){
			echo "Income Updated";
		}

		
	}else{
		$sql = $connect->prepare("INSERT INTO `income_table`( `parent_id`, `income_date`, `income_name`, `income_amount`, `currency`) VALUES ( ?, ?, ?, ?, ?) ");
		$ex = $sql->execute(array( $parent_id, $date, $name, $amount, $currency));
		if ($ex) {
			echo "Income submited";
		}
	}

?>