<?php
include './connection.php';


$query="DELETE FROM cart WHERE cart.id='".$_POST['product_id']."'";
$query_run=mysqli_query($con,$query);
// print($query);die;

if($query_run){
    print "Success";
}else{
    print "failed insert";
}

?>