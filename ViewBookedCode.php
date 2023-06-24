<?php
	$con = mysql_connect("localhost","root",'');
	mysql_select_db("e_commerce", $con);
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}

    $Id = "";
    foreach($_POST as $name => $content){
    $Id = $name;
    }
	//$Id = array_keys($_POST)[0];
	$qry="Update  salemaster Set Status='Cancelled' Where InvoiceNo = '". $Id ."' ";
	mysql_query($qry,$con) or die(mysql_error());
	header('location:ViewStatus.php');
?>