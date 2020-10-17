
<?php
include("includes/insert_product_fun.php");


?>
<script type="text/javascript">

function ValidateEmail()
{

      var cemail = document.getElementById('email');
      var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

      if (cemail.value.match(filter))
       {
       return true;
       }
       else if (cemail.value.length="")
       {
         alter("plz enter valid email");
         return false;
       }
       else{
         alert("enter valid email.");
         return false;

       }

}

function ValidatePassword()
  			{
  				var Npass = document.getElementById("pass");
  				var chars = /^[A-Za-z]\w{7,14}$/;
  				if(Npass.value.length<8 || Npass.value.length>16)
  				{
  					alert("Password must be Min. 8 and Max. 16 character long");
  					return false;
  				}

  				else if(Npass.value.match(chars))
          {
  					return true;
          }
  				else
  					{
  						alert("Password Must contain atleast One Capital Letter, One Numeric, and One Special Character (@,#,$, or &)");
  						return false;
  					}
  			}






</script>


<div>


    <form action="" method="POST" >
        <table width="500" align="center" bgcolor="bluesky" style="padding: 5px;">
            <tr align="center">
                <td colspan="4">
                    <h2>Login or Register to buy</h2>
                </td>
            </tr>
            <tr align="right">
                <td align="right"><b>Email</b></td>
                <td align="left"><input type="text" name="email" placeholder="Enter your email" id="email"></td>
            </tr>
            <tr>
                <td align="right"><b>Password</b></td>
                <td align="left"><input type="Password" name="pass" placeholder="Enter your Password" id="pass"></td>
            </tr>
            <tr align="center">
                <td colspan="2"><a href="checkout.php?forget_pass">Forget Password</a></td>

            </tr>
            <tr align="center">
                <td colspan="2"> <input type="submit" name="login" value="login" onsubmit="return ( ValidateEmail() && ValidatePassword() )"></td>
                 </tr> </table>




                 <h2 style="float: right; padding-right:25px;"><a style="text-decoration: none;" href="customer_register.php">New? Register Here</a></h2>
                 <br><br><br> <?php

                 if(isset($_GET['forget_pass']))
                 {

                    echo "

                    <div align='center'>
                    <form action='' method='POST'>
                    <h4>Enter your Email below we will send your password to your email</h4>
                    <br>
                    <input type='email' name='c_email' palceholder='Enter your email here'>
                    <br>



                    <input type='submit' name='forget_password' value='send me password'>
                    </form>
                    </div>

                    ";
                 }




                 ?>

    </form>

    <?php

    if(isset($_POST['forget_password']))
    {
        $cus_email=$_POST['c_email'];
        $sel_cus="select * from customers where customer_email='$cus_email'";
        $run_cus=mysqli_query($con,$sel_cus);

        $check_customer=mysqli_num_rows($run_cus);
        $row_c=mysqli_fetch_array($run_cus);
        $user_name=$row_c['customer_name'];
        $pass=$row_c['customer_pass'];

        if($check_customer==0)
        {
            echo "<script>alert('This Email is not Registered in our database');</script>";
        }
        else
        {
            $from="as1265513@gmail.com";
            $subject="Your Password";
            $message="

            <html>


            <h3>Dear $user_name</h3>
           <p><b> You requested fo your password at  www.dabangmall.com</b></p>

           <span style='color:Red'>$pass</span>

           <h4>Thank You for usign Our website.</h4>
            </html>


            ";
            mail($cus_email,$subject,$message,$from);

            echo "<script>alert('Password was sent to your Email please chech your email');</script>";
            echo "<script>window.open('checkout.php','_self');</script>";

        }


    }

    if(isset($_POST['login']))
    {
        global $con;
        $c_email=$_POST['email'];
        $c_pass=$_POST['pass'];

        $sel_c="select * from customers where customer_pass='$c_pass' and customer_email='$c_email';";

        $run_c=mysqli_query($con,$sel_c);

        $check_customer=mysqli_num_rows($run_c);

        if($check_customer<1)
        {
            echo "<script>alert('password or email are incorrect')</script>";
            exit();
        }

        $ip=getIp();
        $sel_cart="SELECT * FROM cart WHERE ip_add='$ip'";
        $run_cart=mysqli_query($con,$sel_cart);
        $check_cart=mysqli_num_rows($run_cart);
        if($check_cart==0 AND $check_customer>0)
        {
            $_SESSION['customer_email']=$c_email;
            echo "<script>alert('you login  successfully');</script>";
            echo "<script>window.open('customers/myaccount.php','_self');</script>";
        }
        else{
            $_SESSION['customer_email']=$c_email;
            echo "<script>alert('login  successfully');</script>";
            echo "<script>window.open('checkout.php','_self');</script>";
        }
    }


    ?>
</div>
