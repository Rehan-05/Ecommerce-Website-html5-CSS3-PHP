

<!doctype html>
<?php

session_start();
?>
<script type="text/javascript">
function ValidateEmail(inputText,ID)
         {
          var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
           if(inputText.value.match(mailformat))
         {
           document.getElementById(ID).style.borderWidth = "thick";
           document.getElementById(ID).style.borderColor = "green";
         return true;
         }
         else
        {

        document.getElementById(ID).style.borderWidth = "thick";
        document.getElementById(ID).style.borderColor = "red";
        return false;
         }
        }
function passvalidation(pass,ID)
              {

                    var decimal=   /^[A-Za-z]\w{7,14}$/;
                    if(pass.value.match(decimal))
                    {
                       alert("password entered successfully");
                       document.getElementById(ID).style.borderWidth = "thick";
                       document.getElementById(ID).style.borderColor = "green";
                    return true;
                    }
                    else
                    {

                      document.getElementById(ID).style.borderWidth = "thick";
                      document.getElementById(ID).style.borderColor = "red";
                      return false;
                    }
                  }

</script>

<html>



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
    <link rel="stylesheet" href="styles/insert_product_copy.css?vs<?php echo time(); ?>" media="all" \>


    <!-- style sheet -->
    </script>
    <style>

    </style>
</head>

<body>
<div class="login">
    <h2 style="color: white; text-align:center;"><?php echo  @$_GET['not_admin']; ?></h2>
    <h2 style="color: white; text-align:center;"><?php echo  @$_GET['logout']; ?></h2>

    <h1>Admin Login</h1>
    <form method="post" name="login">
        <input type="text" name="email" placeholder="email" id="login_email" required="required" onblur="ValidateEmail(document.login.email,'login_email')">
        <input type="password" name="pass" placeholder="Password" required="required" id="pass_email" onblur="passvalidation(document.login.pass,'pass_email')">
        <button type="submit" class="btn btn-primary btn-block btn-large" name="login">Login</button>
    </form>
</div>
</body>

</html>
<?php

include("includes/insert_product_fun.php");
if(isset($_POST['login']))
{

    $email=mysqli_real_escape_string($con,$_POST['email']);
    $pass=mysqli_real_escape_string($con,$_POST['pass']);
    $get_q="select * from admins where user_email='$email' and user_pass='$pass'";
    $run_q=mysqli_query($con,$get_q);
    $check_q=mysqli_num_rows($run_q);


        if($check_q==1)
        {

            $_SESSION['user_email']=$email;

            echo "<script>window.open('index.php?logged_in=You Are  Successfully loggedin','_self');</script>";

        }
        else{
            echo "<script>alert('Username or password is incorrect!');</script>";
        }





}

?>
