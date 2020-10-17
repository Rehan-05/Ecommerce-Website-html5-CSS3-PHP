<?php

include("../includes/insert_product_fun.php");

$c=$_SESSION['customer_email'];
    $get_c="select * from customers where customer_email='$c'";
    $run_c=mysqli_query($con,$get_c);
    $row_c=mysqli_fetch_array($run_c);
   
        $customer_id=$row_c['customer_id'];


?><style>
a{
    text-decoration: none;
    color: white;
}
a:hover{

     color: black;
     font-weight: bolder;
 } 
 table {
     font-size: medium;

 }
</style>
<div>


<table width='795' align="center" bgcolor='Orange'>

<tr style="color: white;" align="center"><th colspan="4">ALL Orders</th></tr>
<tr style="color: white;" align="center">
<td ><b>Order No</b></td>

<td><b>Due Amount</b></td>
<td><b>invoice Number</b></td>
<td><b>Total products</b></td>
<td><b>Order Date</b></td>
<td><b>Paid/Unpaid</b></td>
<td><b>Status</b></td>
</tr>
<tr><td colspan="7" ><hr></td></tr>
<?php



$get_order="select * from customer_orders";

$run_order=mysqli_query($con,$get_order);
$i=0;
while($row_order=mysqli_fetch_array($run_order))
{
$order_id=$row_order['order_id'];
 $order_amount=$row_order['due_amount'];
 $invoice_no=$row_order['invoice_no'];
 $total_products=$row_order['total_products'];

 $Order_date=$row_order['order_date'];

 $Status=$row_order['order_status'];
 
 $i++;
?>
<tr style="color: white;" align="center">

<td><?php  echo $i;  ?></td><td><?php echo $order_amount; ?></td>
<td><?php echo $invoice_no; ?></td>
<td><?php echo $total_products; ?></td>
<td><?php echo $Order_date; ?></td>
<td><?php
if($Status=='Pending')
{
    echo $Status='Unpaid' ; 
}
else{
    echo $Status='Paid'; 
}

?></td>

<td><a href="confirm.php?order_id=<?php echo $order_id;?>">confirm</a>

</tr>

<?php }
?>




</table>


</div>
