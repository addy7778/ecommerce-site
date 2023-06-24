<html>
<head>
<link rel="stylesheet" type="text/css" href="Style.css"></link>
</head>

<body id="bdy">
	
	<?php
	include('HeaderAdmin.php');
	include('Db.php');
	?>
	
<form action="ViewBookedCode.php" method="post">
	
	<table class="mygrid" align="center">
		
		<tr><td colspan="9">DELIVERED ORDER DETAILS<br><br><td><tr>
		<tr><th>InvoiceNo</th><th>InvoiceDate</th><th>UserName</th><th>Address</th><th>District</th><th>ContactNo</th><th>Quantity</th><th>Total</th></tr>
		
        <?php
            
        $query = mysql_query("Select InvoiceNo, InvoiceDate, UserTable.UserName, Address, District, ContactNo, Quantity as Qty, Total From SaleMaster LEFT JOIN UserTable ON SaleMaster.UserID = UserTable.UserID Where Status='DELIVERED'", $con);
        while($r = mysql_fetch_array($query))
        {
            echo "<tr><td>" . $r['InvoiceNo'] . "</td><td>" . $r['InvoiceDate'] . "</td><td>" . $r['UserName'] . "</td><td>" . $r['Address'] . "</td><td>" . $r['District'] . "</td><td>" . $r['ContactNo'] ."</td><td>" . $r['Qty'] ."</td><td>". $r['Total'] ."</td></tr>";
        }	
        mysql_close($con);
            
        ?>
		
	</table>

</form>
	
</body>

</html>