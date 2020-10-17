<!doctype html>
<?php


include("functions/functions.php");
session_start();

?>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart </title>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.9/angular.min.js"></script>
    <script src="js/home_page.js"></script>
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

                <a href="index.php"><img ng-src="images/dabang 2.jpg" alt="logo " id="logo" width="200px" height="100px" /></a>
                <img src="images/banner.gif" alt="banner" id="banner" height="100px" width="800px" />


            </div>
            <!-- header end here -->
            <!-- menue bar star here -->
            <div class="menuebar">
                <ul id="menue" style="list-style:none;">
                    <li class=" nav-item"><a href="index.php">Home</a></li>
                    <li class=" nav-item"><a href="all_product.php">All product</a></li>
                    <li class=" nav-item"><a href="customers/myaccount.php">My Account</a></li>
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
                    <?php echo cart(); ?>
                    <div id="shopping_cart">

                        <span style="float:right; font-size:15px; padding:5px; line-height:40px">
                            <?php

                            show_email();

                            ?> <b style="color:yellow;">Shopping Cart-</b>
                            Total Items: <?php gettotal_items(); ?> &nbsp; Total Price: <?php
                                                                                        totalprice();
                                                                                        ?>
                            <a href="index.php" style='color:yellow;'>
                                back to Shop
                            </a>
                            <?php

                            login();

                            ?>
                        </span>


                    </div>

                    <div id="product_box">
                        <br>
                        <form action="cart.php" method="POST" enctype="multipart/form-data">


                            <table align="center" width="700" bgcolor="skyblue">
                                <tr align="center">

                                    <td>Remove</td>
                                    <td>Product(s)</td>
                                    <td>Quantity</td>
                                    <td>Total Price</td>
                                </tr>


                                <?php
                                global $con;

                                $total = 0;
                                $pro_ip = getIp();

                                $sel_price = "SELECT * FROM CART WHERE IP_ADD='$pro_ip'";
                                $run_price = mysqli_query($con, $sel_price);
                                while ($p_price = mysqli_fetch_array($run_price)) {

                                    $pro_id = $p_price['p_id'];
                                    $pro_price = "SELECT * FROM PRODUCTS WHERE product_id='$pro_id'";
                                    $run_pro = mysqli_query($con, $pro_price);
                                    while ($pp_price = mysqli_fetch_array($run_pro)) {
                                        $product_price = array($pp_price['product_price']);
                                        $product_title = $pp_price['product_title'];
                                        $product_image = $pp_price['product_images'];
                                        $single_price = $pp_price['product_price'];
                                        $values = array_sum($product_price);
                                        $total += $values;

                                ?>



                                        <tr>
                                            <td><input type='checkbox' name='remove[]' id='' value="<?php echo $pro_id; ?>"></td>
                                            <td><?php $product_title; ?> <br>
                                                <img src='Admin-area/product_img/<?php echo $product_image; ?>' alt='P_photo' height='60' width='60'>


                                            </td>
                                            <td><input type='text' size'4' name='qty' value="<?php echo $_SESSION['qty']; ?>" /></td>

                                            <!-- update  qty -->


                                            <td>
                                                <?php

                                                if (isset($_POST['update_cart'])) {
                                                    global $con;
                                                    $ip = getIp();
                                                    $qty = $_POST['qty'];

                                                    $update_qty = "UPDATE cart SET qty='$qty'";
                                                    $run_qty = mysqli_query($con, $update_qty);
                                                    $_SESSION['qty'] = $qty;
                                                    $total = $total * $qty;
                                                }

                                                ?>
                                                <?php echo $single_price; ?></td>

                                        </tr>
                                <?php  }
                                }
                                ?>

                                <tr>
                                    <td colspan="4">sub total</td>
                                    <td colspan="4"><?php echo "$" . $total; ?></td>
                                </tr>
                                <tr align="center">

                                    <td colspan="2"><input type="submit" name="Remove_item" oid="" value="Remove"></td>
                                    <td><input type="submit" name="update_cart" oid="" value="Update Cart"></td>
                                    <td><input type="submit" name="continue" value="continue Shopping" /></td>

                                    <td><button><a href="checkout.php" style="text-decoration: none; color:black;">Checkout</a></button></td>
                                </tr>
                            </table>


                            <?php

                            if (isset($_POST['Remove_item'])) {
                                global $pro_id;
                                global $con;
                                $ip = getIp();

                                foreach ($_POST['remove'] as $remove_id) {

                                    $delete_product = "DELETE FROM CART WHERE P_ID='$remove_id' AND IP_ADD='$ip'";
                                    $run_delete = mysqli_query($con, $delete_product);
                                    if ($run_delete) {
                                        echo "<script>winow.open('cart.php','_self')</script>";
                                    }
                                }
                            }
                            if (isset($_POST['continue'])) {
                                echo "<script>winow.open('index.php','_self')</script>";
                            }

                            ?>

                        </form>

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
<!-- update quatity bug -->
<!-- cart bug must remove  -->
<!-- continue shopping bug -->
<!-- also fix update single price  -->