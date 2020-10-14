<?php
  session_start();
?>
<!DOCTYPE HTML>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="css/home.css?v=<?php echo time();?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>
    <div class="menu">
      <a href="#" class="brand"><img src="images/logo.png"></a>
      <nav>
	<ul>
	  <li><a href="./homeLoggedIn.php">Home</a></li>
	  <li><a href="./php/vegetables.php">Vegetables</a></li>
	  <li><a href="./php/fruits.php"> Fruits</a></li>
	  <li><a href="./php/seeds.php">Seeds</a></li>
	  <li><a href="about.html">About Us</a></li>
	  <li><a href="logout.php">Login</a>
	    <ul>
	      <li><a href="php/login.php">User Login</a></li>
	      <li><a href="admin/adminlog.php">Admin Login</a></li>
	    </ul>
	  </li>
	</ul>
      </nav>
    </div>
    <div class="log">
      <a href="php/login.php"><font color="#ffffff" face="bold" size="6px">Welcome To Farmhouse Fresh <?php echo $_SESSION['fname']; ?> <?php echo $_SESSION['lname'];?> </font></a>
    </div>
    
    <section></section>
    
    <div class="shift">
      
      <div class="slideshow-container">
	<div class="mySlides fade">
	  <a href="php/vegetables.php"><img src="images/a1.png" alt="Image By Polina Tankilevitch" style="width:100%" height="10%"></a>
	  <div class="text">For All Your Freshness Needs!</div>
	</div>

	<div class="mySlides fade">
	  <a href="php/fruits.php"><img src="images/a2.png" alt="Photo by Vo Thuy Tien from Pexels" style="width:100%" height="10%"></a>
	  <div class="text">State of the art Nutrition Testing.</div>
	</div>

	<div class="mySlides fade">
	  <a href="php/seeds.php"><img src="images/a3.png" alt="Photo by Lukas from Pexels" style="width:100%" height="10%"></a>
	  <div class="text">From the Fields of Nature.</div>
	</div>

	<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
	<a class="next" onclick="plusSlides(1)">&#10095;</a>
      </div>

      <br>

      <div style="text-align:center">
	<span class="dot" onclick="currentSlide(1)"></span>
	<span class="dot" onclick="currentSlide(2)"></span>
	<span class="dot" onclick="currentSlide(3)"></span>
      </div>
    </div>

    <div class="feed">
      <a href="./php/feedback2.php">Feedback</font></a>
    </div>

    <script src="scripts/slides.js"></script>

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
