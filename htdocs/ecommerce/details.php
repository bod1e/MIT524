<!DOCTYPE>
<?php
Include("functions/functions.php");
?>


<html>
	<head>
		<title>My Online Shop</title>
		
		<link rel="stylesheet" href="styles/style.css" media="all"/>
	</head>
	
	<body>
	
		
		<div class="main_wrapper">
			
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
						<input type="text" name="user_query" placeholder="Search a Product"/>
						<input type="submit" name="search" value="search" />
					</form>
				</div>
			</div>
			
			<div class="header_wrapper">
					

			</div>
	

			<div class="content_wrapper">
				<div id="sidebar">Sidebar
                    <ul id="cats">
                        <?php 
                            getCats();
                        ?>   

                    </ul>
				</div>
					
				<div id="header">Header</div>
				
				<div id="content_area">Content Area
					<div id="shopping_cart">
					<span style="float:right; font-size:18px; padding:5px; line-height:40px;">
					Welcome Guest! <b style="color:yellow">Shopping Cart -</b> Total items: Total Price: <a href="cart.php" style="color:yellow">Go to Cart</a>
					</span>
					</div>

					<div id="products_box">
					<?php
						If(isset($_GET['pro_id'])){
							$product_id=$_GET['pro_id'];
							$get_pro="select * from products where product_id='$product_id'";
							$run_pro=mysqli_query($con, $get_pro);
							While($row_pro+mysqli_fetch_array($run_pro)){
								$pro_id=row_pro['product_id'];
								$pro_cat=row_pro['product_cat'];	
								$pro_brand=row_pro['product_brand'];
								$pro_title=row_pro['product_title'];
								$pro_price=row_pro['product_price'];
								$pro_image=row_pro['product_image'];
								$pro_desc=row_pro['product_desc'];
							Echo"
								<div id='single_product'>
									<h3>$pro_title</h3>
									<img src='admin_area/product_images/$pro_image' width='180' height='180'/>
									<img src='admin_area/product_images/$pro_image' width='180' height='180'/>
									<p><b> $ $pro_price</b></p>
									<p>$pro_desc</p>
									<a href='index.php' style='float:left;'>Go Back</a>
									<a href='index.php?pro_id=$pro_id'><button style='float:right'>Add to Cart</b>
								</div>
							";
							}
						}
					?>

					</div>
				
				</div>
			</div>
			
			
			<div id="footer">
				<h2 style="text-align:center; padding-top:10px;">&copy; 2016 by The Webmaster</h2>
			</div>

		
		</div>
	
		
	
	</body>

	
</html>
