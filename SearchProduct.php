<html>
<head>
<link rel="stylesheet" type="text/css" href="Style.css"></link>
</head>

<body id="bdy">
	
	<?php

    include('HeaderUser.php');
	
	include('Db.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        $_SESSION["Search"] = $_REQUEST['txtSearch'];
     	$_SESSION["Category"] = $_REQUEST['ddCategory'];
        header('location:ViewProduct.php');
    }   

	?>

	<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
        <div style="text-align:center; margin-top:50px;">
        <input type="text" name="txtSearch" style="width: 300px;"/> 

		<select name="ddCategory">
             <option value="">All Category</option>
             <option value="Jeans">(Jeans)</option>
  <option value="Pant">(Pant)</option>
             <option value="Shirt">(Shirt)</option>
             <option value="T-Shirt">(T-Shirt)</option>
             <option value="Saree">(Saree)</option>
<option value="Chudithar">(Chudithar)</option>
<option value="Lehanga">(Lehanga)</option>
         
		</select> 

        <br/>
        <br/>
        <input type="submit" value="Search"style="width:200px;" class="btn_submit"/>
        </div>	
    </form>
	
</body>

</html>