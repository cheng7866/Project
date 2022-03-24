
<!DOCTYPE html>
<html>
<title>W3.CSS Template</title>
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
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/style.css">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: Roboto, Arial, sans-serif}
.w3-bar-block .w3-bar-item {padding:20px}
</style>
<?php
  require('connect.php');
  session_start();
  $userid=$_SESSION['userid'];
  $IDPackage  = $_REQUEST['IDPackage'];
 
  $sql = "
    SELECT * 
    FROM package
    where IDPackage =  $IDPackage
    ;
    ";


  $objQuery = mysqli_query($conn, $sql) or die("Error Query [" . $sql . "]");
  $objResult = mysqli_fetch_array($objQuery);
  $Price =  $objResult["Price"];
  $Description =  $objResult["Description"];

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
    else{}
  ?>
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: Roboto, Arial, sans-serif}
.w3-bar-block .w3-bar-item {padding:20px}

html, body {
      min-height: 100%;
      }
      body, div, form, input, select, textarea, p { 
      padding: 0;
      margin: 0;
      outline: none;
      color: #666;
      line-height: 22px;
      }
      h1 {
      position: absolute;
      margin: 0;
      line-height: 55px;
      font-size: 55px;
      color: #fff;
      z-index: 2;
      }
      .testbox {
      display: flex;
      justify-content: center;
      align-items: left;
      height: inherit;
      padding: 20px;
      }
      form {
      width: 50%;
      padding: 20px;
      border-radius: 2px;
      background: #fff;
      box-shadow: 0 0 10px 0 #a37547; 
      }
      .banner {
      position: relative;
      height: 50px;
      background-image: url("/uploads/media/default/0001/02/3dd647f39593e88f45f61aaac6ff3027dce15506.jpeg");  
      background-size: cover;
      display: flex;
      justify-content: center;
      align-items: center;
      text-align: center;
      }
      .banner::after {
      content: "";
      background-color: rgba(0, 0, 0, 0.4); 
      position: absolute;
      width: 100%;
      height: 100%;
      }
      input, select, textarea {
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 3px;
      }
      input {
      width: calc(100% - 10px);
      padding: 5px;
      }
      select {
      width: 100%;
      padding: 7px 0;
      background: transparent;
      }
      textarea {
      width: calc(100% - 12px);
      padding: 5px;
      }
      .item:hover p, .item:hover i, .question:hover p, .question label:hover, input:hover::placeholder {
      color: #a37547;
      }
      .item input:hover, .item select:hover, .item textarea:hover {
      border: 1px solid transparent;
      box-shadow: 0 0 6px 0 #a37547;
      color: #a37547;
      }
      .item {
      position: relative;
      margin: 10px 0;
      }
      input[type=radio], input[type=checkbox]  {
      display: none;
      }
      label.radio {
      position: relative;
      display: inline-block;
      margin: 5px 20px 15px 0;
      cursor: pointer;
      }
      .question span {
      margin-left: 30px;
      }
      label.radio:before {
      content: "";
      position: absolute;
      left: 0;
      width: 17px;
      height: 17px;
      border-radius: 50%;
      border: 2px solid #ccc;
      }
      input[type=radio]:checked + label:before, label.radio:hover:before {
      border: 2px solid #a37547;
      }
      label.radio:after {
      content: "";
      position: absolute;
      top: 6px;
      left: 5px;
      width: 8px;
      height: 4px;
      border: 3px solid #a37547;
      border-top: none;
      border-right: none;
      transform: rotate(-45deg);
      opacity: 0;
      }
      input[type=radio]:checked + label:after {
      opacity: 1;
      }
      .btn-block {
      margin-top: 10px;
      text-align: center;
      }
      button {
      width: 50px;
      border: none;
      border-radius: 5px; 
      background: #6b4724;
      font-size: 16px;
      color: #fff;
      cursor: pointer;
      }
      button:hover {
      box-shadow: 0 0 18px 0 #3d2914;
      }
      @media (min-width: 568px) {
      .name-item, .city-item {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      }
      .name-item input, .city-item input {
      width: calc(50% - 20px);
      }
      .city-item select {
      width: calc(50% - 8px);
      }
      }
