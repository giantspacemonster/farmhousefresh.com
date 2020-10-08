<html>
  <head>
    <link rel="icon" href="../images/logo.png" >
    <link rel="stylesheet" type="text/css" href="../css/feedback.css?v=<?php echo time();?>">
    <title>Feedback</title>
  </head>
  <body class="bodyContainer">
    <div class="menu">
      <a href ="../homeLoggedIn.php" class="brand">
      <img src="../images/logo.png"></a>
      <nav>
        <ul>
	  <li><a href="../homeLoggedIn.php">Home</a></li>
	  <li><a href="vegetables.php">Vegetables</a></li>
	  <li><a href="fruits.php">Fruits</a></li>
	  <li><a href="seeds.php">Seeds</a></li>
	  <li><a href="../about.html">ABOUT US</a></li>
	  <li><a href="login.php">Login</a></li>
	</ul>
      </nav>
    </div>
    <section></section>

    <form action="feedback2.php" method="POST">
      <div class="container">
        <label for="Email"><b>Email</b></label>
        <input type="text" placeholder="Enter Email" name="email" required>
        <label for="mobno"><b>Mobile No</b></label>
        <input type="text" placeholder="Enter Mobile No" name="mobno" required>
        <label for="message"><b>Message:&nbsp&nbsp&nbsp&nbsp</b></label>
        <br><br>
        <textarea type="text" placeholder="Type Your Message" name="msg" required="" style="width:464px; height:157px;"></textarea>
        <button type="submit" name="s">Submit Your Feedback</button>
      </div>
    </form>
  </body>
</html>
<?php

	if(isset($_POST['s']))
	{
		$conn=pg_connect("host=localhost port=5432 user=farmhousefreshdb dbname=farmhousefreshdb password=secretpassword") or die("Couldn't Connect");

		$id=$_POST['email'];
		$mobno=$_POST['mobno'];
		$msgg=$_POST['msg'];
		$q=pg_query("select * from reg");
		$n=0;
		while($row=pg_fetch_array($q))
		{	
			if($row['email']==$id)
			{
				$n=1;
			}
		}
		if($n==1)
		{
			$r="insert into feedback(email,mno,message) values('$id','$mobno','$msgg')";
					$result=pg_query($conn,$r) or die("Couldn't Execute");

			?><script type="text/javascript">
				alert("Feedback Submitted");
			</script><?php
		}
		else
		{
			?><script type="text/javascript">
				alert("Entered Email Id is not registered With Us");
			</script><?php
		}
	}
  
?>
		
