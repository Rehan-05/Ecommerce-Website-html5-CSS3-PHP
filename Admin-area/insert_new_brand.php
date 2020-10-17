<?php

if(!isset($_SESSION['user_email']))
{
    echo "<script>window.open('login.php?not_admin=You are not an Admin!','_self');</script>";
}
else
{
?>
<style>
    table{
        color: white;

    }
    table td,tr{
        padding: 5px;
    }
</style>
<script type="text/javascript">
function allLetter()
  {
  var pro = document.getElementById('product');
  var letters = /^[A-Za-z]+$/;
  if(pro.value.match(letters))
  {
  return true;
  }
  else if(pro.value.length="")
  {
    alert("invalid");
    return false;
  }
  else
  {
  alert("enter valid Name of Category");
  return false;
  }
  }

</script>












<form action="" method="POST">


<h3 align="Center"> Insert New Brand</h3>
<table width="792" align="center" >
 <tr>
     <td align="left"><h4 class=" da " >Brand title</h4></td><td><input type="text" class=" form-control active"  name="brand" id="product"></td>
 </tr>
 <tr>
     <td colspan="2" align=" center"><input type="submit" value="Add Brand" class="btn btn-dark" name="insert_brand" onclick=" return allLetter(); "> 
</td>
 </tr>
</table>

</form>


<?php
include("includes/insert_product_fun.php");
if(isset($_POST['insert_brand']))
{

    $brand_title=$_POST['brand'];
    $brand_q="insert into brands (brand_title) values ('$brand_title')";
    $run_brand=mysqli_query($con,$brand_q);
    if($run_brand)
    {
        echo "<script>alert('Brand inserted successfully');</script>";
        echo "<script>window.open('index.php?insert_new_brand','_self');</script>";
    }


}}

?>
