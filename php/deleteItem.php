<?php
  session_start();
  $conn = pg_connect("host=localhost port=5432 dbname=farmhousefreshdb user=farmhousefreshdb password=secretpassword") or ("Could not establish database connection!!!");
  
  $_SESSION['cartitem'] = $_GET['cartitem'];
  //echo $_SESSION['cartvalue'];
  
  $queryCart="DELETE FROM cart WHERE sr_no='".$_SESSION['cartitem']."';";
  //echo $queryCart;
  $res = pg_query($queryCart);
  
  $queryCount = "SELECT * FROM cart;";
  $resCount = pg_query($queryCount);
  
  $count = $_SESSION['cartitem'];

  while($cart=pg_fetch_array($resCount)){
      $queryCart = "UPDATE cart SET sr_no=".++$count." WHERE sr_no >= '".$_SESSION['cartitem']++."';";
      $resCart = pg_query($queryCart);
      header('location: ./cart.php');
      /* ERROR IN OPERATION:
       * Deletion of last cart item is an error.
       * Deletion of middle items(with atleast one item above and atleast one item below)
       * assigns wrong sr_no to cart items.
       * PROPOSED SOLUTION:
       * For Deletion of middle items, an if condition, with if $count greater than the $cart['sr_no'] then <condition>
       * and if $count less than $cart['sr_no'] <condition>
       * END OF ERROR REPORT
      */
  }
  echo pg_result_error($resCart);
  echo 'Hello';
?>