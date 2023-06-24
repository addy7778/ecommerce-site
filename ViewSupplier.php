<html>
<head>
<link rel="stylesheet" type="text/css" href="Style.css"></link>
</head>

<body id="bdy">
	
	<?php
	include('HeaderAdmin.php');
	include('Db.php');
	?>
	<form action="ViewSupplierCode.php" method="POST">
	<table class="mygrid" align="center">
		
		<tr><td colspan="7">SUPPLIER DETAILS<br><br><td><tr>
		
		<tr><th>SupplierID</th><th>SupplierName</th><th>CompanyName</th><th>Address</th><th>ContactNo</th><th>EmailID</th><th>Delete</th></tr>
		<?php
		$query = mysql_query("Select SupplierID, SupplierName, CompanyName, Address, ContactNo, EmailID From SupplierTable",$con);
		While($r = mysql_fetch_array($query))
		{
			echo "<tr><td>" . $r['SupplierID'] . "</td><td>" . $r['SupplierName'] . "</td><td>" . $r['CompanyName'] . "</td><td>" . $r['Address'] . "</td><td>" . $r['ContactNo'] . "</td><td>" . $r['EmailID'] . "</td><td><input type='submit' name='" . $r['SupplierID'] . "' value='Delete' class='btn_delete'/></td></tr>";
		}
		mysql_close($con);
		?>
		
	</table>
	</form>
	
</body>

</html>