<html>
<head>
<link rel="stylesheet" type="text/css" href="Style.css"></link>
</head>

<body id="bdy">
	
	<?php
    		session_start();
		include('HeaderAdmin.php');
		include('Db.php');
	?>
	</td>
	
	<div class="tbl"><h3>Welcome.....   <?php echo $_SESSION["username"]; ?></h3> </div>


	<!--<?php


		$query = mysql_query("Select COUNT(*) as data From StockTable Where Quantity < ReOrderLevel",$con);
		$row = mysql_fetch_array($query);

		if($row['data'] > 0)
		{
			echo "<table class='mygrid' align='center'>";
			echo "<tr><td colspan='7'>LOW STOCK<br><br><td><tr>";
			echo "<tr><th>ProductID</th><th>ProductName</th><th>Stock</th></tr>";
			
			$query = mysql_query("Select ProductID, ProductName, Quantity From StockTable Where Quantity < ReOrderLevel",$con);
			While($r = mysql_fetch_array($query))
			{
				echo "<tr><td>" . $r['ProductID'] . "</td><td>" . $r['ProductName'] . "</td><td>" . $r['Quantity'] . "</td></tr>";
			}

			echo "</table>";
		}
		mysql_close($con);
	?>-->

	
</table>
</body>

</html>