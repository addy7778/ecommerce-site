<?php
    session_start();

    if($_SESSION["username"] == '')
    {
        header('location:Login.php');
    }
    else
    {

	include('Db.php');
    $query= mysql_query("Select MAX(Sno) as max From CartTable", $con);
    $row = mysql_fetch_array($query);
    $Id=$row['max']+1;

	$UserId=$_SESSION["username"];
    $ProductId = '';
    $ProductName = '';
    $Quantity=$_POST["txtQuantity"];
    $Price='';


    // checking for (-) values in quantity
    if($Quantity <= 0)
    {
        echo "Invalid Quantity";
        return;
    }


    foreach($_POST as $name => $content){
    $ProductId = $name;
    }

    // checking for stock availability
    $query = mysql_query("Select Quantity From StockTable Where ProductID = '". $ProductId ."' ",$con);
    $row = mysql_fetch_array($query);
    if($row['Quantity'] < $Quantity)
    {
         echo "Insufficient Stock";
        return;
    }


    $query = mysql_query("Select * From StockTable Where ProductId = '". $ProductId ."' ",$con);
    if($r = mysql_fetch_array($query))
    {
        $ProductName = $r['ProductName'];
        $Price = $r['SellingPrice'];
    }
    $Total = $Price * $Quantity;
		
	$qry="Insert Into CartTable Values('". $Id ."','". $UserId ."','". $ProductId ."','". $ProductName ."','". $Price ."','". $Quantity ."', '". $Total ."')";
	mysql_query($qry,$con) or die(mysql_error());
    header('location:ViewProduct.php');
	mysql_close($con);
    }
?>