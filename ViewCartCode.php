<?php
	include('Db.php');

	session_start();
	
    $Id = "";
    foreach($_POST as $name => $content){
    $Id = $name;
    }
	//$Id = array_keys($_POST)[0];
	
	if($Id == 'btnOrder')
	{
		$query= mysql_query("Select MAX(InvoiceNo) as max From SaleMaster", $con);
		$row = mysql_fetch_array($query);
		$InvoiceNo=$row['max']+1;
        
        $query= mysql_query("Select UserName From UserTable Where UserID = '". $_SESSION['username'] ."' ", $con);
		$row = mysql_fetch_array($query);
		$UserName=$row['UserName'];
		
		$Sno;
		$ProductID;
		$ProductName;
		$Price;
		$Quantity;
		$Total;
        $GrandQuantity=0;
		$GrandTotal=0;


		$qry=mysql_query("Select * From CartTable Where UserID = '". $_SESSION['username'] ."' ");
		while($r=mysql_fetch_array($qry))
		{
			$query= mysql_query("Select MAX(Sno) as max From SaleTrans", $con);
			$row = mysql_fetch_array($query);
			$Sno=$row['max']+1;
			
			$ProductID = $r['ProductID'];
			$ProductName = $r['ProductName'];
			$Price = $r['Price'];
			$Quantity = $r['Quantity'];
			$Total = $Price * $Quantity;
            $GrandQuantity += $Quantity;
            $GrandTotal += $Total; 
			
			$query = "Insert Into SaleTrans Values('". $Sno ."','". $InvoiceNo ."','". $ProductID ."','". $ProductName ."','". $Price ."','". $Quantity ."','". $Total ."')";
			mysql_query($query,$con) or die(mysql_error());
		}
        
        $query = "Insert Into SaleMaster Values('". $InvoiceNo ."','". $_SESSION['username'] ."','". $UserName ."','". date('Y-m-d H:i:s') ."','". $GrandQuantity ."','". $GrandTotal ."','PENDING','','')";
        mysql_query($query,$con) or die(mysql_error());
        
        $query = "Delete From CartTable Where UserID = '". $_SESSION['username'] ."' ";
        mysql_query($query,$con) or die(mysql_error());
        
	}
	else
	{
		$qry="Delete From CartTable Where Sno = '". $Id ."' ";
		mysql_query($qry,$con) or die(mysql_error());
	}
	header('location:ViewCart.php');
?>