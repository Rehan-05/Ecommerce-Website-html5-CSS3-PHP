<?php
include("functions/functions.php");
if(isset($_GET['cus_id']))
{
    $customer_id=$_GET['cus_id'];
    $get_email="select * from customers where customer_id='$customer_id'";
    $cus_email=mysqli_query($con,$get_email);
    $row_email=mysqli_fetch_array($cus_email);

    $cus_email_for_order=$row_email['customer_email'];
    $Cus_name=$row_email['customer_name'];
}


$total=0;
$pro_ip=getIp();
$status='Pending';
$invoice_no=mt_rand();
$sel_price="SELECT * FROM CART WHERE IP_ADD='$pro_ip'";

$run_price=mysqli_query($con,$sel_price);
$count_pro=mysqli_num_rows($run_price);
$i=0;
while($p_price=mysqli_fetch_array($run_price))
{

    $pro_id=$p_price['p_id'];
    $pro_price="SELECT * FROM PRODUCTS WHERE product_id='$pro_id'";
    $run_pro=mysqli_query($con,$pro_price);
    while($pp_price=mysqli_fetch_array($run_pro))
    {
        $p_name=$pp_price['product_title'];
        $product_price=array($pp_price['product_price']);
        $values=array_sum($product_price);
        $total+=$values;

        $i++;
    }

}


$get_cart="select * from cart where ip_add='$pro_ip'";

$run_qty=mysqli_query($con,$get_cart);

$get_qty=mysqli_fetch_array($run_qty);

$qty=$get_qty['qty'];

if($qty==0)
{
    $qty=1;
    $sub_total=$total;
}
else
{
    $qty=$qty;
    $sub_total=$total*$qty;
}
$insert_order="INSERT INTO customer_orders ( customer_id, due_amount, invoice_no, total_products, order_date, order_status) VALUES ('$customer_id','$sub_total','$invoice_no','$count_pro',NOW(),'$status')";
$run_order=mysqli_query($con,$insert_order);
if($run_order){
    echo "<script>alert('your order is successfully submitted Thanks');</script>";
    echo "<script>window.open('customers/myaccount.php','_self');</script>";
    $empty_cart="delete from cart where ip_add='$ip'";
    $run_empty=mysqli_query($con,$empty_cart);
    $insert_pending_order="INSERT INTO pending_orders(customer_id, invoice_no, product_id, qty, order_status) VALUES ('$customer_id','$invoice_no','$pro_id','$qty','$status')";
    $run_peinding_order=mysqli_query($con,$insert_pending_order);


    $from="as1265513@gmail.com";
    $subject="Order Details";
    $message="
    
    <html>
    
<h2>Dear $cus_name you have an oeder on Dabangmall.com</h2>
    <table width='600' align='center' bgcolor='#FFCC99' border='2'>
    
    <tr>
    <td>S.N</td>
    <td>Product</td>
    <td>Quantity</td>
    <td>Total</td>
    <td>Invoice No</td>
    
    </tr>
    <tr>
    <td>$i</td>
    <td>$p_name</td>
    <td>$qty</td>
    <td>$total</td>
    <td></td>
    
    
    </tr>
    
    </table>
    <h3>Thanks for order.</h3>
 <h3>Please go to your account and Pay the dues </h3>
 <h4> Click here to pay your price </h4>
 <H4><a href='mysite.com'></a></H4>
    </html>
    
    
    ";
    mail($cus_email_for_order,$subject,$message,$from);

    echo "<script>alert('Password was sent to your Email please chech your email');</script>";
    echo "<script>window.open('checkout.php','_self');</script>";
}



?>