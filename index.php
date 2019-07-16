<!DOCTYPE>
<?php 
include('function/functions.php');

?>
<html>
<head>
	<title>My Shop</title>
	<link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<body>
	<div class="main-wrapper">
		<div class="header-wrapper">
			<a href="index.php"><img id="logo" src="images/logo.jpg" width="1000" height="150" alt="logo"></a>
			

    	</div>
    	<div class="menubar">
            <ul id="menu">
                <li><a href="index.php">Home</a></li>
                <li><a href="all_products.php">All Products</a></li>
                <li><a href="customer/my_account.php">My Account</a></li>
                <li><a href="">Sign Up</a></li>
                <li><a href="cart.php">Shopping Cart</a></li>
                <li><a href="#">Contact Us</a></li>
            </ul>
            <div id="form">
                <form method="get" action="results.php" enctype="multipart/form-data">
                    <input type="text" name="user_query" placeholder="Search">
                    <input type="submit" name="search" value="Search  ">
                </form>
            </div>   
        </div>
    	<div class="content-wrapper">
    		<div id="sidebar">
                <div id="sidebar_title">Categories</div>
                <ul id="cats">

                    <?php get_cats(); ?>
                </ul>
                <div id="sidebar_title">Brands</div> 
                <ul id="cats">
                    <?php get_brands(); ?>
                    
                </ul>
            </div>
            <div id="content_area">
                <div id="shoping_cart">
                    <span class="welcome_guest">Welcome Guest!<b style="color:yellow;">Shopping Cart </b>Total Price:  Total Items <a href="cart.php">Go to Cart</a></span>
                </div>
                <div id="products_box">
                    <?php get_pro(); ?>
                    <?php get_cat_pro(); ?>
                    <?php get_brand_pro();?>
                         
                </div>
            </div>
        </div>
        <div id="footer">
            <h2 style="text-align: center;padding-top: 20px;">&copy;2019 by www.opencubicles.com</h2>
        </div>
    </div>
</body>
</html>