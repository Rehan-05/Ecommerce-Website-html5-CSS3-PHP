<?php 
$con =new mysqli("localhost","root","","ecommerce") ;

if(mysqli_connect_errno())
{
    echo "Failed to connect".mysqli_connect_errno();
}

// get customer ip
function getIp() {
    $ip = $_SERVER['REMOTE_ADDR'];
 
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
 
    return $ip;
}
// add product in cart data table
function cart()
{
    global $con;
    if(isset($_GET['add_cart']))
    {
        $ip=getIp();
        $pro_id=$_GET['add_cart'];
        $check_pro="select * from cart where ip_add='$ip' and p_id='$pro_id'";
        $run_check=mysqli_query($con,$check_pro);
        if(mysqli_num_rows($run_check)>0)
        {

            echo "";
        }
        else
        {
            $insert_pro="INSERT INTO `cart` (`p_id`, `ip_add`) VALUES ('$pro_id', '$ip');";

            $run_pro=mysqli_query($con,$insert_pro);

            echo "<script>window.open('index.php','_self');</script>";


        }
    }
}
// get total item from cart table
function gettotal_items(){

    if(isset($_GET['add_cart']))
    {
        global $con;
        $ip=getIp();
        $get_items="SELECT * FROM CART WHERE ip_add='$ip'";
        $run_items=mysqli_query($con,$get_items);
        $count_items=mysqli_num_rows($run_items);


    }
    else{
        global $con;
        $ip=getIp();
        $get_items="SELECT * FROM CART WHERE ip_add='$ip'";
        $run_items=mysqli_query($con,$get_items);
        $count_items=mysqli_num_rows($run_items);
    }

echo $count_items;

}
// get total price for catr 

function totalprice()
{

    global $con;

    $total=0;
    $pro_ip=getIp();

    $sel_price="SELECT * FROM CART WHERE IP_ADD='$pro_ip'";
    $run_price=mysqli_query($con,$sel_price);
    while($p_price=mysqli_fetch_array($run_price))
    {

        $pro_id=$p_price['p_id'];
        $pro_price="SELECT * FROM PRODUCTS WHERE product_id='$pro_id'";
        $run_pro=mysqli_query($con,$pro_price);
        while($pp_price=mysqli_fetch_array($run_pro))
        {
            $product_price=array($pp_price['product_price']);
            $values=array_sum($product_price);
            $total+=$values;

        }

    }
    echo "$ $total";
}
// get category for sidebar

function getcats(){

global $con;

$get_catc="select * from categories";

$run_cats= mysqli_query($con,$get_catc);

while($row_cats=mysqli_fetch_array($run_cats))
{

$cat_id=$row_cats['cat_id'];
$cat_title=$row_cats['cat_title'];

echo "<li><a href='index.php?cat=$cat_id'>$cat_title</a></li>";

}
}
// get brand
function getbrand()
{
    global$con;
    $get_brand="select * from brands";
    $run_brands=mysqli_query($con,$get_brand);
    while($row_brand=mysqli_fetch_array($run_brands))
    {
        $brand_id=$row_brand['brand_id'];
        $brand_title=$row_brand['brand_title'];

        echo "<li><a href='index.php?brand=$brand_id'>$brand_title</a></li> ";

    }
}

