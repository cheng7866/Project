<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">


<?php
  require('connect.php');
  $packagename = $_REQUEST['packagename'];
  $description = $_REQUEST['description'];
  $price = $_REQUEST['price'];
  $numberofgardens = $_REQUEST['numberofgardens'];

  $array_garden = array();
for ($x = 0; $x < $numberofgardens; $x++) {

    
  array_push($array_garden, $_REQUEST["garden$x"]);

  
}
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
      width: 50px;
      padding: 5px;
      }
      select {
      width: 150px;
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
<body>
<div class="testbox">

<form action="InsertPackage.php" method="get">
<div class="item">
<div class="name-item">
<?php


for ($x = 0; $x < $numberofgardens; $x++) {
  ?>
 <div>
<?php
  $sql = "
  SELECT Name 
  FROM garden
  WHERE IDgarden = $array_garden[$x];
  ;
  ";
  $objQuery = mysqli_query($conn, $sql) or die("Error Query [" . $sql . "]");
  $objResult = mysqli_fetch_array($objQuery);
  ?>
  <div>
<?php
  echo  $objResult["Name"];
?>
 will get : </div><input type="int" name="Percent<?php echo $x ?>" required placeholder="Baht"> 
<label for="garden">Choose round :</label>
<select name="IDround<?php echo$x?>" id="IDround">
<?php $sumprice = $sumprice?> +  <?php echo $x ?> <?php echo $x ?>
<?php


  $sql = "
  SELECT * 
  FROM round
  WHERE IDgarden = $array_garden[$x];
  ;
  ";

$objQuery = mysqli_query($conn, $sql) or die("Error Query [" . $sql . "]");
        while ($objResult = mysqli_fetch_array($objQuery)) {         
?>
     <option value="<?php echo $objResult["IDround"]; ?>"><?php echo $objResult["StartTime"]?> - <?php echo $objResult["EndTime"]; ?> </option>
  
  <?php
    }
  ?>

  </select>
  </div>

<?php
}

?>
<?php 
 for ($x = 0; $x < $numberofgardens; $x++) {
  ?>
   <input type = "hidden" value = "<?php echo $array_garden[$x] ?>" name="garden<?php echo$x ?>" >
  <?php 
 }
?>
  <input type = "hidden" value = "<?php echo $price ?>" name = "price">
  <input type = "hidden" value = "<?php echo $packagename ?>" name = "packagename">
  <input type = "hidden" value = "<?php echo $description ?>" name = "description">
  <input type = "hidden" value = "<?php echo $numberofgardens ?>" name = "numberofgardens">

</div>
<input type="submit">
</div>
</form>

</div>

  </body>
</html>