<html>
<head>
<link rel="stylesheet" type="text/css" href="Style.css"></link>
</head>

<body id="bdy-main">

	<?php
		include('Header.php');
		include('Db.php');
		require 'MailServer/PHPMailerAutoload.php';

		if($_SERVER["REQUEST_METHOD"] == "POST"){

			$Id = $_REQUEST['txtID'];

			$result = mysql_query("Select EmailID From UserTable Where UserID = '". $Id ."' ", $con);
			$data = mysql_fetch_array($result);
			$EmailID = $data['EmailID'];

			$result = mysql_query("Select Password From UserTable Where UserID = '". $Id ."' ", $con);
			$data = mysql_fetch_array($result);
			$SPassword = $data['Password'];


			$email = "softpromstest@gmail.com";
			$password = "jfsztdlvdklbbfsn";
			$to_id = $EmailID;
			$message = "FORGOT PASSWORD";
			$subject = "YOUR PASSWORD: " . $SPassword;
			$mail = new PHPMailer;
			$mail->isSMTP();
			$mail->Host = 'smtp.gmail.com';
			$mail->Port = 587;
			$mail->SMTPSecure = 'tls';
			$mail->SMTPAuth = true;
			$mail->Username = $email;
			$mail->Password = $password;
			$mail->addAddress($to_id);
			$mail->Subject = $subject;
			$mail->msgHTML($message);

			if (!$mail->send()) {
				die("<br/><br/><br/><br/><br/><br/>Invalid ID ....  ");
			}

			echo "<br/><br/><br/><br/><br/>Password Mailed Successfully! <br/> <a href='Login.php'>Click here for Login</a>";
			die('');

		}

	?>

	<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
		<table class="tbl" align="center">
			<tr>
				<td colspan="2" class="heading">FORGOT PASSWORD</td>
			</tr>
			<tr>
				<td><br></td> 
			</tr>
			<tr>
				<td align="right">Enter UserID:</td> <td><input type="text" name="txtID" Required /></td>
			</tr>
			<tr>
				<td></td> <td><input type="submit" name="btnSubmit" value="Mail Password" class="btn_submit" /></td>
			</tr>
		</table>
	</form>
			

</body>

</html>