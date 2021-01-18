<!DOCTYPE>
<?php
Include("includes/db.php");
?>
<html>
	<head>
		<title>Inserting Product</title>
		<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
		<script>tinymce.init({selector:'textarea'});</script>
	</head>
<body bgcolor="skyblue">
	<form action="insert_product.php" method="post" enctype="multipart/form-data">
		<table align="center" width="750" border="2" bgcolor="orange">
		<tr align="center">
			<td colspan="7"><h2>Insert New Post Here</h2></td>
		</tr>
		<tr>
			<td align="right"><b> Product Title: </b> </td>
			<td><input type="text" name="product_title" size="60" required /></td>
		</tr>
		<tr>
			<td align="right"> <b>Product Category: </b> </td>
			<td>
			<select name="product_cat" required>
				<option> Select a Category</option>
				<?php
					$get_cats="select * from category";
					$run_cats=mysqli_query($con, $get_cats);
					While ($row_cats=mysqli_fetch_array($run_cats)){
						$cat_id=$row_cats['cat_id'];
						$cat_title=$row_cats['cat_title'];
					Echo"<option value='$cat_id'>$cat_title</option>";
					}

				?>
			</td>
		</tr>
		<tr>
			<td align="right"><b> Product Brand: </b></td>
			<td>
			<select name="product_brands" required>
				<option> Select a Brand</option>
				<?php
					$get_brands="select * from brands";
					$run_brands=mysqli_query($con, $get_brands);
					While ($row_brands=mysqli_fetch_array($run_brands)){
						$brand_id=$row_brands['brand_id'];
						$brand_title=$row_brands['brand_title'];
					Echo"<option value='$brand_id'>$brand_title</option>";				
					}
				?>
			</td>
		</tr>

		<tr>
			<td align="right"> <b>Product Image: </b> </td>
			<td><input type="file" name="product_image" required /></td>
		</tr>
		
		<tr>
			<td align="right"> <b>Product Price: </b> </td>
			<td><input type="text" name="product_title" required /></td>
		</tr>
		
		<tr>
			<td align="right"><b> Product Description: </b></td>
			<td><textarea name="product_desc" cols=22"  rows="10" required></textarea></td>
		</tr>
		
		<tr>
			<td align="right"><b> Product Keyword: </b></td>
			<td><input type="text" name="product_keyword" size="50" required /></td>
		</tr>

		<tr align="center">			
			<td colspan="7"><input type="submit" name="insert_post" value="Insert Now" /></td>
		</tr>

		</table>
</body>
</html>

<?php
	If(isset($_POST['insert_post'])){
	//getting the text data from the fields
	$product_title=$_POST['product_title'];
	$product_cat=$_POST['product_cat'];
	$product_brand=$_POST['product_brand'];
	$product_price=$_POST['product_price'];
	$product_desc=$_POST['product_desc'];
	$product_keywords=$_POST['product_keywords'];

	//getting the image from the field
	$product_image=$_FILES['product_image']['name'];
	$product_image_tmp=$_FILES['product_image']['tmp_name'];
	
	move_uploaded_file($product_image_tmp,"product_images/$product_image");
	
	
	//To push the data to the database
	Echo $insert_product="insert into products (product_cat, product_brand, product_title, product_price, product_desc, product_image, product_keywords ) values ('$product_cat','$product_price', '$product_title','$product_desc','$product_image','$product_keywords')";

	$insert_pro= mysqli_query($con, $insert_product);
	If($insert_pro){
		Echo"<script>alert('Product has been inserted!')</script>";
		Echo"<script>windows.open('insert_product.php','_self')</script>";
	}
	}	
?>
