
<?php
session_start();
if(!isset($_SESSION['user_email']))
{
    echo "<script>window.open('login.php?not_admin=You are not an Admin!','_self');</script>";
}
else
{
?><?php
include("includes/insert_product_fun.php");
if(isset($_GET['edit_pro']))
{
    $pro_id=$_GET['edit_pro'];
    $sel_pro="select * from products where product_id='$pro_id'";
    $run_pro=mysqli_query($con,$sel_pro);
    $get_pro=mysqli_fetch_array($run_pro);
    $pro_title=$get_pro['product_title'];
    $pro_cat=$get_pro['product_cat'];
    $pro_brand=$get_pro['product_brand'];
    $pro_image=$get_pro['product_images'];
    $pro_price=$get_pro['product_price'];
    $pro_desc=$get_pro['product_desc'];
    $product_keyword=$get_pro['product_keywords'];
    $get_catc = "select * from categories where cat_id='$pro_cat' ";

    $run_cats = mysqli_query($con, $get_catc);
    $row_cats = mysqli_fetch_array($run_cats);
    $cat_title=$row_cats['cat_title'];

    $get_brand = "select * from brands where brand_id='$pro_brand' ";

    $run_brand = mysqli_query($con, $get_brand);
    $row_brand = mysqli_fetch_array($run_brand);
    $brand_title=$row_brand['brand_title'];
}
?>


<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert new product</title>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.9/angular.min.js"></script>
    <script src="../js/admin-index.js?vs<?php echo time(); ?>"></script>
    <!-- angular js -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- Bootstrap -->
    
    <link rel="stylesheet" href="styles/insert_product.css?vs<?php echo time(); ?>" media="all" \>
    <!-- text eidtor javascript integration -->
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea'
        });
    </script>


    <!-- style sheet -->
    </script>
</head>



<div style="height: 800px">
                <!-- form to insert data into databse -->

                <form action="" method="POST" enctype="multipart/form-data">
                    <Table id="table_design" class=" form-control" width="795px" align="center">


                        <tr>
                            <th><h2>Edit and update product</h2></th>
                        </tr>
                        <tr>
                            <td id="td1">
                                <h3 align="right"> product title</h3>
                            </td>
                            <td id="td2"><input type="text" class=" form-control" name="product_title" value="<?php echo $pro_title; ?>"></td> <!-- validate thi feild through angular js-->
                        </tr>


                        <tr>
                            <td id="td1">
                                <h3 align="right"> product Categroies</h3>
                            </td>
                            <td id="td2">

                                <select name="product_cat" class=" form-control">
                                    <!-- validate thi feild through angular js-->


                                    <option>
                                      <?php echo $cat_title; ?>
                                    </option>
                                    <?php

                                    $con = new mysqli("localhost", "root", "", "ecommerce");
                                    global $con;

                                    $get_catc = "select * from categories";

                                    $run_cats = mysqli_query($con, $get_catc);

                                   

                                    while ($row_cats = mysqli_fetch_array($run_cats)) {

                                        $cat_id = $row_cats['cat_id'];
                                        $cat_title = $row_cats['cat_title'];

                                        echo "<option value='$cat_id'>$cat_title</option>";
                                    }
                                    ?>
                                    < </select> </td> </tr> <tr>
                            <td id="td1">
                                <h3 align="right"> Product Brand</h3> <!-- validate thi feild through angular js-->
                            </td>
                            <td id="td2">

                                <select name="product_brand" id="" class=" form-control">
                                    <option value=""><?php echo $brand_title; ?></option>
                                    <?php
                                    $con = new mysqli("localhost", "root", "", "ecommerce");
                                    global $con;
                                    $get_brand = "select * from brands";
                                    $run_brands = mysqli_query($con, $get_brand);
                                    while ($row_brand = mysqli_fetch_array($run_brands)) {
                                        $brand_id = $row_brand['brand_id'];
                                        $brand_title = $row_brand['brand_title'];

                                        echo "<option value='$brand_id'>$brand_title</option> ";
                                    }


                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td id="td1">
                                <h3 align="right">product images</h3>
                            </td>
                            <td id="td2"><input type="file" name="product_image" id=""></td>
                            <td><img src="product_img/<?php echo $pro_image; ?>" width="50" height="50" alt=""></td>
                            <!-- validate thi feild through angular js-->
                        </tr>


                        <tr>
                            <td id="td1">
                                <h3 align="right"> product Price </h3>
                            </td>
                            <td id="td2"><input type="text" class=" form-control" name="product_price"  value="<?php echo $pro_price;?>" id=""></td>
                            <!-- validate thi feild through angular js-->
                        </tr>

                        <tr>
                            <td id="td1">
                                <h3 align="right">product Discription</h3>
                            </td>
                            <td id="td2">
                                <textarea name="product_desc" cols="40"   value="" rows="3"><?php echo $pro_desc;  ?></textarea>
                                <!-- validate thi feild through angular js-->
                            </td>
                        </tr>



                        <tr>
                            <td id="td1">
                                <h3 align="right">product Keyword</h3>
                            </td>
                            <td id="td2"><input type="text" class=" form-control" name="product_keyword"  value="<?php echo $product_keyword; ?>" id=""></td>
                            <!-- validate thi feild through angular js-->
                        </tr>

                        <tr>
                            <td colspan="7" align="Center">
                                <input type="submit" name="update_product" class="btn btn-info" value="update_product" class=" " id=""></td>
                        </tr>


                    </Table>






                </form>


            </div>
<?php
//php code to insert product into product table
if (isset($_POST['update_product'])) {
    //add text feild to temprory variables
    $product_id=$pro_id;
    $product_title = $_POST['product_title'];
    $product_cat = $_POST['product_cat'];
    $product_brand = $_POST['product_brand'];
    $product_price = $_POST['product_price'];
    $product_desc = $_POST['product_desc'];
    $product_keyword = $_POST['product_keyword'];

    //add images
    $product_image = $_FILES['product_image']['name'];
    $product_image_tmp = $_FILES['product_image']['tmp_name'];

    move_uploaded_file($product_image_tmp, "product_img/$product_image");



    $update_products = "UPDATE `products` SET product_cat='$product_cat',product_brand='$product_brand',product_title='$product_title',product_price='$product_price',product_desc='$product_desc',product_images='$product_image',product_keywords='$product_keyword' WHERE product_id='$product_id'";

    $update_pro = mysqli_query($con, $update_products);
    if($update_pro){
    echo "<script>alert('Product is updated');</script>";
    echo "<script>window.open('index.php?view_all_product','_self')</script>";}
}}

?>