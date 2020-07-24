<?php
include("../login/database.php");
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");

$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";

$paramList = $_POST;
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application’s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.


if($isValidChecksum == "TRUE") {
	echo "<b>Checksum matched and following are the transaction details:</b>" . "<br/>";
	if ($_POST["STATUS"] == "TXN_SUCCESS") {
		echo "<b>Transaction status is success</b>" . "<br/>";
		echo "<i><u>Kindly Note Down Your ORDERID for future confirmation</u></i>" . "<br/>";

		//Process your transaction here as success transaction.
		//Verify amount & order id received from Payment gateway with your application's order id and amount.
	}
	else {
		echo "<b>Transaction status is failure</b>" . "<br/>";
	}

	if (isset($_POST) && count($_POST)>0 )
	{ 
				//Database Storing System
$sql="INSERT INTO `admin`(`ORDERID`, `MID`, `TXNID`, `TXNAMOUNT`, `PAYMENTMODE`, `CURRENCY`, `TXNDATE`, `STATUS`, `RESPONSECODE`, `RESPMSG`, `GATEWAYNAME`, `BANKTXNID`, `BANKNAME`, `CHECKSUMHASH`,`ADD_ID`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
$stmt=mysqli_prepare($conn,$sql);
if($stmt){
	mysqli_stmt_bind_param($stmt,"ssiissssississs",$_POST["ORDERID"],$_POST['MID'],$_POST['TXNID'],$_POST['TXNAMOUNT'],$_POST['PAYMENTMODE'],$_POST['CURRENCY'],$_POST['TXNDATE'],$_POST['STATUS'],$_POST['RESPCODE'],$_POST['RESPMSG'],$_POST['GATEWAYNAME'],$_POST['BANKTXNID'],$_POST['BANKNAME'],$_POST['CHECKSUMHASH'],$_SESSION['ADD_ID']);
	mysqli_stmt_execute($stmt);
}
// $sql1="UPDATE `cart` SET `status`='confirmed',`ADD_ID`=$_SESSION['ADD_ID'] WHERE 1"
// echo $_SESSION['id'];
		foreach($_POST as $paramName => $paramValue) {
				echo "<br/>" . $paramName . " = " . $paramValue;
		}
		?>
		<tr>
			<link rel="stylesheet" type="text/css" href="style.css">
            <td></td>
            <td><br>
            	<br>
                <a type="submit" class="status" href="../shop.php" style="font-size: 20px;"><<==Back</a></td>
                <!-- <button type="submit" class="btn btn-danger" href="../shop.php" style="font-size: 20px;"><< Back</button> -->
            </tr>
		<?php
	}
	

}
else {
	echo "<b>Checksum mismatched.</b>";
	//Process transaction as suspicious.
}

?>