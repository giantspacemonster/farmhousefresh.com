<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../css/style_register2.css">
</head>
<body>

<form class="reg_content" method="POST" action="addproduct.php">
<div class="container">
	<h1>Product Information</h1> 
	<hr>
		<label for="p_name"><b>Product Name</b></label>
	<input type="text" placeholder="Enter Product Name" name="pname" required>

		<label for="pro_size"><b>Product Size</b></label>
	<input type="text" placeholder="Enter Product Size" name="pro_size" required>

		
		<label for="pro_rate"><b>Product Rate</b></label>
	<input type="text" placeholder="Enter Product Rate" name="pro_rate" required>

		<label for="quantity"><b>Quantity :</b></label>
	<input type="text" placeholder="Enter Quantity" name="quan" required>

			<label for="imgpath"><b>Image Path :</b></label>
	<input type="text" placeholder="Enter Image Path" name="imgpath" required>

		<label for="cat"><b>Product Category  :</b></label>
	<input name="cat" value="fruits" type="radio" required>Fruits
	<input name="cat" value="vegetables" type="radio" required>Vegetables
	<input name="cat" value="seeds" type="radio" required>Seeds

			<button type="submit" name="s" class="registerbtn">Add Product</button>
</div>
</form>
</body>
</html>

<?php

	if(isset($_POST['s']))
	{
		$conn=pg_connect("host=localhost port=5432 user=farmhousefreshdb dbname=farmhousefreshdb password=secretpassword") or die("Couldn't Connect");

		$pnm=$_POST['pname'];
		$pro_size=$_POST['pro_size'];
		$catg=$_POST['cat'];
		$rate=$_POST['pro_rate'];
		$quantity=$_POST['quan'];
		$img=$_POST['imgpath'];
		
		$emailVal="select 1 from product where p_name='$pnm'";
		$valResult=pg_query($emailVal);
		if(pg_fetch_row($valResult)>0)
		{
			?><script type="text/javascript">
				alert("Product already Exist");
			</script><?php
		}
		else
		{
		$r="INSERT INTO product(p_name,p_size,p_rate,p_category,img,quantity) VALUES('$pnm','$pro_size','$rate','$catg','$img','$quantity')";
				$result=pg_query($conn,$r) or die("Couldn't Execute");
		}
	}
  
?>
		
