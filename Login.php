<html>
<head>
<link rel="stylesheet" type="text/css" href="Style.css"></link>
</head>

<body id="bdy-main">

	<?php
	include('Header.php');
	?>
	<form action="LoginCode.php" method="post">
		<table class="tbl" align="center" class="login-style">
			<tr>
				<td>User ID:<br><input type="text" name="txtUsername" placeholder=" User ID" Style="width:250px;" Required/></td>
			</tr>
			<tr>
				<td>Password:<br><input type="password" name="txtPassword" placeholder=" Password" Style="width:250px;" Required/></td>
			</tr>
			<tr> 
				<td>(Type):<br>
					 <select Style="width:250px;" name="ddType">
					  <option value="admin">Admin</option>
					  <option value="user">User</option>
					</select> 
				</td>
			</tr>
			
			<tr>
				<td><br><input type="submit" name="btnSubmit" Style="width:250px;" value="Login" class="btn_submit"/></td>
			</tr>

			<tr>
				<td style="text-align: center;">
					<br>
					<a href="ForgotPassword.php" style="color: blue; text-decoration: underline;"><br/>Forgot Password</a>
				</td>
			</tr>
		</table>



	</form>

</body>

</html>