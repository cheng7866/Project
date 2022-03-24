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
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: Roboto, Arial, sans-serif}
.w3-bar-block .w3-bar-item {padding:20px}
</style>
<?php
  require('connect.php');
  session_start();
  $userid=$_SESSION['userid'];
  
  $sql = "
    SELECT * 
    FROM garden
    where userid = $userid
    ;
    ";



  $objQuery = mysqli_query($conn, $sql) or die("Error Query [" . $sql . "]");
  $sql1 = "
    SELECT * 
    FROM user
    where userid =  $userid
    ;
    ";
    $objQuery1 = mysqli_query($conn, $sql1) or die("Error Query [" . $sql1 . "]");
    $objResult1 = mysqli_fetch_array($objQuery1);
  ?>

<?php
$Namepage = 'Notification';
require('headerbar.php');
?>
<!-- !PAGE CONTENT! -->
<br><br><br>
<link rel="stylesheet" href="table.css">

<?php  

$array_IDgarden = array();
$array_GardenName = array();
$array_userid = array();
$x=0;


  

while ($objResult = mysqli_fetch_array($objQuery)) { 
  
  array_push($array_IDgarden, $objResult["IDgarden"]);
  array_push($array_GardenName, $objResult["Name"]);
  $x++;
  } 

$checkdata=false;
  for ($y = 0; $y < $x; $y++) {

    $sql1 = "
    SELECT *
    FROM booking
    WHERE IDgarden = $array_IDgarden[$y] and Status = 'wait'
    ;
    ";
    $objQuery = mysqli_query($conn, $sql1) or die("Error Query [" . $sql1 . "]");
    $objResult = mysqli_fetch_array($objQuery);
    if($objResult)  {

      $checkdata=true;
    }
    
  }
?>
<?php if($checkdata){  ?>
<div class="container">
  <!-- <h2>Responsive Tables Using LI <small>Triggers on 767px</small></h2> -->
  <h4 style="text-align: center;">Booking</h4>
  <ul class="responsive-table">
  <li class="table-header">
      <div class="col col-1" >ชื่อสวน</div>
      <div class="col col-2" >ผู้จอง</div>
      <div class="col col-3" >วันที่จอง</div>
      <div class="col col-4" >รอบที่จอง</div>
      <div class="col col-5" >จำนวนคนที่จอง</div>
      <div class="col col-6" >ราคาที่จ่าย</div>
      <div class="col col-7" >จ่ายเมื่อ</div>
      <div class="col col-8" >confirm</div>
      <div class="col col-9" >cancel</div>
    </li>

    <?php } ?>
<?php    
for ($y = 0; $y < $x; $y++) {

    $sql1 = "
    SELECT *
    FROM booking
    WHERE IDgarden = $array_IDgarden[$y] and Status = 'wait'
    ;
    ";
    $objQuery = mysqli_query($conn, $sql1) or die("Error Query [" . $sql1 . "]");

    while ($objResult = mysqli_fetch_array($objQuery)) {


      $sql2 = "
      SELECT *
      FROM round
      WHERE IDround = $objResult[IDround];
      ;
      ";
    $objQuery1 = mysqli_query($conn, $sql2) or die("Error Query [" . $sql2 . "]");
    $objResult1 = mysqli_fetch_array($objQuery1) ;

    $sql3 = "
    SELECT *
    FROM user
    WHERE userid = $objResult[userid];
    ;
    ";
  $objQuery2 = mysqli_query($conn, $sql3) or die("Error Query [" . $sql3 . "]");
  $objResult2 = mysqli_fetch_array($objQuery2) ;
?>
    <li class="table-row">
      <div class="col col-1" data-label="หัวข้อ"><?php echo $array_GardenName[$y]; ?></div>
      <div class="col col-2" data-label="Name"><?php echo $objResult2["username"] ?></div>
      <div class="col col-3" data-label="วันที่จอง"><?php echo $objResult["bookingdate"] ?></div>
      <div class="col col-4" data-label="รอบที่จอง"><?php echo $objResult1["StartTime"] ?> - <?php echo $objResult1["EndTime"] ?></div>
      <div class="col col-5" data-label="จำนวนคนที่จอง"><?php echo $objResult["Numberofpeoplebooking"] ?></div>
      <div class="col col-6" data-label="ราคาที่จ่าย"><?php echo $objResult["Price"] ?></div>
      <div class="col col-7" data-label="จ่ายเมื่อ"><?php echo $objResult["timestamp"] ?></div>
      <div class="col col-8" data-label="confirm">
        <form action="ConfirmBooking.php" method="post" name="garden">
          <input type="hidden" name="IDbooking" value = <?php echo $objResult["IDbooking"]; ?> >
          <input type="submit" value="Confirm">
        </form>
      </div>
      <div class="col col-9" data-label="cancel">
      <form action="UnconfirmBooking.php" method="post" name="garden">
          <input type="hidden" name="IDbooking" value = <?php echo $objResult["IDbooking"]; ?> >
          <input type="submit" value="Cancel">
        </form>
      </div>
    </li>
  



<?php
    }

   
}
  
  ?>

  </ul>
  </div>

