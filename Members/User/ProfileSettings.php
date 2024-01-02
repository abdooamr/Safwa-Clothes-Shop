<!DOCTYPE html>
<html lang="en">
<head>

<?php 
ob_start();
include '../../Navigation&footer/NavUser.php'?>
  <title>Home</title>

</head>
<body>

<!--Main Navigation-->
<header>

<!--Mask-->

  <div class='header'>

    <h2><font size=4>Edit Profile</font></h2>
  </div>  
      <?php
    echo"<form action='' method='post'>";

    include_once "../../Classes/UserClass.php";
    if(!empty($_SESSION['UserID'])) 
    {
      $str="<input type='submit'  value='Change Password' name='changepass' class='btn' style='width:200px'>";
      $deleteaccstr="<input type='submit'  value='Delete Account' name='deleteaccuser' class='btn'>";

        $UserObject=new User($_SESSION["UserID"]);
        if(isset($_POST['submit']))
        {
            include_once "../../Classes/UserClass.php";

    $FName=$_POST['FName'];
    $LName=$_POST['LName'];
    $Phone=$_POST['Phone'];
    $Email=$_POST['Email'];
    $Company=$_POST['Company'];

    //Password
    $newPassword=$_POST['newPassword'];
    $confirmPassword=$_POST['confirmPassword'];

    $currentpassword=$_POST['currentpassword'];
    $currentpassword=md5($currentpassword);
    $UserID=$_SESSION['UserID'];


      if(empty($newPassword) && empty($confirmPassword))
      {

    $UserObject=User::UpdateUserSettingsWithOutPass($FName,$LName,$Phone,$Company,$Email,$UserID);
    header('location: ProfileSettings.php');
      }
      
        else echo "<div class='error'> Passwords are not matched or check your current password</div>";

    }


echo "

  <div class='input-group'>
<i class='far fa-user fa-lg'></i>
    <label><font color='white'>First name</font></label>
  <input type='text' id='FName' name='FName' required value=".$UserObject->FName."><br></div>

  <div class='input-group'>
<i class='far fa-user fa-lg'></i>
    <label><font color='white'>Last Name</font></label>
  <input type='text' id='LName' name='LName' required value=".$UserObject->LName."><br></div>

 <div class='input-group'>
 <i class='fa fa-voicemail fa-lg'></i>
  <label><font color='white'>Email</font></label>
  <input type='text' id='email' name='Email' required value=".$UserObject->Email."><br></div>
   <div class='input-group'>
 <i class='fa fa-mobile fa-lg'></i>
  <label><font color='white'>Phone Number</font></label>
  <input type='text' id='Phone' name='Phone' required value=".$UserObject->Phone."><br></div>";

    echo " 
         <div class='input-group'>
 <i class='fa fa-store ffa-lg'></i>
  <label><font color='white'>Company</font></label>
  <input type='text' id='Company' name='Company' required value=".$UserObject->Company."><br>
  </div>

  ";

if(isset($_POST['changepass'])){
    echo "
        <div class='input-group'>
 <i class='fas fa-lock fa-lg'></i>
  <label><font color='white'>Current Password </font></label>
  <input type='password' id='currentpassword' name='currentpassword'  value='' required><br>
  </div>
       <div class='input-group'>
 <i class='fa fa-user-secret '></i>
  <label><font color='white'>New Password</font></label>
  <input type='password' id='newPassword' name='newPassword'  value='' required><br>
  </div>

     <div class='input-group'>
   <i class='fa fa-user-secret '></i>
    <label><font color='white'>Confirm Password</font></label>
  <input type='password' id='confirmPassword' name='confirmPassword'  value='' required><br>
  </div>
  ";
  $str ="<input type='submit'  value='Update Password' name='updatepass' class='btn'>";
$deleteaccstr =" <a href='ProfileSettings.php'  class='btn' id='q22'>Cancel</a>";;
  }
  if(isset($_POST['updatepass'])){
     $PasswordNew1=$_POST['newPassword'];
    $PasswordNew2=$_POST['confirmPassword'];
    $currentpassword=$_POST['currentpassword'];
             $xUserID=$_SESSION['UserID']; 
    $USer=User::CheckCurrentPassword($xUserID,$currentpassword);
      if($USer==True)
  {
    $xUSer=User::UpdateUserPassword($PasswordNew1,$PasswordNew2,$currentpassword,$xUserID);


  }
?>
<?php
  }
  if(isset($_POST['deleteaccuser'])){
       $deleteaccstr="<input type='submit'  value='Confirm delete' name='confirmdeletepass' class='btn'>
       <a href='ProfileSettings.php'  class='btn' id='q22'>Cancel</a>";
  }
  if(isset($_POST['confirmdeletepass'])){
      $UserObject=new User($_SESSION["UserID"]);
    $USer=User::deleteUser($UserObject);
  if($USer==True)
  {

header('location: signout.php');

}
  }
   

echo "<div class='input-group' id='q22'>
    <input type='submit' value='Update Profile' name='submit' class='btn'> 
     
      ";

    echo $str;
 
}
  echo $deleteaccstr;
?>
<?php

ob_end_flush();
?> 
  
 </div>
   <div class='input-group'>
    <center><a href='../../index.php'  class='btn'>Back to Home</a></form>
    </form>


<!--/.Mask-->
</header>
<!--Main Navigation-->

<!--Main layout-->
<main>

</main>
<!--Main layout-->

<!--Footer-->
</div>
<footer>

</footer>
<!--Footer-->


  <!-- jQuery -->
<?php include '../../Navigation&footer/navscript.php'?>

</body>
</html>

 