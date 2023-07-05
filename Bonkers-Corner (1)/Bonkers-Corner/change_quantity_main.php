<?php
session_start();
include './connection.php';





$query = "UPDATE cart SET cart.quantity='" . $_POST['quantity'] . "' WHERE cart.id='" . $_POST['product_id'] . "' AND cart.user_id='{$_SESSION['id']}' ";
// print $query;die;
$query_run = mysqli_query($con, $query);

if ($query_run) {
    // print "Success";

    $query9 = "SELECT cart.quantity,product.cur_price FROM cart INNER JOIN product WHERE cart.item=product.id AND cart.user_id='{$_SESSION['id']}'";
    $result9 = mysqli_query($con, $query9);
    $price = '';
    $final_price = 0;

    $pro_price = [];

    while ($row9 = mysqli_fetch_assoc($result9)) {
    
    
       
        $quantity = $row9['quantity'];
        
        $cur = $row9['cur_price'];
        
    
        $price = $cur * $quantity;
    
        $final_price = $final_price + $price;

        array_push($pro_price, $price);

    }

    print json_encode([
        'status' => 'success',
        'price' => $final_price,
        'single_price'=>$pro_price,
    ]);

} else {
    print "failed";
}
