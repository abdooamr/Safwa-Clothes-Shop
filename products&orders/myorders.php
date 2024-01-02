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
  <title>My Orders</title>
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

  <div class="content" >

  <div id="product-grid">
	<div class="txt-heading" id="q157">My Orders</div>
	<?php	

	$allProducts=Orders::getMyOrders($_SESSION['UserID']);
	foreach ($allProducts as $product){?>
		<div class="product-item" width="200px" id="q157">
			<form method="post" action="order.php?action=add&id=<?php echo $product->name; ?>">
				<div><strong>My Orders: <?php echo $product->product_name; ?></strong></div>
				
				
        <div style="white-space:nowrap">
                            
                            <h6 class="text-secondary"><i>Fabric: </i><?php echo $product->Fabric; ?></h6>
                            <h6 class="text-secondary"><i>Printing: </i><?php echo $product->PrintType; ?></h6>
                            <h6 class="text-secondary"><i>Quantity: </i><?php echo $product->Quantity; ?></h6>
                            <h6 class="text-secondary"><i>Comments: </i><?php echo $product->AdditionalInfo; ?></h6>
                            <h6 class="text-secondary"><i>Delivery Time: </i><?php echo $product->deliveryTime; ?></h6>
                            <h6 class="text-secondary"><i>Ordered Time: </i><?php echo $product->OrderDate; ?></h6>
                            <h6 class="text-secondary"><i>Status: </i><?php echo $product->Orderstatus; ?></h6>
                            </div>
                
			
				<div>
					
				
				</div>
			
			</form>
		</div>
		<?php
	}
	?>
</content>

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


</div>
</header>
</body>
</html>