// get product
function getpro()
{

if(!isset($_GET['cat']))
{


    if(!isset($_GET['brand']))
    {
        global $con;
        $get_pro="select * from products order by RAND() limit 0,6";
        $run_pro=mysqli_query($con,$get_pro);
        while($row_pro=mysqli_fetch_array($run_pro))
        {
    
    
            $pro_id=$row_pro['product_id'];
            $pro_cat=$row_pro['product_cat'];
    
            $pro_barand=$row_pro['product_brand'];
    
            $pro_title=$row_pro['product_title'];
    
            $pro_price=$row_pro['product_price'];
    
            $pro_image=$row_pro['product_images'];
    
            echo"  <div id='single_product'>
            <h4>$pro_title</h4>
            
            <img src='admin-area/product_img/$pro_image' width='180' height='180' >
            <p><b>Price:$ $pro_price</b></p>
            <a href='details.php?pro_id=$pro_id ' style='float:left;'>Details</a>
            <a href='index.php?add_cart=$pro_id'><button style='float:right;'>Add to cart</button></a>
            
            </div>  
               ";
    
    
        }
    }
}

   
}
//  get product from category
function getpro_cat()
{


if(isset($_GET['cat']))
{


    
    $product_cat_id=$_GET['cat'];
        global $con;
        $get_pro_cat="select * from products where product_cat=$product_cat_id ";
        
        $run_pro_cat=mysqli_query($con,$get_pro_cat);
        
        $count_cats=mysqli_num_rows($run_pro_cat);
        
        if($count_cats==0)
        {

            echo "<h2 style='padding:10px;'>Ther is no product in this category</h2>";
            exit();
        }

        while($row_pro_cat=mysqli_fetch_array($run_pro_cat))
        {
    
    
            $pro_id=$row_pro_cat['product_id'];
            $pro_cat=$row_pro_cat['product_cat'];
    
            $pro_barand=$row_pro_cat['product_brand'];
    
            $pro_title=$row_pro_cat['product_title'];
    
            $pro_price=$row_pro_cat['product_price'];
    
            $pro_image=$row_pro_cat['product_images'];
    
          
        
            echo"  <div id='single_product'>
            <h4>$pro_title</h4>
            
            <img src='admin-area/product_img/$pro_image' width='180' height='180' >
            <p><b>Price:$ $pro_price</b></p>
            <a href='details.php?pro_id=$pro_id ' style='float:left;'>Details</a>
            <a href='index.php?add_cart=$pro_id'><button style='float:right;'>Add to cart</button></a>
            
            </div>  
               ";
    
    
        
        }
    
}

   
}
// get deffault
function getdefault(){
    global $con;
    $c=$_SESSION['customer_email'];
    $get_c="select * from customers where customer_email='$c'";
    $run_c=mysqli_query($con,$get_c);
    $row_c=mysqli_fetch_array($run_c);
   
        $customer_id=$row_c['customer_id'];
        if(!isset($_GET['my_orders'])){
            if(!isset($_GET['edit_account'])){
                if(!isset($_GET['change_password']))
                {
                    if(!isset($_GET['delete_account']))
                    {

                        $get_order="select * from customer_orders where customer_id='$customer_id' and order_status='Pending'";
                        $run_order=mysqli_query($con,$get_order);
                        $count_orders=mysqli_num_rows($run_order);
                      if($count_orders>0)
                      {
                          echo "
                          <div style='padding:10px;'>
                          <h1 style='color:red;'>Important</h1>
                          <h2>You hane $count_orders Pending orders</h2>
                          <H3>Please see your orders details by clicking this<a href='myaccount.php?my_orders'>Link</a>
                          <br>
                          or you can pay_offline<A href='pay_offline.php'>Pay offline</A>
                          </H3>
                          </div>
                          ";
                      }
                    }
                }
            } 

        }
    }


// get probuct from bran
function getpro_brand()
{

if(isset($_GET['brand']))
{


    
    $product_brand_id=$_GET['brand'];
        global $con;
        $get_pro_cat="select * from products where product_brand=$product_brand_id ";
        $run_pro_brand=mysqli_query($con,$get_pro_cat);

        $count_brand=mysqli_num_rows($run_pro_brand);
        
        if($count_brand==0)
        {

            echo "<h2 style='padding:10px;'>Ther is no product in this Brand</h2>";
            exit();
        }
        while($row_pro_brand=mysqli_fetch_array($run_pro_brand))
        {
    
    
            $pro_id=$row_pro_brand['product_id'];
            $pro_cat=$row_pro_brand['product_cat'];

    
            $pro_barand=$row_pro_brand['product_brand'];
    
            $pro_title=$row_pro_brand['product_title'];
    
            $pro_price=$row_pro_brand['product_price'];
    
            $pro_image=$row_pro_brand['product_images'];
    
            echo"  <div id='single_product'>
            <h4>$pro_title</h4>
            
            <img src='admin-area/product_img/$pro_image' width='180' height='180' >
            <p><b>Price:$ $pro_price</b></p>
            <a href='details.php?pro_id=$pro_id ' style='float:left;'>Details</a>
            <a href='index.php?add_cart=$pro_id'><button style='float:right;'>Add to cart</button></a>
            
            </div>  
               ";
    
    
        }
    
}

   
}
function login()
{
   
                        
                        if(!isset($_SESSION['customer_email']))
                        {
                            echo "<a href='checkout.php' style='color:orange;text-decoration:none; ' >Login</a>";
                        }
                        else{
                            echo "<a href='logout.php' style='color:orange;text-decoration:none; '>Logout</a>";
                        }

                     
}
function show_email()
{
    if(isset($_SESSION['customer_email']))
    {
        echo "<b>Welcome  </b>".$_SESSION['customer_email']."<B> your </b>";
    }
    else{
        echo "Welcom Guest";
    }

}
