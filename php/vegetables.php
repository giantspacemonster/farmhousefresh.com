<?php
  session_start();
?>
<!DOCTYPE HTML>
<html>
  <head>
    <title>Fresh Market</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/vegetables.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>
    <div class="menu">
      <a href="homeLoggedIn.php"><img src="../images/logo.png"></a>
      <nav>
        <ul>
          <li><a href="../homeLoggedIn.php">Home</a></li>
	  <li><a href="vegetables.php">Vegetables</a></li>
	  <li><a href="fruits.php">Fruits</a></li>
	  <li><a href="seeds.php">Seeds</a></li>
	  <li><a href="cart.php">View Cart</a></li>
	  <li><a href="../about.html">ABOUT US</a></li>
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
    <form name="form" action="./cart.php" method="get">
    <p class="turncate"><?php echo $row['p_name'];?> (<?php echo $row['p_size']; ?> Kg/s per bacth.</p>
    <label for="price">Price:</label>&#8377 <?php echo $row['p_rate'];?><br/>
    Stock:<?php echo $row['quantity']; ?><br/>
    <button class="cart"><a href="./cart.php?cartvalue=<?php echo $row['p_name'];?>">ADD TO CART</a></button>
    </form>
  </div>
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
  <footer>
    <div class="footer-container">
      <div class="footer-message">
	<h1>FARMHOUSE FRESH.</h1>
	<p>
	  We thank you for choosing our services. We aitm to create possibilities for the connected world, creating interfaces between you and services that concern you. And by choosing us as your favoite online shopping store, you are helping us achieve that goal one step at a time.<br/>
	  <b>Regards, and Good Health.</b>
	</p>
      </div>
      <div class="social">
	Follow<hr/>
      <i class = "fa fa-quora" aria-hidden="true"></i>
      <i class="fa fa-instagram" aria-hidden="true"></i>
      <i class="fa fa-facebook" aria-hidden="true"></i>
      <i class="fa fa-reddit" aria-hidden="true"></i>
      <i class="fa fa-twitter" aria-hidden="true"></i>
      </div>
      <div class="explore">
	Explore.
	<hr/>
	<a href="index.php">Home</a><br/>
	<a href="about.html">About</a><br/>
	<a href="#">Careers</a><br/>
	<a href="#">Developers</a>
      </div>
    </div>
    <div class="bottom-copyright">
      <i class="fa fa-copyright" aria-hidden="true"></i><p>2020 FarmhouseFresh. All Rights Reserved.</p>
      </div>
  </footer>  
</html> 


