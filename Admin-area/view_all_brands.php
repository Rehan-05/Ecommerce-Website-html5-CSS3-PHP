<?php

if(!isset($_SESSION['user_email']))
{
    echo "<script>window.open('login.php?not_admin=You are not an Admin!','_self');</script>";
}
else
{
?><style>
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

<tr style="color: white;" align="center"><th colspan="4">ALL BRANDS</th></tr>
<tr style="color: white;" align="center">
<td ><b>S.N</b></td>

<td><b>Title</b></td>
<td><b>Edit Brand</b></td>
<td><b>Delete Brand</b></td>
</tr>
<tr><td colspan="4" ><hr></td></tr>
<?php

include("includes/insert_product_fun.php");

$get_brand="select * from brands";

$run_brand=mysqli_query($con,$get_brand);
$i=0;
while($row_brand=mysqli_fetch_array($run_brand))
{

    $brand_id=$row_brand['brand_id'];
    $brand_title=$row_brand['brand_title'];

    $i++;
?>
<tr style="color: white;" align="center">

<td><?php  echo $i;  ?></td><td><?php echo $brand_title; ?></td><td><a href="index.php?edit_brand=<?php echo $brand_id; ?>">Edit</a></td><td><a href="delete.php?delete_brand=<?php echo $brand_id; ?>">Delete</a></td>

</tr>

<?php }
?>




</table>


</div>
<?php }
?>