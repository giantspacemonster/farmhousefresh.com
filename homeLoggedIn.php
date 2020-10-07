<?php
  session_start();
?>
<!DOCTYPE HTML>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="css/home.css">
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
      <a href="php/login.php"><font color="#45c2f7" face="bold" size="4px">Welcome To Farmhouse Fresh!</font></a>
    </div>
    
    <section></section>
    
    <div class="shift">
      
      <div class="slideshow-container">
	<div class="mySlides fade">
	  <a href="php/login.php"><img src="images/a1.png" alt="Image By Polina Tankilevitch" style="width:100%" height="10%"></a>
	  <div class="text">For All Your Freshness Needs!</div>
	</div>

	<div class="mySlides fade">
	  <a href="php/login.php"><img src="images/a2.png" alt="Photo by Vo Thuy Tien from Pexels" style="width:100%" height="10%"></a>
	  <div class="text">State of the art Nutrition Testing.</div>
	</div>

	<div class="mySlides fade">
	  <a href="php/login.php"><img src="images/a3.png" alt="Photo by Lukas from Pexels" style="width:100%" height="10%"></a>
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
	<p>Hello! We are glad to be serving you the best of our stock, freshly picked from the farm, right to your plate. We take care to not include harmful chemicals in your dinner, and make your meal a healthy treat for your body and your mind, because we at farmhousefresh.com believe the health of our customers is of the utmost importance, and this is the aim we use to guide ourselves further down the road that our endeavour takes us. Happy Treats!</p>
      </div>
      <hr/>
      <i class = "fa fa-quora" aria-hidden="true"></i>
      <i class="fa fa-instagram" aria-hidden="true"></i>
      <i class="fa fa-facebook" aria-hidden="true"></i>
      <i class="fa fa-reddit" aria-hidden="true"></i>
      <i class="fa fa-twitter" aria-hidden="true"></i>
      <hr/>
      <i class="fa fa-copyright" aria-hidden="ture"></i>2020 FarmhouseFresh. All Rights Reserved
    </div>
    <div class="footer-legal">
      LEGAL
      <ul>
      <li><a href="#" class="legal">Terms and Conditions</a></li>
      <li><a href="#" class="legal">File Licenses</a></li>
      <li><a href="#" class="legal">Refund Policy</a></li>
      <li><a href="#" class="legal">Privacy Policies</a></li>
      </ul>
    </div>

     <div class="footer-interaction">
	INTERACTION
	<ul>
	  <li><a href="#" class="footer-interaction-link">Support</a></li>
	  <li><a href="#" class="footer-interaction-link">Contact Us</a></li>
	</ul>
      </div>
      
  </footer>
</html>
