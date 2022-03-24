<!DOCTYPE html>
<html>
<title>Home</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karma">
<link rel="stylesheet" href="css/bootstrap-grid.min.css">

<script src = "js/bootstrap.min.js"> </script>
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Source+Serif+Pro:400,600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="fonts/icomoon/style.css">
<link rel="stylesheet" href="css/owl.carousel.min.css">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="css/bootstrap.min.css">
<!-- Style -->
<link rel="stylesheet" href="css/style.css">

<style>
body,h1,h2,h3,h4,h5,h6 {font-family: Roboto, Arial, sans-serif}
.w3-bar-block .w3-bar-item {padding:20px}
.btn-block {
      margin-top: 10px;
      text-align: right;
      align-items:flex-end;
      }
</style>
<?php
  require('connect.php');
  session_start();
  $userid=$_SESSION['userid'];

  if (isset($userid)){
  $sql1 = "
    SELECT * 
    FROM user
    where userid =  $userid
    ;
    ";
    $objQuery1 = mysqli_query($conn, $sql1) or die("Error Query [" . $sql1 . "]");
    $objResult1 = mysqli_fetch_array($objQuery1);
  }
  else {
  
  }
  ?>

<?php
$Namepage = 'Home';
require('headerbar.php');
?>
<!-- !PAGE CONTENT! -->
<body>



  <div class="content">
 
      <div class="container owl-2-style">
        
        <!-- <h4 class="text-primary py-5">Package</h4> -->
        

        <div class="owl-carousel owl-2">

         
            <?php
      $sql = "
      SELECT * 
      FROM package
      ;
      ";
  
    $objQuery = mysqli_query($conn, $sql) or die("Error Query [" . $sql . "]");
    $x=0;
    $array_fileupload = array();
     while ($objResult = mysqli_fetch_array($objQuery)) {
     
      $sql1 = "
      SELECT * 
      FROM packagedetail
      where IDPackage = $objResult[IDPackage]
      ;
      ";

    $objQuery1 = mysqli_query($conn, $sql1);
    $objResult1 = mysqli_fetch_array($objQuery1);

    $sql2 = "
    SELECT * 
    FROM picture
    where IDgarden = $objResult1[IDgarden]
    ;
    ";
    $objQuery2 = mysqli_query($conn, $sql2);
    $objResult2 = mysqli_fetch_array($objQuery2);
    ?>
     <div class="media-29101">
       
           
            <img src="fileupload/<?php echo $objResult2['fileupload']?>" alt="Image"  width="320px" height="250px" >

            <h3><?php echo $objResult["Name"]; ?></h3>
           <?php echo $objResult["Description"]; ?>

            <form action="ShowPackage.php" method="post" name="garden">
          <input type="hidden" name="IDPackage" value = "<?php echo $objResult["IDPackage"]; ?>" >
          
          <div class="btn-block">
          <input type="submit" class="btn btn-outline-dark" value="More"> </input>
          </div>
          </form>
            </div>
            <?php
  $x++;
      }
        
     ?>

        </div>
      </div>
 

  </div>
    
    

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
  <!-- First Photo Grid-->
  

  <link rel="stylesheet" href="main1.css">



  <div  class= "container" >
  <div class= "row"  >
    <?php
      $sql = "
      SELECT * 
      FROM garden
      ;
      ";
  
    $objQuery = mysqli_query($conn, $sql) or die("Error Query [" . $sql . "]");
    $x=0;
    $array_fileupload = array();
     while ($objResult = mysqli_fetch_array($objQuery)) {
      $IDgarden  = $objResult['IDgarden'];
      $sql1 = "SELECT * FROM picture where IDgarden =  $IDgarden;";
    
    $objQuery1 = mysqli_query($conn, $sql1) or die("Error Query [" . $sql1 . "]");
    $objResult1 = mysqli_fetch_array($objQuery1);
    ?>
       
       <?php if ($x == 3){  ?>   
       
       </div> </div> 
       <div class= "container">
       <div class= "row">
       <?php $x=0; } 
       
        ?>
      <div  class = "main1">
      
          
            <div class= "col" >
 
      
          <div class = "img1">
          <?php echo "<img src='fileupload/".$objResult1['fileupload']."'>";?>
          </div>
          <div class = "content1">
          
           <h3 > <?php echo $objResult["Name"]; ?> </h3>
           <p class="text-dark"> <?php echo $objResult["Description"]; ?> </p>
          
          </div>
         <footer>

          <form action="ShowGarden.php" method="post" name="garden">
          <input type="hidden" name="IDgarden" value = "<?php echo $objResult["IDgarden"]; ?>" >

        
          <div class="btn-block">
          <button type="submit" class="btn btn-outline-dark">More</button>
        </div>
          </form>
          </footer>
      </div>
     </div>
     
    
 <?php
  $x++;
      }
        
     ?>

</div> </div>
    

  
 

<script>
// Script to open and close sidebar
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
}
 
function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
}
</script>




</body>
</html>
