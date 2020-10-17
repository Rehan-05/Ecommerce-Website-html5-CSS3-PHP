<script type="text/javascript">
function Validate() {
     var password = document.getElementById("txtPassword").value;
     var confirmPassword = document.getElementById("txtConfirmPassword").value;
     if (password != confirmPassword) {
         alert("Passwords do not match.");
         return false;
     }
     return true;
 }
</script>
<div>
    <H2 style="text-align: center;">Change Password</H2>
<form action="" method="POST">
<table align="center" width="600px">

<tr>
<td style="text-align: right;"><b >Enter Current Password</b></td><td><input type="password" name="current_password" id=""></td>
</tr>
<tr>
<td style="text-align: right;"><b >Enter New Password</b></td><td><input type="Password" name="new_password" id="txtPassword"></td>
</tr>
<tr>
<td style="text-align: right;"><b >Enter password Again</b></td><td><input type="Password" name="new_password_again" id="txtConfirmPassword"></td>
</tr>
<tr>
    <td colspan="2"><input type="submit" name="update_password" id="" value="Change Password" onclick="return Validate()"></td>
</tr>


</table>
</form>


</div>
<?php

include("../includes/insert_product_fun.php");
if(isset($_POST['update_password']))
{

    $current_password=$_POST['current_password'];
    $new_pass=$_POST['new_password'];
    $new_pass_again=$_POST['new_password_again'];

    $email=$_SESSION['customer_email'];

    $sel_pass="select * from customers where customer_email='$email' and customer_pass='$current_password'";


    $run_update_pass=mysqli_query($con,$sel_pass);
       $check_pass=mysqli_num_rows($run_update_pass);
        if($check_pass==0)
        {
            echo "<script>alert('Your Current Password is not correct');</script>";
            exit();
        }
    if($new_pass==$new_pass_again)
    {

    $update_q="update customers set customer_pass='$new_pass' where customer_email='$email'";
    $update_pass=mysqli_query($con,$update_q);
    echo "<script>alert('Your password is update successfully');</script>";
    echo "<script>window.open('myaccount.php','_self');</script>";

    }
    else{
        echo "<script>alert('your Entre password  dos not match');</script>";
        exit();
    }


}


?>
