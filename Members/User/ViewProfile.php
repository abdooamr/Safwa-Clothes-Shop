<?php include '../../Navigation&footer/NavUser.php'?>
<!DOCTYPE html>
<html lang="en">
<head>

  
  <title>Home</title>

</head>
<body>

<!--Main Navigation-->
<header>

<!--Mask-->
   <div class="header">

    <h2><font size=4>Your Profile</font></h2>
  </div>  
  <?php


//echo"</h1></h1><br>";
echo"<div><form action='' method='post'>";

include_once "../../Classes/UserClass.php";
if(!empty($_SESSION['UserID'])) {
    $UserObject=new User($_SESSION["UserID"]);
    if(isset($_POST['submit']))
    {
        include_once "../../Classes/UserClass.php";
$UserName=$_POST['UserName'];
$Email=$_POST['Email'];
$currentpassword=$_POST['currentpassword'];
$currentpassword=md5($currentpassword);
$UserID=$_SESSION['UserID'];
if($currentpassword==$UserObject->Password)
{
$UserObject=User::UpdateUserSettings($UserName,$currentpassword,$Email,$UserID);
header('location: ProfileSettings.php');
} else echo "<div class='error'>Wrong password</div>";}
if(isset($_POST['Deleteacc']))
    {
      $currentpassword=$_POST['currentpassword'];
$currentpassword=md5($currentpassword);
      if($currentpassword==$UserObject->Password)
{
      header('location: delete.php');
    }
    else  echo "<div class='error'>Wrong password</div>";
    }



echo "
     <div class='input-group'>
    <i class='far fa-user fa-lg'></i>
    <label><font color='white'>First Name: ".$UserObject->FName."</font></label>
      </div>

           <div class='input-group'>
    <i class='far fa-user fa-lg'></i>
    <label><font color='white'>Last Name: ".$UserObject->LName."</font></label>
      </div>


           <div class='input-group'>
     <i class='fa fa-voicemail fa-lg'></i>
    <label><font color='white'>Email:   ".$UserObject->Email."</label><br></div>

           <div class='input-group'>
    <i class='fa fa-mobile fa-lg'></i>
      <label><font color='white'>Phone Number:   ".$UserObject->Phone."</label><br></div>

       <div class='input-group'>
 <i class='fa fa-store ffa-lg'></i>
  <label><font color='white'>Company:   ".$UserObject->Company."</label><br></div>


          <div class='input-group'>
     <i class='fab fa-critical-role fa-lg'></i>
      <label><font color='white'>Role:   ".$UserObject->UserType_obj->UserTypeName."</label><br></div>

                <div class='input-group'>
         <a href='../../index.php'  class='btn'>Back to Home</a></form>
         <a href='ProfileSettings.php'  class='btn'>Edit Profile</a></form></div>";

    }
    ?>






<!--/.Mask-->
</header>
<!--Main Navigation-->

<!--Main layout-->
<main>

</main>
<!--Main layout-->

<!--Footer-->
</div>
<div>
<footer>
 
</footer>
<!--Footer-->



  <!-- jQuery -->
<?php include '../../Navigation&footer/navscript.php'?>

</body>
</html>

