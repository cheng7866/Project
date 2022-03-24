<!DOCTYPE html>
<html>
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karma">
<link rel="stylesheet" href="css/bootstrap-grid.min.css">
<link rel="stylesheet" href="main.css">
<script src = "js/bootstrap.min.js"> </script>
<?php
  require('connect.php');
  session_start();
  $userid=$_SESSION['userid'];
  $IDgarden  = $_REQUEST['IDgarden'];
  if(isset($_REQUEST['edit'])){ 
 

  $sql = "
    SELECT * 
    FROM garden
    where IDgarden =  $IDgarden
    ;
    ";


  $objQuery = mysqli_query($conn, $sql) or die("Error Query [" . $sql . "]");
  $objResult = mysqli_fetch_array($objQuery);
  $sql1 = "
  SELECT * 
  FROM user
  where userid =  $userid
  ;
  ";
  $objQuery1 = mysqli_query($conn, $sql1) or die("Error Query [" . $sql1 . "]");
  $objResult1 = mysqli_fetch_array($objQuery1);
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
      width: 150px;
      padding: 10px;
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
        width: auto;
      }
      .city-item select {
      width: calc(50% - 8px);
      }
      }
</style>


<?php
require('headerbar.php');
?>
<!-- !PAGE CONTENT! -->


  <!-- First Photo Grid-->
  <link rel="stylesheet" href="show1.css">
  <div class = "img">
  <?php
$sql2 = "SELECT * FROM picture where IDgarden =  $IDgarden;";

$objQuery2 = mysqli_query($conn, $sql2) or die("Error Query [" . $sql2 . "]");


               while ($objResult2 = mysqli_fetch_array($objQuery2)) { 

                $fileupload   = $objResult2['fileupload'];

                ?>

              

               <form action="deleteimage.php" method="post" enctype="multipart/form-data" >
               <br><br>
               <?php echo "<img src='fileupload/".$objResult2['fileupload']."'>";?>
               <input type="hidden" name="PictureID" value="<?php echo  $objResult2['PictureID']; ?>" >
               <input type="hidden" name="IDgarden" value="<?php echo  $IDgarden; ?>" >

               
               <input type="submit"  value="Delete" >
             
               </form>
              
              
              <?php
               }
              
               ?>
 
           
          </div>
  <body>
    <div class="testbox">
    <form action="updatedata.php" method="post" enctype="multipart/form-data" name="garden">
  
          <div class = "content">
          fileupload: <input type="file" name="image[]" accept="image/*" class="form-control" multiple/>
              <h3>Name </h3><p><input type="varchar" name="Name" value="<?php echo $objResult["Name"]; ?>" ></p>
            
              <h3>Description</h3><textarea type="text" name="Description"><?php echo  $objResult["Description"]; ?></textarea>
              <h3>Maxpeople</h3><p><input type="int" name="Maxpeople" value="<?php echo  $objResult["Maxpeople"]; ?>"></input></p>
          </div>
      
        
          
    <?php
          
          $sql = "
            SELECT * 
            FROM flowerinthegarden
            where IDgarden = $IDgarden;
           
            ";
         
              $objQuery = mysqli_query($conn, $sql) or die("Error Query [" . $sql . "]");
              $x=0;
              while ($objResult = mysqli_fetch_array($objQuery)) {
           
              ?>
               <div class="item">
                   <h3>Flower<?php echo $x+1 ?></h3>
                   <div class="name-item">
                   <div> <p>Thai name</p> </div>
                  <input type="varchar" name="NameThai<?php echo $x ?>"    value="<?php echo  $objResult["NameThai"]; ?>">
                  <div> <p>English name</p> </div>
                  <input type="varchar" name="NameEng<?php echo $x ?>"    value="<?php echo  $objResult["NameEng"]; ?>">     </div>
                  <div><p>Description</p></div>  
                  <textarea type="varchar" name="DescriptionFlower<?php echo $x ?>"><?php echo  $objResult["Description"]; ?></textarea>
                  <input type = "hidden" name="IDflower<?php echo $x ?>" value = "<?php echo $objResult["IDflower"]; ?>" >
                  <input type = "hidden" value = "<?php echo $x+1 ?>" name = "NumOfFlower">
             
                  </div>
                  <?php
                  $x++;
              }
                  ?>
                  <br>
                  <div class="testbox"> 
                  <div class="item">     
    <?php
          
  $sql = "
    SELECT * 
    FROM round
    where IDgarden = $IDgarden;
   
    ";
 
      $objQuery = mysqli_query($conn, $sql) or die("Error Query [" . $sql . "]");
      $x=0;
      while ($objResult = mysqli_fetch_array($objQuery)) {
          
      ?>
      
      <div class="item">
   <h3>Round<?php echo $x+1 ?></h3>
    <div class="name-item">
          
    <div> <p>Start time </p> </div>
    <p><input type="time" name="stime<?php echo $x ?>"    value="<?php echo  $objResult["StartTime"]; ?>"></p>
        <div> <p>End time </p> </div>
        <p>  <input type="time" name="etime<?php echo $x ?>"    value="<?php echo  $objResult["EndTime"]; ?>">  </p>   </div>
        <div> <p>Price </p> </div>
        <p> <input type="integer" name="price<?php echo $x ?>" value="<?php echo  $objResult["Price"]; ?>"></p>
        <input type = "hidden" name="IDround<?php echo $x ?>" value = "<?php echo $objResult["IDround"]; ?>" >
        <input type = "hidden" value = "<?php echo $x+1 ?>" name = "NumOfRound">
   
             
        </div>
          <?php
$x++;
      }
        
     ?>
   </div>
   </div>
   <input type="submit" name="submit" value="Submit" class="btn btn-primary">
     <input type="hidden" name="IDgarden" value = "<?php echo $IDgarden ?>" >
    </form>
    </div>
   <?php 
  }else if(isset($_REQUEST['delete'])){

require('connect.php');

$sql = "
    DELETE FROM garden
    WHERE IDgarden = $IDgarden;
    ";

$objQuery = mysqli_query($conn, $sql);
if ($objQuery) {
  header("location: http://localhost/HTML/GardenDetailV2.php");
} else {
  echo  die("Error Query [" . $sql . "]");
}
  }
?>

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
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  x[slideIndex-1].style.display = "block";
}
</script>

</body>
</html>
