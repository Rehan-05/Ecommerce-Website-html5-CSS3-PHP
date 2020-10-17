<!doctype html>
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
    <link rel="stylesheet" href="../styles/style.css?vs<?php echo time(); ?>" media="all" \>

    <!-- style sheet -->
    </script>
</head>


<body ng-app="mod">
    <!-- Main container start here -->
    <div class="main_wrapper">
        <!-- Header start here -->
        <div class="header_wrapper" ng-controller="ctr">

            <img ng-src="{{logo_url}}" alt="logo " id="logo" width="200px" height="100px" />
            <img ng-src="{{ banner}}" alt="banner" id="banner" height="100px" width="800px" />


        </div>
        <!-- header end here -->
        <!-- menue bar star here -->
        <div class="menuebar">
            <ul id="menue" style="list-style:none;">
                <li class=" nav-item"><a href="admin_page.php">Home</a></li>
                <li class=" nav-item"><a href="insert_product.php">Add product</a></li>
                <li class=" nav-item"><a href="">Remove product</a></li>
                <li class=" nav-item"><a href="">Update product</a></li>
                <li class=" nav-item"><a href=""></a></li>
                <li class=" nav-item"><a href=""></a></li>

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
                sidebar
            </div>




            <!-- sidebar end here -->
            <!-- content area start here -->
            <div id="content_area">this is content area

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