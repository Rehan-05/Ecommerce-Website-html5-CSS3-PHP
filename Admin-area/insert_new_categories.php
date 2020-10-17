<?php

if(!isset($_SESSION['user_email']))
{
    echo "<script>window.open('login.php?not_admin=You are not an Admin!','_self');</script>";
}
else
{
?>
<script type="text/javascript">
function allLetter()
  {
  var cat = document.getElementById('cat');
  var letters = /^[A-Za-z]+$/;
  if(cat.value.match(letters))
  {
  return true;
  }
  else if(cat.value.length="")
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

<style>
    table{
        color: white;

    }
    table td,tr{
        padding: 5px;
    }
</style>
<form action="" method="POST">


<h3 align="Center"> Insert New Category</h3>
<table width="792" align="center" >
 <tr>
     <td align="left"><h4 class=" da " >Category title</h4></td><td><input type="text" class=" form-control active"  name="category" id="cat" ></td>
 </tr>
 <tr>
     <td colspan="2" align=" center"><input type="submit" value="Add Category" onclick=" return allLetter();" class="btn btn-dark" name="insert_category">
</td>
 </tr>
</table>

</form>


<?php
include("includes/insert_product_fun.php");
if(isset($_POST['insert_category']))
{

    $Cat_title=$_POST['category'];
    $cat_q="insert into categories (cat_title) values ('$Cat_title')";
    $run_cat=mysqli_query($con,$cat_q);
    if($run_cat)
    {
        echo "<script>alert('Category inserted successfully');</script>";
        echo "<script>window.open('index.php?insert_new_categories','_self');</script>";
    }


}}

?>
