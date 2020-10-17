<?php
 $con =new mysqli('localhost','root','','ecommerce');

 if(mysqli_connect_errno())
 {
     echo "Failed to connect".mysqli_connect_errno();
 }


?>