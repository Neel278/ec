<?php
include("db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Dashboard</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="../PaymentGatwayNeel/style.css">
</head>
<body>
	Please Enter The email and Phone no. Which used during payment
	<form method="post" action="details_admin.php">
	<table border="0">
			<tbody>
				<tr>
					<td><label>ORDER_ID::*</label></td>
					<td><input id="ORDER_ID" tabindex="1" maxlength="20" size="20" name="ORDER_ID" autocomplete="off" value="" required>
					</td>
				</tr>
				<tr>
					<td><label>EMAIL::*</label></td>
					<td><input id="EMAIL" tabindex="1" maxlength="64" size="20" name="EMAIL" autocomplete="off" value="" required>
					</td>
				</tr>
				<tr>
					<td><label>PHONE::*</label></td>
					<td><input id="PHONE" tabindex="1" maxlength="10" size="20" name="PHONE" autocomplete="off" value="" required>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						<input value="Check Avaibility" type="submit" class="status" onclick=""></td>
				</tr>
				<tr>
                    <td></td>
                    <td><br>
                        <a type="submit" class="status" href="logout.php" style="font-size: 20px;">Logout</a></td>
                </tr>
			</tbody>
		</table>
		</form>
</body>
</html>