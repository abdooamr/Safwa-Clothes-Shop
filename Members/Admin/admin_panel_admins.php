

<?php

include 'AdminNav.php';

if(!empty($_SESSION['UserID'])) {
           $UserObject=new User($_SESSION["UserID"]);
          if($UserObject->UserType_obj->UserTypeName!=="Admin"){
         header('location: index.php');
        }

  
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admins list</title>
  </head>
<body>
<!--Main Navigation-->
<header>
<!--Navbar-->


<!--/.Navbar-->
<!--Mask-->
  <div class="header">
  <form action='' method='post'>
   
<i class='far fa-user fa-lg'></i>
    
    <a href='admin_panel_add_admin.php'  class='btn'>Add Admin</a>
  </form>
  
  
  <table class="table " style="background: rgba(34, 38, 43);">
 <th ><p style="color:White">id</th>
 <th><p style="color:White">First Name</th>
 <th><p style="color:White">Last Name</th>
 <th><p style="color:White">Email</th>
 <th><p style="color:White">Number</th>
 
  <?php 
  $allProducts=User::SelectAllAdminsInDB();
  foreach ($allProducts as $product){?>
  
     
        
          <tr ><td><p style="color:White"><?php echo $product->ID ?></td>
            <td><p style="color:White"><?php echo $product->FName ?></td>
              <td><p style="color:White"> <?php echo $product->LName ?></td>
              <td><p style="color:White"><?php echo $product->Email ?></td>
                <td><p style="color:White"><?php echo $product->Phone ?></td></tr>
    
      
        <div>
          
          
        
        
      </form>
    </div>
    <?php
  }
  ?>
</table>


 

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
