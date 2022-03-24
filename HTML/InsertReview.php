<?php
  require('connect.php');
  session_start();
  $userid=$_SESSION['userid'];
  $IDgarden  = $_REQUEST['IDgarden'];
  $rating = $_REQUEST['rating'];
  $Text = $_REQUEST['Text'];

  $sql1 = "
  SELECT * 
  FROM review           
  WHERE userid = $userid and IDgarden = $IDgarden";

    $objQuery1 = mysqli_query($conn, $sql1) or die("Error Query [" . $sql1 . "]");
    $objResult1 = mysqli_fetch_array($objQuery1);
    if($objResult1){
    echo $objResult1["IDgarden"];

    if($objResult1["IDgarden"]){
        $sql = "
        DELETE FROM review
        WHERE userid = $userid and IDgarden = $IDgarden";
        $objQuery = mysqli_query($conn, $sql);

        $sql = "
        INSERT INTO `review` ( `IDgarden`,  `userid`, `Text`, `rate`, `timestamp`) 
        VALUES ( '$IDgarden', '$userid', '$Text', '$rating', CURRENT_TIMESTAMP )
        ";
        if ($conn->query($sql) === TRUE) {header("location: http://localhost/HTML/Showgarden.php?IDgarden=$IDgarden");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }else{
  $sql = "
INSERT INTO `review` ( `IDgarden`,  `userid`, `Text`, `rate`, `timestamp`) 
VALUES ( '$IDgarden', '$userid', '$Text', '$rating', CURRENT_TIMESTAMP )
	";
    if ($conn->query($sql) === TRUE) {echo "yes";
    } else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	  }
    }
  }else{
    $sql = "
    INSERT INTO `review` ( `IDgarden`,  `userid`, `Text`, `rate`, `timestamp`) 
    VALUES ( '$IDgarden', '$userid', '$Text', '$rating', CURRENT_TIMESTAMP )
      ";
        if ($conn->query($sql) === TRUE) { header("location: http://localhost/HTML/Showgarden.php?IDgarden=$IDgarden");
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }
  }
  ?>
 