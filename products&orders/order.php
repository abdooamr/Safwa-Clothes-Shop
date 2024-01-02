<?php session_start();

if(empty($_SESSION['UserID'])) 
{
  header('location: ../index.php');
}  ?>
<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Home</title>
  <!-- MDB icon -->
   <link rel="icon" href="../img/products.ico" type="image/x-icon">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <!-- Material Design Bootstrap -->
  <link rel="stylesheet" href="../css/mdb.min.css">
  <!-- Your custom styles (optional) -->
  <link rel="stylesheet" href="../css/sorder.css">
</head>
<body>

<!--Main Navigation-->
<header>
<!--Navbar-->
<?php include '../Navigation&footer/NavProd.php'?>
<!--/.Navbar-->
<!--Mask-->
 
  <?php



//echo"<form action='' method='post'>";

include_once "../Classes/UserClass.php";
include_once "../Classes/productsClasses.php";
if(!empty($_SESSION['UserID'])) {
    $UserObject=new User($_SESSION["UserID"]);

    if(isset($_POST['submit']))
    {
        
        $product_name=$_GET['id'];
        $product_name=substr($product_name, 0, strpos($product_name, "info"));
        $product_name=substr($product_name, strpos($product_name, "name")+5); 
        $product_id=$_GET['id'];   
       // echo '<script>alert("$product_id")</script>';
        $Fabric=$_POST['Fabric'];
        $Color=$_POST['Color'];
        $PrintType=$_POST['printtype'];
        $Quantity=$_POST['Quantity'];
  //     $Image=$_POST['Image'];
    $img_name = $_FILES['my_image']['name'];
            $img_size = $_FILES['my_image']['size'];
            $tmp_name = $_FILES['my_image']['tmp_name'];
            $error = $_FILES['my_image']['error'];
        $AdditionalInfo=$_POST['comment'];
        $deliveryTime=$_POST['optradio'];
          //($Ordered_By,$product_id,$product_name,$Fabric,$Color,$PrintType,$Image,$img_name,$img_size,$tmp_name,$error,$Quantity,$AdditionalInfo,$deliveryTime)
      $product=Product::NewOrder($UserObject->ID,$product_id,$product_name,$Fabric,$Color,$PrintType,$img_name,$img_size,$tmp_name,$error,$Quantity,$AdditionalInfo,$deliveryTime);    }


//$dec=$UserObject->Password;
//$xPassword=md5($dec);
?>
  <div class="header"  >

    <h2 ><font size=4>Order your T-Shirt</font></h2>
  </div> 
  <form action=""
           method="post"
           enctype="multipart/form-data"> <?php
echo "

 <div class='input-group'>
 <i class='fa fa-tshirt fa-lg'></i>
    <label><font color='white'>Step 1: Fabric type</font></label>
    <select class='form-select' id='Fabric' name ='Fabric'>
   <option value='None'>None</option>
  <option value='cotton'>cotton</option>
  <option value='polyester'>polyester</option>
  <option value='leather'>leather</option>
  <option value='wool' >wool</option>
  <option value='satin' >satin</option>
  <option value='Chiffon' >Chiffon</option>
  <br>
<br></select><br></div>

  <div class='input-group'>
<i class='fa fa-brush fa-lg'></i>
    <label><font color='white'>Step 2: Color</font></label>
     <select class='form-select' id='Color' name ='Color'>
  <option value='None'>None</option>
  <option value='Red'>Red</option>
  <option value='Blue'>Blue</option>
  <option value='Black'>Black</option>
  <option value='White' >White</option>
  <option value='Grey' >Grey</option>
  <option value='Green' >Green</option>
  <br>
<br></select><br></div>

 <div class='input-group'>
 <i class='fa fa-print fa-lg'></i>
  <label><font color='white'>Step 3: Type of print  </font></label></div>";

   echo "   <select id='printtype' name='printtype' >";

$allProducts=ProductType::getAllTypes();
  foreach ($allProducts as $product){

  echo "<option value=".$product->tid.">".$product->ttype."</option></div>";
}

echo "


</select>
          <div class='input-group'>
    <i class='far fa-image fa-lg'></i>
    <label><font color='white'>step 4: attach image of your design</label>
       <label><font color='white'>Product Image</font></label>
        <label class='form-label' for='Image'>Product Image</label>
                 <input type='file' 
                  name='my_image'>
    
    </div>


   <div class='input-group'>
 <i class='fa fa-question fa-lg'></i>
  <label><font color='white'>Step 4: Quantity</font></label>
  </div>
  <select class='form-select' id='Quantity' name ='Quantity'>
  <option value='60'>60</option>
  <option value='120'>120</option>
  <option value='180'>180</option>
  <option value='240' >240</option>
  <option value='300' >300</option>
  <option value='360' >360</option>
  <option value='420' >420</option>
</select>
          ";

 



    echo " 
         <div class='input-group'>
 <i class='fa fa-comment ffa-lg'></i>
  <label><font color='white'>Step 5: Anything else that we should know?</font></label>
  <input type='text' id='comment' name='comment' required placeholder='Write here'><br></div>
  </div>

         <div class='input-group'>
 <i class='fa fa-clock ffa-lg'></i>
  <label><font color='white'>Step 6: Delivery time</font></label>
  <label class='radio-inline'>
      <input type='radio' name='optradio' id='q156' value='ASAP'><font color='white'>Priority (4-5 days)</font>
    </label>
    <label class='radio-inline'>
      <input type='radio' name='optradio'  id='q156' value='Flexible'><font color='white'>Standard (1-2 weeks)</font>
    </label>
    
      </div>

  </div>
  </div>

 


    <div class='input-group'>
    <center><a href='../index.php'  class='btn'>Back to Home</a></form>
          <input type='submit' value='Submit Order' name='submit' class='btn'> 
    </div>
    </div>";
  





    

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
<footer>

</footer>
<!--Footer-->


<?php include '../Navigation&footer/navscript2.php'?>



</body>
</html>

 