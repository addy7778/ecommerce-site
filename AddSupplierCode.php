<?php
	include('Db.php');
	
	$Id=$_POST["txtId"];
	$SupplierName=$_POST["txtSupplierName"];
	$CompanyName=$_POST["txtCompanyName"];
	$Address=$_POST["txtAddress"];
	$ContactNo=$_POST["txtContactNo"];
	$MailId=$_POST["txtMailId"];
		
	$qry="Insert Into SupplierTable Values('". $Id ."','". $SupplierName ."','". $CompanyName ."','". $Address ."','". $ContactNo ."','". $MailId ."')";
	mysql_query($qry,$con) or die(mysql_error());
    header('location:AddSupplier.php');
	mysql_close($con);
?>