<?php
	include('Db.php');
	
	$Id=$_POST["txtId"];
	$Name=$_POST["txtName"];
	$Category=$_POST["ddCategory"];
	$Unit=$_POST["ddUnit"];
	$Description=$_POST["txtDescription"]; 
	$ReOrderLevel=$_POST["txtReOrderLevel"]; 
	$file_name = "";
	
	if(isset($_FILES['fileUploader']))
	{
		$nameforExt = $_FILES['fileUploader']['name'];
		$ext = pathinfo($nameforExt, PATHINFO_EXTENSION);
        
        $file_name = $Id . '.' . $ext;
        $file_tmp =$_FILES['fileUploader']['tmp_name'];
        move_uploaded_file($file_tmp,"Image/Product/".$file_name);

	}
		
	$qry="Insert Into StockTable Values('". $Id ."','". $Name ."','". $Category ."','". $Unit ."',0,0,0,0,'". $ReOrderLevel ."','','". $file_name ."','". $Description ."')";
	mysql_query($qry,$con) or die(mysql_error());
    mysql_close($con);
	header('location:AddProduct.php');
?>