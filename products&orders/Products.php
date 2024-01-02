<?php
require_once("../Classes/productsClasses.php");
session_start();
if(empty($_SESSION['UserID'])) 
{
  header('location: ../index.php');
} 
?>

	<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Products</title>
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
    <link rel="stylesheet" href="../css/StyleProducts.css">
<link href="../css/stprod.css" type="text/css" rel="stylesheet" />
</head>
<body>
	<!--Main Navigation-->
<header>
<!--Navbar-->
<?php include '../Navigation&footer/NavProd.php'?>

<!--/.Navbar-->
<!--Mask-->


</div>
  <div class="txt-heading" id="q157"><h3>Products</h3></div>

  
<!--Men Products-->
  <a class="btn" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
    Men Products
  </a>

</p>
<div class="collapse" id="collapseExample">
  <div class="card card-body">
   <div class="content" >
    <div id="product-grid">


  <?php 
  $allProducts=Product::getAllMenProducts();
  if (!($allProducts) == 0){
  foreach ($allProducts as $product){?>
    <div class="product-item" width="200px" style="height: 250px; width: 340px;"  id="q157">
      <form method="post" action="order.php?action=add&id=<?php echo $product->id;?>name=<?php echo $product->name;?>info">
        <div><strong><h2><?php echo $product->name; ?></h2></strong></div>
        <div class="product-image"><img style="width:100px; height: 100px" src="<?php echo "../".$product->image;?>" ></div>
        <div class="product-price"><?php echo $product->type; ?></div>
        <div class="product-price"><?php echo "Price $".$product->price; ?></div>
      
        <div>
          
          <input type="submit" name="addto" value="Order Now" class="btnAddAction" />
        </div>
        
      </form>
    </div>
    <?php
     }
  }
  ?>

    </div>
   </div>
  </div>
</div>





<!--Women Products-->
  <a class="btn" data-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample">
    Women Products
  </a>

</p>
<div class="collapse" id="collapseExample2">
  <div class="card card-body">
   <div class="content" >
    <div id="product-grid">


  <?php 
  $allProducts=Product::getAllWomenProducts();
    if (!($allProducts) == 0){
  foreach ($allProducts as $product){?>
    <div class="product-item" width="200px" style="height: 250px; width: 340px;"  id="q157">
        <form method="post" action="order.php?action=add&id=<?php echo $product->id;?>name=<?php echo $product->name;?>info">
        <div><strong><h2><?php echo $product->name; ?></h2></strong></div>
        <div class="product-image"><img style="width:100px; height: 100px" src="<?php echo "../".$product->image;?>" ></div>
        <div class="product-price"><?php echo $product->type; ?></div>
        <div class="product-price"><?php echo "Price $".$product->price; ?></div>
      
        <div>
          
          <input type="submit" name="addto" value="Order Now" class="btnAddAction" />
        </div>
        
      </form>
    </div>
    <?php
   }
  }
  ?>
    </div>
  </div>
 </div>
</div>



<!--Unisex Products-->
  <a class="btn" data-toggle="collapse" href="#collapseExample3" role="button" aria-expanded="false" aria-controls="collapseExample">
    Unisex Products
  </a>

</p>
<div class="collapse" id="collapseExample3">
  <div class="card card-body">
   <div class="content" >
    <div id="product-grid">


  <?php 
  $allProducts=Product::getAllUniSexProducts();
    if (!($allProducts) == 0){
  foreach ($allProducts as $product){?>
    <div class="product-item" width="200px" style="height: 250px; width: 340px;"  id="q157">
      <form method="post" action="order.php?action=add&id=<?php echo $product->id;?>name=<?php echo $product->name;?>info">
        <div><strong><h2><?php echo $product->name; ?></h2></strong></div>
        <div class="product-image"><img style="width:100px; height: 100px" src="<?php echo "../".$product->image;?>" ></div>
        <div class="product-price"><?php echo $product->type; ?></div>
        <div class="product-price"><?php echo "Price $".$product->price; ?></div>
      
        <div>
          
          <input type="submit" name="addto" value="Order Now" class="btnAddAction" />
        </div>
        
      </form>
    </div>
    <?php
   }
  }
  ?>

   </div>
  </div>
 </div>
</div>

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
<?php include '../Navigation&footer/navscript2.php'?>

</body>
</html>

