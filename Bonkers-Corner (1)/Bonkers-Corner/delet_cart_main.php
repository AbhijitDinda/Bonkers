<?php
session_start();
include './connection.php';



$query="DELETE FROM cart WHERE cart.id='".$_POST['product_id']."'";
$query_run=mysqli_query($con,$query);
// print($query);die;

if($query_run){
    // print "Success";

    $query7 = "SELECT cart.id AS CID,cart.user_id,cart.item,cart.quantity,product.id,product.product_name,product.image,product.ori_price,product.cur_price FROM cart INNER JOIN product WHERE cart.user_id='{$_SESSION['id']}' AND product.id=cart.item";

                $result7 = mysqli_query($con, $query7);

        
                    
                    // $totalP = [];
                    $totalPrice=0;

                    while ($row7 = mysqli_fetch_assoc($result7)) {

                        $ori_prc = $row7['ori_price'];
                        $cur_prc = $row7['cur_price'];
                        $cart_quantity = $row7['quantity'];
                        $tp = $cur_prc * $cart_quantity;
                        $totalPrice += $tp;

                        // array_push($totalP, $totalPrice);
                    }


                    print json_encode([
                        
                        'totalPrice' => $totalPrice                        
                    ]);

}else{
    print "failed insert";
}
