<?php
	include("../login/database.php");
	header("Pragma: no-cache");
	header("Cache-Control: no-cache");
	header("Expires: 0");
if($_SESSION['login']==true){
$product_id=explode('@', $_SESSION['address']);
$rand=$product_id[0]."ORDS" . rand(10000,99999999);
$_SESSION['rand']=$rand;
// echo $_SESSION['price'];
$custId="CUST" . rand(100,99999);
$_SESSION['cust_id']=$custId;
if(isset($_SESSION['address'])){
	$id=$_SESSION['address'];
	// $_SESSION['id']=$id;
//     $sql="SELECT * FROM `product_details` WHERE `id`='$id'";
//     $result=mysqli_query($conn,$sql);
//     if($result->num_rows >0){
//     	$row=mysqli_fetch_assoc($result);
    	// $_SESSION['price']=$row['new_price'];
//     } 
// }else{
	// header("location:../shop.php");
// }
}else{
    header("location:../login/");
}
}
?>
<!DOCTYPE html">
<html>
<head>
<title>Merchant Check Out Page</title>
<meta name="GENERATOR" content="Evrsoft First Page">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet"> -->
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h1>Merchant Check Out Page</h1>
	<h3>Kindly Note down The <u style="color: #f05e54;">ORDER_ID</u> for Future Confirmation :)</h3>
	<form method="post" action="pgRedirect.php?id=<?= $id; ?>" class="form">
		<table border="1">
			<tbody>
				<tr>
					<th>S.No</th>
					<th>Label</th>
					<th>Value</th>
				</tr>
				<tr>
					<td>1</td>
					<td><label>ORDER_ID::*</label></td>
					<td><input id="ORDER_ID" tabindex="1" maxlength="20" size="20"
						name="ORDER_ID" autocomplete="off"
						value="<?php echo  $rand?>" required>
					</td>
				</tr>
				<tr>
					<td>2</td>
					<td><label>CUSTID ::*</label></td>
					<td><input id="CUST_ID" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="<?= $custId ?>" required></td>
				</tr>
				<tr>
					<td>2</td>
					<td><label>ADDID ::*</label></td>
					<td><input id="ADD_ID" tabindex="2" maxlength="12" size="12" name="ADD_ID" autocomplete="off" value="<?= $_SESSION['address'] ?>" required></td>
				</tr>
				<tr>
					<td>3</td>
					<td><label>INDUSTRY_TYPE_ID ::*</label></td>
					<td><input id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail" required></td>
				</tr>
				<tr>
					<td>4</td>
					<td><label>Channel ::*</label></td>
					<td><input id="CHANNEL_ID" tabindex="4" maxlength="12"
						size="12" name="CHANNEL_ID" autocomplete="off" value="WEB" required>
					</td>
				</tr>
				<tr>
					<td>5</td>
					<td><label>txnAmount*</label></td>
					<td><input title="TXN_AMOUNT" tabindex="10"
						type="text" name="TXN_AMOUNT"
						value="<?= $_SESSION['price']; ?>" required>
					</td>
				</tr>
				<tr>
					<td>6</td>
					<td><label>EMAIL::*</label></td>
					<td><input id="EMAIL" tabindex="1" maxlength="64" size="32"
						name="EMAIL" autocomplete="off" placeholder="Enter Your Email" required>
					</td>
				</tr>
				<tr>
					<td>7</td>
					<td><label>PHONE::*</label></td>
					<td><input id="PHONE" tabindex="1" maxlength="10" size="10"
						name="PHONE" autocomplete="off" placeholder="Phone Number" required>
					</td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td><input value="CheckOut" type="submit"	onclick=""></td>
				</tr>
			</tbody>
		</table>
		* - Mandatory Fields
	</form>
	<tr>
		<td>
			<style type="text/css">
				#status{
			padding: 13px; 
			background-color: #3342FF;
			color: #18E0F4;
			font-size: 15px;
			font-family: sans-serif;
				}#status:hover{
					color:#3342FF;
					background: #18E0F4;
				}
		</style>
			<a id="status" href="status.php" >Check Payment Status</a>
		</td>
	</tr>
</body>
</html>