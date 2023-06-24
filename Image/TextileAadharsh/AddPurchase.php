<html>
<head>
<link rel="stylesheet" type="text/css" href="Style.css"></link>
    <script type="text/javascript">
    function Message() {
        alert ("Product Added Successfully!");
    }
	
	function total()
	{
		document.getElementsByName('txtTotal')[0].value = (document.getElementsByName('txtPurchasePrice')[0].value) * (document.getElementsByName('txtQuantity')[0].value);
	}
    </script>
</head>

<body id="bdy">

	<?php
	include('HeaderAdmin.php');
	include('Db.php');
	?>
		
	<form action="AddPurchaseCode.php" method="post" enctype="multipart/form-data">
		<table class="tbl" align="center">
			<tr>
				<td colspan="2" class="heading">PURCHASE INVOICE</td>
			</tr>
			<tr>
				<td><br></td> 
			</tr>
			<tr>
				<td align="right">Invoice No:</td> <td><input type="text" name="txtInvoiceNo" Required/></td>
			</tr>
			<tr>
				<td align="right">SupplierID:</td> 
				<td>
				<select name="ddSupplier" Required>
				<?php
				$query = mysql_query ("Select SupplierID, CompanyName From SupplierTable",$con);
				echo "<option value=''>Select</option>";
				while($r = mysql_fetch_array($query))
				{
					echo "<option value= ".$r['SupplierID']. ">".$r['CompanyName']."</option>";
				}
				?>
				</select>
				</td>
			</tr>
			<tr> 
			<td align="right">ProductID:</td>
				<td>
				<select name="ddProduct" Required>
				<?php
				$query = mysql_query ("Select ProductID, ProductName From StockTable",$con);
				echo "<option value=''>Select</option>";
				while($r = mysql_fetch_array($query))
				{
					echo "<option value= ".$r['ProductID']. ">".$r['ProductName']."</option>";
				}
				?>
				</select>
				</td>
			</tr>
			<tr>
				<td align="right">Date:</td> <td><input type="date" name="txtExpiryDate" Required/></td>
			</tr>
			<tr>
				<td align="right">Purchase Price:</td> <td><input type="text" name="txtPurchasePrice" OnInput="total();" Required pattern="[0-9]*"/></td>
			</tr>
			<tr>
				<td align="right">Tax:</td> <td><input type="text" name="txtTax"  Required pattern="[0-9]*"/></td>
			</tr>
			<tr>
				<td align="right">Selling Price:</td> <td><input type="text" name="txtSellingPrice" Required pattern="[0-9]*"/></td>
			</tr>
			<tr>
				<td align="right">Quantity:</td> <td><input type="text" name="txtQuantity" OnInput="total();" Required pattern="[0-9]*"/></td>
			</tr>
			<tr>
				<td align="right">Total:</td> <td><input type="text" name="txtTotal" Required pattern="[0-9]*"/></td>
			</tr>
			<tr>
				<td></td> <td><input type="submit" name="btnSubmit" value="Submit" class="btn_submit" style="width:147px;"/></td>
			</tr>
		</table>
	</form>

</body>

</html>