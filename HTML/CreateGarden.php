

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
require('connect.php');
session_start();
$userid = $_SESSION['userid'] ;

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
      align-items: center;
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
      width: calc(50% - 20px);
      }
      .city-item select {
      width: calc(50% - 8px);
      }
      }
</style>

<?php
$Namepage = 'Create garden';
require('headerbar.php');
?>  
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

  Name of the garden: <input type="varchar" name="name" id="inp" placeholder="&nbsp;" required>

  <br>
  <span class="label">Description:</span>
  <span class="focus-bg"></span>
   <textarea type="text" name="description" rows="5" cols="40" id="inp" placeholder="&nbsp;" required></textarea>

  <br>
  Number of rounds: <input type="integer" name="round" id="inp" placeholder="numeric" required>
 
  <br>
  Maximum number of people per round: <input type="int" name="maxpeople" id="inp" placeholder="numeric" required>

  <br>
  Number of flower: <input type="int" name="numberofflower" id="inp" placeholder="numeric" required>
  
  <br>

  <link rel="stylesheet" href="bootstrap-4/css/bootstrap.min.css" crossorigin="anonymous">

<script type="text/javascript" src="testmap.js" ></script>
	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDDgicSTiH9SvmhzfT31uGWGNBl3p-IE0Y&callback=initMap"
type="text/javascript"></script>

<script language="JavaScript">

function initMap() { 
	var myOptions = {
	  zoom: 9,
	  center: new google.maps.LatLng(18.757343796242726,99.02640328200185),
	};

	var map = new google.maps.Map(document.getElementById('map_canvas'),
		myOptions);


	var marker = new  google.maps.Marker({
		map:map,
		position: new google.maps.LatLng(18.757343796242726,99.02640328200185),
		draggalbe:true

	});

	var infowindow = new google.maps.InfoWindow({
		map:map,
		content:"Hello",
		position: new google.maps.LatLng(18.757343796242726,99.02640328200185)

	});

	google.maps.event.addListener(map,'click',function(event){
		infowindow.open(map,marker);
		infowindow.setContent("LatLng = " + event.latLng);
		infowindow.setPosition(event.latLng);
		marker.setPosition(event.latLng);

		$("#lat").val(event.latLng.lat());
		$("#lng").val(event.latLng.lng());

		
	});	

}


function saveLocation(){
var location_name  = $("#location_name").val();
var lat  = $("#lat").val();
var lng  = $("#lng").val();
var location_type  = $("#location_type option:selected").val();

$.ajax({
method:"POST",
url:"insert.php",
data:{ location_name:location_name,lat:lat,lng:lng,location_type:location_type   }
}).done(function(){
alert("OK");
});

}

</script>


	
		<div id="map_canvas" style="width:100%;height:500px"></div>
	
    <div class="item">
        <p>Location</p>

      </div>
			
						<div class="form-group">
								<label for="lat">Latitude</label>
								<input type="text" class="form-control" name ="Latitude" id="lat" placeholder="Lat" required>
						</div>
						<div class="form-group">
							<label for="Lng">Longitude</label>
							<input type="text" class="form-control" name ="Longitude" id="lng" placeholder="Lng" required>
						</div>

  <input type="submit" onclick="saveLocation()" class="btn btn-default" value="Next">
  
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