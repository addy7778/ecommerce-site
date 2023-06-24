<?php
    session_start();
    include('Db.php');
	
	$Username = $_POST["txtUsername"];
	$Password = $_POST["txtPassword"];
	$Type = $_POST["ddType"];
	
	if($Type == "admin"){
		$query= mysql_query("Select Count(*) as data From LoginTable Where Username = '". $Username ."' and Password = '". $Password ."' ", $con);
		$row = mysql_fetch_array($query);
		if($row['data']==1){
			$_SESSION["username"] = $Username;
            header('location:HomeAdmin.php');
		}
		else{
            header('location:Login.php');
		}
	}
	else{
	$query= mysql_query("Select Count(*) as data From UserTable Where UserID = '". $Username ."' and Password = '". $Password ."' ", $con);
		$row = mysql_fetch_array($query);
		if($row['data']==1){
			$_SESSION["username"]=$Username;
			header('location:HomeUser.php');
		}
		else{
            header('location:Login.php');
		}
	}
	mysql_close($con);
?>