
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
if(isset($_GET['Edit_cat']))
{

    $cat_id=$_GET['Edit_cat'];
    $get_cat="select * from categories where cat_id='$cat_id'";
    $run_cat=mysqli_query($con,$get_cat);
    $row_cat=mysqli_fetch_array($run_cat);

    $cat_title=$row_cat['cat_title'];




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


<h3 align="Center"> Update Category</h3>
<table width="792" align="center" >
 <tr>
     <td align="left"><h4 class=" da " >Category title</h4></td><td><input type="text" class=" form-control active" value="<?php echo $cat_title;?>" name="category"></td>
 </tr>
 <tr>
     <td colspan="2" align=" center"><input type="submit" value="Update Category" class="btn btn-dark" name="update_category">
</td>
 </tr>
</table>

</form>

<?php
include("includes/insert_product_fun.php");
if(isset($_POST['update_category']))
{

    $Cat_title=$_POST['category'];
    $cat_q="update categories set cat_title='$Cat_title' where cat_id='$cat_id'";
    $run_cat=mysqli_query($con,$cat_q);
    if($run_cat)
    {
        echo "<script>alert('Category updated successfully');</script>";
        echo "<script>window.open('index.php?view_all_categories','_self');</script>";
    }


}
}
?>