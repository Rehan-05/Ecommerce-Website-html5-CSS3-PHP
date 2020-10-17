<!doctype html>
<?php
include("includes/insert_product_fun.php");


?>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dabang Mall</title>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.9/angular.min.js"></script>
    <script src="js/home_page.js"></script>
    <!-- angular js -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="styles/style.css?vs<?php echo time(); ?>" media="all" \>
    <!-- style sheet -->
    </head>
<body>
<div>
    <?php
    
    $ip=getIp();
    $get_customer="select * from customers where customer_ip='$ip'";
    $run_customer=mysqli_query($con,$get_customer);
    $cus_data=mysqli_fetch_array($run_customer);
    $cus_id=$cus_data['customer_id'];
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
    
    ?>
<h2 style="text-align: center;">Pay now with PayPal</h2>
<p style="text-align: center;">
<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">

<!-- Identify your business so that you can collect the payments. -->
<input type="hidden" name="business" value="rehanmall@dabang.com">

<!-- Specify a Buy Now button. -->
<input type="hidden" name="cmd" value="_xclick">

<!-- Specify details about the item that buyers will purchase. -->
<input type="hidden" name="item_name" value="<?php echo $p_name; ?>">
<input type="hidden" name="amount" value="<?php echo $sub_total; ?>">
<input type="hidden" name="currency_code" value="USD">

<!-- Provide the buyer with a text box option field. -->
<input type="hidden" name="on0" value="strong>Size">Enter your size (S, M, L, X, XX) <br />
<input type="text" name="os0" maxlength="60"> <br />

<!-- url retur -->
<input type="hidden" name="return" value="http://localhost/paypal-example-master/payment-cancelled.php">
<input type="hidden" name="cancel_return" value="http://localhost/paypal-example-master/payment-cancelled.php">
<!-- Display the payment button. -->
<input type="image" name="submit" border="0"
  src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif"
  alt="Buy Now">
<img alt="" border="0" width="1" height="1"
  src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >

</form>


<a href="orders.php?cus_id=<?php echo $cus_id; ?>">pay offline</a></b></p>
</div>

</body>
<!-- 'http://localhost/paypal-example-master/payments.php',
	'' => ',
    'notify_url' => 'http://localhost/paypal-example-master/payment-successful.php' -->

