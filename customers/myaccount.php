<!doctype html>

<?php
session_start();
include("../functions/functions.php");

?>
<?php
if(!isset($_SESSION['customer_email']))
{
    echo "<script>alert('Please log in');</script>";
    echo "<script>window.open('../checkout.php','_self');</script>";

}
else
{
?>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dabang Mall</title>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.9/angular.min.js"></script>
    <script src="../js/home_page.js"></script>
    <!-- angular js -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="styles/style.css?vs<?php echo time(); ?>" media="all" \>
    <!-- style sheet -->
    </head> <body ng-app="mod">
        <!-- Main container start here -->
        <div class="main_wrapper">
            <!-- Header start here -->
            <div class="header_wrapper" ng-controller="ctr">

                <a href="index.php"><img ng-src="../images/dabang 2.jpg" alt="logo " id="logo" width="200px" height="100px" /></a>
                <img src="../images/banner.gif" alt="banner" id="banner" height="100px" width="800px" />


            </div>
            <!-- header end here -->
            <!-- menue bar star here -->
            <div class="menuebar">
                <ul id="menue" style="list-style:none;">
                    <li class=" nav-item"><a href="../index.php">Home</a></li>
                    <li class=" nav-item"><a href="../all_product.php">All product</a></li>
                    <li class=" nav-item"><a href="myaccount.php">My Account</a></li>
                    <li class=" nav-item"><a href="../customer_register.php">Sign up</a></li>
                    <li class=" nav-item"><a href="../cart.php">shopping Cart</a></li>
                    <li class=" nav-item"><a href="">Contact Us</a></li>

                </ul>
                <div id="form" class="">
                    <form action="results.php" method="get" enctype="multipart/form-data">
                        <input type="text" name="user_query" />
                        <input type="submit" name="search" id="" class="btn btn-dark" value="Search">
                    </form>

                </div>


            </div>
            <!-- 
                menuebar ends here
             -->
            <!-- main contnet area start here -->
            <div class=" content_wrapper">
                <!-- sider bar start hare -->
                <div id="sidebar">
                    <div id="sidebar_title">
                        My Account

                        
                    </div>
                    <ul id="cats">
                    <?php
                        
                        $user =$_SESSION['customer_email'];
                        $get_img="select * from customers where customer_email='$user'";
                        $run_img=mysqli_query($con,$get_img);
                        $row_c=mysqli_fetch_array($run_img);
                        $c_img=$row_c['customer_image'];
                        $c_name=$row_c['customer_name'];

                        echo "<div class='container' style='border-color:white; padding:5px;'>
                        <img src='customers_image/$c_img' alt='Avatar' class='image' style='width:100%; border-radius: 70% ; border-color:white;'>
                        <div class='middle'>
                          <div class='text'>$c_name</div>
                        </div>
                      </div>";
                        
                        ?>
                        <li><a href="myaccount.php?my_orders">My Order</a></li>
                        <li><a href="myaccount.php?edit_account">Edit account</a></li>

                        <li><a href="myaccount.php?change_password">Change Password</a></li>

                        <li><a href="myaccount.php?delete_account">Delete Account</a></li>

                        <li><a href="../logout.php">Logout</a></li>

                        

                    </ul>
                    



                </div>




                <!-- sidebar end here -->
                <!-- content area start here -->
                <div id="content_area">
                    
                    <div id="shopping_cart">

                    <span style="float:right; font-size:15px; padding:5px; line-height:40px">
                      
                    
                     
                    <?php 
                       if(isset($_SESSION['customer_email']))
                       {
                           echo "<b>Welcome  </b>".$_SESSION['customer_email'];
                       }
                      
                       ?> 
                        
                        <?php
                        
                        if(!isset($_SESSION['customer_email']))
                        {
                            echo "<a href='../checkout.php' style='color:orange;text-decoration:none; ' >Login</a>";
                        }
                        else{
                            echo "<a href='../logout.php' style='color:orange;text-decoration:none; '>Logout</a>";
                        }

                        ?>
                    </span>


                    </div>

                <div >
                    <h2 style="background: #000; color:#FC9;padding:20px; text-align:center; border-top:solid 2px #fff;">Manage your account</h2>
      
                    <br>
                    <?php
                    
                   getdefault();
                    
                    ?>
                    <?php
                    
                    if(isset($_GET['edit_account']))
                    {

                        include("edit_account.php");
                    }
                    if(isset($_GET['change_password']))
                    {

                        include("change_password.php");
                    }
                    if(isset($_GET['delete_account']))
                    {

                        include("delete_account.php");
                    }
                    if(isset($_GET['my_orders']))
                    {

                        include("my_orders.php");
                    }

                    
                    ?>
                </div>

                </div>
            </div>
            <!-- content area end here -->
            <!-- footer start  -->
            <div id="footer">

                <h2 style="text-align: center; padding-top: 30px; "> &copy;2020 Dabang-mall.com </h2>
            </div>
            <!-- footer end here -->




        </div>
        </div>
        <!-- main content area end here -->


        </body>

</html>
<!-- pagination or next or back lecture -->
                <?php }?>