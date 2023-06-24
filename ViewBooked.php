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
		
		<tr><td colspan="11">NEW ORDER DETAILS<br><br><td><tr>
		
		<tr><th>InvoiceNo</th><th>InvoiceDate</th><th>UserName</th><th>Address</th><th>District</th><th>ContactNo</th><th>Quantity</th><th>Total</th><th>Payment Mode</th><th>Description</th><th>View</th><th>Status</th></tr>
		
        <?php
            
        $query = mysql_query("Select InvoiceNo, InvoiceDate, UserTable.UserName, Address, District, ContactNo, Quantity as Qty, Total ,PaymentMode,Description From SaleMaster LEFT JOIN UserTable ON SaleMaster.UserID = UserTable.UserID Where Status='PENDING'", $con);
        
        while($r = mysql_fetch_array($query))
        {
            echo "<tr><td>" . $r['InvoiceNo'] . "</td><td>" . $r['InvoiceDate'] . "</td><td>" . $r['UserName'] . "</td><td>" . $r['Address'] . "</td><td>" . $r['District'] . "</td><td>" . $r['ContactNo'] ."</td><td>" . $r['Qty'] ."</td><td>". $r['Total'] ."</td><td>". $r['PaymentMode'] ."</td><td>". $r['Description'] ."</td><td><input type='Submit' value='View' name='" . '@-' . $r['InvoiceNo'] ."' class='btn_submit'></input></td><td><input type='Submit' value='Deliver' name='". $r['InvoiceNo'] ."' class='btn_delete'></input></td></tr>";
        }	

        mysql_close($con);
            
        ?>
		
	</table>

</form>
</body>
</html>