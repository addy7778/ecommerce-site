<html>
<head>
<link rel="stylesheet" type="text/css" href="Style.css"></link>
</head>

<body id="bdy">

	<?php
		include('HeaderAdmin.php');
		include('Db.php');
		$query= mysql_query("Select Count(*)+1 as data From SupplierTable", $con);
		$row = mysql_fetch_array($query);
		$Id="S" . sprintf("%03d",$row['data']);
	?>
	
	<form action="AddSupplierCode.php" method="post">
		<table class="tbl" align="center">
			<tr>
				<td colspan="2" class="heading">NEW SUPPLIER ENTRY</td>
			</tr>
			<tr>
				<td><br></td> 
			</tr>
			<tr>
				<td align="right">Supplier ID:</td> <td><input type="text" name="txtId" value="<?php echo $Id; ?>" Required/></td>
			</tr>
			<tr>
				<td align="right">Supplier Name:</td> <td><input type="text" name="txtSupplierName" Required/></td>
			</tr>
			<tr>
				<td align="right">Company Name:</td> <td><input type="text" name="txtCompanyName" Required/></td>
			</tr>
			<tr>
				<td align="right">Address:</td> <td><textarea name="txtAddress" Required></textarea></td>
			</tr>
			<tr>
				<td align="right">Contact No:</td> <td><input type="text" name="txtContactNo" Required/></td>
			</tr>
			<tr>
				<td align="right">Mail ID:</td> <td><input type="text" name="txtMailId" Required/></td>
			</tr>
			<tr>
				<td></td> <td><input type="submit" name="btnSubmit" value="Submit" class="btn_submit" style="width:147px;"/></td>
			</tr>
		</table>
	</form>
			

</body>

</html>