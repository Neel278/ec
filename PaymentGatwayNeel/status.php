<?php
	header("Pragma: no-cache");
	header("Cache-Control: no-cache");
	header("Expires: 0");

	// following files need to be included
	require_once("./lib/config_paytm.php");
	require_once("./lib/encdec_paytm.php");

	$ORDER_ID = "";
	$requestParamList = array();
	$responseParamList = array();

	if (isset($_POST["ORDER_ID"]) && $_POST["ORDER_ID"] != "") {

		// In Test Page, we are taking parameters from POST request. In actual implementation these can be collected from session or DB. 
		$ORDER_ID = $_POST["ORDER_ID"];

		// Create an array having all required parameters for status query.
		$requestParamList = array("MID" => PAYTM_MERCHANT_MID , "ORDERID" => $ORDER_ID);  
		
		$StatusCheckSum = getChecksumFromArray($requestParamList,PAYTM_MERCHANT_KEY);
		
		$requestParamList['CHECKSUMHASH'] = $StatusCheckSum;

		// Call the PG's getTxnStatusNew() function for verifying the transaction status.
		$responseParamList = getTxnStatusNew($requestParamList);
	}

?>
<!DOCTYPE html>
<html>
<head>
<title>Transaction status query</title>
<meta name="GENERATOR" content="Evrsoft First Page">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet"> -->
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h2>Transaction status query</h2>
	<!-- <h3>*-Only for Those Who have Check Out.</h3> -->
	<form method="post" action="">
		<table border="0">
			<tbody>
				<tr>
					<td><label>ORDER_ID::*</label></td>
					<td><input id="ORDER_ID" tabindex="1" maxlength="20" size="20" name="ORDER_ID" autocomplete="off" value="<?php echo $ORDER_ID ?>" required>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						<style type="text/css">
							.status{
								padding: 13px; 
								background-color: #3342FF;
								color: #18E0F4;
								font-size: 15px;
								font-family: sans-serif;
							}.status:hover{
								color:#3342FF;
								background: #18E0F4;
							}
						</style>
						<input value="Check Status" type="submit" class="submit" onclick=""></td>
				</tr>
			</tbody>
		</table>
		<br/></br/>
		<?php
		if (isset($responseParamList) && count($responseParamList)>0 )
		{ 
		?>
		<h2>Response of status query:</h2>
		<table style="border: 1px solid nopadding" border="0">
			<tbody>
				<?php
					foreach($responseParamList as $paramName => $paramValue) {
				?>
				<tr >
					<td style="border: 1px solid"><label><?php echo $paramName?></label></td>
					<td style="border: 1px solid"><?php echo $paramValue?></td>
				</tr>
				<?php
					}
				?>
			</tbody>
		</table>
		<?php
		}
		?>
	</form>
</body>
</html>