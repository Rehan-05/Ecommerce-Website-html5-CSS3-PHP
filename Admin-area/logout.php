<?php

session_start();
session_destroy();
echo "<script>window.open('login.php?logout=logout successfully!','_self');</script>";



?>