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
        <?php
include('db.php');
$ORDERID=$_POST["ORDER_ID"];
$EMAIL=$_POST['EMAIL'];
$PHONE=$_POST['PHONE'];
$sql="SELECT * FROM `admin` WHERE `ORDERID`='$ORDERID'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
if(!$row) {
    echo "No Details Available";
}else{
    if($row['STATUS']=='TXN_SUCCESS'){
    $status=explode('_', $row['STATUS']);
    $eventId=str_split($row['ORDERID']);
    // if($eventId[0]==1){
    //     $eventName='event1';
    // }elseif ($eventId[0]==2) {
    //     $eventName='event2';
    // }elseif ($eventId[0]==3) {
    //     $eventName='event3';
    // }elseif ($eventId[0]==4) {
    //     $eventName='event4';
    // }
        ?>
        <table border="0">
            <tbody>
                <tr>
                    <td><label>TXNAMOUNT::</label></td>
                    <td><input id="TXNAMOUNT" tabindex="1" maxlength="20" size="20" name="TXNAMOUNT" autocomplete="off" value="<?= $row['TXNAMOUNT'] ?>" required>
                    </td>
                </tr>
                <tr>
                    <td><label>TXNDATE::</label></td>
                    <td><input id="TXNDATE" tabindex="1" maxlength="64" size="20" name="TXNDATE" autocomplete="off" value="<?= $row['TXNDATE'] ?>" required>
                    </td>
                </tr>
                <tr>
                    <td><label>STATUS::*</label></td>
                    <td><input id="STATUS" tabindex="1" maxlength="10" size="20" name="PHONE" autocomplete="off" value="<?= $status[1]; ?>" required>
                    </td>
                </tr>
                <tr>
                    <td><label>ADD_ID::*</label></td>
                    <td><input id="ADD_ID" tabindex="1" maxlength="10" size="20" name="ADD_ID" autocomplete="off" value="<?= $row['ADD_ID']; ?>" required>
                    </td>
                </tr>
               <!-- <tr>
                    <td><label>Event::</label></td>
                    <td><input id="EVENT" tabindex="1" maxlength="20" size="20" name="TXNAMOUNT" autocomplete="off" value="<?= $eventName; ?>" required>
                    </td>
                </tr> -->
                <tr>
                    <td></td>
                    <td><br>
                        <a type="submit" class="status" href="dash.php" style="font-size: 20px;">Back To Dashboard</a></td>
                </tr>
                <tr>
                    <td></td>
                    <td><br>
                        <a type="submit" class="status" href="logout.php" style="font-size: 20px;">Logout</a></td>
                </tr>
            </tbody>
        </table>
                <?php
}else{
    echo "You haven`t done the payment";
}
}

?>
</body>
</html>
