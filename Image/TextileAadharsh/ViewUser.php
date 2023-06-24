<html>
<head>
<link rel="stylesheet" type="text/css" href="Style.css"></link>
</head>

<body id="bdy">
	
	<?php
	include('HeaderAdmin.php');
	include('Db.php');
	?>
	<form action="ViewUserCode.php" method="POST">
	<table class="mygrid" align="center">
		
		<tr><td colspan="6">USER DETAILS<br><br><td><tr>
		
		<tr><th>UserID</th><th>UserName</th><th>Address</th><th>ContactNo</th><th>Email</th><th>Delete</th></tr>
		<?php
		$query = mysql_query("Select UserId, UserName, Address, ContactNo, EmailID From UserTable",$con);
		While($r = mysql_fetch_array($query))
		{
			echo "<tr><td>" . $r['UserId'] . "</td><td>" . $r['UserName'] . "</td><td>" . $r['Address'] . "</td><td>" . $r['ContactNo'] . "</td><td>" . $r['EmailID'] . "</td><td><input type='submit' name='" . $r['UserId'] . "' value='Delete' class='btn_delete'/></td></tr>";
		}
		mysql_close($con);
		?>
		
	</table>
	</form>
	
</body>

</html>