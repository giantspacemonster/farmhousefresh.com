<DOCTYLE HTML>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="css/style_register2.css">
  </head>
  <body>
    <form class="reg_content" method="POST" action="register2.php">
      <div class="container">
        <p1>Create Account</p1>
        <hr>
        <label for="first_name"><b>First Name</></label>
        <input type="text" placeholder="Enter First Name" name="fname" pattern="^[A-Za-Z]+" required>
        <label for="last_name"<b>Last Name</b></label>
        <input type="text" placeholder="Enter Last Name" name="lname" pattern="^[A-Za-Z]+" required>
        <label for="gender"><b>Gender></b></label>
        <input type="radio" name="sex" value="male" required>MALE
        <input type="radio" name="sex" value="female" required>FEMALE
        <input type="radio" name="sex" value="others" required>Others

        <br><br>
        <label for="dob"><b>Date Of Birth</b></label>
        <input type="date" name="dob" required>
        <br><br>
        <label for="address"><b>Address</b></label>
        <input type="text" placeholder="Enter Address" name="address" required>
        <lable for="mobno"><b>Mobile No.</b></label>
        <input type="text" placeholder="Enter mobile No." name="mobno" pattern="[0-9]{10}" required>
        <lable for="email"><b>Email</b></label>
        <input type="text" placeholder="Enter Email Address" name="email1" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter a Secure Password" name="psw" required>
        <label for="psw-repeat"><b>Re-Enter Password</b></label>
        <input type="password" placeholder="Re-Enter Password" name="psw-repeat" required>
        <hr/>
        <button type="submit" name="s" class="registerbtn">Register</button>
      </div>
      <div class="container signin">
        <p>Already have an account ?<a href="login.php">Sign In</a></p>
      </div>
    </form>
  </body>
</html>

<?php
  if(isset($_POST['s'])){
    $conn = pg_connect("host=localhost:5432 user=farm dbname=farm_house") or die("Could not establish connection to database");
    $fnm==$_POST['fname'];
    $lnm=$_POST['lname'];
    $gen=$_POST['sex'];
    $dob=$_POST['dob'];
    $addr=$_POST['address'];
    $email=$_POST['email'];
    $mobno=$_POST['mobno'];
    $pass=$_POST['psw'];
    $pass1=$_POST['psw-repeat'];

    $emailVal="select 1 from reg where email='$email'";
    $varResult=pg_query($emailVal);
    echo "$valResult";
    if(pg_fetch_row($valResult)>0){
      ?><script type="text/javascript">alert("User already exists!");</script>
      <?php
    }
    else if($pass1 != pass) {
      ?><script type="text/javascript">alert("Passwords do not match!");</script>
      <?php
    }
    else if($pass<8){
      ?><script type="text/javascript">a;ert("Passwords must be at least 8 characters long");</script>
      <?php
    }
    else {
      $r="INSERT INTO reg(first_name,last_name,gen,dob,addr,email,mno,password) VALUES('$fnm','$lnm','$gen','$dob','$addr','$email','$mobno','$pass')";
      $result=pg_query($conn,$r) or die("Could not Execute database injection");
      $r1=pg_query("INSERT INTO login VALUSE('$email','$pass1')");
      ?><script type="text/javascript">alert("Sign up Successful. Please Login using your username and password.");</script>
      <?php echo "<script>location.href='login.php';</script>";
    }
  }
?>