<?Php
require_once("lib/PromptPayQR.php");

$PromptPayQR = new PromptPayQR(); // new object
$PromptPayQR->size = 5; // ขนาดรูปของ QR
$PromptPayQR->id = '0947591934'; // PromptPay ID
$PromptPayQR->amount = 50; //  set ราคา
echo '<img src="' . $PromptPayQR->generate() . '" />';

