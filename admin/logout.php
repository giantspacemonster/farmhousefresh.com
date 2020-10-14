<?php
	session_start();
	$conn=pg_connect("host=localhost port=5432 user=farmhousefreshdb dbname=farmhousefreshdb") or die("Couldn't Connect");
	$r = pg_query("SELECT * FROM cart;");
	$res = pg_fetch_row($res);
	if(isset($res)){
	  session_destroy();
	}
	else{
	  $s=pg_query("drop table cart");
	}
	session_destroy();
	header("location:../index.html");
?>
