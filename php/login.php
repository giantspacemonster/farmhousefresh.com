<!DOCTYPE HTML>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/style_login.css">
  </head>
  <body>
    <form action = "" method="POST">
       <div class="container">
         <label for="uname"><b>Username</b></label>
	 <input type="text" placeholder="Enter Username" name="uname" required>
	 
         <label for="psw"><b>Password</b></label>
	 <input type="password" placeholder="Enter Password" name="pass" required>

	 <button type="submit" name="s">Login</button>
       </div>

       <div class="container" style="background-color: #f1f1f1">
         <a href="../index.html"><button type="button" class="cancelbtn" value="Cancel">Cancel</button></a>
         <span class="psw">Don't have an account ?<a href="register2.php">Create One</a></span>
       </div>
    </form>
  </body>
</html>

<?php
  if(isset($_POST['s'])){
    session_start();
    $conn = pg_connect("host=localhost port=5432 user=farmhousefreshdb dbname=farmhousefreshdb password=secretpassword") or die("Could not establish connection to database");
    $id = $_POST['uname'];
    $pass=$_POST['pass'];
  $q=pg_query("select * from reg");
    $n=0;
  while($row=pg_fetch_array($q)){
  $_SESSION['uname'] = $row['first_name'];
  $_SESSION['lname'] = $row['last_name'];
      if($row['email']==$id && $row['password']==$pass){
        $n=1;
      }
      if($n==1){
        $qq=pg_query("
	  CREATE TABLE CART(
	    SR_no serial PRIMARY KEY,
	    productname VARCHAR(40),
	    quantity INTEGER,
	    price INTEGER
	  )"
	);

        ?><script type="text/javascript">alert("You are now logged in!")</script>
	<?php
	header("location:../homeLoggedIn.php");
      }
      else {
        ?><script type="text/javascript">alert<"Invalid Credentials");</script>
	<?php
      }
    }
  }
?>