<?php 
$checkdata=false;
$sql5 = "
  SELECT *
  FROM package
  WHERE userid = $userid
  ;
  ";
  $objQuery5 = mysqli_query($conn, $sql5) or die("Error Query [" . $sql5 . "]");
  
  while ($objResult5 = mysqli_fetch_array($objQuery5)) {
    $sql6 = "
    SELECT *
    FROM booking
    WHERE IDPackage  = $objResult5[IDPackage] and Status = 'wait'
    ;
    ";
    $objQuery6 = mysqli_query($conn, $sql6) or die("Error Query [" . $sql6 . "]");
    $objResult6 = mysqli_fetch_array($objQuery6);
    if($objResult6){
      $checkdata=true;
    }
  }
  ?>
  
  <?php 
  if($checkdata){
  ?>
  <div class="container"> 
    <h4 style="text-align: center;">Booking package</h4>
  <ul class="responsive-table">
  <li class="table-header">
      <div class="col col-1" >ชื่อแพคเกจ</div>
      <div class="col col-2" >ผู้จอง</div>
      <div class="col col-3" >วันที่จอง</div>
      <div class="col col-4" >จำนวนคนที่จอง</div>
      <div class="col col-5" >ราคาที่จ่าย</div>
      <div class="col col-6" >จ่ายเมื่อ</div>
      <div class="col col-8" >confirm</div>
      <div class="col col-9" >cancel</div>
    </li>

    <?php 
   }

  $sql5 = "
  SELECT *
  FROM package
  WHERE userid = $userid
  ;
  ";
  $objQuery5 = mysqli_query($conn, $sql5) or die("Error Query [" . $sql5 . "]");
  while ($objResult5 = mysqli_fetch_array($objQuery5)) {
    $sql6 = "
    SELECT *
    FROM booking
    WHERE IDPackage  = $objResult5[IDPackage] and Status = 'wait'
    ;
    ";
    $objQuery6 = mysqli_query($conn, $sql6) or die("Error Query [" . $sql6 . "]");
    while ($objResult6 = mysqli_fetch_array($objQuery6)) {
    $sql7 = "
  SELECT *
  FROM user
  WHERE userid = $objResult6[userid]
  ;
  ";
  $objQuery7 = mysqli_query($conn, $sql7) or die("Error Query [" . $sql7 . "]");
  $objResult7 = mysqli_fetch_array($objQuery7);
    ?>

<li class="table-row">
      <div class="col col-1" data-label="ชื่อแพคเกจ"><?php echo $objResult5["Name"] ?></div>
      <div class="col col-2" data-label="ผู้จอง"><?php echo $objResult7["username"] ?></div>
      <div class="col col-3" data-label="วันที่จอง"><?php echo $objResult6["bookingdate"]  ?></div>
      <div class="col col-4" data-label="จำนวนคนที่จอง"><?php echo $objResult6["Numberofpeoplebooking"] ?></div>
      <div class="col col-5" data-label="ราคาที่จ่าย"><?php echo $objResult6["Price"] ?></div>
      <div class="col col-6" data-label="จ่ายเมื่อ"><?php echo $objResult6["timestamp"] ?></div>
      <div class="col col-8" data-label="confirm">
        <form action="Confirmbookpackage.php" method="post" name="garden">
          <input type="hidden" name="IDbooking" value = <?php echo $objResult6["IDbooking"]; ?> > 
          <input type="submit" value="Confirm">
        </form>
      </div>
      <div class="col col-9" data-label="cancel">
        <form action="Unconbookpackage.php" method="post" name="garden">
          <input type="hidden" name="IDbooking" value = <?php echo $objResult6["IDbooking"]; ?> > 
          <input type="submit" value="Cancel">
        </form>
      </div>
    </li>

<?php
}
  }


