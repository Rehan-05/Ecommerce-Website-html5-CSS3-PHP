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
    }
</style>
<table width='795' align="center" bgcolor='#187eae'>

<tr align="center">
    <th colspan="6">Veiw All product</th>
</tr>
<tr style="color: white;" align="center">

<td>S.N</td>
<td>Tittle</td>
<td>Image</td>
<td>Price</td>
<td>Edit</td>
<td>Delete</td>



</tr>
<?php


include("includes/insert_product_fun.php");
$get_pro="select * from products";
$run_pro=mysqli_query($con,$get_pro);
$i=0;
while($row_pro=mysqli_fetch_array($run_pro))
{
    $pro_title=$row_pro['product_title'];
    $pro_price=$row_pro['product_price'];

    $pro_id=$row_pro['product_id'];
    $pro_image=$row_pro['product_images'];
    $pro_title=$row_pro['product_title'];
    $pro_title=$row_pro['product_title'];
    $i++;



?>

<tr align="center" style="color: white;">
    <td><?php echo $i; ?></td>
    <td><?php echo $pro_title; ?></td>

    <td><img src="product_img/<?php echo $pro_image; ?>" width="50" height="50" alt=""></td>

    <td><?php echo '$'.$pro_price; ?></td>
    <td><a  href="index.php?edit_pro=<?php echo $pro_id; ?>">Edit</a></td>
    <td><a  href="delete.php?delete_pro=<?php echo $pro_id; ?>">Delete</a></td>

    

</tr>
<?php } ?>

</table>
<?php
}?>