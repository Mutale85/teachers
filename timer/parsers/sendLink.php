<?php

	ini_set("pcre.jit", "0");
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	require '../../PHPMailer/src/Exception.php';
	require '../../PHPMailer/src/PHPMailer.php';
	require '../../PHPMailer/src/SMTP.php';
	include '../../includes/db.php';
	extract($_POST);

	$message = '
        <!doctype html>
            <html lang="en-US">
            <head>
                <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
                <title>Osabox Fee Note</title>
                <meta name="description" content="'.$receiver_name.' - Fee Note">
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
                                      <a href="https://osabox.co" title="logo" target="_blank">
                                        <img width="80" src="https://osabox.co/images/icon2.png" title="logo" alt="logo">
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
                                                    <h3 style="color:#1e1e2d; font-weight:500; margin:0;font-size:32px;font-family:"Rubik",sans-serif; text-align:left;">Hello '.$receiver_name.'</h3>
                                                    <span style="display:inline-block; vertical-align:middle; margin:29px 0 26px; border-bottom:1px solid #cecece; width:100px;"></span>


                                                    <div style="color:#455056; font-size:15px;line-height:24px; margin:0;">
                                                        <h2 class="title2">'.$sender_name.' has sent you an Fee Note.</h2>
                                                        <a href="'.$link.'" class="linkBtn"> Open In Osabox</a>
                                                        <p> You can also copy and paste the link below into your browser.</p>
                                                        <p>'.$link.'</p>
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
                                        <h4>Your Business Management Tool </h4>
                                        <p>With Osabox, you create and manage projects, generate payroll for your employees, issue Fee Notes and receipts to your clients and more...</p>
                                        <p style="font-size:14px; color:rgba(69, 80, 86, 0.7411764705882353); line-height:18px; margin:0 0 0;">&copy; <strong>www.osabox.co</strong></p>
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
		$mail->Username = "info@osabox.co";
		$mail->Password = "####";
		$mail->SMTPSecure = "ssl";//TLS
		$mail->Port = 465; //TLS port= 587
		$mail->addAddress($client_email, $receiver_name); //$inst_admin_email;
		$mail-> setFrom("info@osabox.co", 'Fee Note');
		$mail-> Subject = "Your Fee Note From ".$sender_name;
		$mail->isHTML(TRUE);
		// $mail->SMTPDebug = 2;
		$mail->Body = $message;
		if($mail->send()){
			echo 'Fee Note Link sent to '.$client_email; 
		}else{
			echo "Mailer Error: " . $mail->ErrorInfo;
		} 
?>