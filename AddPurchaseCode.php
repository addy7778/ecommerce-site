<?php
	include('Db.php');
	
	$InvoiceNo=$_POST["txtInvoiceNo"];
	$Supplier=$_POST["ddSupplier"];
	$Product=$_POST["ddProduct"];
	$ExpiryDate=$_POST["txtExpiryDate"]; 
	$PurchasePrice=$_POST["txtPurchasePrice"]; 
	$Tax=$_POST["txtTax"]; 
	$SellingPrice=$_POST["txtSellingPrice"];
	$Quantity=$_POST["txtQuantity"]; 
	$Total=$_POST["txtTotal"]; 
	
	$qry="Insert Into PurchaseTable Values('". $InvoiceNo ."','". $Supplier ."','". $Product ."','". $PurchasePrice ."','". $Tax ."','". $Quantity ."','". $Total ."')";
	if(mysql_query($qry,$con))
	{
		$qry="Update StockTable Set Quantity = Quantity + '". $Quantity ."' Where ProductID = '". $Product ."' ";
		mysql_query($qry,$con) or die(mysql_error());
		
		$qry="Update StockTable Set PurchasePrice = '". $PurchasePrice ."' Where ProductID = '". $Product ."' ";
		mysql_query($qry,$con) or die(mysql_error());

		$qry="Update StockTable Set ExpiryDate = '". $ExpiryDate ."' Where ProductID = '". $Product ."' ";
		mysql_query($qry,$con) or die(mysql_error());
		
		$qry="Update StockTable Set Tax = '". $Tax ."' Where ProductID = '". $Product ."' ";
		mysql_query($qry,$con) or die(mysql_error());
		
		$qry="Update StockTable Set SellingPrice = '". $SellingPrice ."' Where ProductID = '". $Product ."' ";
		mysql_query($qry,$con) or die(mysql_error());
	}
	else
	{
		die(mysql_error());
	}
    mysql_close($con);
	header('location:AddPurchase.php');
?>