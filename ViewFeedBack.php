<?php
session_start();
	$con = mysql_connect("localhost","root",'');
	mysql_select_db("e_commerce", $con);
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}
	
	
	//echo "<html>
echo "<head><link rel='stylesheet' href='css/bootstrap.min.css'> <script src='css/jquery.min.js'></script>  <script src='css/bootstrap.min.js'></script>  <link rel='stylesheet' href='css/all.css'>  <link rel='stylesheet' type='text/css' href='style.css' /><link rel='stylesheet' type='text/css' href='mystyle.css'></link></head><body><form method='post' >";
include('headerAdmin.php');
echo "<center>";


echo "	<table style='width:1000px; margin-left:auto; margin-right:auto;'>";
echo "			<tr><td>";

echo "</td>";
			

echo "<td valign='top' align='center'>";
	echo "<h1 align=center>FEEDBACK DETAILS</h1>";
	echo "<table border=1 width=75% cellpadding='1' cellspacing='0'>";
?>


<?php 	
	echo "</table>";
		

$sql="select * from feedbacks";

	$rs= mysql_query($sql,$con);
	echo "<table border=1 width=75% cellpadding='1' cellspacing='0'>";
	
	echo "<tr><th>FeedbackId</th><th>Rating</th><th>PersonName</th><th>ContactNo</th><th>FeedbackAbout</th><th>FeedbackDescription</th></tr>";
	
	
while($row = mysql_fetch_array($rs))
{
echo "<tr>
	<td> " . $row['FeedbackId']. "</td>
	<td> " . $row['FeedbackDate']. "</td>
	<td> " . $row['PersonName']. "</td>
	<td> " . $row['ContactNo']. "</td>
	<td> " . $row['FeedbackAbout']. "</td>
	<td> " . $row['FeedbackDescription']. "</td>
	


	</tr>";
}
	
echo "</table>";
	
	echo "</td></tr></table></center></form></body></html>";
	mysql_close($con);
?>