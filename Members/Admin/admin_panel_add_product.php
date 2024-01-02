<?php

include 'AdminNav.php';

if(!empty($_SESSION['UserID'])) {
           $UserObject=new User($_SESSION["UserID"]);
          if($UserObject->UserType_obj->UserTypeName!=="Admin"){
         header('location: index.php');
        }
if(isset($_POST['Submit'])){ 

  $productname=$_POST['productname'];
  $Categories=$_POST['Categories'];
   $Price=$_POST['Price'];
  $Image=$_FILES['Image'];
    $img_name = $_FILES['my_image']['name'];
            $img_size = $_FILES['my_image']['size'];
            $tmp_name = $_FILES['my_image']['tmp_name'];
            $error = $_FILES['my_image']['error'];

   Product::AddProduct($productname,$Categories,$Image,$img_name,$img_size,$tmp_name,$error,$Price);


}
  
}
?>
<!DOCTYPE html>
<html lang="en">
<head>

  <title>Add Product</title>

</head>
<body>
<!--Main Navigation-->
<header>
<!--Navbar-->


<!--/.Navbar-->
<!--Mask-->
  <div class="header">

 <form action=""
           method="post"
           enctype="multipart/form-data">
   
 <div class="input-group">
    <i class='far fa-user fa-lg'></i>
    <label><font color="white">Product Name</font></label>
    <input type="text" placeholder="productname" name="productname" required > 
    </div>
    
  <div class="input-group">
     <i class='fa fa-genderless fa-lg'></i>
        <label><font color="white">Category</font></label>

  
  <select class='form-select' id='Categories' name ='Categories'>
  <option value='Men'>Men</option>
  <option value='Women'>Women</option>
  <option value='Unisex'>Unisex</option>
</select>
    </div>

     <div class="input-group">
   <i class='fas fa-image fa-lg'></i>
        <label><font color="white">Product Image</font></label>
        <label class="form-label" for='Image'>Product Image</label>
                 <input type="file" 
                  name="my_image">

                   <div class="input-group">
    <i class='far fa-user fa-lg'></i>
    <label><font color="white">Price</font></label>
    <input type="text" placeholder="Price" name="Price" required > 
    </div>
 
    </div>
     <div class="input-group">
    <button type="Submit" name="Submit" class="btn">Add Product</button>
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



<?php include '../../Navigation&footer/navscript.php'?>
</body>
</html>
