<html>
<head>
<link rel="stylesheet" type="text/css" href="Style.css"></link>
</head>

<body id="bdy">
	
	<?php
	
	include('HeaderUser.php');
	include('Db.php');
	?>
	<form action="ViewCartCode.php" method="POST">
	<table class="mygrid" align="center">
		
		<tr><td colspan="6">CART VIEW<br><br><td><tr>
		
		<tr><th>ID</th><th>ProductName</th><th>Price</th><th>Quantity</th><th>Total</th><th>Delete</th></tr>
		
		<?php
$total=0;
		$query = mysql_query("Select * From CartTable Where UserID = '". $_SESSION['username'] ."' ",$con);
		While($r = mysql_fetch_array($query))
		{
			echo "<tr><td>" . $r['ProductID'] . "</td><td>" . $r['ProductName'] . "</td><td>" . $r['Price'] . "</td><td>" . $r['Quantity'] . "</td><td>" . $r['Total'] . "</td><td><input type='submit' name='" . $r['Sno'] . "' value='Delete' class='btn_delete'/></td></tr>";
$total=$total+$r['Total'];		
}

if($total>0)
{
echo "<tr><td colspan='5' align='right'>$total</td></tr></table>";		
}

        
        $query = mysql_query("Select * From CartTable Where UserID = '". $_SESSION['username'] ."' ",$con);
		if($r = mysql_fetch_array($query))
		{

echo "<table><tr><td>Payment Mode</td><td>";
echo "<select name='cboPaymentMode'>";
echo "<option>Cash</option>";
echo "<option>Cheque</option>";
echo "<option>PayTM</option>";
echo "<option>GPay</option>";
echo "<option>RTGS</option>";
echo "<option>IMPS</option>";
echo "</select></td></tr>";
echo "<tr><td>Description</td>";
echo "<td><textarea name='txtDesc'></textarea></td></tr></table>";


	           echo "<input type='submit' value='PLACE ORDER' name='btnOrder' class='btn_submit' ></input>";
        }
        mysql_close($con);
        ?>
		
	</form>
	
</body>

</html>