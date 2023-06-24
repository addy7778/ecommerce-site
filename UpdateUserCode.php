<?php
	include('Db.php');
	session_start();
	
	$Id=$_SESSION["username"];
	$Name=$_POST["txtName"];
	$Address=$_POST["txtAddress"];
	$District=$_POST["ddDistrict"];
	$ContactNo=$_POST["txtContactNo"];
	$MailId=$_POST["txtMailId"];
		
	$qry="Update UserTable Set UserName = '". $Name ."', Address = '". $Address ."', District = '". $District ."', ContactNo = '". $ContactNo ."', EmailID = '". $MailId ."' Where UserID = '". $Id ."' ";
	mysql_query($qry,$con) or die(mysql_error());
    header('location:UpdateUser.php');
	mysql_close($con);
?>