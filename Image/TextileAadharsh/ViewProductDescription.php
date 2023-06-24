<html>
<head>
<link rel="stylesheet" type="text/css" href="Style.css"></link>
</head>

<body id="bdy">
	
    <?php
   include('HeaderUser.php');
    ?>

    <form action="AddToCart.php" method="post">
    <div style="text-align:left; margin-top:20px;">
        <?php
            include('Db.php');

            $Id = "";
            foreach($_POST as $name => $content){
            $Id = $name;
            }
            //$Id = array_keys($_POST)[0];

            $query = mysql_query("Select * From StockTable Where ProductId = '". $Id ."' ",$con);
            if($r = mysql_fetch_array($query))
            {
                echo "<table style='text-align:left;' cellspacing='50px'><tr><td Width='350px'>";
                echo "<h3>" . $r['ProductName']. "</h3>";
                echo "<br><br> <img src = 'Image/Product/". $r['Image'] . "' Height='250px' Width='300px' /></td>";
                echo "<td><p><strong>Category:</strong> " . $r['Category'] . "</p>";
                echo "<p><strong>Price:</strong> " . $r['SellingPrice'] . "</p>";
                echo "<p><strong>Size:</strong> " . $r['Unit'] . "</p>";
                echo "<p><strong>Expiry:</strong> " . $r['ExpiryDate'] . "</p>";
                echo "<p>" . $r['Desc'] . "</p>";
                
                echo "<p>Quantity:  <input type='text' name='txtQuantity' style='Height:40px; Width:60px;' /></p>";
                echo "<input type='submit' name='" . $Id . "' value='Add To Cart' class='btn_submit'/><br><br></td>";
                echo "</tr></table>";
            }
            mysql_close($con);
        ?>
    </div>	
    </form>
	
</body>

</html>