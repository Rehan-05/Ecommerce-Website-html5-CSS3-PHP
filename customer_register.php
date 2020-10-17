<!doctype html>
<?php

include("functions/functions.php");
include("includes/insert_product_fun.php");

?>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.9/angular.min.js"></script>
    <script src="js/home_page.js"></script>
    <!-- angular js -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="styles/style.css?vs<?php echo time(); ?>" media="all" \>
    <!-- style sheet -->

    <script>
    function allLetter()
        {
        var name= document.getElementById('name');
          var letters = /^[A-Za-z]+$/;
          if(name.value.match(letters))
           {
          return true;
           }
           else if(name.value.length = "")
           {
             alert("plz fill the blanks");
             return false;
           }
          else
           {
            alert("Name is invalid");
          return false;
           }
         }
         function ValidateEmail()
                  {
                  var email= document.getElementById('uemail');
                   var mailformat = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                    if(email.value.match(mailformat))
                  {
                  return true;
                  }
                  else if(email.value.length= "")
                  {
                    alert("plz fill the email input");
                    return false;
                  }
                  else
                 {
                 alert("email is invalid");
                 return false;
                  }
                 }
  function ValidatePassword()
    			{
    				var Npass = document.getElementById("password");
    				var chars = /^[A-Za-z]\w{7,14}$/;
    				if(Npass.value.length<8 || Npass.value.length>16)
    				{
    					alert("Password must be Min. 8 and Max. 16 character long");
    					return false;
    				}

    				if(Npass.value.match(chars))
    					return true;
    				else
    					{
    						alert("Password Must contain atleast One Capital Letter, One Numeric, and One Special Character (@,#,$, or &)");
    						return false;
    					}
    			}

          function allnumericplusminus()
                 {
                 var contect= document.getElementById("contact");
                 var numbers = /^[+]?[0-9]+$/;
                if(contect.value.match(numbers))
                {
                return true;
                }
                else if(contect.value.length="")
                {
                  alert("plx enter a number");
                  return false;
                }
                else
                {
                  alert("plz enter valid number");
                return false;

               }
             }


          function allfunctions(){

                         return   allLetter() + ValidateEmail() +   ValidatePassword() + allnumericplusminus();


         }

    </script>

     </head>
      <body ng-app="mod">
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
                    <?php echo cart(); ?>
                    <div id="shopping_cart">

                        <span style="float:right; font-size:18px; padding:5px; line-height:40px">
                            <?php
                            show_email();
                            ?>
                            <b style="color:yellow;">Shopping Cart-</b>
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


                    <form action="customer_register.php" method="POST" enctype="multipart/form-data" onsubmit="return false">

                        <table width="750px " align="center">


                            <tr>
                                <td>
                                    <h3>Create An account</h3>
                                </td>
                            </tr>
                            <tr>

                                <td align="right"> Name </td>
                                <td><input type="text" name="c_name" id="name"></td>
                            </tr>
                            <tr>

                                <td align="right">User_email</td>
                                <td><input type="email" name="c_email" id="uemail"></td>
                            </tr>
                            <tr>

                                <td align="right">Password</td>
                                <td><input type="password" name="c_pass" id="password"></td>
                            </tr>
                            <tr>

                                <td align="right">Profile Photo</td>
                                <td><input type="file" name="c_image" id=""></td>
                            </tr>
                            <tr>

                                <td align="right">Cuntry</td>
                                <td>
                                    <select name="c_country" id="">
                                        <option value="Afghanistan">Afghanistan</option>
                                        <option value="Åland Islands">Åland Islands</option>
                                        <option value="Albania">Albania</option>
                                        <option value="Algeria">Algeria</option>
                                        <option value="American Samoa">American Samoa</option>
                                        <option value="Andorra">Andorra</option>
                                        <option value="Angola">Angola</option>
                                        <option value="Anguilla">Anguilla</option>
                                        <option value="Antarctica">Antarctica</option>
                                        <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                        <option value="Argentina">Argentina</option>
                                        <option value="Armenia">Armenia</option>
                                        <option value="Aruba">Aruba</option>
                                        <option value="Australia">Australia</option>
                                        <option value="Austria">Austria</option>
                                        <option value="Azerbaijan">Azerbaijan</option>
                                        <option value="Bahamas">Bahamas</option>
                                        <option value="Bahrain">Bahrain</option>
                                        <option value="Bangladesh">Bangladesh</option>
                                        <option value="Barbados">Barbados</option>
                                        <option value="Belarus">Belarus</option>
                                        <option value="Belgium">Belgium</option>
                                        <option value="Belize">Belize</option>
                                        <option value="Benin">Benin</option>
                                        <option value="Bermuda">Bermuda</option>
                                        <option value="Bhutan">Bhutan</option>
                                        <option value="Bolivia">Bolivia</option>
                                        <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                        <option value="Botswana">Botswana</option>
                                        <option value="Bouvet Island">Bouvet Island</option>
                                        <option value="Brazil">Brazil</option>
                                        <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                        <option value="Brunei Darussalam">Brunei Darussalam</option>
                                        <option value="Bulgaria">Bulgaria</option>
                                        <option value="Burkina Faso">Burkina Faso</option>
                                        <option value="Burundi">Burundi</option>
                                        <option value="Cambodia">Cambodia</option>
                                        <option value="Cameroon">Cameroon</option>
                                        <option value="Canada">Canada</option>
                                        <option value="Cape Verde">Cape Verde</option>
                                        <option value="Cayman Islands">Cayman Islands</option>
                                        <option value="Central African Republic">Central African Republic</option>
                                        <option value="Chad">Chad</option>
                                        <option value="Chile">Chile</option>
                                        <option value="China">China</option>
                                        <option value="Christmas Island">Christmas Island</option>
                                        <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                        <option value="Colombia">Colombia</option>
                                        <option value="Comoros">Comoros</option>
                                        <option value="Congo">Congo</option>
                                        <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                                        <option value="Cook Islands">Cook Islands</option>
                                        <option value="Costa Rica">Costa Rica</option>
                                        <option value="Cote D'ivoire">Cote D'ivoire</option>
                                        <option value="Croatia">Croatia</option>
                                        <option value="Cuba">Cuba</option>
                                        <option value="Cyprus">Cyprus</option>
                                        <option value="Czech Republic">Czech Republic</option>
                                        <option value="Denmark">Denmark</option>
                                        <option value="Djibouti">Djibouti</option>
                                        <option value="Dominica">Dominica</option>
                                        <option value="Dominican Republic">Dominican Republic</option>
                                        <option value="Ecuador">Ecuador</option>
                                        <option value="Egypt">Egypt</option>
                                        <option value="El Salvador">El Salvador</option>
                                        <option value="Equatorial Guinea">Equatorial Guinea</option>
                                        <option value="Eritrea">Eritrea</option>
                                        <option value="Estonia">Estonia</option>
                                        <option value="Ethiopia">Ethiopia</option>
                                        <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                                        <option value="Faroe Islands">Faroe Islands</option>
                                        <option value="Fiji">Fiji</option>
                                        <option value="Finland">Finland</option>
                                        <option value="France">France</option>
                                        <option value="French Guiana">French Guiana</option>
                                        <option value="French Polynesia">French Polynesia</option>
                                        <option value="French Southern Territories">French Southern Territories</option>
                                        <option value="Gabon">Gabon</option>
                                        <option value="Gambia">Gambia</option>
                                        <option value="Georgia">Georgia</option>
                                        <option value="Germany">Germany</option>
                                        <option value="Ghana">Ghana</option>
                                        <option value="Gibraltar">Gibraltar</option>
                                        <option value="Greece">Greece</option>
                                        <option value="Greenland">Greenland</option>
                                        <option value="Grenada">Grenada</option>
                                        <option value="Guadeloupe">Guadeloupe</option>
                                        <option value="Guam">Guam</option>
                                        <option value="Guatemala">Guatemala</option>
                                        <option value="Guernsey">Guernsey</option>
                                        <option value="Guinea">Guinea</option>
                                        <option value="Guinea-bissau">Guinea-bissau</option>
                                        <option value="Guyana">Guyana</option>
                                        <option value="Haiti">Haiti</option>
                                        <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                                        <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                                        <option value="Honduras">Honduras</option>
                                        <option value="Hong Kong">Hong Kong</option>
                                        <option value="Hungary">Hungary</option>
                                        <option value="Iceland">Iceland</option>
                                        <option value="India">India</option>
                                        <option value="Indonesia">Indonesia</option>
                                        <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                                        <option value="Iraq">Iraq</option>
                                        <option value="Ireland">Ireland</option>
                                        <option value="Isle of Man">Isle of Man</option>
                                        <option value="Israel">Israel</option>
                                        <option value="Italy">Italy</option>
                                        <option value="Jamaica">Jamaica</option>
                                        <option value="Japan">Japan</option>
                                        <option value="Jersey">Jersey</option>
                                        <option value="Jordan">Jordan</option>
                                        <option value="Kazakhstan">Kazakhstan</option>
                                        <option value="Kenya">Kenya</option>
                                        <option value="Kiribati">Kiribati</option>
                                        <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                                        <option value="Korea, Republic of">Korea, Republic of</option>
                                        <option value="Kuwait">Kuwait</option>
                                        <option value="Kyrgyzstan">Kyrgyzstan</option>
                                        <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                                        <option value="Latvia">Latvia</option>
                                        <option value="Lebanon">Lebanon</option>
                                        <option value="Lesotho">Lesotho</option>
                                        <option value="Liberia">Liberia</option>
                                        <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                        <option value="Liechtenstein">Liechtenstein</option>
                                        <option value="Lithuania">Lithuania</option>
                                        <option value="Luxembourg">Luxembourg</option>
                                        <option value="Macao">Macao</option>
                                        <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                                        <option value="Madagascar">Madagascar</option>
                                        <option value="Malawi">Malawi</option>
                                        <option value="Malaysia">Malaysia</option>
                                        <option value="Maldives">Maldives</option>
                                        <option value="Mali">Mali</option>
                                        <option value="Malta">Malta</option>
                                        <option value="Marshall Islands">Marshall Islands</option>
                                        <option value="Martinique">Martinique</option>
                                        <option value="Mauritania">Mauritania</option>
                                        <option value="Mauritius">Mauritius</option>
                                        <option value="Mayotte">Mayotte</option>
                                        <option value="Mexico">Mexico</option>
                                        <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                                        <option value="Moldova, Republic of">Moldova, Republic of</option>
                                        <option value="Monaco">Monaco</option>
                                        <option value="Mongolia">Mongolia</option>
                                        <option value="Montenegro">Montenegro</option>
                                        <option value="Montserrat">Montserrat</option>
                                        <option value="Morocco">Morocco</option>
                                        <option value="Mozambique">Mozambique</option>
                                        <option value="Myanmar">Myanmar</option>
                                        <option value="Namibia">Namibia</option>
                                        <option value="Nauru">Nauru</option>
                                        <option value="Nepal">Nepal</option>
                                        <option value="Netherlands">Netherlands</option>
                                        <option value="Netherlands Antilles">Netherlands Antilles</option>
                                        <option value="New Caledonia">New Caledonia</option>
                                        <option value="New Zealand">New Zealand</option>
                                        <option value="Nicaragua">Nicaragua</option>
                                        <option value="Niger">Niger</option>
                                        <option value="Nigeria">Nigeria</option>
                                        <option value="Niue">Niue</option>
                                        <option value="Norfolk Island">Norfolk Island</option>
                                        <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                        <option value="Norway">Norway</option>
                                        <option value="Oman">Oman</option>
                                        <option value="Pakistan">Pakistan</option>
                                        <option value="Palau">Palau</option>
                                        <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                                        <option value="Panama">Panama</option>
                                        <option value="Papua New Guinea">Papua New Guinea</option>
                                        <option value="Paraguay">Paraguay</option>
                                        <option value="Peru">Peru</option>
                                        <option value="Philippines">Philippines</option>
                                        <option value="Pitcairn">Pitcairn</option>
                                        <option value="Poland">Poland</option>
                                        <option value="Portugal">Portugal</option>
                                        <option value="Puerto Rico">Puerto Rico</option>
                                        <option value="Qatar">Qatar</option>
                                        <option value="Reunion">Reunion</option>
                                        <option value="Romania">Romania</option>
                                        <option value="Russian Federation">Russian Federation</option>
                                        <option value="Rwanda">Rwanda</option>
                                        <option value="Saint Helena">Saint Helena</option>
                                        <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                        <option value="Saint Lucia">Saint Lucia</option>
                                        <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                        <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                                        <option value="Samoa">Samoa</option>
                                        <option value="San Marino">San Marino</option>
                                        <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                        <option value="Saudi Arabia">Saudi Arabia</option>
                                        <option value="Senegal">Senegal</option>
                                        <option value="Serbia">Serbia</option>
                                        <option value="Seychelles">Seychelles</option>
                                        <option value="Sierra Leone">Sierra Leone</option>
                                        <option value="Singapore">Singapore</option>
                                        <option value="Slovakia">Slovakia</option>
                                        <option value="Slovenia">Slovenia</option>
                                        <option value="Solomon Islands">Solomon Islands</option>
                                        <option value="Somalia">Somalia</option>
                                        <option value="South Africa">South Africa</option>
                                        <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                                        <option value="Spain">Spain</option>
                                        <option value="Sri Lanka">Sri Lanka</option>
                                        <option value="Sudan">Sudan</option>
                                        <option value="Suriname">Suriname</option>
                                        <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                        <option value="Swaziland">Swaziland</option>
                                        <option value="Sweden">Sweden</option>
                                        <option value="Switzerland">Switzerland</option>
                                        <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                                        <option value="Taiwan, Province of China">Taiwan, Province of China</option>
                                        <option value="Tajikistan">Tajikistan</option>
                                        <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                                        <option value="Thailand">Thailand</option>
                                        <option value="Timor-leste">Timor-leste</option>
                                        <option value="Togo">Togo</option>
                                        <option value="Tokelau">Tokelau</option>
                                        <option value="Tonga">Tonga</option>
                                        <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                        <option value="Tunisia">Tunisia</option>
                                        <option value="Turkey">Turkey</option>
                                        <option value="Turkmenistan">Turkmenistan</option>
                                        <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                        <option value="Tuvalu">Tuvalu</option>
                                        <option value="Uganda">Uganda</option>
                                        <option value="Ukraine">Ukraine</option>
                                        <option value="United Arab Emirates">United Arab Emirates</option>
                                        <option value="United Kingdom">United Kingdom</option>
                                        <option value="United States">United States</option>
                                        <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                                        <option value="Uruguay">Uruguay</option>
                                        <option value="Uzbekistan">Uzbekistan</option>
                                        <option value="Vanuatu">Vanuatu</option>
                                        <option value="Venezuela">Venezuela</option>
                                        <option value="Viet Nam">Viet Nam</option>
                                        <option value="Virgin Islands, British">Virgin Islands, British</option>
                                        <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                                        <option value="Wallis and Futuna">Wallis and Futuna</option>
                                        <option value="Western Sahara">Western Sahara</option>
                                        <option value="Yemen">Yemen</option>
                                        <option value="Zambia">Zambia</option>
                                        <option value="Zimbabwe">Zimbabwe</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>

                                <td align="right">City</td>
                                <td><input type="text" name="c_city"></td>
                            </tr>
                            <tr>

                                <td align="right">contact</td>
                                <td><input type="number" name="c_contact" id="contact"></td>
                            </tr>
                            <tr>

                                <td align="right">Address</td>
                                <td><input name="c_address" id=""></td>
                            </tr>
                            <tr>

                                <td align="right" colspan="2" style="padding-right: 50px;"><input type="submit" name="register" value="Create Account"  onclick="return allfunctions();"></td>

                            </tr>


                        </table>


                    </form>

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
<?php

