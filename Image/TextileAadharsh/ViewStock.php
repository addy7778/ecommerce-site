<html>
<head>
<link rel="stylesheet" type="text/css" href="Style.css"></link>
</head>

<body id="bdy">
	
	<?php
	include('HeaderAdmin.php');
	include('Db.php');
	?>
	<table class="mygrid" align="center">
		
		<tr><td colspan="8">STOCK DETAILS<br><br><td><tr>
		
		<tr><th>ProductID</th><th>ProductName</th><th>Price</th><th>Tax</th><th>Stock</th><th>ReOrderLevel</th><th>ExpiryDate</th><th>Image</th></tr>
		<?php
		$query = mysql_query("Select ProductID, ProductName, SellingPrice, Tax, Quantity, ReOrderLevel, ExpiryDate, Image From StockTable",$con);
		While($r = mysql_fetch_array($query))
		{
			echo "<tr><td>" . $r['ProductID'] . "</td><td>" . $r['ProductName'] . "</td><td>" . $r['SellingPrice'] . "</td><td>" . $r['Tax'] . "</td><td>" . $r['Quantity'] . "</td><td>" . $r['ReOrderLevel'] . "</td><td>" . $r['ExpiryDate'] . "</td><td><img src = 'Image/Product/". $r['Image'] . "' Height='60px' Width='90px' /></td></tr>";
		}
		mysql_close($con);
		?>
		
	</table>
	
</body>

</html>