<!DOCTYPE HTML>
<html>
<head>
	<meta name='viewport" content='width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../css/style_login.css">
</head>
<body>	
	<form action="" method="POST">
		<div class="container">
			<label for="uname"><b>Username</b></label>
			<input type="text" placeholder="Enter Username/Email" name="uname" required>
	
			<label for="psw"><b>Password</b></label>
			<input type="password" placeholder="Enter Password" name="pass" required>


			<button type="submit" name="s">Login</button>
		</div>
		
		<div class="container" style="background-color:#f1f1f1">
			<a href="../index.html"><button type="button" class="cancelbtn" value="Cancel">Cancel</button></a>
			<span class="psw">Don't have an account ?<a href="adminreg.php">Create One</a></span>

		</div>
	</form>
	</body>
</html>
<?php 
	if(isset($_POST['s']))
	{
		session_start();
		$conn=pg_connect("host=localhost port=5432 dbname=farmhousefreshdb user=farmhousefreshdb password=secretpassword") or die("Couldn't Connect");
		
		$id=$_POST['uname'];
		$pass=$_POST['pass'];

		$q=pg_query("select * from admin");
		$n=0;
		while($row=pg_fetch_array($q))
		{	
			if($row['email']==$id && $row['password']==$pass)
			{
				$n=1;
			}
		}
		if($n==1)
		{
			?><script type="text/javascript">
				alert("You are now Login");
			</script><?php
			header("location:admindash.php");
		}
		else
		{
			?><script type="text/javascript">
				alert("Invalid Credentials");
			</script><?php
		
		}
	}
?>
