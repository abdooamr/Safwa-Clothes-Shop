<?php
 include 'AdminNav.php';



		$UserObject=new User($_SESSION["UserID"]);


?>
<!DOCTYPE html>
<html lang="en">
<head>

  <title>Manage Orders</title>

</head>
<body>

<header>

<!--Mask-->
  <div class="header">
  


     <table class="table " style="background: rgba(34, 38, 43);">
 <th ><p style="color:White">id</th>
 <th><p style="color:White">Ordered By</th>
 <th><p style="color:White">Base Product</th>
 <th><p style="color:White">Fabric</th>
 <th><p style="color:White">Colour</th>
 <th><p style="color:White">Printing Type</th>
 <th><p style="color:White">Printing Image</th>
 <th><p style="color:White">Additional Info</th>
 <th><p style="color:White">Quantity</th>
 <th><p style="color:White">Delivery time</th>
 <th><p style="color:White">Order Date</th>  
 <th><p style="color:White">Order status</th>
 <th><p style="color:White">Accept order</th>
 <th><p style="color:White">Decline order</th>
 <th><p style="color:White">Delete order</th>

 
  <?php 

  $allProducts=Orders::Admin_Orders();
 
  foreach ($allProducts as $product){?>
  
   
        
          <tr ><td><p style="color:White"><?php echo $product->id ?></td>
            <td><p style="color:White"><?php echo $product->Ordered_By ?></td>
              <td><p style="color:White"> <?php echo $product->product_name ?></td>
              <td><p style="color:White"><?php echo $product->Fabric ?></td>
                <td><p style="color:White"><?php echo $product->Color ?></td>
                  <td><p style="color:White"><?php echo $product->PrintType ?></td>
                    <td><div class="product-image"><img src="<?php echo "../../".$product->Image;?>" width="100px"></div></td>
                    <td><p style="color:White"><?php echo $product->AdditionalInfo ?></td>
                      <td><p style="color:White"><?php echo $product->Quantity ?></td>
                        <td><p style="color:White"><?php echo $product->deliveryTime ?></td>
                          <td><p style="color:White"><?php echo $product->OrderDate ?></td>
                            <td><p style="color:White" name="sta22t"><?php echo $product->Orderstatus ?></td>
                               <td><input type="submit" name="addto" value="Accept" class="btnAddAction" onclick="location.href='admin_accept_order.php?action=add&id=<?php echo $product->id ?>'" /></td>
                                 <td><input type="submit" name="addto" value="Decline" class="btnAddAction" onclick="location.href='admin_decline_order.php?action=add&id=<?php echo $product->id ?>'" /></td>   
                                    <td><input type="submit" name="addto" value="Delete" class="btnAddAction" onclick="location.href='admin_delete_order.php?action=add&id=<?php echo $product->id ?>'" /></td>                            
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

<!--Footer-->
<footer>

</footer>

<!--Footer-->



  <!-- jQuery -->
<?php include '../../Navigation&footer/navscript.php'?>

</body>
</html>
