
<?php
session_start();
if(!isset($_SESSION['user_email']))
{
    echo "<script>window.open('login.php?not_admin=You are not an Admin!','_self');</script>";
}
else
{
?>

<?php


include("includes/insert_product_fun.php");
if(isset($_GET['edit_brand']))
{

    $brand_id=$_GET['edit_brand'];
    $get_brand="select * from brands where brand_id='$brand_id'";
    $run_brand=mysqli_query($con,$get_brand);
    $row_brand=mysqli_fetch_array($run_brand);

    $brand_title=$row_brand['brand_title'];




}


?>
<style>
    table{
        color: white;

    }
    table td,tr{
        padding: 5px;
    }
</style>
<form action="" method="POST">


<h3 align="Center"> Update Brand</h3>
<table width="792" align="center" >
 <tr>
     <td align="left"><h4 class=" da " >Brand title</h4></td><td><input type="text" class=" form-control active" value="<?php echo $brand_title; ?>" name="brand"></td>
 </tr>
 <tr>
     <td colspan="2" align=" center"><input type="submit" value="Update Brand" class="btn btn-dark" name="update_brand">
</td>
 </tr>
</table>

</form>

<?php
include("includes/insert_product_fun.php");
if(isset($_POST['update_brand']))
{

    $brand_title=$_POST['brand'];
    $brand_q="update brands set brand_title='$brand_title' where brand_id='$brand_id'";
    $run_brand=mysqli_query($con,$brand_q);
    if($run_brand)
    {
        echo "<script>alert('Brand updated successfully');</script>";
        echo "<script>window.open('index.php?view_all_brands','_self');</script>";
    }


}}

?>
