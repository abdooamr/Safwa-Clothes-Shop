<?php

session_start();
  include_once "Classes/UserClass.php";

if(!empty($_SESSION['UserID'])) {
    $UserObject=new User($_SESSION["UserID"]);
}
else{

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'navigation&footer/navhome.php'?>
  <title>Home</title>
  <!-- MDB icon -->


</head>
<body>
    

<!--Main Navigation-->

<header>
<!--Navbar-->


<!--/.Navbar-->
<!--Mask-->
      <div style="width: fixed;">
        <div>
    <div class="container" >

        <div class="header" style="width:fixed;">
    <h2><font size=4>Home Page</font></h2>
  </div>
  <div class="content"style="width: fixed;" >

    <?php if (isset($_SESSION['success'])): ?>
      <div class="error success">
         <h3>
            <?php
               echo $_SESSION['success'];
               unset($_SESSION['success']);
            ?>
          </h3> 
      </div>
    <?php endif ?>

<div class="row" style="inline-size: fixed" >
  <div class="column" style="margin-right: 100px">

    <img src="css/features.png" alt="Snow" style="margin-left: 100px ;width:300px;height:300px">
        <h4 style="margin-left: 100px "><font color='White' size="100">Our Features</font></h4>

        <p style="margin-left: 100px ;width:330px;height:300px"> <font color="white" size="5" style="font-family: bardley hand,cursive;">El Safwa Production provides large quantities of
clothing with an application that is simple to use and that also provides them with a 3D model
of the product details they specify and displays it to the customer. </font> </p>
  </div>


  <div class="column" style=" margin-right: 100px; margin-top: 400px;">
    <img src="css/design3.png" alt="Forest"  style="width:300px;height:300px">

              <p style="margin-left: 10px ;width:330px;height:300px; max-height: fixed ;"> <font color="white" size="5" style="font-family: bardley hand,cursive;">Make your own Design and Choose Fabric type, color and types for 3D prints </font> </p>
  </div>
 

   <div class="column" style=" margin-right: 200px; margin-top: 500px;">
    <img src="img/EasyP.jpeg" alt="Mountains" style="width:300px;height:300px">
        <h4><font color='White'>Easy Payments</font></h4>

              <p style="margin-left: 10px ;width:330px;height:300px; max-height: fixed ;"> <font color="white" size="5" style="font-family: bardley hand,cursive;">All services agreed to in this contract shall be sold for the price specified in the quotation. Payment by bank transfer or debit/credit card via PayPal or standing order. Bank and PayPal details are shown on all invoices and statements.
</font> </p>
    
  </div>
</div>
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
<?php include 'Navigation&footer/footer1.php'?>
</footer>

<!--Footer-->



  <!-- jQuery -->
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- Your custom scripts (optional) -->
  <script type="text/javascript"></script>


</html>
