<?php
 include 'AdminNav.php';


  if(empty($_SESSION['UserID'])) {

         header('location: ../../index.php');
        }
        else{
      $Accept=$_GET['id'];
      Product::deleteProduct($Accept);
      header('location: admin_panel_products.php');
    }

?>