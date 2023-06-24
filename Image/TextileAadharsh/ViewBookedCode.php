<html>
<head>
<link rel="stylesheet" type="text/css" href="Style.css"></link>
</head>

<body id="bdy">

<?php

    include('HeaderAdmin.php');
    include('Db.php');

    $Id = "";
    foreach($_POST as $name => $content){
    $Id = $name;
    }

    $SplitedName = explode('-', $Id);
                    
    if($SplitedName[0] == "@")
    {

    ?>

        <table class="mygrid" align="center">
        
        <tr><td colspan="10">BOOKED ITEM DETAILS<br><br><td><tr>
        <tr><th>InvoiceNo</th><th>ProductID</th><th>ProductName</th><th>Price</th><th>Quantity</th><th>Total</th></tr>
        
        <?php
            
        $query = mysql_query("Select * From SaleTrans Where InvoiceNo = '". $SplitedName[1] ."' ", $con);
        while($r = mysql_fetch_array($query))
        {
            echo "<tr><td>" . $r['InvoiceNo'] . "</td><td>" . $r['ProductID'] . "</td><td>" . $r['ProductName'] . "</td><td>" . $r['Price'] . "</td><td>" . $r['Quantity'] . "</td><td>" . $r['Total'] ."</td></tr>";
        }   
        mysql_close($con);
            
        ?>
        
    </table>

    <?php
       
    }
    else 
    {

        $query = mysql_query("Select * From SaleTrans Where InvoiceNo = '". $Id ."' ", $con);
        while($r = mysql_fetch_array($query))
        {
            $subquery = "Update StockTable Set Quantity = Quantity - '". $r['Quantity'] ."' Where ProductID = '". $r['ProductID'] ."' ";
            mysql_query($subquery,$con) or die(mysql_error());
        }

        $query = "Update SaleMaster Set Status = 'DELIVERED' Where InvoiceNo = '". $Id ."' ";
        mysql_query($query,$con) or die(mysql_error());

        header('location:ViewBooked.php');

    }

?>

</body>
</html>