<html>
<head>
<link rel="stylesheet" type="text/css" href="Style.css"></link>
</head>

<body id="bdy">

	

	<?php

    include('HeaderUser.php');
	
	include('Db.php');
	?>
	<form action="ViewproductDescription.php" method="post">
        <div style="text-align:center; margin-top:70px;">
              
            <?php
if(!isset($_SESSION["Search"]))
{
$_SESSION["Search"]='';
}
            if(isset($_SESSION["Category"])){
                 $query = mysql_query("Select ProductId, ProductName, SellingPrice, Image From StockTable Where Quantity > 0 and ProductName LIKE '". "%" . $_SESSION["Search"] . "%" ."' and Category LIKE '". "%" . $_SESSION["Category"] . "%" ."' ",$con);
            }
            else{
                 $query = mysql_query("Select ProductId, ProductName, SellingPrice, Image From StockTable Where Quantity > 0 and ProductName LIKE '". "%" . $_SESSION["Search"] . "%" ."' ",$con);
            }

           
            While($r = mysql_fetch_array($query))
            {
                echo "<h3>Product Name:</h3>" . $r['ProductName'];
                echo "<br><br> <img src = 'Image/Product/". $r['Image'] . "' Height='150px' Width='200px' />";
                echo "<h3>Price: " . $r['SellingPrice'] . "</h3>";
                echo "<input type='submit' name='" . $r['ProductId'] . "' value='View' class='btn_submit'/><br><br><hr>";
            }
            mysql_close($con);
            ?>
        </div>	
    </form>
	
</body>

</html>