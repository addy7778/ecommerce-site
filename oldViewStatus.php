<html>
<head>
<link rel="stylesheet" type="text/css" href="Style.css"></link>
</head>

<body id="bdy">
	
	<?php
	include('HeaderUser.php');
	include('Db.php');
	?>
	
<form action="ViewBookedCode.php" method="post">
	
	<table class="mygrid" align="center">
		
		<tr><td colspan="7">MY ORDER DETAILS<br><br><td><tr>
		<tr><th>InvoiceNo</th><th>UserID</th><th>UserName</th><th>InvoiceDate</th><th>Quantity</th><th>Total</th><th>Status</th></tr>
		
        <?php
            
        

        $query = mysql_query("Select InvoiceNo, UserId, UserName, InvoiceDate, Quantity, Total, Status From SaleMaster Where UserId = '". $_SESSION["username"] ."' ", $con);
        while($r = mysql_fetch_array($query))
        {
            echo "<tr><td>" . $r['InvoiceNo'] . "</td><td>" . $r['UserId'] . "</td><td>" . $r['UserName'] . "</td><td>" . $r['InvoiceDate'] . "</td><td>" . $r['Quantity'] ."</td><td>". $r['Total'] ."</td><td>". $r['Status'] ."</td></tr>";
        }	
        mysql_close($con);
            
        ?>
		
	</table>

</form>
	
</body>

</html>