
<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'AdminNav.php'?>
  <title>Users List</title>

</head>
<body>
<!--Main Navigation-->
<header>
<!--Navbar-->


<!--/.Navbar-->
<!--Mask-->
  <div class="header">
  
  
  
   <table class="table " style="background: rgba(34, 38, 43);">
 <th ><p style="color:White">id</th>
 <th><p style="color:White">First Name</th>
 <th><p style="color:White">Last Name</th>
 <th><p style="color:White">Email</th>
 <th><p style="color:White">Number</th>
  <th><p style="color:White">Delete User</th>

  <?php 
  $allProducts=User::SelectAllInDB();
  foreach ($allProducts as $product){?>
  
     
        
          <tr>

           <td><p style="color:White"><?php echo $product->ID ?></td>
            <td><p style="color:White"><?php echo $product->FName ?></td>
             <td><p style="color:White"> <?php echo $product->LName ?></td>
              <td><p style="color:White"><?php echo $product->Email ?></td>
               <td><p style="color:White"><?php echo $product->Phone ?></td>
                <td><input type="submit" name="addto" value="Remove" class="btnAddAction" onclick="location.href='admin_delete_user.php?action=add&id=<?php echo $product->ID ?>'" /></td>

                </tr>
    
      
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
