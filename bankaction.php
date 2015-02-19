<?php
require_once("FirstData.php") ;

$name			= $_POST["name"] ;
$amount			= $_POST["amount"] ;
$checknumber	= $_POST["checknumber"] ;
$checktype		= $_POST["checktype"] ;
$routingnumber	= $_POST["routingnumber"] ;
$accountnumber	= $_POST["accountnumber"] ;
$driverlicense	= $_POST["driverlicense"] ;

$bank =  new FirstData() ;
$returnValue = $bank->requestBank($name	, $checknumber, $checktype, $accountnumber, $routingnumber, $amount ,  0 , $driverlicense);
if($returnValue->transaction_error == 0 && $returnValue-> transaction_approved == 1) 
	echo  "Transaction Completed Successfully" ;
?>

 