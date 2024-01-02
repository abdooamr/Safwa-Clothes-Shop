<?php
 include 'AdminNav.php';



  if(empty($_SESSION['UserID'])) {

         header('location: ../../index.php');
        }
        else{
      $Accept=$_GET['id'];
      Orders::DenyOrder($Accept);
      header('location: admin_panel_orders_action.php');
    }

?>