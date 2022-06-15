<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	require '../PHPMailer/src/Exception.php';
	require '../PHPMailer/src/PHPMailer.php';
	require '../PHPMailer/src/SMTP.php';
	include 'db.php';
	if (isset($_POST['fullnames'])) {
		$fullnames 			= filter_var($_POST['fullnames'], FILTER_SANITIZE_STRING);
		$email 				= filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
		$generatedPassword 	= $_POST['password'];
	    $company_name   	= filter_var($_POST['company_name'], FILTER_SANITIZE_STRING);
	

		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			echo "Invalid Email";
			exit();
		}

		$check_list = $connect->prepare("SELECT * FROM members WHERE email = ? AND company_name = ?");
		$check_list->execute(array($email, $company_name));
		$count = $check_list->rowCount();
		if ($count > 0) {
			echo $email . " " .$company_name. " Already Registered";
			exit();
		}
		
		$password = password_hash($generatedPassword, PASSWORD_DEFAULT);
	    
	    $QUERY = $connect->prepare("INSERT INTO `members` (`fullnames`, `email`, `password`, `company_name`) VALUES (?, ?, ?, ?) ");
	    $execute = $QUERY->execute(array($fullnames, $email, $password, $company_name));
	    $parent_id = $connect->lastInsertId();
	    if($execute){ 
	        $update = $connect->prepare("UPDATE members SET parent_id = ? WHERE email = ? ");
	        $update->execute(array($parent_id, $email));
			
			// Send an Email
			
	    	$message = '
	        <!doctype html>
	            <html lang="en-US">

	            <head>
	                <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
	                <title>Osabox - Registration</title>
	                <meta name="description" content="Reset Password Email Template.">
	                <style type="text/css">
	                    a:hover {text-decoration: underline !important;}
	                </style>
	            </head>

	            <body marginheight="0" topmargin="0" marginwidth="0" style="margin: 0px; background-color: #f2f3f8;" leftmargin="0">
	                <!--100% body table-->
	                <table cellspacing="0" border="0" cellpadding="0" width="100%" bgcolor="#f2f3f8"
	                    style="@import url(https://fonts.googleapis.com/css?family=Rubik:300,400,500,700|Open+Sans:300,400,600,700); font-family: "Open Sans", sans-serif;">
	                    <tr>
	                        <td>
	                            <table style="background-color: #f2f3f8; max-width:670px;  margin:0 auto;" width="100%" border="0"
	                                align="center" cellpadding="0" cellspacing="0">
	                                <tr>
	                                    <td style="height:80px;">&nbsp;</td>
	                                </tr>
	                                <tr>
	                                    <td style="text-align:center;">
	                                      	<a href="https://joinratings.com" title="logo" target="_blank">
	                                        	<h1>Join Ratings</h1>
	                                      	</a>
	                                    </td>
	                                </tr>
	                                <tr>
	                                    <td style="height:20px;">&nbsp;</td>
	                                </tr>
	                                <tr>
	                                    <td>
	                                        <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0"
	                                            style="max-width:670px;background:#fff; border-radius:3px; text-align:center;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);">
	                                            <tr>
	                                                <td style="height:40px;">&nbsp;</td>
	                                            </tr>
	                                            <tr>
	                                                <td style="padding:0 35px;">
	                                                    <h1 style="color:#1e1e2d; font-weight:500; margin:0;font-size:32px;font-family:"Rubik",sans-serif; text-align:left;">Welcome '.$fullnames.'</h1>
	                                                    <span
	                                                        style="display:inline-block; vertical-align:middle; margin:29px 0 26px; border-bottom:1px solid #cecece; width:100px;"></span>


	                                                    <div style="color:#455056; font-size:15px;line-height:24px; margin:0;">
	                                                        <h2 class="title2">Welcome to Car Reference Bureau.</h2>
	                                                        <p>We are commited to helping you never be a victim from fraudsters</p>
	                                                        <a href="https://joinratings.com/activation?userid='.$parent_id.'&email='.$email.'&pass='.$password.'" class="linkBtn"> Activate Account</a>
	                                                        <p> You can also copy and paste the link below into your browser.</p>
	                                                        <p>https://joinratings.com/activation?userid='.$parent_id.'&email='.$email.'&pass='.$password.'</p>
	                                                        <p>Your login details are as follows: Email: '.$email.' and Your Password is: <b><i>'.$generatedPassword.'</b></p>
	                                                    </div>

	                                                </td>
	                                            </tr>
	                                            <tr>
	                                                <td style="height:40px;">&nbsp;</td>
	                                            </tr>
	                                        </table>
	                                    </td>
	                                <tr>
	                                    <td style="height:20px;">&nbsp;</td>
	                                </tr>
	                                <tr>
	                                    <td style="text-align:center;">
	                                        <h4>Car Hiring Reference Bureau</h4>
	                                        <p>We care for your business, we don\'t want you to be a victim</p>
	                                        <p style="font-size:14px; color:rgba(69, 80, 86, 0.7411764705882353); line-height:18px; margin:0 0 0;">&copy; <strong>www.2remote.com</strong></p>
	                                    </td>
	                                </tr>
	                                <tr>
	                                    <td style="height:80px;">&nbsp;</td>
	                                </tr>
	                            </table>
	                        </td>
	                    </tr>
	                </table>
	            </body>

	            </html>
	        ';
	    	
			$mail = new PHPMailer();
			$mail->Host = "smtp.zoho.com";
			$mail->isSMTP();
			$mail->SMTPAuth = true;
			$mail->Username = "info@osabox.net";
			$mail->Password = "XXXXX";
			$mail->SMTPSecure = "ssl";//TLS
			$mail->Port = 465; //TLS port= 587
			$mail->addAddress($email, $fullnames); //$inst_admin_email;
			$mail-> setFrom("xxx", 'Account');
			$mail-> Subject = "Account Registration Successful";
			$mail->isHTML(TRUE);
			// $mail->SMTPDebug = 2;
			$mail->Body = $message;
			if($mail->send()){
				echo 'Account created please check your email inbox or spam for a verification link sent to '.$email; 
			}else{
				echo "Mailer Error: " . $mail->ErrorInfo;
			}
		}  
    }
?>