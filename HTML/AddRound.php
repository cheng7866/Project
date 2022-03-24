<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karma">
<head>
        <title>Main Page</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php
  require('connect.php');
  session_start();
  $userid=$_SESSION['userid'];
  $price =  "";
  $stime =  "";
  $etime =  "";
  $name = $_REQUEST['name'];
  $maxpeople = $_REQUEST['maxpeople'];
  $description = $_REQUEST['description'];
  $NumOfRound = $_REQUEST['round'];
  $numberofflower = $_REQUEST['numberofflower'];
  $Latitude = $_REQUEST['Latitude'];
  $Longitude = $_REQUEST['Longitude'];
  ?>

<table border="1" >
    <tr>
    <th width="50">
        <div align="center">No</div>
      </th>
    <th width="100">
        <div align="center">Start Time</div>
      </th>
      <th width="100">
        <div align="center">End Time</div>
      </th>
      <th width="100">
        <div align="center">Price</div>
      </th>
    </tr>
  
    <?php
    for ($x = 0; $x < $NumOfRound; $x++) {
    ?>
    
    <form action="AddFlower.php" method="post" name="garden">
      <tr>
        <td>
          <div align="center"><?php echo $x+1; ?></div>
        </td>
        <td><input type="time" name="stime<?php echo $x ?>"></td>
        <td><input type="time" name="etime<?php echo $x ?>"></td>
        <td><input type="integer" name="price<?php echo $x ?>"></td>     
        </td>
      </tr>
     
    <?php   
}
    ?>
  </table>
  <input type = "hidden" value = "<?php echo $NumOfRound ?>" name = "NumOfRound">
  <input type = "hidden" value = "<?php echo $name ?>" name = "name">
  <input type = "hidden" value = "<?php echo $maxpeople ?>" name = "maxpeople">
  <input type = "hidden" value = "<?php echo $description ?>" name = "description">
  <input type = "hidden" value = "<?php echo $numberofflower ?>" name = "numberofflower">
  <input type = "hidden" value = "<?php echo $Latitude ?>" name = "Latitude">
  <input type = "hidden" value = "<?php echo $Longitude ?>" name = "Longitude">
<input type="submit" value="Next">
      </form>
      </head>
  </html>