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
    <th colspan="6">Veiw All Orders</th>
</tr>
<tr style="color: white;" align="center">

<td>Order No</td>
<td>Customer Name</td>
<td>Invoice No</td>
<td>Product Name</td>
<td>Qty</td>
<td>Status</td>
<td>Delete</td>



</tr>
<?php


include("includes/insert_product_fun.php");
$get_order="select * from pending_orders";
$run_order=mysqli_query($con,$get_order);
$i=0;
while($row_order=mysqli_fetch_array($run_order))
{
    $cus_id=$row_order['customer_id'];
    $invoice_no=$row_order['invoice_no'];

    $pro_id=$row_order['product_id'];
    $qty=$row_order['qty'];
    $order_status=$row_order['order_status'];
   
        $get_cus="select * from customers where customer_id='$cus_id'";
        $run_cus=mysqli_query($con,$get_cus);
        $get_name=mysqli_fetch_array($run_cus);
        $cun_name=$get_name['customer_name'];

         
    $i++;
if($order_status=='Peniding')


?>

<tr align="center" style="color: white;">
    <td><?php echo $i; ?></td>
    <td><?php echo $cun_name; ?></td>

    <td><?php echo $invoice_no; ?></td>

    <td><?php echo $pro_id; ?></td>
    <td><?php echo $qty; ?></td>
    <td><?php echo $order_status; ?></td>
    <td><a  href="delete.php?delete_order=<?php echo $pro_id; ?>">Delete</a></td>

    

</tr>
<?php } ?>

</table>
<?php
}?>