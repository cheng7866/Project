<!DOCTYPE html>
<html>
<head>
        <title>Main Page</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <?php
  require('connect.php');
  session_start();
  $userid='1';

  $name = $_REQUEST['name'];
  $maxpeople = $_REQUEST['maxpeople'];
  $description = $_REQUEST['description'];
  $NumOfRound = $_REQUEST['round'];
  $Latitude = $_REQUEST['Latitude'];
  $Longitude = $_REQUEST['Longitude'];

  // for ($x = 1; $x <= $NumOfRound; $x++) {

  //   $price = $_REQUEST["price$x"];
  //   $stime = $_REQUEST["stime$x"];
  //   $etime = $_REQUEST["etime$x"];
  // }

  $numberofflower = $_REQUEST['numberofflower'];
  $NameThai =  "";
  $NameEng =  "";
  $DescriptionFlower =  "";
  $price =  "";
  $stime =  "";
  $etime =  "";
  
  ?>

<style>
body,h1,h2,h3,h4,h5,h6 {font-family: Roboto, Arial, sans-serif}
.w3-bar-block .w3-bar-item {padding:20px}
body {
              background-color: 	#FFEBCD;
              color: 	#FFEBCD;
               } 
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
      border:1px solid #6c7a89;
      border-radius: 5px; 
      background: #fff;
      font-size: 16px;
      color: #6c7a89;
      cursor: pointer;
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
<link rel="stylesheet" href="table.css">

<form action="InsertGarden.php" method="post" enctype="multipart/form-data"name="garden">
<div class="container">
  <h2>Add round</h2>
  <ul class="responsive-table">
  <li class="table-header">
      <div class="col col-22" >No</div>
      <div class="col col-23" >Start Time</div>
      <div class="col col-24" >End Time</div>
      <div class="col col-25" >Price</div>
    </li>

    <?php
    for ($x = 0; $x < $NumOfRound; $x++) {
    ?>

  <li class="table-row">
      <div class="col col-22" data-label="Name"><?php echo $x+1 ?></div>
      <div class="col col-23" data-label="Start Time"><input type="time" name="stime<?php echo $x ?>" required></div>
      <div class="col col-24" data-label="End Time"><input type="time" name="etime<?php echo $x ?>" required></div>
      <div class="col col-25" data-label="Price"><input type="integer" name="price<?php echo $x ?>" placeholder="Baht/person" required></div>

    
    </li>

    <?php   
}
    ?>
 
  </ul>
  </div>
  

  <div class="container">
  <h2>Add flower</h2>
  <p>Image size 4:3, resolution not lower than 1120*630</p>
  <ul class="responsive-table">
  <li class="table-header">
      <div class="col col-11" >No</div>
      <div class="col col-12" >Thai flower names</div>
      <div class="col col-13" >English flower names</div>
      <div class="col col-14" >DescriptionFlower</div>
      <div class="col col-15" >Image Browser</div>
    </li>

    <?php
    for ($x = 0; $x < $numberofflower; $x++) {
    ?>

  <li class="table-row">
      <div class="col col-11" data-label="No"><?php echo $x+1 ?></div>
      <div class="col col-12" data-label="NameThai"><input type="varchar" name="NameThai<?php echo $x ?>" required></div>
      <div class="col col-13" data-label="NameEng"><input type="varchar" name="NameEng<?php echo $x ?>" required></div>
      <div class="col col-14" data-label="DescriptionFlower"><input type="varchar" name="DescriptionFlower<?php echo $x ?>" required></div>
      <div class="col col-15" data-label="Image Browser"><input type="file" name="fileupload<?php echo $x ?>" accept="image/*"required="required"/>
           
    </li>

    <?php   
}
    ?>

  </ul>
  </div>

  


  </table>
  <input type = "hidden" value = "<?php echo $NumOfRound ?>" name = "NumOfRound">
  <input type = "hidden" value = "<?php echo $name ?>" name = "name">
  <input type = "hidden" value = "<?php echo $maxpeople ?>" name = "maxpeople">
  <input type = "hidden" value = "<?php echo $description ?>" name = "description">
  <input type = "hidden" value = "<?php echo $numberofflower ?>" name = "numberofflower">
  <input type = "hidden" value = "<?php echo $Latitude ?>" name = "Latitude">
  <input type = "hidden" value = "<?php echo $Longitude ?>" name = "Longitude">
 
  <div class="btn-block">
          <button type="submit" >Create</button>
        </div>
      </form>
</head>
  </html>