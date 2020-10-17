<?PHP
include("includes/insert_product_fun.php");
if(isset($_GET['delete_cat']))
{

    $cat_id=$_GET['delete_cat'];
    $delete_cat="delete from categories where cat_id='$cat_id'";
    $run_del=mysqli_query($con,$delete_cat);
    if($run_del)
    {
      
        echo "<script>window.open('index.php?view_all_categories','_self');</script>";
    }

}
if(isset($_GET['delete_brand']))
{

    $brand_id=$_GET['delete_brand'];
    $delete_brand="delete from brands where brand_id='$brand_id'";
    $run_del=mysqli_query($con,$delete_brand);
    if($run_del)
    {
      
        echo "<script>window.open('index.php?view_all_brands','_self');</script>";
    }

}
if(isset($_GET['delete_pro']))
{

    $pro_id=$_GET['delete_pro'];
    $delete_pro="delete from products where product_id='$pro_id'";
    $run_del=mysqli_query($con,$delete_pro);
    if($run_del)
    {
        
        echo "<script>window.open('index.php?view_all_product','_self');</script>";
    }

}



if(isset($_GET['delete_cus']))
{
    $cus_id=$_GET['delete_cus'];
    $del_user="delete from customers where customer_id='$cus_id'";
    $run_del=mysqli_query($con,$del_user);
    if($run_del)
    {
      
    echo "<script>window.open('index.php?View_Customers','_self');</script>";
    }
}

if(isset($_GET['delete_order']))
{
    $pro_id=$_GET['delete_order'];
    $del_order="delete from Pending_orders where customer_id='$pro_id'";
    $run_del=mysqli_query($con,$del_order);
    if($run_del)
    {
      
    echo "<script>window.open('index.php?view_order','_self');</script>";
    }
}

?>


