<?php

include("../../includes/db.php");
$parent_id = $_SESSION['parent_id'];
$email     = $_SESSION['user_mail_bazity'];

if(isset($_POST['image'])){
	$data = $_POST['image'];
	$filename = $_POST['image_name'];
	$image_array_1 = explode(";", $data);

	$image_array_2 = explode(",", $image_array_1[1]);

	$data = base64_decode($image_array_2[1]);

	// $image_name = '../'.trim($filename);
	$image_name = '../signatures/' . time() . '.png';


	file_put_contents($image_name, $data);

	
	// we can even send this to mysql Database
	$sql = $connect->prepare("UPDATE `signatures` SET `Name` = ?,`Signature` = ? WHERE parent_id = ? AND email = ? ");
	if($sql->execute(array( $image_name, $image_name, $parent_id, $email))){
		echo 'Signature cropped and updated';
	}

}

?>