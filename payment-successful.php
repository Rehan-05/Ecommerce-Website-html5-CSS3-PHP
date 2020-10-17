<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Paypal Integration Test - Success</title>
</head>
<body>

    <h1>Successful Payment</h1>
    <H1><a href="index.php">click to go on My website</a></H1>

</body>
</html>
<?php

include("includes/insert_product_fun.php");
$tansection_id=$_REQUEST['ts'];
$amount=$_REQUEST['amt'];
$currency=$_REQUEST['cc'];
$insert_payment="INSERT INTO paypal_amount(transection_no, amount,currency) VALUES ('$tansection_id','$amount','$currency')";
$run_amount=mysqli_query($con,$insert_payment);
$empty_cart="delete * from cart";
$run_cart=mysqli_query($con,$empty_cart);


?>