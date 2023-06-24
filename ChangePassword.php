<html>
<head>
<link rel="stylesheet" type="text/css" href="Style.css"></link>
</head>

<body id="bdy-main">

	<?php
		include('HeaderUser.php');
		include('Db.php');

		if($_SERVER["REQUEST_METHOD"] == "POST"){

			$Password = $_REQUEST['txtPassword'];
			$RePassword = $_REQUEST['txtRePassword'];

			if($Password == $RePassword)
			{

				$qry="Update UserTable Set Password = '". $Password ."' Where UserID = '". $_SESSION['username'] ."' ";
				mysql_query($qry,$con) or die(mysql_error());

				die('<br/>Password Changed Successfully!');
			}
			else
			{
				die('<br/>Password Does Not Match!');
			}

		}

	?>

	<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
		<table class="tbl" align="center">
			<tr>
				<td colspan="2" class="heading">CHANGE PASSWORD</td>
			</tr>
			<tr>
				<td><br></td> 
			</tr>
			<tr>
				<td align="right">New Password:</td> <td><input type="password" name="txtPassword" Required /></td>
			</tr>
			<tr>
				<td align="right">Re Enter:</td> <td><input type="password" name="txtRePassword" Required /></td>
			</tr>
			<tr>
				<td></td> <td><input type="submit" name="btnSubmit" value="Change Password" class="btn_submit" style="width:147px;" /></td>
			</tr>
		</table>
	</form>
			

</body>

</html>