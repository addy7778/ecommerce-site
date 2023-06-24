<html>
<head>
<link rel="stylesheet" type="text/css" href="Style.css"></link>
</head>

<body id="bdy">

	<?php
	include('HeaderAdmin.php');
	include('Db.php');
	
	$query= mysql_query("Select Count(*)+1 as cnt From StockTable", $con);
	$row = mysql_fetch_array($query);
	$Id="P" . sprintf("%03d",$row['cnt']);
	?>
		
	<form action="AddProductCode.php" method="post" enctype="multipart/form-data">
		<table class="tbl" align="center">
			<tr>
				<td colspan="2" class="heading">NEW ITEM</td>
			</tr>
			<tr>
				<td><br></td> 
			</tr>
			<tr>
				<td align="right">Id:</td> <td><input type="text" name="txtId" value="<?php echo $Id; ?>"/></td>
			</tr>
			<tr>
				<td align="right">Name:</td> <td><input type="text" name="txtName" Required/></td>
			</tr>
			<tr> 
			<td align="right">Category:</td>
				<td>
					 <select name="ddCategory" Required>
                         <option value="">All Category</option>
             <option value="Jeans">(Jeans)</option>
             <option value="Shirt">(Shirt)</option>
             <option value="T-Shirt">(T-Shirt)</option>
             <option value="Saree">(Saree)</option>
<option value="Chudithar">(Chudithar)</option>
<option value="Lehanga">(Lehanga)</option></option>
                        
					</select> 
				</td>
			</tr>
			<td align="right">Size:</td>
				<td>
					 <select name="ddUnit" Required>
					 	 <option value="">Select</option>
                         <option value="XS">XS</option>
                         <option value="S">S</option>
                         <option value="M">M</option>
                         <option value="L">L</option>
                         <option value="XL">XL</option>
                         <option value="XXL">XXL</option>
 	<option value="XXXL">XXXL</option>
					</select> 
				</td>
			</tr>
			<tr>
				<td align="right">Reorder Level:</td> <td><input type="text" name="txtReOrderLevel" Required pattern="[0-9]*"/></td>
			</tr>
			<tr>
				<td align="right">Image:</td> <td><input type="file" name="fileUploader" id="fileUploader" Required/></td>
			</tr>
			<tr>
				<td align="right">Description:</td> <td><textarea name="txtDescription" Required></textarea></td>
			</tr>
			<tr>
				<td></td> <td><input type="submit" name="btnSubmit" value="Submit" class="btn_submit" style="width:147px;"/></td>
			</tr>
		</table>
	</form>

</body>

</html>