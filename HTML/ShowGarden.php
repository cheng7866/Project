<!DOCTYPE html>
<html>
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karma">
<link rel="stylesheet" href="css/bootstrap-grid.min.css">
<link rel="stylesheet" href="main.css">
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
<script src = "js/bootstrap.min.js"> </script>
<?php
  require('connect.php');
  session_start();
  $userid=$_SESSION['userid'];
  $IDgarden  = $_REQUEST['IDgarden'];
 
  $sql = "
    SELECT * 
    FROM garden
    where IDgarden =  $IDgarden
    ;
    ";


  $objQuery = mysqli_query($conn, $sql) or die("Error Query [" . $sql . "]");
  $objResult = mysqli_fetch_array($objQuery);
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
      width: 80%;
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
  <link rel="stylesheet" href="show.css">
    
            <div class = "img">
    <?php
   
    $sql5 = "SELECT * FROM picture where IDgarden =  $IDgarden;";
    
      $objQuery5 = mysqli_query($conn, $sql5) or die("Error Query [" . $sql5 . "]");
    
      
    $x=0;
   while ($objResult5 = mysqli_fetch_array($objQuery5)) { //การดึงข้อมูลออกมาจนกว่ามันจะครบตัวใน DB

    ?>
           <!-- รูป slide show -->
                   <!-- Slideshow container -->
                     <div class="slideshow-container">
                  <!-- Full-width images with number and caption text -->
                  <div class="mySlides fade">
                  <?php echo "<img src='fileupload/".$objResult5['fileupload']."'>";?>
                      <button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
                      <button class="w3-button w3-black w3-display-right" onclick="plusDivs(1)">&#10095;</button>

</div>
<!-- ถึงตรงนี้ -->
                    </div>

 <?php
  $x++;
      }

     ?>
</div>

           
            <div  class= "container" >
              <div class= "row"  >
               <div class= "col" >
               <div class= "testbox" >
          <div class = "description">
           
              <h3 ><?php echo $objResult["Name"]; ?></h3>
              <p><?php echo $objResult["Description"]; ?></p>
           
         
              <div class = "flowerinthegarden">
              <ul>
<?php  $sql = "
    SELECT * 
    FROM flowerinthegarden
    where IDgarden =  $IDgarden
    ;
    "; 
    $x=1;
           $objQuery = mysqli_query($conn, $sql) or die("Error Query [" . $sql . "]");
           while ($objResult = mysqli_fetch_array($objQuery)) { 
            ?> 
           
           <li><div>
           <?php echo $x ?>
           <?php echo $objResult["NameThai"]; ?> (<?php echo $objResult["NameEng"]; ?>)
           </div>
           <?php  echo $objResult["Description"]; ?></li>
           <?php 
           $x++;
            }
          ?>
</ul>
</div>
</div>
</div>
</div>

<div class= "col" >
<div class= "testbox" >
  <div class= "item"><p>
<?php  $sql = "
    SELECT * 
    FROM booking
    where IDgarden =  $IDgarden and Status = 'confirm'
    ;
    "; 
    $numberofpeoplebooking = 0;
           $objQuery = mysqli_query($conn, $sql) or die("Error Query [" . $sql . "]");
           while ($objResult = mysqli_fetch_array($objQuery)) { 
            $numberofpeoplebooking = $numberofpeoplebooking+$objResult["Numberofpeoplebooking"];
            }
            echo "จำนวนผู้ที่เคยมาชม : ";
           echo $numberofpeoplebooking;
          ?>
          </p>
          <br>
          
          
    <div class = "map">
  
<link rel="stylesheet" href="map.css">
    <!-- jsFiddle will insert css and js -->
    <?php

     $sql = "
     SELECT * 
     FROM garden
     where IDgarden =  $IDgarden
     ;
     ";
 
 
   $objQuery = mysqli_query($conn, $sql) or die("Error Query [" . $sql . "]");
   $objResult = mysqli_fetch_array($objQuery);
   $Latitude = $objResult["Latitude"];
   $Longitude = $objResult["Longitude"];

echo '<script> function initMap() { const uluru = { lat: ';

      echo "$Latitude";
      echo ', lng: ';
      echo "$Longitude" ;
      echo '};

    const map = new google.maps.Map(document.getElementById("map"), {
      zoom: 13,
      center: uluru,
    });

    const marker = new google.maps.Marker({
      position: uluru,
      map: map,
    });
  }
  </script>' 
