<?php
require_once("lib/PromptPayQR.php");
require('../connect.php');
session_start();
$userid=$_SESSION['userid'];
$IDPackage  = $_REQUEST['IDPackage'];
$Price1  = $_REQUEST['Price'];
$Price = 0;

  $bookingdate = $_REQUEST['bookingdate'];
  $Numberofpeoplebooking = $_REQUEST['Numberofpeoplebooking'];


$Price = $Numberofpeoplebooking*$Price1;

    $sql = "
    SELECT * 
    FROM user
    where userid = $userid;
   
    ";
    $objQuery = mysqli_query($conn, $sql) or die("Error Query [" . $sql . "]");
    $objResult = mysqli_fetch_array($objQuery);
    
$PromptPayQR = new PromptPayQR(); // new object
$PromptPayQR->size = 5; // ขนาดรูปของ QR
$PromptPayQR->id = $objResult["telephone"]; // PromptPay ID
$PromptPayQR->amount = $Price; //  set ราคา

?>
<div style="text-align: center;align-items:center;justify-content:center;  height:100%; position:relative;display: flex;">
<div style="display:block;">
<h1>Scan for pay</h1>
<?php
echo '<img src="' . $PromptPayQR->generate() . '" />';
?>
<form action="../InsertBookingpackage.php" method="post" name="garden">

<input type="hidden" name="IDPackage" value = "<?php echo $IDPackage ?>" >
<input type="hidden" name="Numberofpeoplebooking" value = "<?php echo $Numberofpeoplebooking ?>" >
<input type="hidden" name="Price" value = "<?php echo $Price ?>" >
<input type="hidden" name="bookingdate" value = "<?php echo $bookingdate ?>" >

<input type="submit" value="Confirm">
<INPUT TYPE="button" VALUE="Cancel" onClick="history.back()">
</form>
</div>
</div>