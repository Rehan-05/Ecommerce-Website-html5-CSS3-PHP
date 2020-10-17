<?php

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
        font-weight: bolder;
    } 
    table {
        font-size: medium;

    }
</style>
<div>


<table width='795' align="center" bgcolor='#187eae'>

<tr style="color: white;" align="center"><th colspan="4">ALL CATEGORIES</th></tr>
<tr style="color: white;" align="center">
<td ><b>S.N</b></td>

<td><b>Title</b></td>
<td><b>Edit Category</b></td>
<td><b>Delete Category</b></td>
</tr>
<tr><td colspan="4" ><hr></td></tr>
<?php

include("includes/insert_product_fun.php");

$get_cat="select * from categories";

$run_cat=mysqli_query($con,$get_cat);
$i=0;
while($row_cat=mysqli_fetch_array($run_cat))
{

    $cat_id=$row_cat['cat_id'];
    $cat_title=$row_cat['cat_title'];

    $i++;
?>
<tr style="color: white;" align="center">

<td><?php  echo $i;  ?></td><td><?php echo $cat_title; ?></td><td><a href="index.php?Edit_cat=<?php echo $cat_id; ?>">Edit</a></td><td><a href="delete.php?delete_cat=<?php echo $cat_id; ?>">Delete</a></td>

</tr>

<?php }
?>




</table>


</div>
<?php }
?>