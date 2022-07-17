<?php
	include("../../includes/db.php");
	$parent_id = $_SESSION['parent_id'];
	$email     = $_SESSION['user_mail_bazity'];
	if (isset($_POST['action'])) {
		$action = $_POST['action'];
	
		if($action == "saveSVG"){
			
			$person_Name = $_POST['inputSignatureName'];
			$person_Signature = $_POST["signature"]; 
			$filename = time().'.svg';
			$sql = $connect->prepare("SELECT * FROM `signatures` WHERE parent_id = ? AND email = ? ");
			$sql->execute(array($parent_id, $email));
			if ($sql->rowCount() > 0) {
				$sql = $connect->prepare("UPDATE `signatures` SET `Name` = ?,`Signature` = ? WHERE parent_id = ? AND email = ? ");
				$sql->execute(array( $filename, $person_Signature, $parent_id, $email));

				if($sql){
				
				 	$output["msg"] = "Signature Succesfully Saved"; 
				 	$file_handle = file_put_contents('../signatures/'.$filename, $person_Signature);
				 	// We present the opptio to crop the image

				 }
			}else{
				$sql = $connect->prepare("INSERT INTO `signatures` ( `parent_id`, `email`, `Name`, `Signature`) VALUES (?, ?, ?, ?)");
				$sql->execute(array($parent_id, $email, $filename, $person_Signature));

				if($sql){
				
				 	$output["msg"] = "Signature Succesfully Saved"; 
				 	$file_handle = file_put_contents('../signatures/'.$filename, $person_Signature); 
				}else{
					$output["msg"] = 'Error';
				}
			}
		}
	}
		echo json_encode($output);

?>