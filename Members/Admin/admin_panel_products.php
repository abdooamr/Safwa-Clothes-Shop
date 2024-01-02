<?php
 include 'AdminNav.php';

		$UserObject=new User($_SESSION["UserID"]);

    if(isset($_POST['newproduct'])){  
      header('location: admin_panel_add_product.php');
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>

  <title>Manage Products</title>

</head>
<body>
<!--Main Navigation-->
<header>
<!--Navbar-->


<!--/.Navbar-->
<!--Mask-->
  <div class="header">
  
<form action='' method='post'>
   
<i class='fa fa-tshirt fa-lg'></i>

    <a href='admin_panel_add_product.php'  class='btn'>Add Product</a>
  </form>


   <table class="table table-striped table-hover">
 <th ><p style="color:White">id</th>
 <th><p style="color:White">Name</th>
 <th><p style="color:White">Image</th>
 <th><p style="color:White">Type</th>
 <th><p style="color:White">Price</th>
 <th><p style="color:White">Remove</th>


 
  <?php 
  $allProducts=Product::getAllProducts();
  foreach ($allProducts as $product){?>
  
     
        
          <tr ><td><p style="color:White"><?php echo $product->id ?></td>
            <td><p style="color:White"><?php echo $product->name ?></td>
              <td><div class="product-image"><img src="<?php echo "../../".$product->image;?>" width="100px"></div></td>
              <td><p style="color:White"><?php echo $product->type ?></td>
                <td><p style="color:White"><?php echo $product->price ?></td>
                                 <td><input type="submit" name="addto" value="Remove Product" class="btnAddAction" onclick="location.href='admin_remove_product.php?action=add&id=<?php echo $product->id ?>'" /></td>                
                
                              </td>
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


<footer>

</footer>



  <!-- jQuery -->
<?php include '../../Navigation&footer/navscript.php'?>


</body>
</html>
