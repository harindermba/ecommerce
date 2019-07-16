<?php 

$conn = mysqli_connect("localhost","newuser","password","ecommerce_pro");

if (mysqli_connect_error()){
	echo "The connection was not established".mysqli_connect_error();
}