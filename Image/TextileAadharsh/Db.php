 <?php
    $con = mysql_connect("localhost","root","");
	mysql_select_db("e_commerce", $con);
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}
?>