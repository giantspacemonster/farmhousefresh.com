<?php
	session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
<meta name="viewport">
<link rel="stylesheet" type="text/css" href="../css/admindash.css">
</head>
<body>
<button class="btn" onclick="location.href='logout2.php';">Logout</button>
<div id="mySidenav" class="sidenav">
<a href="addproduct.php" id="about">Add Product</a>
<a href="removeproduct.php" id="blog">Remove Product</a>
<a href="edit.php" id="projects">Edit Product</a>
<a href="adminreg.php" id="contact">Add admin</a>
</div>
<div style="margin-left:360px;">
<h2>Welcome Admin</h2>
<p>Dashboard</p>
</div>
</body>
</html>
