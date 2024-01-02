
<?php 
session_start();
  include_once "../../Classes/UserClass.php";
include '../../Navigation&footer/NavLogin.php'
?>
  
<!DOCTYPE html>
<html lang="en">
<head>

  <title>Login</title>

</head>
<body>

<!--Main Navigation-->
<header>
<!--Navbar-->

<!--/.Navbar-->

<!--Mask-->
  <div class="header">

    <h2><font size=4>Login</font></h2>
  </div>
  <form action="" method="post">


  
 <?php
if(isset($_POST['submit'])){
  include_once "../../Classes/UserClass.php";
    
  $UserName=$_POST['UserName'];
  $Password=$_POST['Password'];

  $UserObject=User::login($UserName,$Password);
  if($UserObject!==NULL)
  {
  
    $_SESSION['UserID']=$UserObject->ID;

      echo "<SCRIPT> ";
      

      echo  " window.location.replace('../../index.php');
    </SCRIPT>";
  }
  else echo "<div class='error'>Wrong password or username</div>";
  
}
?>
  
  <div class="input-group">
<i class="far fa-user fa-lg"></i>
    <label><font color="white">Email</font></label>
    <input type="text" placeholder="Username" name="UserName" required="">
    </div>

    
 
  <div class="input-group">
    <i class="fas fa-lock"></i>
        <label><font color="white">Password</font></label>
    <input type="password" placeholder="Password"  name="Password" required="">
    </div>


  <div class="input-group">
    <button type="sumbit" name="submit" class="btn">Login</button>

  </div>

  <p>
    <font color="white">  Not yet a member?</font> <a href="signup.php">Sign up</a>
  </p>

 </form>
<!--/.Mask-->
</header>
<!--Main Navigation-->

<!--Main layout-->
<main>

</main>
<!--Main layout-->

<!--Footer-->
<footer>
<?php include '../../Navigation&footer/footer2.php'?>
</footer>
<!--Footer-->



  <!-- jQuery -->
<?php include '../../Navigation&footer/navscript.php'?>

</body>
</html>
