<?php
require_once("ZarinpalFunction.php");
$MerchantID 		= "xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx";
$Amount 		= 100;
$Description 		= "تراکنش زرین پال";
$Email 			= "";
$Mobile 		= "";
$CallbackURL 		= "http://example.com/verify.php";
$ZarinGate 	        = false;
$SandBox 		= false;
$zp 			= new zarinpal();
$result 		= $zp->request($MerchantID, $Amount, $Description, $Email, $Mobile, $CallbackURL, $SandBox, $ZarinGate);
if (isset($result["Status"]) && $result["Status"] == 100) {
	// Success and redirect to pay
	$zp->redirect($result["StartPay"]);
} else {
	// error
	echo "خطا در ایجاد تراکنش";
	echo "<br />کد خطا : " 		. $result["Status"];
	echo "<br />تفسیر و علت خطا : " . $result["Message"];
}
