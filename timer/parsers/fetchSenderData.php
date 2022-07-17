<?php
	include '../../includes/db.php';

	if(isset($_POST['userID'])){
		$user_id = filter_input(INPUT_POST, 'userID', FILTER_SANITIZE_SPECIAL_CHARS);
		$query = $connect->prepare("SELECT * FROM `sender_data` WHERE user_id = ?");
		$query->execute([$user_id]);
		if ($query->rowCount() > 0) {
			$row = $query->fetch();
			extract($row);
			if($names == ""){
				$name = $_SESSION['firstname']. ' '. $_SESSION['lastname'];
			}else{
				$name = $names;
			}
			if ($email == '') {
				$mail = $_SESSION['user_mail_bazity'];
			}else{
				$mail = $email;
			}

			if ($business_name == '') {
				$business_name = 'Your address or businee name';
			}else{
				$business_name = $business_name;
			}

			if ($phone == '') {
				$phone = 'Phone number';
			}else{
				$phone = $phone;
			}

			if ($website == '') {
				$website = 'Your website';
			}else{
				$website = $website;
			}
?>
			<div contenteditable="true" class="p-1 editable" data-value="names" id="<?php echo $_SESSION['user_id']?>"><?php echo $name?> </div>
			<div contenteditable="true" class="p-1 editable" data-value="business_name" id="<?php echo $_SESSION['user_id']?>"><?php echo htmlspecialchars_decode($business_name)?></div>
			<div contenteditable="true" class="p-1 editable" data-value="email" id="<?php echo $_SESSION['user_id']?>"><?php echo $mail?></div>
			<div contenteditable="true" class="p-1 editable" data-value="phone" id="<?php echo $_SESSION['user_id']?>"><?php echo $phone?></div>
			<div contenteditable="true" class="p-1 editable" data-value="website" id="<?php echo $_SESSION['user_id']?>"><?php echo url_to_clickable_link($website)?></div>
<?php
		}else{
?>
			<div contenteditable="true" class="p-1 editable" data-value="names" id="<?php echo $_SESSION['user_id']?>"><?php echo $_SESSION['firstname']?> <?php echo $_SESSION['firstname']?></div>
			<div contenteditable="true" class="p-1 editable" data-value="business_name" id="<?php echo $_SESSION['user_id']?>">Your Business Name</div>
			<div contenteditable="true" class="p-1 editable" data-value="email" id="<?php echo $_SESSION['user_id']?>"><?php echo $_SESSION['user_mail_bazity']?></div>
			<div contenteditable="true" class="p-1 editable" data-value="phone" id="<?php echo $_SESSION['user_id']?>">Phone Number</div>
			<div contenteditable="true" class="p-1 editable" data-value="website" id="<?php echo $_SESSION['user_id']?>">Your Website</div>
<?php	
		}
	}