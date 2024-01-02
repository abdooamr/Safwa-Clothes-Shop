
<!--Navbar-->
<?php 

  include_once "../../Classes/UserClass.php";
include '../../Navigation&footer/NavLogin.php'
?>
<!--/.Navbar-->

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Registeration</title>
</head>


<!--Main Navigation-->
<header>
<body>


<!--Mask-->
  <div class="header">
    <h2><font size=4>Create your account to start shopping</font></h2>
  </div>
  <form action="" name="form1" method="post">

 <?php
 session_start();

function ValidateEmail($inputText)
{
 $mailformat = '/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/';
if(str_contains($inputText, $mailformat))
{


return true;
}
else
{
 echo "<div class='error'>Incorrect Email!</div>";

return false;
}
}
function isValidEmail($email){ 
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}


if(!empty($_SESSION['UserID'])) 
{
  header('location: index.php');
}

include_once "../../Classes/UserClass.php";


if(isset($_POST['Submit'])){ //check if form was submitted

	$Password1=$_POST['password_1'];
	$Password2=$_POST['password_2'];

	$FName=$_POST['FName'];
  $LName=$_POST['LName'];
  $Phone=$_POST['Phone'];
  $Company=$_POST['Company'];

	$Password=$_POST['password_1'];
	$Email=$_POST['Email'];


      $emailex=User::isEmailExist($Email);
  if($emailex!==true){
      if ($Password1 != $Password2){
          echo "<div class='error'>Password doesn't match</div>";
        } 
        else{ if(isValidEmail($Email)==true){


  User::InsertinDB_Static($FName,$LName,$Password1,$Phone,$Company,$Email);
    }
    else{  echo "<div class='error'>Please enter correct Email!</div>";}

}

  }
  else {echo "<div class='error'>Email already registered</div>"; }


}
?>
  <div class="input-group">
    <i class='far fa-user fa-lg'></i>
    <label><font color="white">First Name</font></label>
    <input type="text" placeholder="First name" name="FName" required > 
    </div>

      <div class="input-group">
    <i class='far fa-user fa-lg'></i>
    <label><font color="white">Last Name</font></label>
    <input type="text" placeholder="Last name" name="LName" required > 
    </div>

    
  <div class="input-group">
     <i class='fa fa-voicemail fa-lg'></i>
        <label><font color="white">Email</font></label>
    <input type="text" placeholder="Email"  name="Email"  required>
    </div>

      <div class="input-group">
        <i class='fa fa-mobile fa-lg'></i>
        <label><font color="white">Phone Number</font></label>
    <input type="text" placeholder="Phone Number"  name="Phone" type="tel" pattern="^01[0-2,5]\d{1,8}$"  required>
    </div>

          <div class="input-group">
             <i class='fa fa-store ffa-lg'></i>
        <label><font color="white">Company Name</font></label>
    <input type="text" placeholder="Company Name"  name="Company"  required>
    </div>
   
  <div class="input-group">
   <i class='fas fa-lock fa-lg'></i>
        <label><font color="white">Password</font></label>
    <input type="password" placeholder="Password" name="password_1" required>
    </div>


  <div class="input-group">
     <i class='fas fa-lock fa-lg'></i>
        <label><font color="white">Confirm Password</font></label>
    <input type="password" placeholder="Confirm Password" name="password_2" required>
    </div>

  <div class="input-group">
    <button type="Submit" name="Submit" class="btn" >Register</button>
  </div>

  <p>

    <font color="white">  Already a member?</font> <a href="login.php">Sign in</a>
  </p>

 </form>
 </body>
<!--/.Mask-->
</header>
<!--Main Navigation-->

<!--Main layout-->
<main>

</main>
<!--Main layout-->

<!--Footer-->
<footer>

</footer>
<!--Footer-->
<script src="../../validations.js"></script>


  <!-- jQuery -->
<?php include '../../Navigation&footer/navscript.php'?>


</body>
</html>