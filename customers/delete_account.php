<div>
<h3 style="text-align: center; color:red;">Do you really want to delete your account?</h3>
<form action="" method="POST" >


<input type="submit" name="yes" class="btn btn-info" value="Yes" >
<input type="submit" name="no" class="btn btn-info" value="No I was Joking">


</form>

</div>
<?php

include("../includes/insert_product_fun.php");
if(isset($_POST['yes']))
{
    $email=$_SESSION['customer_email'];
    $del_user="delete from customers where customer_email='$email'";
    $run_del=mysqli_query($con,$del_user);
    echo "<script>alert('We are realy sorry that your account is deleted');</script>"; 
    echo "<script>window.open('../index.php','_self');</script>";
}
if(isset($_POST['no']))
{
    echo "<script>alert('Oh! no joe again.');</script>"; 
    echo "<script>window.open('myaccount.php','_self');</script>";
    session_destroy();
}

?>
