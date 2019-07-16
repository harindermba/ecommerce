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
			<a href="index.php"><img id="logo" src="images/logo.png" alt="logo"></a>
			<img id="ad_banner" src="images/ad_banner.gif" alt="ad_banner">
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
                    <input type="submit" name="search" value="Search">
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
                    <?php
                    if (isset($_GET['search'])){
                        $search_query = $_GET['user_query'];
                        $get_pro = "SELECT * FROM products WHERE product_keyword LIKE '%$search_query%'";
        		        $run_pro = mysqli_query($conn, $get_pro);
    		    		while ($row_pro = mysqli_fetch_array($run_pro)) {
    		    			$pro_id    = $row_pro['product_id'];
    					 	$pro_cat   = $row_pro['product_cat'];
    					 	$pro_brand = $row_pro['product_brand'];
    					 	$pro_title = $row_pro['product_title'];
    					 	$pro_price = $row_pro['product_price'];
    					 	$pro_img   = $row_pro['product_img'];
    					 	echo "<div id='single_product'>
    					 	<h3>$pro_title</h3>
    					 	<img src='admin-area/product_images/$pro_img' width='180' height='180'>
    					 	<p><b>$ $pro_price</b></p>
    					 	<a href='details.php?pro_id=$pro_id' style='float:left;'>Details</a>
    					 	<a href='index.php?pro_id=$pro_id'><button style='float:right'>Add to Cart</button></a>
    					 	</div>";
					    }
                    } 
                    ?>
                         
                </div>
            </div>
        </div>
        <div id="footer">
            <h2 style="text-align: center;padding-top: 20px;">&copy;2019 by www.opencubicles.com</h2>
        </div>
    </div>
</body>
</html>