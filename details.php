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
			<img id="logo" src="images/logo.png" alt="logo">
			<img id="ad_banner" src="images/ad_banner.gif" alt="ad_banner">

    	</div>
    	<div class="menubar">
            <ul id="menu">
                <li><a href="#">Home</a></li>
                <li><a href="#">All Products</a></li>
                <li><a href="#">My Account</a></li>
                <li><a href="#">Sign Up</a></li>
                <li><a href="#">Shopping Cart</a></li>
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
                    <span class="welcome_guest">Welcome Guest! <b style="color:yellow;">Shopping Cart </b>Total Price:  Total Items <a href="cart.php">Go to Cart</a></span>
                </div>
                <div id="products_box">
                     <?php get_pro_details(); ?>
                </div>
            </div>
        </div>
        <div id="footer">
            <h2 style="text-align: center;padding-top: 20px;">&copy;2019 by www.opencubicles.com</h2>
        </div>
    </div>
</body>
</html>