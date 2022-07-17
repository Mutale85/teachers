<?php
	function getUserIpAddr(){
	    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
	        //ip from share internet
	        $ip = $_SERVER['HTTP_CLIENT_IP'];
	    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
	        //ip pass from proxy
	        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	    }else{
	        $ip = $_SERVER['REMOTE_ADDR'];
	    }
	    return $ip;
	}

	function time_ago_check($time){
		// date_default_timezone_set("Africa/Lusaka");
		$time_ago 	= strtotime($time);
		$current_time = time();
		$time_difference = $current_time - $time_ago;
		$seconds = $time_difference;
		//lets make tround thes into actual time.
		$minutes 	= round($seconds / 60);
		$hours		= round($seconds / 3600);
		$days 		= round($seconds / 86400);
		$weeks   	= round($seconds / 604800); // 7*24*60*60;  
		$months  	= round($seconds / 2629440); //((365+365+365+365+366)/5/12)*24*60*60  
		$years   	= round($seconds / 31553280); //(365+365+365+365+366)/5 * 24 * 60 * 60

		if ($seconds <= 60) {
			return "$seconds Seconds Ago";
		}else if ($minutes <= 60) {

			if ($minutes == 1) {
				return "1 minute Ago";
			}else{
				return "$minutes minutes ago";
			}
			
		}else if ($hours <= 24) {
			if ($hours == 1) {
				return "1 hour ago";
			}else{
				return "$hours hrs ago";
			}
		}else if ($days <= 7) {
			if ($days == 1) {
				return "1 day ago";
			}else{
				return "$days days ago";
			}
		}else if ($weeks < 7) {
			if ($weeks == 1) {
			
				return "1 week ago";
			}else{
				return "$weeks Weeks ago";
			}
		}else if ($months <= 12) {
			if ($months == 1) {
				return "1 month ago";
			}else{
				return "$months Months ago";
			}
		}else {
			if ($years == 1) {
				return "One year ago";
			}else{
				return "$years years ago";
			}
		}
	}

	function get_gravatar( $email, $s = 80, $d = 'mp', $r = 'g', $img = false, $atts = array() ) {
		$url = 'https://www.gravatar.com/avatar/';
		$url .= md5( strtolower( trim( $email ) ) );
		$url .= "?s=$s&d=$d&r=$r";
		if ( $img ) {
			$url = '<img src="' . $url . '"';
			foreach ( $atts as $key => $val )
				$url .= ' ' . $key . '="' . $val . '"';
			$url .= ' />';
		}
		return $url;
	}
	// ========================= CLIENTS ======================
	function getClientsNamesByEmail($connect, $email, $parent_id) {
		$query = $connect->prepare("SELECT * FROM clients_details WHERE email = ? AND parent_id = ? ");
		$query->execute(array($email, $parent_id));
		$output = "";
		$row = $query->fetch();
		if($row){
			$output = $row['client_name'];
		}
		return $output;
	}

	function getClientsNamesById($connect, $client_id, $parent_id) {
		$query = $connect->prepare("SELECT * FROM clients_details WHERE client_id = ? AND parent_id = ? ");
		$query->execute(array($client_id, $parent_id));
		$output = "";
		$row = $query->fetch();
		if($row){
			$output = $row['client_name'];
		}
		return $output;
	}

	function countClients($connect, $parent_id) {
		$output = "";
		$query = $connect->prepare("SELECT * FROM clients_details WHERE parent_id = ? ");
		$query->execute(array($parent_id));
		$output = $query->rowCount();
		return $output;
	}


	// function clientAddress($connect, $client_id, $parent_id){
 //  		$output = '';
 //  		$sql = $connect->prepare("SELECT * FROM clients_details WHERE client_id = ? AND parent_id = ? ");
 //  		$sql->execute(array($client_id, $parent_id));
 //  		$row = $sql->fetch();
 //  		extract($row);
 //  		$output = '
 //  			<h4>'.$client_name.'</h4>
 //  			<address>
 //  				'.$company_name.'<br>
	// 			'.$address.', '.$city.', '.$country.'<br>
	// 			'.$phone.' <br>
	// 			 <a href="mailto:'.$email.'">'.$email.'</a><br>
	// 			'.url_to_clickable_link($website).'		    								
	// 		</address>
 //  		';

 //  		return $output;	
 //  	}

 //  	function clientName($connect, $client_id, $parent_id){
 //  		$output = '';
 //  		$sql = $connect->prepare("SELECT * FROM clients_details WHERE client_id = ? AND parent_id = ? ");
 //  		$sql->execute(array($client_id, $parent_id));
 //  		$row = $sql->fetch();
 //  		extract($row);
 //  		$output = $client_name;

 //  		return $output;	
 //  	}

 //  	function clientEmail($connect, $client_id, $parent_id){
 //  		$output = '';
 //  		$sql = $connect->prepare("SELECT * FROM clients_details WHERE client_id = ? AND parent_id = ? ");
 //  		$sql->execute(array($client_id, $parent_id));
 //  		$row = $sql->fetch();
 //  		extract($row);
 //  		$output = $email;
 //  		return $output;	
 //  	}

  	#============================= ORGARNISATION INFORMATION =================================================
	function getOrganisationName($connect, $parent_id) {
		$output = '';
		$query = $connect->prepare("SELECT * FROM organisations WHERE parent_id = ? ");
		$query->execute(array($parent_id));
		if($query->rowCount() > 0){
			$row = $query->fetch();
			if ($row) {
				$output = $row['organisation_name'];
			}
		}else{
			$output = "<a href='settings'>Organisation Name</a>";
		}

		return $output;
	}

	function getOrganisationLogo($connect, $parent_id) {
		$output = '';
		$query = $connect->prepare("SELECT * FROM organisations WHERE parent_id = ? ");
		$query->execute(array($parent_id));
		if($query->rowCount() > 0){
			$row = $query->fetch();
			if ($row) {
				$output = '
					<img src="uploads/'.$row['org_logo'].'" alt="'.$row['org_logo'].'" class="img-fluid img-responsive rounded" width="80">
				';
			}
		}else{
			$output = "<a href='settings'>Set Logo</a>";
		}

		return $output;
	}

	function getOrganisationAddressDetailsForPDF($connect, $parent_id) {
		$output = '';
		$query = $connect->prepare("SELECT * FROM organisations WHERE parent_id = ? ");
		$query->execute(array($parent_id));
		if($query->rowCount() > 0){
			$row = $query->fetch();
			if ($row) {
				extract($row);
				if ($row['website'] != '') {
		        	$website =  url_to_clickable_link($row['website']);
		        }else{
		        	$website = '';
		        }
				$output = '
                    <address>
                        '.nl2br($hq_address) .'<br>
                        '.$admin_email.'<br>'.$hq_phone.'<br>
                        '.$website.'
                    </address>
				';
			}
		}else{
			$output = "<a href='settings'>Organisation Name</a>";
		}

		return $output;
	}

	function getOrganisationLogoDetailsForPDF($connect, $parent_id) {
		$output = '';
		$query = $connect->prepare("SELECT * FROM organisations WHERE parent_id = ? ");
		$query->execute(array($parent_id));
		if($query->rowCount() > 0){
			$row = $query->fetch();
			if ($row) {
				$output = '
                    uploads/'.$row['org_logo'].'
				';
			}
		}else{
			$output = "https://weblister.co/images/icon_new.png";
		}

		return $output;
	}

	// ============ END OF ORG DETAILS 

	function url_to_clickable_link($str){
	    $find = array('`((?:https?|ftp)://\S+[[:alnum:]]/?)`si', '`((?<!//)(www\.\S+[[:alnum:]]/?))`si');
	    $replace = array('<a href="$1" target="_blank">$1</a>', '<a href="http://$1" target="_blank">$1</a>');
	    return preg_replace($find,$replace,$str);
	}

?>