?>
    </ul>
  </div>

<body>

<?php
$checkdata=false;
for ($y = 0; $y < $x; $y++) {
  $sql1 = "
  SELECT *
  FROM packagedetail
  WHERE IDgarden = $array_IDgarden[$y] and Status = 'wait'
  ;
  ";
  $objQuery = mysqli_query($conn, $sql1) or die("Error Query [" . $sql1 . "]");
  $objResult = mysqli_fetch_array($objQuery);
  if($objResult){
    $checkdata=true;
  }
}
  ?>
<?php if($checkdata){ ?>
<div class="container">
  <!-- <h2>Responsive Tables Using LI <small>Triggers on 767px</small></h2> -->
  <h4 style="text-align: center;">Create package</h4>
  <ul class="responsive-table">
  <li class="table-header">
  
      <div class="col col-1" >หัวข้อ</div>
      <div class="col col-2" >ชื่อผู้สร้างแพคเกจ</div>
      <div class="col col-3" >ชื่อสวน</div>
      <div class="col col-4" >ชื่อแพคเกจ</div>
      <div class="col col-5" >ราคารวม</div>
      <div class="col col-6" >ราคาที่ได้</div>
      <div class="col col-8" >confirm</div>
      <div class="col col-9" >cancel</div>
    </li>
    <?php
}
for ($y = 0; $y < $x; $y++) {
  $sql1 = "
  SELECT *
  FROM packagedetail
  WHERE IDgarden = $array_IDgarden[$y] and Status = 'wait'
  ;
  ";
  $objQuery = mysqli_query($conn, $sql1) or die("Error Query [" . $sql1 . "]");


while ($objResult = mysqli_fetch_array($objQuery)) {

  $sql2 = "
  SELECT *
  FROM package
  WHERE IDPackage  = $objResult[IDPackage]
  ;
  ";
  $objQuery1 = mysqli_query($conn, $sql2) or die("Error Query [" . $sql2 . "]");
  $objResult1 = mysqli_fetch_array($objQuery1);

  $sql3 = "
  SELECT *
  FROM user
  WHERE userid = $objResult1[userid]
  ;
  ";
  $objQuery2 = mysqli_query($conn, $sql3) or die("Error Query [" . $sql3 . "]");
  $objResult2 = mysqli_fetch_array($objQuery2);
?>
 <li class="table-row">
      <div class="col col-1" data-label="หัวข้อ">Package invite</div>
      <div class="col col-2" data-label="Name"><?php echo $objResult2["username"] ?></div>
      <div class="col col-3" data-label="ชื่อสวน"><?php echo $array_GardenName[$y]; ?></div>
      <div class="col col-4" data-label="ชื่อแพคเกจ"><?php echo $objResult1["Name"] ?></div>
      <div class="col col-5" data-label="ราคารวม"><?php echo $objResult1["Price"] ?></div>
      <div class="col col-6" data-label="ราคาที่ได้"><?php echo $objResult["Amount"] ?></div>
      <div class="col col-8" data-label="confirm">
        <form action="ConfirmPackage.php" method="post" name="garden">
          <input type="hidden" name="IDgarden" value = <?php echo $objResult["IDgarden"]; ?> > 
          <input type="hidden" name="IDPackage" value = <?php echo $objResult["IDPackage"]; ?> > 
          <input type="submit" value="Confirm">
        </form>
      </div>
      <div class="col col-9" data-label="cancel">
        <form action="UnconfirmPackage.php" method="post" name="garden">
          <input type="hidden" name="IDgarden" value = <?php echo $objResult["IDgarden"]; ?> >
          <input type="hidden" name="IDPackage" value = <?php echo $objResult["IDPackage"]; ?> > 
          <input type="submit" value="Cancel">
        </form>
      </div>
    </li>

<?php
}


}
?>

  </ul>
  </div>


</body>
  <!-- First Photo Grid-->
 



  
<!-- End page content -->


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
