<link rel="stylesheet" href="../css/preload.css">
        <div class="loader">
      <img src="../css/circle-loader-gif.gif" alt="">
    </div>
   <script src="../css/pre.js" charset="utf-8"></script>
<nav class="navbar navbar-expand-lg navbar-light  bg-light">
 <a class="navbar-brand" href="../index.php">    <?php 
    include_once "../Classes/UserClass.php";

if(!empty($_SESSION['UserID'])) {

    $UserObject=new User($_SESSION["UserID"]);}

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
       <a class="nav-link" href="../index.php">El Safwa

  
            <span class="sr-only">(current)</span>
          </a>
        </li>
        <li class="nav-item">
            <?php  if(!empty($_SESSION['UserID'])) {
                 
          echo "<a class='nav-link' href='products.php'>Start an Order</a>";
          echo "</li>
                       <li class='nav-item'>"; 
          echo "<a class='nav-link' href='myorders.php'>My Orders</a>";
           $UserObject=new User($_SESSION["UserID"]);
          if($UserObject->UserType_obj->UserTypeName=="Admin"){
         echo"  <li class='nav-item'> <a class='nav-link' href='../members/admin/admin_panel_users.php'>Admin Panel</a>";
}
           }?>
        </li>
      
        <?php  if(!empty($_SESSION['UserID'])) {

        echo "<!-- Dropdown -->
        <li class='nav-item dropdown'>
          <a class='nav-link dropdown-toggle' id='navbarDropdownMenuLink' data-toggle='dropdown' aria-haspopup='true'
            aria-expanded='false'>User Settings</a>
          <div class='dropdown-menu dropdown-primary' aria-labelledby='navbarDropdownMenuLink'>
            <a class='dropdown-item' href='../members/user/viewprofile.php'>View Profile</a>
            <a class='dropdown-item' href='../members/user/profilesettings.php'>Edit Profile</a>
            <a class='dropdown-item' href='#'>Later will add</a>
          </div>
        </li>";
    }?>

      </ul>
      <!-- Links -->

     
        <div class="md-form my-0">
   <?php  if(!empty($_SESSION['UserID'])) {
          echo "<a class='btn' href='../members/user/signout.php' >Signout</a>";
      }
      else {
        echo "<a class='btn' href='login.php' >Login</a>";
      } ?>
        </li>
        </div>
      
    </div>
    <!-- Collapsible content -->

  </div>

</nav>
</header>


