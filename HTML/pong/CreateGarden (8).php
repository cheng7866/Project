

<!DOCTYPE html>
<html>
    <head>
        <title>Main Page</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karma">
<link rel="stylesheet" href="css/bootstrap-grid.min.css">
<link rel="stylesheet" href="main.css">
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
<script src = "js/bootstrap.min.js"> </script>
<?php 
session_start();
$userid = '1' ;


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
      color: #000;
      line-height: 22px;
      }
      h1 {
      position: absolute;
      margin: 0;
      line-height: 55px;
      font-size: 55px;
      color: #000;
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
      background: #F0E68C;
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
      box-shadow: 0 0 6px 0 #DAA520;
      color: #DAA520;
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
      background: #DAA520;
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

       <header>
<!-- Sidebar (hidden by default) -->
        <nav class="w3-sidebar w3-bar-block w3-card w3-top w3-xlarge w3-animate-left" style="display:none;z-index:2;width:40%;min-width:300px" id="mySidebar">
          <a href="javascript:void(0)" onclick="w3_close()"
          class="w3-bar-item w3-button">Close Menu</a>
          <a href="http://localhost/HTML/home.php" onclick="w3_close()" class="w3-bar-item w3-button">Home</a>
          <a href="http://localhost/HTML/CreateGarden.php" onclick="w3_close()" class="w3-bar-item w3-button">Create Garden</a>
          <a href="http://localhost/HTML/GardenDetailV2.php" onclick="w3_close()" class="w3-bar-item w3-button">Your Garden</a>
          <a href="http://localhost/HTML/notificationpage.php" onclick="w3_close()" class="w3-bar-item w3-button">Notification</a>
        </nav>
        <div class="w3-top">
          <div class="w3-cream w3-xlarge" style="max-width:1200px;margin:auto">
            <div class="w3-cream w3-button w3-padding-16 w3-left" onclick="w3_open()">☰</div>
            <div style="color:#DEB887;"class="w3-right w3-padding-16">Mail</div>
            <div style="color:#DEB887;" class="w3-center w3-padding-16">Create Garden</div>
          </div>
        </div>
       </header>     
   
    
      

  
        
     
          
   
            <?php
// define variables and set to empty values
$nameErr = $descriptionErr = $roundErr = $maxpeopleErr = $numberofflowerErr = "";
$name  = $description = $round = $maxpeople = $numberofflower = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else 

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["description"])) {
      $descriptionErr = "Description is required";
    }
  } else 
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["round"])) {
      $roundErr = "round is required";
    }
  } else 
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["maxpeople"])) {
      $maxpeopleErr = "Maxpeople is required";
    }
  } 
  else 
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["numberofflower"])) {
      $numberofflowerErr = "Maxpeople is required";
    }
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>


</head>
<body>
<br><br><br>


<div class="testbox">
	
<form action="AddFlower.php" method="post" name="garden" for="inp" class="inp">

  Name of the garden: <input type="varchar" name="name" id="inp" placeholder="&nbsp;">
  <span class="error" class="focus-bg">* <?php echo $nameErr;?></span>
  <br>
  <span class="label">Description:</span>
  <span class="focus-bg"></span>
   <textarea type="text" name="description" rows="5" cols="40" id="inp" placeholder="&nbsp;"></textarea>
  <span class="error" >* <?php echo $descriptionErr;?></span>
  <br>
  Number of rounds: <input type="integer" name="round" id="inp" placeholder="&nbsp;">
  <span class="error" >* <?php echo $roundErr;?></span>
  <br>
  Maximum number of people per round: <input type="int" name="maxpeople" id="inp" placeholder="&nbsp;">
  <span class="error" >* <?php echo $maxpeopleErr;?></span>
  <br>
  Number of flower: <input type="int" name="numberofflower" id="inp" placeholder="&nbsp;">
  <span class="error">* <?php echo $numberofflowerErr;?></span>
  <br>

  <div class="item">
        <p>Location</p><br>
        <div class="name-item">
        <input type="float" name="Latitude" id="inp" placeholder="Latitude">
        <input type="float" name="Longitude" id="inp" placeholder="Longitude">
        </div>
      </div>
  <input type="submit" value="Next">
  
</form>
</div>


           
    
     <br>
  
    

    </body>
    <script>
// Script to open and close sidebar
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
}
 
function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
}
</script>
</html>