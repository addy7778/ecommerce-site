<html>
<head>
<link rel="stylesheet" type="text/css" href="Style.css"></link>
    <script type="text/javascript">
    function Message() {
        alert ("Update Successfully!");
    }
    </script>
</head>

<body id="bdy">

	<?php
	include('HeaderAdmin.php');
	include('Db.php');
	?>
		
	<form action="UpdatePriceCode.php" method="post" enctype="multipart/form-data">
		<table class="tbl" align="center">
			<tr>
				<td colspan="2" class="heading">PRICE UPDATE</td>
			</tr>
			<tr>
				<td><br></td> 
			</tr>
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
				<td align="right">Selling Price:</td> <td><input type="text" name="txtSellingPrice" Required pattern="[0-9]*"/></td>
			</tr>
			<tr>
				<td></td> <td><input type="submit" name="btnSubmit" value="Submit" class="btn_submit" style="width:147px;"/></td>
			</tr>
		</table>
	</form>

</body>

</html>