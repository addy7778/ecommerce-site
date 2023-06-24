<html>
<head>
<link rel="stylesheet" type="text/css" href="Style.css"></link>
</head>

<body id="bdy-main">

	<?php
	include('HeaderUser.php');
	include('Db.php');

	$query = mysql_query("Select * From UserTable Where UserID = '" . $_SESSION["username"] ."' ",$con);
    $r = mysql_fetch_array($query);

	?>

	<form action="UpdateUserCode.php" method="post">
		<table class="tbl" align="center">
			<tr>
				<td colspan="2" class="heading">PROFILE UPDATION</td>
			</tr>
			<tr>
				<td><br></td> 
			</tr>
			<tr>
				<td align="right">Name:</td> <td><input type="text" name="txtName" value='<?php echo $r['UserName'];  ?>' Required/></td>
			</tr>
			<tr>
				<td align="right">Delivery Address:</td> <td><textarea name="txtAddress" Required><?php echo $r['Address'];  ?></textarea></td>
			</tr>
			<td align="right">District:</td>
				<td>
					 <select name="ddDistrict" Required>
                         <option value="">Select</option>
                         <option value="Erode" <?php if(isset($r['District']) == 'Erode' ) { echo " selected "; } ?> >Erode</option>
                         <option value="Salem" <?php if(isset($r['District']) == 'Salem' ) { echo " selected "; } ?> >Salem</option>
                         <option value="karur" <?php if(isset($r['District']) == 'karur' ) { echo " selected "; } ?> >Karur</option>
                         <option value="Namakkal" <?php if(isset($r['District']) == 'Namakkal' ) { echo " selected "; } ?> >Namakkal</option>
                         <option value="Coimbatore" <?php if(isset($r['District']) == 'Coimbatore' ) { echo " selected "; } ?> >Coimbatore</option>
					</select> 
				</td>
			</tr>
			<tr>
				<td align="right">Contact No:</td> <td><input type="text" pattern="[0-9]{10}" name="txtContactNo" value='<?php echo $r['ContactNo'];  ?>' Required/></td>
			</tr>
			<tr>
				<td align="right">Mail Id:</td> <td><input type="email" name="txtMailId" value='<?php echo $r['EmailID'];  ?>' Required/></td>
			</tr>
			<tr>
				<td></td> <td><input type="submit" name="btnSubmit" value="Update" class="btn_submit" style="width:147px;" /></td>
			</tr>
		</table>
	</form>
			

</body>

</html>