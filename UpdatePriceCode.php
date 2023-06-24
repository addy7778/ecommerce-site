<?php
	include('Db.php');
	
	$Product=$_POST["ddProduct"];
	$SellingPrice=$_POST["txtSellingPrice"];
	
	$qry="Update StockTable Set SellingPrice = '". $SellingPrice ."' Where ProductID = '". $Product ."' ";
	mysql_query($qry,$con) or die(mysql_error());
	
    mysql_close($con);
	header('location:ViewStock.php');
?>