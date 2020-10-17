<?php

if(!isset($_SESSION['user_email']))
{
    echo "<script>window.open('login.php?not_admin=You are not an Admin!','_self');</script>";
}
else
{
?>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.9/angular.min.js"></script>
    <script src="../js/admin-index.js?vs<?php echo time(); ?>"></script>
    <!-- angular js -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="styles/style.css?vs<?php echo time(); ?>" media="all" \>

    <!-- style sheet -->
    </script>
    <style>
   a{
       text-decoration: none;
       color: white;
   }
   a:hover{

        color: orange;
    }
</style>
</head>

<div>

<table width='795' align="center" bgcolor='#187eae'>

<tr><td colspan="6" align="right"> View All Customers </td></tr>
<tr style="color: white;" align="center">

<td><h4>S.N</h4></td>
<td><h4>Name</h4></td>
<td><h4>Email</h4></td>
<td><h4>Image</h4></td>
<td><h4>Country</h4></td>
<td><h4>Edit</h4></td>
<td><h4>Delete</h4></td>



</tr>
<?php
include("includes/insert_product_fun.php");
$get_cus="select * from customers";
$run_cus=mysqli_query($con,$get_cus);
$i=0;
while($row_cus=mysqli_fetch_array($run_cus))
{

    $cus_id=$row_cus['customer_id'];
    $cus_name=$row_cus['customer_name'];
    $cus_email=$row_cus['customer_email'];
    $cus_img=$row_cus['customer_image'];
    $cus_country=$row_cus['customer_country'];
    
    $i++;
    ?>





<tr align="center" style="color: white;">
    <td><?php echo $i; ?></td>
    <td><?php echo $cus_name; ?></td>
    
    

    <td><?php echo  $cus_email; ?></td>
    <td><img src="../customers/customers_image/<?php echo $cus_img; ?>" width="50" height="50" alt=""></td>
    <td><?php echo  $cus_country; ?></td>

    <td  ><a class=" btn btn-success" href="index.php?edit_cus=<?php echo $cus_id; ?>">Edit</a></td>
    <td><a class=" btn btn-danger"  href="delete.php?delete_cus=<?php echo $cus_id; ?>">Delete</a></td>

    

</tr>

<?php }
?>

</table>

</div>




<?php
}?>