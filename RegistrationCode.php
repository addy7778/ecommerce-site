<?php
	include('Db.php');
	
	$Id=$_POST["txtId"];
	$Name=$_POST["txtName"];
	$Address=$_POST["txtAddress"];
	$District=$_POST["ddDistrict"];
	$ContactNo=$_POST["txtContactNo"];
	$MailId=$_POST["txtMailId"];
	$Password=$_POST["txtPassword"];
		
	$qry="Insert Into UserTable Values('". $Id ."','". $Name ."','". $Address ."','". $District ."','". $ContactNo ."','". $MailId ."','". $Password ."')";
	mysql_query($qry,$con) or die(mysql_error());
	
	$msg="You are successfully registered as our Customer";
	
	if($msg!="")
					{
						 	//----mail logic
		     require 'PHPMailer/PHPMailerAutoload.php';

      $mail = new PHPMailer;

      $mail->SMTPDebug = 3;                               // Enable verbose debug output

      $mail->isSMTP();                                      // Set mailer to use SMTP

      $mail->SMTPOptions = array(
      'ssl' => array(
          'verify_peer' => false,
          'verify_peer_name' => false,
          'allow_self_signed' => true));
  
  
		$mail = new PHPMailer();
		$mail->IsSMTP();
		$mail->Mailer = "smtp";
		
		$mail->SMTPDebug  = 0;  
		$mail->SMTPAuth   = TRUE;
		$mail->SMTPSecure = "tls";
		$mail->Port       = 587;
		$mail->Host       = "smtp.gmail.com";
		$mail->Username   = "softpromstest@gmail.com";
		$mail->Password   = "jfsztdlvdklbbfsn";
		$mail->IsHTML(true);
		$mail->AddAddress($MailId, $Name); //toaddress , recipient name
		$mail->SetFrom("softpromstest@gmail.com", "E-Commerce Textile Admin");
		//$mail->AddReplyTo("reply-to-email@domain", "reply-to-name");
		//$mail->AddCC("cc-recipient-email@domain", "cc-recipient-name");
		$mail->Subject = "Registration Success";
		//$content = "<b> Your House Construction Request Accepted. Our Admin will Contact you shortly.</b>";
		$mail->MsgHTML($msg); 
		if(!$mail->Send()) {
			echo "Error while sending Email.";
			//var_dump($mail);
		}
		else {
				echo "Email sent successfully";
		}

		
		
		//--mail logic
						
						
						
						
					}
    header('location:Registration.php');
	mysql_close($con);
?>