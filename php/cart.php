<?php
  session_start();
  $conn = pg_connect("host=localhost port=5432 dbname=farmhousefreshdb user=farmhousefreshdb password=secretpassword") or ("Could not establish database connection!!!");
  if(isset($_SESSION['cartvalue'])){
    unset($_SESSION['cartvalue']);
  }
  $_SESSION['cartvalue'] = $_GET['cartvalue'];
  
  $queryProduct="SELECT * FROM product WHERE p_name='".$_SESSION['cartvalue']."';";
  $res = pg_query($queryProduct);
  $resProduct = pg_fetch_array($res);
  
  $queryCount = "SELECT * FROM cart;";
  $resCount = pg_query($queryCount);
  $count = pg_num_rows($resCount);
  if(isset($_GET['cartvalue'])){
    $queryCart = "INSERT INTO cart VALUES(".++$count.",'".$resProduct['p_name']."','".$resProduct['quantity']."','".$resProduct['p_rate']."','".$_SESSION['email']."');";
    $resCart = pg_query($conn,$queryCart);
    }
  echo pg_last_error($conn);
  
?>
<!DOCTYLE HTML>
<html>
  <head>
    <title>Your Cart</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no, user-scalable=no, minimum-scale=1, maximum-scale=3.0">
    <link rel="stylesheet" href="../css/cart.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>
    <h1><i class="fa fa-cart-arrow-down"></i>Cart Details.</h1><hr/>
    <div class="container">
      <h2>Your Cart</h2><small>Your Cart</small>
      <ul class="responsive-table">
        <li class="table-header">
	  <div class="col col-1">Sr_no</div>
	  <div class="col col-2">Product Name</div>
	  <div class="col col-3">Quantity</div>
	  <div class="col col-4">Price</div>
	  <div class="col col-5">Remove</div>
	</li>

      <?php
        $resCartTable = "SELECT * FROM cart WHERE email='".$_SESSION['email']."';";
	//echo $resCartTable;
	$resQuery = pg_query($resCartTable);
	//echo $resQuery;
	while($cart=pg_fetch_array($resQuery)){
	  if(isset($cart)){
	?>
	<li class="table-row">
	  <div class="col col-1" data-label="Sr_no"><?php echo $cart['sr_no']; ?></div>  
	  <div class="col col-2" data-label="Product Name"><?php echo $cart['productname']; ?></div>
	  <div class="col col-3" data-label="Quantity"><?php echo $cart['quantity']; ?></div>
	  <div class="col col-4" data-label="Price"><?php echo $cart['price']; ?></div>
	  <div class="col col-5" data-label="Remove"><a href="./deleteItem.php?cartitem=<?php echo $cart['sr_no']; ?>"><i class="fa fa-minus-circle" style="color: red" aria-hidden="true"></i></a></div>
	</li>
	<?php
	      }
	    }
	  ?>
      </ul>
    </div>
    <div class="cart-buttons">
      <button class="continue-shopping" ><a href="./vegetables.php">Continue Shopping</a></button>
      <button class="checkout">Checkout</button>
    </div>
  </body>
</html>