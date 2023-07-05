<?php
include '../pages/include/connection.php';

if(isset($_POST["productsku"]))
{
    $product_sku= mysqli_real_escape_string($con,$_POST["productsku"]);
    $query="SELECT * FROM product WHERE varriant='".$product_sku."'";
    $result=mysqli_query($con,$query);
    echo mysqli_num_rows($result);

}


?>