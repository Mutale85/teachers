<?php
	include '../../includes/db.php';
	extract($_POST);
	
	if (!empty($ID)) {
		
		$update = $connect->prepare("UPDATE expenses SET  `expense_date` = ?, `expense_name` = ?, `expense_amount` = ?, `currency` = ? WHERE id = ? ");
		$ex = $update->execute(array($date, $name, $amount, $currency, $ID));
		if($ex){
			echo "Expense Updated";
		}
	}else{
		
		$sql = $connect->prepare("INSERT INTO `expenses`( `parent_id`, `expense_date`, `expense_name`, `expense_amount`, `currency`) VALUES ( ?, ?, ?, ?, ?) ");
		$ex = $sql->execute(array( $parent_id, $date, $name, $amount, $currency));
		if ($ex) {
			echo "Expense Submitted";
		}
	}
?>