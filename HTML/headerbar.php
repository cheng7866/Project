<header>
<!-- Sidebar (hidden by default) -->
<nav class="w3-sidebar w3-bar-block w3-card w3-top w3-xlarge w3-animate-left" style="display:none;z-index:2;width:40%;min-width:300px;" id="mySidebar">
<a href="Home.php" onclick="w3_close()" class="w3-bar-item w3-button">Home</a>

 
  <?php if (isset($userid)){ ?>
    <a href="CreateGarden.php" onclick="w3_close()" class="w3-bar-item w3-button">Create garden</a>
          <?php } 
    else {
        ?>
  
        <?php } ?>

        <?php if (isset($userid)){ ?>
          <a href="GardenDetailV2.php" onclick="w3_close()" class="w3-bar-item w3-button">Your garden/package</a>
          <?php } 
    else {
        ?>
        
        <?php } ?>

        <?php if (isset($userid)){ ?>
          <a href="CreatePackage.php" onclick="w3_close()" class="w3-bar-item w3-button">Create package</a>
          <?php } 
    else {
        ?>
     
        <?php } ?>

        
        <?php if (isset($userid)){ ?>
          <a href="notificationpage.php" onclick="w3_close()" class="w3-bar-item w3-button">Notification</a>
          <?php } 
    else {
        ?>
        
        <?php } ?>
 
        <?php if (isset($userid)){ ?>
          <a href="logout.php" onclick="w3_close()" class="w3-bar-item w3-button">Logout</a>
          <?php } 
    else {
        ?>

        <?php } ?>

  <a href="javascript:void(0)" onclick="w3_close()"
  class="w3-bar-item w3-button">Close Menu</a>
  
</nav>

<!-- Top menu -->
<div class="w3-top">
  <div class="w3-white w3-xlarge" style="max-width:1200px;margin:auto">
    <div class="w3-button w3-padding-16 w3-left" onclick="w3_open()">☰</div>

    <?php if (isset($objResult["email"])){ ?>
    <div class="w3-right w3-padding-16 " ><?php echo $objResult1["email"]; ?></div>

    <?php } 
    else {
        ?>
            <div class="w3-right w3-padding-16 w3-button"  onclick="window.location='login/login.php';"><?php echo Login; ?></div>
            <?php
  }?>

    <?php if (isset($objResult["Name"])){

    ?>
    <div class="w3-center w3-padding-16"><?php echo $objResult["Name"]; ?></div>
    <?php } 
    else {
        ?>
<div class="w3-center w3-padding-16"><?php echo $Namepage ?></div>
        <?php
    
    }?>
  </div>
</div>

</header>

<script>
function myFunction() {
  alert("You need to login");
}
</script>