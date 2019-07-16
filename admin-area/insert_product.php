<!DOCTYPE>
<?php
error_reporting(-1);
ini_set('display_errors', 'On');
include("includes/db.php"); 
function get_cats(){
    global $conn;
    
    $get_cats = "SELECT * FROM categories";

    $run_cats = mysqli_query($conn,$get_cats); 

    while ($row_cats= mysqli_fetch_array($run_cats)) {
        $cat_id = $row_cats['cat_id'];
        $cat_title = $row_cats['cat_title'];
        echo "<option value='$cat_id'>$cat_title</option>";
    }
}
function get_brands(){
	
	global $conn;

	$get_brands = "SELECT * FROM brands";

	$run_brands = mysqli_query($conn, $get_brands);

	while ($row_brands = mysqli_fetch_array($run_brands)) {
		$brand_id = $row_brands['brand_id'];
		$brand_title = $row_brands['brand_title'];
		echo "<option value='$brand_id'>$brand_title</option>";
	}
}



if (isset($_POST['insert_product'])){
	//getting the data from field
	$product_title = $_POST["product_title"];
	$product_cat = $_POST["product_cat"];
	$product_brand = $_POST["product_brand"];
	$product_price = $_POST["product_price"];
	$product_des = $_POST["product_des"];
	$product_key = $_POST["product_keyword"];
	$product_img = $_FILES["product_img"]['name']; 
	$product_img_tmp = $_FILES['product_img']['tmp_name'];
	
    move_uploaded_file($product_img_tmp, "product_images/".$product_img);
    
	$insert_query = "INSERT INTO  products 
	(product_title,product_cat,product_brand,product_des,product_img,product_price,product_keyword) VALUES ('$product_title','$product_cat','$product_brand','$product_des','$product_img','$product_price','$product_key')";
    //var_dump($insert_query); die();
    if($conn->query($insert_query) === TRUE){
    	echo "<script>alert('Success')</script>";
    } else{
    	echo "Error: " . $insert_query . "<br>" . $conn->error;
    }
}
?>
<html>
<head>
	<title>Inserting Product</title>
	<!-- <script src="https://cloud.tinymce.com/5/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script> -->
</head>
<body>
	<form action="insert_product.php" method="POST" enctype="multipart/form-data">
		<table align="center" width="700" border="1" bgcolor="orange">
			<tr align="center">
				<td colspan="2">
					<h2>Insert New Product Here</h2> 
				</td>
			</tr>
			<tr>
				<td align="right"><b>Product Title</b></td>
				<td><input type="text" name="product_title" required></td>
			</tr>
			<tr>
				<td align="right"><b>Product Category</b></td>
				<td><select name="product_cat" required>
					<option>Select a category</option>
					<?php get_cats(); ?>
				</select></td>
			</tr>
			<tr>
				<td align="right"><b>Product Brand</b></td>
				<td><select name="product_brand" required>
					<option>Select a brand</option>
					<?php get_brands(); ?>
				</select></td>
			</tr>
			<tr>
				<td align="right"><b>Product Image</b></td>
				<td><input type="file" name="product_img" required></td>
			</tr>
			<tr>
				<td align="right"><b>Product Price<b></td>
				<td><input type="text" name="product_price" required></td>
			</tr>
			<tr>
				<td align="right"><b>Product Description<b></td>
				<td><textarea name="product_des" cols="20" rows="10"></textarea></td>
			</tr>
			<tr>
				<td align="right"><b>Product Keywords<b></td>
				<td><input type="text" name="product_keyword"></td>
			</tr>
			
			<tr align="center">
				<td colspan="8"><input type="submit" name="insert_product" value="insert_product"></td>
			</tr>
		</table>
	</form>
</body>
</html>
