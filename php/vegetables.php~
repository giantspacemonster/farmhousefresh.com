<!DOCTYPE HTML>
<html>
  <head>
    <title>Fresh Market</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" type="text/css" href="../css/vegetables.css?v=<?php echo time(); ?>">
  </head>
  <body>
    <div class="menu">
      <a href="homeLoggedIn.php"><img src="../images/logo.png"></a>
      <nav>
        <ul>
          <li><a href="homeLoggedIn.php">Home</a></li>
	  <li><a href="vegetables.php">Vegetables</a></li>
	  <li><a href="fruits.php">Fruits</a></li>
	  <li><a href="seeds.php">Seeds</a></li>
	  <li><a href="cart.php">View Cart</a></li>
	  <li><a href="about.html">ABOUT US</a></li>
	  <li><a href="logout.php">Logout</a></li>
        </ul>
      </nav>
    </div>
    <br><br><br>


<div class="card-parent">      
<?php
  $conn=pg_connect("host=localhost port=5432 user=farmhousefreshdb dbname=farmhousefreshdb password=secretpassword") or die("Couldn't Connect");
  $r=0;
  $q=pg_query("select * from product where p_category='vegetables'");
  $ic=1;
  //$count1=pg_num_rows($q);
  //echo "$count1";
  while($row=pg_fetch_array($q))
  { 
    if(isset($row))
  {
  ?>
<div class="card">
  <img src="<?php echo $row['img'];?>" width="256px" height="256px">
  <div class="card-container">
    <label for="prodName">Product:</label><?php echo $row['p_name'];?><br/>
    <label for="price">Price:</label><?php echo $row['p_rate'];?><br/>
    <label for="quantity">Stocks remaining:</label><?php echo $row['quantity']; ?>
  </div>
  <section id="triangle-bottomright"></section>
  <section id="triangle-topleft"></section>
</div>

<?php 
	}
	else
	{
		?>Not available
<?php
	}
	
?>
<?php  
}//while close
  ?>
</div>
</body>
</html> 