if (isset($_POST['register'])) {

    $ip = getIp();
    $c_name = $_POST['c_name'];
    $email = $_POST['c_email'];
    $c_pass = $_POST['c_pass'];
    $c_image = $_FILES['c_image']['name'];
    $c_tmp_image = $_FILES['c_image']['tmp_name'];
    $c_country = $_POST['c_country'];
    $c_city = $_POST['c_city'];

    $c_contact = $_POST['c_contact'];
    $c_address = $_POST['c_address'];

    move_uploaded_file($c_tmp_image, "customers/customers_image/$c_image");

    $c_insert = "INSERT INTO `customers` ( `customer_ip`, `customer_name`, `customer_email`, `customer_pass`, `customer_country`, `customer_city`, `customer_contact`, `customer_address`, `customer_image`) VALUES ( '$ip', '$c_name', '$email', '$c_pass', '$c_country', '$c_city', '$c_contact',  '$c_address', '$c_image')";
}
$run_insrt = mysqli_query($con, $c_insert);
$sel_cart = "SELECT * FROM cart WHERE ip_add='$ip'";
$run_cart = mysqli_query($con, $sel_cart);
$check_cart = mysqli_num_rows($run_cart);
if ($check_cart) {
    $_SESSION['customer_email'] = $email;
    echo "<script>alert('Account has been registered successfully');</script>";
    echo "<script>window.open('customers/myaccount.php','_self');</script>";
} else if($check_cart >= 1) {
    $_SESSION['customer_email'] = $email;
    echo "<script>alert('Account has been registered successfully');</script>";
    echo "<script>window.open('checkout.php','_self');</script>";
}

?>
