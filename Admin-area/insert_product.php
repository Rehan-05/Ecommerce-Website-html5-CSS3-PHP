<?php

if(!isset($_SESSION['user_email']))
{
    session_start();

}
if(!isset($_SESSION['user_email']))
{
    session_start();
    echo "<script>window.open('login.php?not_admin=You are not an Admin!','_self');</script>";
}
else
{
?>
<?php
include("includes/insert_product_fun.php");

?>


<head>

    <title>Insert new product</title>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.9/angular.min.js"></script>
    <script src="../js/admin-index.js?vs<?php echo time(); ?>"></script>
    <!-- angular js -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- Bootstrap -->

  <link rel="stylesheet" href="styles/insert_product.css?vs<?php echo time(); ?>">
    <!-- text eidtor javascript integration -->
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>

        tinymce.init({
            selector: 'textarea'
        });

        function allLetter()
          {
          var insert = document.getElementById('insert');
          var letters = /^[A-Za-z]+$/;
          if(insert.value.match(letters))
          {
            alert("name enter successfully");
          return true;
          }
          else if(insert.value.letter=  " ")
          {
            alert("blank fields are not allowed name");
            return false;
          }
          else
          {
            alert("invalid cat name");
            return false;
          }
          }
          // price validte

          function prd_price()
          {
            var price1 = document.getElementsById('price');
            var numbers = /^[0-9]+$/;
            if(price1.value.match(numbers))
           {
            return true;
           }
           else if(price1.value.length="")
           {
             alter("balak are not allowed");
             return false;
           }
           else
          {
          alert("plz enter price");
           return false;
           }
          }

        function allfunction()
        {
          return allLetter() +  prd_price() ;
        }

    </script>
</head>



<div >
                <!-- form to insert data into databse -->

                <form name="insert_new" action="insert_product.php" method="POST" enctype="multipart/form-data" onsubmit="return allfunction()">
                    <Table id="table_design" class=" form-control" width="795px" align="center">


                        <tr>
                            <th align="center"><h2 >Insert new product</h2></th>
                        </tr>
                        <tr>
                            <td id="td1">
                                <h3 align="right"> product title</h3>
                            </td>
                            <td id="td2"> <input type="text" class=" form-control" name="product_title" id="insert" > </td> <!-- validate thi feild through angular js-->
                        </tr>


                        <tr>
                            <td id="td1">
                                <h3 align="right"> product Categroies</h3>
                            </td>
                            <td id="td2">

                                <select name="product_cat" class=" form-control">
                                    <!-- validate thi feild through angular js-->


                                    <option>
                                      slelect categroies
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
                                    <option value="">Select Brand</option>
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
                            <!-- validate thi feild through angular js-->
                        </tr>


                        <tr>
                            <td id="td1">
                                <h3 align="right"> product Price </h3>
                            </td>
                            <td id="td2"><input type="text" class=" form-control" name="product_price" id="price" ></td>

                        </tr>

                        <tr>
                            <td id="td1">
                                <h3 align="right">product Discription</h3>
                            </td>
                            <td id="td2">
                                <textarea name="product_desc" cols="40" rows="3"></textarea>
                                <!-- validate thi feild through angular js-->
                            </td>
                        </tr>



                        <tr>
                            <td id="td1">
                                <h3 align="right">product Keyword</h3>
                            </td>
                            <td id="td2"><input type="text" class=" form-control" name="product_keyword" id="keyword" onblur="allLetter(document.insert_new.product_keyword,'keyword')"></td>
                            <!-- validate thi feild through angular js-->
                        </tr>

                        <tr>
                            <td colspan="7" align="Center">
                                <input type="submit" name="insert_product" class="btn btn-info" value="Insert Product" class=" " id=""  onclick=" return allfunction();"></td>
                        </tr>


                    </Table>






                </form>


            </div>
<?php
//php code to insert product into product table
if (isset($_POST['insert_product'])) {
    //add text feild to temprory variables
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



    $insert_products = "INSERT INTO `products` ( `product_cat`, `product_brand`, `product_title`, `product_price`, `product_desc`, `product_images`, `product_keywords`) VALUES ('$product_cat', '$product_brand', '$product_title', '$product_price', '$product_desc', '$product_image', '$product_keyword')";

    $insert_pro = mysqli_query($con, $insert_products);
    echo "<script>alert('Product is inserted');</script>";
    echo "<script>window.open('index.php?insert_product','_self')</script>";
}}

// error
?>