</style>
<br><br>

<?php
require('headerbar.php');
?>


<!-- !PAGE CONTENT! -->


  <!-- First Photo Grid-->

  <body>
  <link rel="stylesheet" href="showpackage.css">
  <link rel="stylesheet" href="show.css">
  <section>
  <h3><?php echo $objResult["Name"]; ?></h3>    
    <p>
    <?php echo $objResult["Description"]; ?>
    </p>
    <br>
    <p>Price : 
    <?php echo $objResult["Price"]; ?>
    baht/person
    </p>
    <br>
    <style>
* {box-sizing: border-box}
.mySlides1, .mySlides2 {display: none}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
  
}

/* Next & previous buttons */
.prev, .next {
 
  position: relative;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -22px;
 
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
  cursor: pointer;

}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a grey background color */
.prev:hover, .next:hover {
  background-color: #f1f1f1;
  color: black;
}
</style>
<?php
  $sql = "
    SELECT * 
    FROM packagedetail
    where IDPackage =  $IDPackage
    ;
    ";


  $objQuery = mysqli_query($conn, $sql) or die("Error Query [" . $sql . "]");
  $x=1;
  while ($objResult = mysqli_fetch_array($objQuery)) {
   $sql1 = "
    SELECT * 
    FROM garden
    where IDgarden =  $objResult[IDgarden]
    ;
    ";
    $objQuery1 = mysqli_query($conn, $sql1) or die("Error Query [" . $sql1 . "]");
    $objResult1 = mysqli_fetch_array($objQuery1);
    ?>

    <details>
    <summary>
      <?php echo $objResult1["Name"]; ?></summary>
      <div class="content">
      <div class="site-section bg-left-half mb-5">
      <div class="container owl-2-style"> 
  
    
    <?php
  
   $sql5 = "SELECT * FROM picture where IDgarden =  $objResult[IDgarden];";
   
     $objQuery5 = mysqli_query($conn, $sql5) or die("Error Query [" . $sql5 . "]"); 

   ?>
   <div class="owl-carousel owl-2">
   <?php 
  while ($objResult5 = mysqli_fetch_array($objQuery5)) { 
   ?>
  
      <div class="media-29101">
                  <img src="fileupload/<?php echo$objResult5['fileupload']?>" width="320px" height="250px" >
                 </div>
<?php
     }
     $x++;
    ?>

</div>
          
            </div>
            </div>
            </div>
    <p>
    <?php echo $objResult1["Description"]; ?>
    </p>
  </details> 

  <?php
  
  }
  ?>
</section>

  


    <div class="testbox">
    <form action="payment-main\payment2.php" method="post" name="garden">
    <input type="hidden" name="IDPackage" value="<?php echo $IDPackage; ?>">
    <input type="hidden" name="Price" value="<?php echo  $Price; ?>">
      <div class="item">
        <p>Date</p>
        <input type="date" name="bookingdate"><br>
      </div>
   
      <div class="item">
        <p>Total number of visitors</p>
        <input type="int" name="Numberofpeoplebooking"/>
      </div>
        <div class="btn-block">
         
          <?php if (isset($userid)){ ?>
          <button type="submit" >Book</button>
          <?php } 
    else {
        ?>
        <button type="button" onclick="myFunction()">Book</button>
        <?php } ?>
        </div>
    </form>
    </div>
  
   

    
<!-- End page content -->
<script>
function myFunction() {
  alert("You need to login");
}
</script>
<script>
// Script to open and close sidebar
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
}
 
function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
}
</script>

<script>
var slideIndex = [1,1];
var slideId = ["mySlides1", "mySlides2"]
showSlides(1, 0);
showSlides(1, 1);

function plusSlides(n, no) {
  showSlides(slideIndex[no] += n, no);
}

function showSlides(n, no) {
  var i;
  var x = document.getElementsByClassName(slideId[no]);
  if (n > x.length) {slideIndex[no] = 1}    
  if (n < 1) {slideIndex[no] = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";  
  }
  x[slideIndex[no]-1].style.display = "block";  
}
</script>
<script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
