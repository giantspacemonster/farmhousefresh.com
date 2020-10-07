<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../css/style_register2.css">
</head>
<body>

<form class="reg_content" method="POST" action="adminreg.php">
<div class="container">
	<h1>Register As Admin</h1> 
	<p1>Please fill in this form to create an account.</p1>
	<hr>
		<label for="email"><b>Email</b></label>
			<input type="text" placeholder="Enter Username/Email" name="uname" required>
	
			
	<label for="psw"><b>Password</b></label>
	<input type="password" placeholder="Enter Password" name="psw" required>

	<label for="psw-repeat"><b><Repeat Password></b><label>
	<input type="password" placeholder="Repeat Password" name=psw-repeat required>
	<hr>
		<button type="submit" name="s" class="registerbtn">Register</button>
</div>
<div class="container signin">
<p>Already have an account? <a href="adminlog.php">Sign in</a>.</p>
</div>
</form>
</body>
</html>

<?php

	if(isset($_POST['s']))
	{
		$conn=pg_connect("host=localhost port=5432 user=farmhousefreshdb dbname=farmhousefreshdb password=secretpassword") or die("Couldn't Connect");

		
		$email1=$_POST['uname'];
		$pass=$_POST['psw'];
		$pass1=$_POST['psw-repeat'];

		$emailVal="select 1 from admin where email='$email1'";
		$valResult=pg_query($emailVal);
		echo "$valResult";
		if(pg_fetch_row($valResult)>0)
		{
			?><script type="text/javascript">
				alert("User already Exist");
			</script><?php
		}
		else if($pass1!=$pass)
		{
			?><script type="text/javascript">
				alert("PASSWORD NOT MATHCHES");
			</script><?php
			
		}
		else
		{
		$r="INSERT INTO admin(email,password) VALUES('$email1','$pass')";
				$result=pg_query($conn,$r) or die("Couldn't Execute");
				$r1=pg_query("insert into login values('$email','$pass1')");
		?><script type="text/javascript">
				alert("SIGNUP SUCCESSFUL");
			</script><?php
			echo "<script>location.href='adminlog.php';</script>";
		}
	}
  
?>
