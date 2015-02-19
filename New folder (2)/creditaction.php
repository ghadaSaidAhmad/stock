<?php
require_once("FirstData.php");
$cardholder_name = $_POST["nameoncard"] ;
$cc_number = $_POST["ccnumber"] ;
$month = $_POST["month"] ;
$year = $_POST["year"] ;
$amount =  $_POST["amount"] ;
$cc_expiry = $month.$year ;
$cvd_code = $_POST["cvv"] ;

$trans  =  new FirstData() ;
$returnValue  =$trans->request($cardholder_name , $cc_number , $cc_expiry , $cvd_code, $amount ) ; 
//echo  $returnValue;

if(is_object($returnValue))
{
	if($returnValue->transaction_error =="00")
	{
		if( $returnValue->transaction_approved)
		{
			echo  "Transaction Completed Successfully" ;
			header("location: donetrans.php") ;
		}
	}	
}
else
	echo  $returnValue  ;

?>