; 
?> 
   
    <!--The div element for the map -->
    <div id="map"></div>
    </div>
    </div>
    </div>
    </div>
    <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDDgicSTiH9SvmhzfT31uGWGNBl3p-IE0Y&callback=initMap&libraries=&v=weekly"
      async
    ></script>
    </div>
  
   
   
       <div class= "row">
       <div class= "col">
    <div class="testbox">
    <form action="InsertReview.php" method="post" name="review">
    <input type="hidden" name="IDgarden" value="<?php echo $IDgarden; ?>">
      <div class="item">
        <p>Review</p>

        <link rel="stylesheet" href="teststar.css">
<fieldset class="rating">
    <input type="radio" id="star5" name="rating" value="5" /><label class = "full" for="star5" ></label>
   
    <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" ></label>

    <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" ></label>
 
    <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" ></label>

    <input type="radio" id="star1" name="rating" value="1" /><label class = "full" for="star1" ></label>
    
</fieldset>
<br>
        <textarea rows="3" name="Text"></textarea>
      </div>
    
      <div class="btn-block">
      <?php if (isset($userid)){ ?>
          <button type="submit" >Submit</button>
          <?php } 
    else {
        ?>
        <button type="button" onclick="myFunction()">Submit</button>
        <?php } ?>
        </div>

    </form>
    

    </div>

<!-- End page content -->
<div class="Review">
<?php
          
          $sql = "
            SELECT * 
            FROM review           
            WHERE IDgarden = $IDgarden";
         
              $objQuery = mysqli_query($conn, $sql) or die("Error Query [" . $sql . "]");
             
              $x=1; ?>

<?php
              while ($objResult = mysqli_fetch_array($objQuery)) {
              
              ?>

        <div class="item">
  <?php
          
          $sql1 = "
            SELECT * 
            FROM user           
            WHERE userid = $objResult[userid]";
         
              $objQuery1 = mysqli_query($conn, $sql1) or die("Error Query [" . $sql1 . "]");
              $objResult1 = mysqli_fetch_array($objQuery1)
              ?>
        <p><?php echo $objResult1["email"];?></p>
        
        </div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.checked {
  color: orange;
}
</style>

<?php for($x = 1; $x <= 5; $x++){ 
  if($x <=  $objResult["rate"] ){ ?>
<span class="fa fa-star checked"></span>
<?php
  } else{ ?>
<span class="fa fa-star"></span>

<?php
  }

  ?>


<?php } ?>
   

  <textarea rows="3" disabled>

   <?php 
    echo $objResult["Text"];
        
     ?></textarea>


<?php
        $x++;
      }
    
    
     ?>
  </div>
  </div>

       <div class= "col">
    <div class="testbox">
    <form action="payment-main\payment.php" method="post" name="garden">
    <input type="hidden" name="IDgarden" value="<?php echo $IDgarden; ?>">
    <p>Book form</p>
      <div class="item">
        <p>Date</p>
        <input type="date" name="bookingdate"><br>
      </div>
   
      <div class="item">
        <p>Total number of visitors</p>
        <input type="int" name="Numberofpeoplebooking"/>
      </div>
    
        <div class="question">
          <p>Round</p>
     
          <div class="question-answer">
          <?php
          
          $sql = "
            SELECT * 
            FROM round
            where IDgarden = $IDgarden;
           
            ";
         
              $objQuery = mysqli_query($conn, $sql) or die("Error Query [" . $sql . "]");
              $x=1;
              while ($objResult = mysqli_fetch_array($objQuery)) {
                  
              ?>
            <div>
            
              <input type="radio" value="<?php echo $objResult["IDround"]; ?>" id="IDround <?php echo $x?>" name="IDround" />
              <label for="IDround <?php echo $x?>" class="radio"><span>Round <?php echo $x?> time <?php echo $objResult["StartTime"]; ?> - <?php echo $objResult["EndTime"]; ?> Price <?php echo $objResult["Price"]; ?> per person</span></label>
     
            </div>
            <?php
        $x++;
      }
        
     ?>
          </div>
     
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
    </div>
    </div>
    </div>

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
