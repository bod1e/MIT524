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
				<div id="sidebar">
                    <div id="sidebar_title">Categories</div>
					<ul id="cats">
                        <?php 
                            getCats();
                        ?>   
                    </ul>
					
                    <div id="sidebar_title">Brands</div>
					<ul id="cats">
                        <?php 
                            getBrands();
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
					<?php getPro(); ?>
					<?php getCatPro(); ?>
					</div>
				
				</div>
			</div>
			
			
			<div id="footer">
				<h2 style="text-align:center; padding-top:10px;">&copy; 2016 by The Webmaster</h2>
			</div>

		
		</div>
	
		
	
	</body>

	
</html>
