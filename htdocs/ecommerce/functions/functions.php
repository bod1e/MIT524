<?php
$con=mysqli_connect("localhost","root","","ecommerce");
if(mysqli_connect_errno())
        {
            echo "Failed to connect to MYQSL:" .mysqli_connect_error();
        }
//getting the categories
function getCats(){
   
    global $con;

    $get_cats = "select * from category";

    $run_cats = mysqli_query($con, $get_cats);

    while ($row_cats = mysqli_fetch_array($run_cats)){

        $cat_id = $row_cats['cat_id'];
        $cat_title = $row_cats['cat_title'];

	Echo "<li><a href='index.php?cat=$cat_id'>$cat_title</a></li>";
    }
}

function getBrands(){
   
    global $con;

    $get_brands = "select * from brands";

    $run_brands = mysqli_query($con, $get_brands);

    while ($row_brands = mysqli_fetch_array($run_brands)){

        $brand_id = $row_brands['brand_id'];
        $brand_title = $row_brands['brand_title'];

    Echo "<li><a href='index.php>brand=$brand_id'>$brand_title</a></li>";
    }
}


Function getPro(){
	Global $con;
	If(!isset($_GET['cat'])){
	If(!isset($_GET['brand'])){

	$get_pro="select * from product order by RAND() LIMIT 0,6";
	$run_pro=mysqli_query($con, $get_pro);
	While($row_pro=mysqli_fetch_array($run_pro)){
		$pro_id=$row_pro['product_id'];
		$pro_cat=$row_pro['product_cat'];
		$pro_brand=$row_pro['product_brand'];
		$pro_title=$row_pro['product_title'];
		$pro_price=$row_pro['product_price'];
		$pro_image=$row_pro['product_image'];

		Echo "
			<div id='single_product'>
				<h3>$pro_title</h3>
				<img src='admin_area/product_images/$pro_image' width='180' height='180'/>
				<img src='admin_area/product_images/$pro_image' width='180' height='180'/>
				<p><b>$  $pro_price</b></p>
				<a href='details.php?pro_id=$pro_id' style='float:left;'>Details</a>
				<a href='index.php?pro_id=$pro_id '><button style='float:right'>Add to Cart</button></a>
			</div>
		";
	}
	}
	}
}


Function getCatPro(){
	
	Global $con;
	
	if(isset($_GET['cat'])){
	
	$cat_id=$_GET['cat'];

	$get_cat_pro="select * from product where product_cat='$cat_id'";
	$run_cat_pro=mysqli_query($con, $get_cat_pro);
	$count_cats=mysqli_num_rows($run_cat_pro);
		If($count_cats==0){
			Echo "<h2 style='padding:20px;'>There is no product in this category!</h2>";
		}
		
	While($row_cat_pro=mysqli_fetch_array($run_cat_pro)){
		$pro_id=$row_cat_pro ['product_id'];
		$pro_cat=$row_cat_pro ['product_cat'];	
		$pro_brand=$row_cat_pro ['product_brand'];
		$pro_title=$row_cat_pro ['product_title'];
		$pro_price=$row_cat_pro ['product_price'];
		$pro_image=$row_cat_pro ['product_image'];

		
	Echo"
		<div id='single_product'>
			<h3>$pro_title</h3>
			<img src='admin_area/product_images/$pro_image' width='180' height='180'/>
			<img src='admin_area/product_images/$pro_image' width='180' height='180'/>
			<p><b> $ $pro_price</b></p>
			<a href='details.php?pro_id=$pro_id' style='float:left;'>Details</a>
			<a href='index.php?pro_id=$pro_id'><button style='float:right'>Add to Cart</b>
		</div>
	";

	}
	}
}

Function getBrandPro(){
		If(isset($_GET['brandcat'])){
		$brand_id=$_GET['brand'];

	Global $con;
	
	$get_brand_pro="select * from product where product_brand='$brand_id'";
	$run_brand_pro=mysqli_query($con, $get_brand_pro);
	$count_brands=mysqli_num_rows($run_brand_pro);
		If($count_brands==0){
			Echo "<h2 style='padding:20px;'>There is no product in this brand!</h2>";
		}   
	While($row_brand_pro=mysqli_fetch_array($run_brand_pro)){
		$pro_id=$row_brand_pro ['product_id'];
		$pro_cat=$row_brand_pro ['product_cat'];	
		$pro_brand=$row_brand_pro ['product_brand'];
		$pro_title=$row_brand_pro ['product_title'];
		$pro_price=$row_brand_pro ['product_price'];
		$pro_image=$row_brand_pro ['product_image'];

		
	Echo"
		<div id='single_product'>
			<h3>$pro_title</h3>
			<img src='admin_area/product_images/$pro_image' width='180' height='180'/>
			<img src='admin_area/product_images/$pro_image' width='180' height='180'/>
			<p><b> $ $pro_price</b></p>
			<a href='details.php?pro_id=$pro_id' style='float:left;'>Details</a>
			<a href='index.php?pro_id=$pro_id'><button style='float:right'>Add to Cart</b>
		</div>
	";
	}
	} 
}


?>