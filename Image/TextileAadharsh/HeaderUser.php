<p class="logo">SANJEEVI TEXTILES</p>


<?php

	session_start();
    if($_SESSION["username"] == '')
    {
    	echo"<div class='navbar'>
				<a href='index.php'>Search</a>
				<a href='Login.php'>Login</a>
				<a href='Registration.php'>Registration</a>
			</div>";
    }
    else
    {

    	echo"<div class='navbar'>

			  	<a href='SearchProduct.php'>Search</a>
    			<a href='ViewCart.php'>Cart</a>

    			<div class='dropdown'>
				    <button class='dropbtn'>MyAccount</button>
				      <div class='dropdown-content'>
				        <a href='ViewStatus.php'>MyOrders</a>
				        <a href='UpdateUser.php'>Profile Update</a>
				        <a href='ChangePassword.php'>Change Password</a>
				        <a href='Login.php'>Logout</a>
				      </div>
			  	</div>

			</div>";
    
    }
    
?>
