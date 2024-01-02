<?php

 include 'AdminNav.php';

if(isset($_POST['Submit'])){ //check if form was submitted

  $Password1=$_POST['password_1'];
  $FName=$_POST['FName'];
  $LName=$_POST['LName'];
  $Email=$_POST['Email'];


            $emailex=User::isEmailExist($Email);
        if($emailex!==true){
        User::InsertAdmininDB_Static($FName,$LName,$Password1,$Email);  
            }

              
        else {echo "<div class='error'>Email already registered</div>"; }


}
  

?>
<!DOCTYPE html>
<html lang="en">
<head>

  <title>Register Admin</title>

</head>
<body>
<!--Main Navigation-->
<header>
<!--Navbar-->


<!--/.Navbar-->
<!--Mask-->
  <div class="header">

  <form action='' method='post'>
   
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
   <i class='fas fa-lock fa-lg'></i>
        <label><font color="white">Password</font></label>
    <input type="password" placeholder="Password" name="password_1" required>
    </div>
     <div class="input-group">
    <button type="Submit" name="Submit" class="btn">Add Admin</button>
  </div>
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

</footer>

<!--Footer-->



  <!-- jQuery -->
<?php include '../../Navigation&footer/navscript.php'?>

</body>
</html>
