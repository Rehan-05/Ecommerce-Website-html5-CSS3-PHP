<!doctype html>
<?php


include("../functions/functions.php");
session_start();

if(isset($_GET['order_id']))
{
    $order_id=$_GET['order_id'];
    

}
if(isset($_GET['update']))
{
    $order_id=$_GET['update'];
    

}
?>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Payment </title>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.9/angular.min.js"></script>
    <script src="../js/home_page.js"></script>
    <!-- angular js -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="styles/style.css?vs<?php echo time(); ?>" media="all" \>
    <link rel="stylesheet" href="styles/insert_product.css?vs<?php echo time(); ?>" media="all" \>
    <!-- style sheet -->
    </head>
    <style>
       
       
       table{
           padding: 5px;
           border: solid 1px white;
       }
       table td,tr{
           padding: 5px;
           
           font-weight: bold;
       }
       td.odd{
           text-align: right;
       }
       
 </style>
    
    
    <body ng-app="mod" >
     
<div align='center' class=' login'>
    <form action='confirm.php?update=<?php echo $order_id; ?>' method='POST'>
    

    <table width="500" align="center" border="2" bgcolor="#cccccc">

    <tr align="center">
        <td colspan="5"><h3>Please confirm your payment</h3></td>
    </tr>
    <tr>
        <td class=" odd">Invoice No:</td>
        <td><input type="text" name="invoice_no" id=""></td>
    </tr>
    <tr>
        <td class=" odd">Amount sent:</td>
        <td><input type="text" name="ammount" id=""></td>
    </tr>
    <tr >
        <td class=" odd">Select Payment Mode:</td>

        <td>
            <select name="payment_method" id="">
                <option value="">Select Payment</option>
                <option value="Bank Transfer">Bank Transfer</option>
                <option value="Easypaisa / UBL Omni">Easypaisa / UBL Omni</option>

                <option value="Westeren Union">Westeren Union</option>
                <option value="Paypal">Paypal</option>




            </select>
        </td>
    </tr>
    <tr>
        <td class=" odd">Transection/Refferance:</td>
        <td><input type="text" name="tr" id=""></td>
    </tr>
    <tr>
        <td class=" odd">Easypaisa / UBLomni code:</td>
        <td><input type="text" name="code" id=""></td>
    </tr>
    <tr>
        <td class=" odd">Payment Date:</td>
        <td><input type="date" name="Payment_date" id=""></td>
    </tr>
    <tr align="center">
        <td colspan="5"><input type="submit" name="confirm" value="Confirm Payment" class=" btn btn-light" id=""></td>
    </tr>

    </table>
    </form>
    </div>

    </body>

</html>
<?php



if(isset($_POST['confirm']))
{
   $o_id=$_GET['update'];
    
$invoice=$_POST['invoice_no'];
$amount=$_POST['ammount'];
$payment_method=$_POST['payment_method'];

$ref=$_POST['tr'];
$code=$_POST['code'];
$date=$_POST['Payment_date'];
$Complete='Complete';
$insert_amount="INSERT INTO payments(invoice_no,amount,payment_method,ref_no,code, payment_date) VALUES ('$invoice','$amount','$payment_method','$ref','$code','$date')";
$insertQ=mysqli_query($con,$insert_amount);
if($insertQ)
{
    echo "<h3 class=' text-info '>Your oder wil completed in next 24 hour. Thank you!</h3>";

    $up_Cus_order="update customer_orders set order_status='Complete' where order_id='$o_id' ";
$run_up=mysqli_query($con,$up_Cus_order);
}

}



?>