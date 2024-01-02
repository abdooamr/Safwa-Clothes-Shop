



<head>
  <?php
      include_once "../../Classes/UserClass.php";
    include_once "../../Classes/productsClasses.php";
  session_start();
  if(!empty($_SESSION['UserID'])) {
           $UserObject=new User($_SESSION["UserID"]);
          if($UserObject->UserType_obj->UserTypeName!=="Admin"){
         header('location: ../../index.php');
        }

} else {header('location: ../../index.php');}
 
    ?>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <!-- MDB icon -->
   <link rel="icon" href="../../img/products.ico" type="image/x-icon">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="../../css/bootstrap.min.css">
  <!-- Material Design Bootstrap -->
  <link rel="stylesheet" href="../../css/mdb.min.css">
  <!-- Your custom styles (optional) -->
  <link rel="stylesheet" href="../../css/orderspaneladmin.css">
  
  <link rel="stylesheet" href="../../css/preload.css">
        <div class="loader">
      <img src="../../css/circle-loader-gif.gif" alt="">
    </div>

   <script src="../../css/pre.js" charset="utf-8"></script>
</head>
<nav class="navbar navbar-expand-lg navbar-light  bg-light">
 <a class="navbar-brand" href="../../index.php">    <?php 
    include_once "../../Classes/UserClass.php";

if(!empty($_SESSION['UserID'])) {

    $UserObject=new User($_SESSION["UserID"]);}
  //  echo "<h1>Welcome ".$UserObject->UserName."</h1>";
 if (isset($_SESSION["UserID"])): ?>
       <p><font color="purple">Welcome <strong><?php echo $UserObject->FName  ?> <?php echo $UserObject->LName?></strong></font></p>

       
    <?php endif ?></a>


    <!-- Collapse button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
      aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Collapsible content -->
    <div class="collapse navbar-collapse" id="basicExampleNav">

      <!-- Links -->
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="../../index.php">El Safwa
            <span class="sr-only">(current)</span>
          </a>
        </li>
        <li class="nav-item">
            <?php  if(!empty($_SESSION['UserID'])) {
                 
          echo "<a class='nav-link' href='admin_panel_admins.php'>Admins</a>";
          echo "</li>
                       <li class='nav-item'>"; 
          echo "<a class='nav-link' href='admin_panel_users.php'>Users</a>
           <li class='nav-item'>
           <a class='nav-link' href='admin_panel_orders_action.php'>Orders</a>
              <li class='nav-item'>
           <a class='nav-link' href='admin_panel_products.php'>Products</a>";

           }?>
        </li>
      
        <?php  if(!empty($_SESSION['UserID'])) {

        echo "<!-- Dropdown -->
        <li class='nav-item dropdown'>
          <a class='nav-link dropdown-toggle' id='navbarDropdownMenuLink' data-toggle='dropdown' aria-haspopup='true'
            aria-expanded='false'>User Settings</a>
          <div class='dropdown-menu dropdown-primary' aria-labelledby='navbarDropdownMenuLink'>
            <a class='dropdown-item' href='../user/viewprofile.php'>View Profile</a>
            <a class='dropdown-item' href='../user/profilesettings.php'>Edit Profile</a>
            <a class='dropdown-item' href='#'>Later will add</a>
          </div>
        </li>";
    }?>

      </ul>
      <!-- Links -->

     
        <div class="md-form my-0">
   <?php  if(!empty($_SESSION['UserID'])) {
          echo "<a class='btn' href='../user/signout.php' >Signout</a>";
      }
      else {
        echo "<a class='btn' href='../login.php' >Login</a>";
      } ?>
        </li>
        </div>
      
    </div>
    <!-- Collapsible content -->

  </div>

</nav>
</header>


