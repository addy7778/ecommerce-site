<?php
	include('Db.php');
	
	$Id=$_POST["txtId"];
	$Name=$_POST["txtName"];
	$Address=$_POST["txtAddress"];
	$District=$_POST["ddDistrict"];
	$ContactNo=$_POST["txtContactNo"];
	$MailId=$_POST["txtMailId"];
	$Password=$_POST["txtPassword"];
		
	$qry="Insert Into UserTable Values('". $Id ."','". $Name ."','". $Address ."','". $District ."','". $ContactNo ."','". $MailId ."','". $Password ."')";
	mysql_query($qry,$con) or die(mysql_error());
	echo '<script>alert("Profile Update..!")<\script>';
    header('location:Registration.php');

	mysql_close($con);
?>