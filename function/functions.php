<?php
//getting the categories
$conn = mysqli_connect("localhost","newuser","password","ecommerce_pro");
function get_cats(){
    global $conn;
    
	$get_cats = "SELECT * FROM categories";

	$run_cats = mysqli_query($conn,$get_cats); 

	while ($row_cats= mysqli_fetch_array($run_cats)) {
		$cat_id = $row_cats['cat_id'];
		$cat_title = $row_cats['cat_title'];
		echo "<li><a href='index.php?cat=$cat_id'>$cat_title</a></li>";
	}

}
// getting brands 
function get_brands(){
	global $conn;
    
	$get_brands = "SELECT * FROM brands";

	$run_brands = mysqli_query($conn, $get_brands);

	while ($row_brands = mysqli_fetch_array($run_brands)) {
		$brand_id = $row_brands['brand_id'];
		$brands_title = $row_brands['brand_title'];
		echo "<li><a href='index.php?brand=$brand_id'>$brands_title</a></li>";
	}
}

function get_pro(){
	
    if (!isset($_GET['cat'])){
    	global $conn;
    	if(!isset($_GET['brand'])){
    		$get_pro = "SELECT * FROM products ORDER BY RAND() LIMIT 0,6";
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
			 	<p><b>Price: $ $pro_price</b></p>
			 	<a href='details.php?pro_id=$pro_id' style='float:left;'>Details</a>
			 	<a href='index.php?add_cart=$pro_id'><button style='float:right'>Add to Cart</button></a>
			 	</div>";
			}
		}
	}
}
function get_cat_pro(){
	
 
	if (isset($_GET['cat'])){
		
		$cat_id = $_GET['cat'];
		global $conn;
		$get_cat_pro = "SELECT * FROM `products` WHERE  product_cat='$cat_id'";
		$run_cat_pro = mysqli_query($conn, $get_cat_pro);
		$count_cat = mysqli_num_rows($run_cat_pro);
		if ($count_cat == 0){
			echo "<h2>NO Products found in this category</h2>";
		}
		while ($row_pro_cat = mysqli_fetch_array($run_cat_pro)) {
		 	$pro_id    = $row_pro_cat['product_id'];
		 	$pro_cat   = $row_pro_cat['product_cat'];
		 	$pro_brand = $row_pro_cat['product_brand'];
		 	$pro_title = $row_pro_cat['product_title'];
		 	$pro_price = $row_pro_cat['product_price'];
		 	$pro_img   = $row_pro_cat['product_img'];
		 	echo "<div id='single_product'>
		 	<h3>$pro_title</h3>
		 	<img src='admin-area/product_images/$pro_img' width='180' height='180'>
		 	<p><b>$ $pro_price</b></p>
		 	<a href='details.php?pro_id=$pro_id' style='float:left;'>Details</a>
		 	<a href='index.php?pro_id=$pro_id'><button style='float:right'>Add to Cart</button></a>
		 	</div>";
		}
  	}
}
function get_brand_pro(){
	global $conn;
 
	if (isset($_GET['brand'])){
		
		$brand_id = $_GET['brand'];

		
		$get_brand_pro = "SELECT * FROM `products` WHERE  product_brand='$brand_id'";
		//var_dump($get_brand_pro); die();
		$run_brand_pro = mysqli_query($conn, $get_brand_pro);
		$count_pro = mysqli_num_rows($run_brand_pro);
		if ($count_pro == 0){
			echo "<h2>NO Products found in with this brand associated</h2>";
		}
		while ($row_pro_brand = mysqli_fetch_array($run_brand_pro)) {
		 	$pro_id    = $row_pro_brand['product_id'];
		 	$pro_cat   = $row_pro_brand['product_cat'];
		 	$pro_brand = $row_pro_brand['product_brand'];
		 	$pro_title = $row_pro_brand['product_title'];
		 	$pro_price = $row_pro_brand['product_price'];
		 	$pro_img   = $row_pro_brand['product_img'];
		 	echo "<div id='single_product'>
		 	<h3>$pro_title</h3>
		 	<img src='admin-area/product_images/$pro_img' width='180' height='180'>
		 	<p><b>$ $pro_price</b></p>
		 	<a href='details.php?pro_id=$pro_id' style='float:left;'>Details</a>
		 	<a href='index.php?pro_id=$pro_id'><button style='float:right'>Add to Cart</button></a>
		 	</div>";
		}
  	}
}
function get_pro_details(){
	global $conn;
    if (isset($_GET['pro_id'])){
        $product_id = $_GET['pro_id'];
        $get_pro = "SELECT * FROM products WHERE product_id='$product_id'";
        $run_pro = mysqli_query($conn, $get_pro);
        while ($row_pro = mysqli_fetch_array($run_pro)) {
            $pro_id    = $row_pro['product_id'];
            $pro_title = $row_pro['product_title'];
            $pro_price = $row_pro['product_price'];
            $pro_img   = $row_pro['product_img'];
            $pro_des   = $row_pro['product_des'];
            echo "<div id='single_product'>
            <h3>$pro_title</h3>
            <img src='admin-area/product_images/$pro_img' width='180' height='180'>
            <p><b>$ $pro_price</b></p>
            <p>Description:<b> $pro_des</b></p>
            <a href='index.php' style='float:left;'>Go Back</a>
            <a href='index.php?pro_id=$pro_id'><button style='float:right'>Add to Cart</button></a>
            </div>";
        }
    }
}


function getUserIpAddr(){
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        //ip from share internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        //ip pass from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

function add_cart(){
	global $conn;
	$user_ip_add = getUserIpAddr();
	if(isset($_GET['add_cart'])){
		$pro_id = $_GET['add_cart'];
		$check_pro = "SELECT * FROM `cart` WHERE ip_add= '$user_ip_add' AND product_id = '$pro_id'";
		$run_check = mysqli_query($check_pro);
		if (mysqli_num_rows($run_check)> 0){
			echo "";
		}else{
			
		}

	}
}