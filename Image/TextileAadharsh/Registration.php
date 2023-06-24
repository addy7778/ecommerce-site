<html>
<head>
<link rel="stylesheet" type="text/css" href="Style.css"></link>
<script type="text/javascript">
function Message() {
    alert ("Registration successfull!");
}
</script>
</head>

<body id="bdy-main">

	<?php
		include('Header.php');
		include('Db.php');
		$query= mysql_query("Select Count(*)+1 as data From UserTable", $con);
		$row = mysql_fetch_array($query);
		$Id="U" . sprintf("%03d",$row['data']);
	?>
	
	<form action="RegistrationCode.php" method="post">
		<table class="tbl" align="center">
			<tr>
				<td colspan="2" class="heading">USER REGISTRATION</td>
			</tr>
			<tr>
				<td><br></td> 
			</tr>
			<tr>
				<td align="right">User ID:</td> <td><input type="text" name="txtId" value="<?php echo $Id; ?>"/></td>
			</tr>
			<tr>
				<td align="right">Name:</td> <td><input type="text" name="txtName" Required/></td>
			</tr>
			<tr>
				<td align="right">Address:</td> <td><textarea name="txtAddress"  Required></textarea></td>
			</tr>
			<td align="right">District:</td>
				<td>
					 <select name="ddDistrict" Required>
                         <option value="">Select</option>
                         <option value="Erode">Erode</option>
                         <option value="Salem">Salem</option>
                         <option value="karur">Karur</option>
                         <option value="Namakkal">Namakkal</option>
                         <option value="Coimbatore">Coimbatore</option>
					</select> 
				</td>
			</tr>
			<tr>
				<td align="right">Contact No:</td> <td><input type="text" pattern="[0-9]{10}" name="txtContactNo" Required/></td>
			</tr>
			<tr>
				<td align="right">Mail Id:</td> <td><input type="email" name="txtMailId" Required/></td>
			</tr>
			<tr>
				<td align="right">Password:</td> <td><input type="password" name="txtPassword" Required  /></td>
			</tr>
			<tr>
				<td></td> <td><input type="submit" name="btnSubmit" value="Submit" class="btn_submit" style="width:147px;" /></td>
			</tr>
		</table>
	</form>
			

</body>

</html>