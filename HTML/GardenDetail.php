

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
        <script src = "js/bootstrap.min.js"> </script>
        <style>
          body,h1,h2,h3,h4,h5,h6 {font-family: "Karma", sans-serif}
          .w3-bar-block .w3-bar-item {padding:20px}
        </style>

        <header>
<!-- Sidebar (hidden by default) -->
        <nav class="w3-sidebar w3-bar-block w3-card w3-top w3-xlarge w3-animate-left" style="display:none;z-index:2;width:40%;min-width:300px" id="mySidebar">
          <a href="javascript:void(0)" onclick="w3_close()"
          class="w3-bar-item w3-button">Close Menu</a>
          <a href="http://localhost/HTML/home.php" onclick="w3_close()" class="w3-bar-item w3-button">Home</a>
          <a href="http://localhost/HTML/CreateGarden.php" onclick="w3_close()" class="w3-bar-item w3-button">Create Garden</a>
          <a href="http://localhost/HTML/GardenDetail.php" onclick="w3_close()" class="w3-bar-item w3-button">Your Garden</a>
          <a href="http://localhost/HTML/notificationpage.php" onclick="w3_close()" class="w3-bar-item w3-button">Notification</a>
        </nav>
        <div class="w3-top">
          <div class="w3-white w3-xlarge" style="max-width:1200px;margin:auto">
            <div class="w3-button w3-padding-16 w3-left" onclick="w3_open()">☰</div>
            <div class="w3-right w3-padding-16">Mail</div>
            <div class="w3-center w3-padding-16">Your Garden</div>
          </div>
        </div>
       </header>  
       
       </head>
    <body>
  
        

   
          
     
      
           



            <?php
  require('connect.php');
  session_start();
  $userid=$_SESSION['userid'];
  
 
  $sql = "
    SELECT * 
    FROM garden
    where userid = $userid;
    ";

  $objQuery = mysqli_query($conn, $sql) or die("Error Query [" . $sql . "]");
  ?>
   <br><br><br>
  <table border="1">
    <tr>
    <th width="50">
        <div align="center">No</div>
      </th>
    <th width="100">
        <div align="center">GardenID</div>
      </th>
      <th width="100">
        <div align="center">Name</div>
      </th>
      <th width="100">
        <div align="center">CustomerID</div>
      </th>
      <th width="100">
        <div align="center">Maxpeople</div>
      </th>
      <th width="100">
        <div align="center">Visitor</div>
      </th>
      <th width="100">
        <div align="center">Description</div>
      </th>
      <th width="100">
        <div align="center">Delete</div>
      </th>
      <th width="100">
        <div align="center">Update</div>
      </th>
  
    </tr>
    <?php
    $i = 1;
    while ($objResult = mysqli_fetch_array($objQuery)) {
    ?>
      <tr>
        <td>
          <div align="center"><?php echo $i; ?></div>
        </td>
        <td><?php echo $objResult["IDgarden"]; ?></td>
        <td><?php echo $objResult["Name"]; ?></td>
        <td><?php echo $objResult["userid"]; ?></td>
        <td><?php echo $objResult["Maxpeople"]; ?></td>
        <td><?php echo $objResult["Visitor"]; ?></td>
        <td><?php echo $objResult["Description"]; ?></td>
        <td align="center"><a href="deletedata.php?<?php echo $objResult["userid"]; ?>">Delete</a></td>
        <td align="center">
        <form action="UpdateGarden-1.php" method="post" name="garden">
        <input type="hidden" name="IDgarden" value = <?php echo $objResult["IDgarden"]; ?> >
        <input type="submit" value="Update">
        </form>
        </td>
      </tr>
    <?php
      $i++;
    }
   
    ?>
  </table>
 <?php
  $sql = "
    SELECT * 
    FROM round
   ;
    ";
 
      $objQuery = mysqli_query($conn, $sql) or die("Error Query [" . $sql . "]");
      ?>
       <table border="1">
    <tr>
    <th width="50">
        <div align="center">No</div>
      </th>
    <th width="100">
        <div align="center">IDround</div>
      </th>
      <th width="100">
        <div align="center">IDgarden</div>
      </th>
      <th width="100">
        <div align="center">StartTime</div>
      </th>
      <th width="100">
        <div align="center">EndTime</div>
      </th>
      <th width="100">
        <div align="center">Price</div>
      </th>
      <th width="100">
        <div align="center">Delete</div>
      </th>
      <th width="100">
        <div align="center">Update</div>
      </th>
  
    </tr>

    <?php    while ($objResult = mysqli_fetch_array($objQuery)) { ?>
    <tr>
        <td>
          <div align="center"><?php echo $i; ?></div>
        </td>
        <td><?php echo $objResult["IDround"]; ?></td>
        <td><?php echo $objResult["IDgarden"]; ?></td>
        <td><?php echo $objResult["StartTime"]; ?></td>
        <td><?php echo $objResult["EndTime"]; ?></td>
        <td><?php echo $objResult["Price"]; ?></td>
        <td align="center"><a href="deletedata.php?<?php echo $objResult["userid"]; ?>">Delete</a></td>
        <td align="center">
        <form action="UpdateGarden-1.php" method="post" name="garden">
        <input type="hidden" name="IDgarden" value = <?php echo $objResult["IDgarden"]; ?> >
        <input type="submit" value="Update">
        </form>
        </td>
      </tr>

      <?php
    }
    ?>

   
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