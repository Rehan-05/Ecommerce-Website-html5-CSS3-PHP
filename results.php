<!doctype html>
<?php
include("functions/functions.php");

?>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dabang Mall</title>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.9/angular.min.js"></script>
    <script src="js/home_page.js"></script>
    <!-- angular js -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="styles/style.css?vs<?php echo time(); ?>" media="all" \>
    <!-- style sheet -->
    < </head> <body ng-app="mod">
        <!-- Main container start here -->
        <div class="main_wrapper">
            <!-- Header start here -->
            <div class="header_wrapper" ng-controller="ctr">

                <a href="index.php"><img ng-src="images/dabang 2.jpg" alt="logo " id="logo" width="200px" height="100px" /></a>
                <img src="images/banner.gif" alt="banner" id="banner" height="100px" width="800px" />


            </div>
            <!-- header end here -->
            <!-- menue bar star here -->
            <div class="menuebar">
                <ul id="menue" style="list-style:none;">
                    <li class=" nav-item"><a href="index.php">Home</a></li>
                    <li class=" nav-item"><a href="all_product.php">All product</a></li>
                    <li class=" nav-item"><a href="customers/my_account.php">My Account</a></li>
                    <li class=" nav-item"><a href="customer_register.php">Sign up</a></li>
                    <li class=" nav-item"><a href="cart.php">shopping Cart</a></li>
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
                        Categories

                    </div>
                    <ul id="cats">
                        <?php
                        // add categories in side bar
                        getcats();

                        ?>

                    </ul>
                    <div id="sidebar_title">
                        Brands

                    </div>
                    <ul id="cats">
                        <?php
                        // add brand to categories
                        getbrand();


                        ?>




                    </ul>




                </div>




                <!-- sidebar end here -->
                <!-- content area start here -->
                <div id="content_area">
                    <div id="shopping_cart">

                        <span style="float:right; font-size:18px; padding:5px; line-height:40px">
                            <?php
                            show_email();
                            ?> <b style="color:yellow;">Shopping Cart-</b>
                            Total Items: <?php gettotal_items(); ?> &nbsp; Total Price: <?php
                                                                                        totalprice();
                                                                                        ?>
                            <a href="cart.php" style='color:yellow;'>
                                Go to Cart
                            </a>
                            <?php

                            if (!isset($_SESSION['customer_email'])) {
                                echo "<a href='checkout.php' style='color:orange;text-decoration:none; ' >Login</a>";
                            } else {
                                echo "<a href='logout.php' style='color:orange;text-decoration:none; '>Logout</a>";
                            }

                            ?>
                        </span>


                    </div>

                    <div id="product_box">


                        <?php
                        if (isset($_GET['search'])) {
                            $user_query = $_GET['user_query'];


                            global $con;
                            $get_pro = "select * from products where product_keywords like '%$user_query%'";
                            $run_pro = mysqli_query($con, $get_pro);
                            while ($row_pro = mysqli_fetch_array($run_pro)) {


                                $pro_id = $row_pro['product_id'];
                                $pro_cat = $row_pro['product_cat'];

                                $pro_barand = $row_pro['product_brand'];

                                $pro_title = $row_pro['product_title'];

                                $pro_price = $row_pro['product_price'];

                                $pro_image = $row_pro['product_images'];

                                echo "  <div id='single_product'>
                                     <h4>$pro_title</h4>
    
                                     <img src='admin-area/product_img/$pro_image' width='180' height='180' >
                                       <p><b>Price:$ $pro_price</b></p>
                                        <a href='details.php?pro_id=$pro_id ' style='float:left;'>Details</a>
                                        <a href='index.php?add_cart=$pro_id'><button style='float:right;'>Add to cart</button></a>
    
                                     </div>     ";
                            }
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