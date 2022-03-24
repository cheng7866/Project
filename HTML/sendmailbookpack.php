<?php
date_default_timezone_set('Asia/Bangkok');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require('PHPMailer-master/PHPMailer-master/src/SMTP.php');
require('PHPMailer-master/PHPMailer-master/src/PHPMailer.php');
require('PHPMailer-master/PHPMailer-master/src/Exception.php');
require('connect.php');
$IDbooking	= $_REQUEST['IDbooking'];

$sql = "
    SELECT * 
    FROM booking
    where IDbooking =  $IDbooking
    ;
    ";
    $objQuery = mysqli_query($conn, $sql) or die("Error Query [" . $sql . "]");
    $objResult = mysqli_fetch_array($objQuery);
    
    $sql1 = "
    SELECT * 
    FROM package
    where IDPackage =  $objResult[IDPackage] 
    ;
    ";
    $objQuery1 = mysqli_query($conn, $sql1) or die("Error Query [" . $sql1 . "]");
    $objResult1 = mysqli_fetch_array($objQuery1);

    $sql3 = "
    SELECT * 
    FROM user
    where userid =  $objResult[userid]
    ;
    ";

    $objQuery3 = mysqli_query($conn, $sql3) or die("Error Query [" . $sql3 . "]");
    $objResult3 = mysqli_fetch_array($objQuery3);

$mail = $objResult3['email'];
$username = $objResult3['username'];

$mailmsg = "$mail";
$usermsg = "$username";
//Create a new PHPMailer instance
$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 0;
//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';
//Set the hostname of the mail server
$mail->Host = "smtp.gmail.com";
//Set the SMTP port number - likely to be 25, 465 or 587
$mail->Port = 587;
//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication
$mail->Username = "Flowergarden61061@gmail.com";
//Password to use for SMTP authentication
$mail->Password = "Asd$1234";
//Set who the message is to be sent from
$mail->setFrom('Flowergarden61061@gmail.com', 'Flower garden Dev');
//Set who the message is to be sent to
$mail->addAddress($mailmsg, $usermsg);
//Set the subject line
$mail->Subject = 'Booking ticket';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents('content.html'), dirname(__FILE__));
$name= $objResult1['Name'];
$bookingdate= $objResult['bookingdate'];
$Numberofpeoplebooking= $objResult['Numberofpeoplebooking'];

$msg = "แพคเกจชื่อ: $name "."วันที่จอง: $bookingdate "."จำนวนผู้เข้าชม: $Numberofpeoplebooking ";



$mail->msgHTML($msg);
//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    header("location: http://localhost/HTML/notificationpage.php");
}

