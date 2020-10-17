<?php
include("includes/insert_product_fun.php");
if(!isset($_SESSION['user_email']))
{
    echo "<script>window.open('login.php?not_admin=You are not an Admin!','_self');</script>";
}
else
{
?>
<style>
   a{
       text-decoration: none;
       color: white;
   }
   a:hover{

        color: orange;
    }
</style>
<table width='795' align="center" bgcolor='#187eae'>

<tr align="center">
    <th colspan="6">Veiw All Payments</th>
</tr>
<tr style="color: white;" align="center">

<td>Payment No</td>

<td>Invoice No</td>
<td>Amount Paid</td>
<td>Payment Method</td>

<td>Ref No</td>
<td>code</td>

<td>Payment Date</td>



</tr>
<?php


include("includes/insert_product_fun.php");
$get_payment="SELECT * FROM payments";
$run_payment=mysqli_query($con,$get_payment);
$i=0;
while($row_p=mysqli_fetch_array($run_payment))
{
    $invoice_no=$row_p['invoice_no'];

    $amount_paid=$row_p['amount'];

    $payment_method=$row_p['payment_method'];
    $ref_no=$row_p['ref_no'];
    $code=$row_p['code'];
    $payment_date=$row_p['payment_date'];

   
         
    $i++;



?>

<tr align="center" style="color: white;">
    <td><?php echo $i; ?></td>
    <td><?php echo $invoice_no; ?></td>

    <td><?php echo $amount_paid; ?></td>

    <td><?php echo $payment_method; ?></td>
    <td><?php echo $ref_no; ?></td>
    <td><?php echo $code; ?></td>
    <td><?php echo $payment_date; ?></td>

    

</tr>
<?php } ?>

</table>
<?php
}?>