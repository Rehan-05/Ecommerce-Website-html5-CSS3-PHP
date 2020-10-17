<!doctype html>
<?php
session_start();
if(!isset($_SESSION['user_email']))
{
    echo "<script>window.open('login.php?not_admin=You are not an Admin!','_self');</script>";
}
else
{


?>
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

    <!-- style sheet -->
    </script>
</head>



<body ng-app="mod">
    <!-- Main container start here -->
    <div class="main_wrapper">

        <div id="header">






        </div>



        <div class=" content_wrapper">

            <div id="right">


                <h3 style="text-align: center;">Mange Contact</h3>
                <a href="index.php?insert_product">Insert Product</a>
                <a href="index.php?view_all_product">view All Product</a>

                <a href="index.php?insert_new_categories">Insert New Category</a>
                <a href="index.php?view_all_categories">view All Categories</a>
                <a href="index.php?insert_new_brand">Insert New Brand</a>
                <a href="index.php?view_all_brands">View All Brand</a>
                <a href="index.php?View_Customers">View Customers</a>
                <a href="index.php?view_orders">View Orders</a>
                <a href="index.php?view_payment">View Payment</a>
                <a href="logout.php">Admin Logout</a>







            </div>





            <div id="left">

            <br>
            <h2 style=" text-align:center; color:orange;" ><?php  echo @$_GET['logged_in']; ?></h2>


                <div id="product_box">

                    <?php

                    if (isset($_GET['insert_product'])) {

                        include("insert_product.php");
                    }
                    if (isset($_GET['view_all_product'])) {

                        include("view_all_product.php");
                    }
                    if (isset($_GET['edit_pro'])) {

                        include("edit_pro.php");
                    }
                    if (isset($_GET['insert_new_categories'])) {

                        include("insert_new_categories.php");
                    }
                    if (isset($_GET['view_all_categories'])) {

                        include("view_all_categories.php");
                    }

                    if (isset($_GET['Edit_cat'])) {
                        include("Edit_cat.php");
                    }
                    if (isset($_GET['insert_new_brand'])) {
                        include("insert_new_brand.php");
                    }
                    if (isset($_GET['view_all_brands'])) {
                        include("view_all_brands.php");
                    }
                    if (isset($_GET['edit_brand'])) {
                        include("edit_brand.php");
                    }
                    

                 

                    if (isset($_GET['View_Customers'])) {
                        include("view_customers.php");
                    }
                    if (isset($_GET['edit_cus'])) {
                        include("edit_customers.php");
                    }
                    if (isset($_GET['view_orders'])) {
                        include("view_orders.php");
                    }

                    if (isset($_GET['view_payment'])) {
                        include("view_payments.php");
                    }
 

                    ?>
                </div>

            </div>
        </div>

        <div id="footer">

            <h2 style="text-align: center; padding-top: 30px; "> &copy;2020 Dabang-mall.com </h2>
        </div>





    </div>




</body>
</body>






</html>
                <?php } ?>