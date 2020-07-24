<?php
include("../login/database.php");
if($_SESSION['login']==true){
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");
// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");
if($_SESSION['rand']==$_POST['ORDER_ID'] && $_SESSION['price']==$_POST['TXN_AMOUNT']){
$checkSum = "";
$paramList = array();

$ORDER_ID = htmlspecialchars($_POST["ORDER_ID"]);
$CUST_ID = htmlspecialchars($_POST["CUST_ID"]);
$INDUSTRY_TYPE_ID = htmlspecialchars($_POST["INDUSTRY_TYPE_ID"]);
$CHANNEL_ID = htmlspecialchars($_POST["CHANNEL_ID"]);
$TXN_AMOUNT = htmlspecialchars($_POST["TXN_AMOUNT"]);
$MSISDN=htmlspecialchars($_POST['PHONE']);
$EMAIL=htmlspecialchars($_POST['EMAIL']);
$ADD_ID=htmlspecialchars($_POST['ADD_ID']);
$_SESSION['ADD_ID']=$ADD_ID;
// die();
//Database Storing System

$sql="INSERT INTO `payment`(`order_id`, `cust_id`, `industry_type_id`, `channel_id`, `txn_ammount`, `email`, `msi_sdn`) VALUES (?,?,?,?,?,?,?)";
$stmt=mysqli_prepare($conn,$sql);
if($stmt){
	mysqli_stmt_bind_param($stmt,"ssssisi",$ORDER_ID,$CUST_ID,$INDUSTRY_TYPE_ID,$CHANNEL_ID,$TXN_AMOUNT,$EMAIL,$MSISDN);
	mysqli_stmt_execute($stmt);
}

// Create an array having all required parameters for creating checksum.
$paramList["MID"] = PAYTM_MERCHANT_MID;
$paramList["ORDER_ID"] = $ORDER_ID;
$paramList["CUST_ID"] = $CUST_ID;
// $paramList["ADD_ID"] = $ADD_ID;
$paramList["INDUSTRY_TYPE_ID"] = $INDUSTRY_TYPE_ID;
$paramList["CHANNEL_ID"] = $CHANNEL_ID;
$paramList["TXN_AMOUNT"] = $TXN_AMOUNT;
$paramList["MSISDN"] = $MSISDN; //Mobile number of customer
$paramList["EMAIL"] = $EMAIL; //Email ID of customer
$paramList["WEBSITE"] = PAYTM_MERCHANT_WEBSITE;
$paramList["CALLBACK_URL"] = "http://localhost/ec/PaymentGatwayNeel/pgResponse.php";

/*

$paramList["MSISDN"] = $MSISDN; //Mobile number of customer
$paramList["EMAIL"] = $EMAIL; //Email ID of customer
$paramList["VERIFIED_BY"] = "EMAIL"; //
$paramList["IS_USER_VERIFIED"] = "YES"; //

*/

//Here checksum string will return by getChecksumFromArray() function.
$checkSum = getChecksumFromArray($paramList,PAYTM_MERCHANT_KEY);

?>
<html>
<head>
<title>Merchant Check Out Page</title>
</head>
<body>
	<center><h1>Please do not refresh this page...</h1></center>
		<form method="post" action="<?php echo PAYTM_TXN_URL ?>" name="f1">
		<table border="1">
			<tbody>
			<?php
			foreach($paramList as $name => $value) {
				echo '<input type="hidden" name="' . $name .'" value="' . $value . '">';
			}
			?>
			<input type="hidden" name="CHECKSUMHASH" value="<?php echo $checkSum ?>">
			</tbody>
		</table>
		<script type="text/javascript">
			document.f1.submit();
		</script>
	</form>
</body>
</html>
<?php
}else{
	echo "Please Don't Change The Values!! It will cost you deleting your account";
}
}else{
	header("location:../login/login.php");
}
?>