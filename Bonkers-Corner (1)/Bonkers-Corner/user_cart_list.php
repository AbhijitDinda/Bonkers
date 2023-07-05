<?php /*

include './connection.php';






$query9 = "SELECT cart.id,cart.item,cart.varriant,cart.quantity,product.product_name,product.ori_price,product.cur_price,product.image FROM cart INNER JOIN product WHERE cart.item=product.id AND cart.user_id='{$_SESSION['id']}'";
$result9 = mysqli_query($con, $query9);
?>



<div class="main" id="nav-links">
    <div class="first-cart">
        <span><?= $result9->num_rows ?></span>
        <span class="cart-close">
            <i class="fa-solid fa-xmark" style="font-size: 0.9rem;"></i>
        </span>
    </div>




    <div class="second-cart">
        <?php


        while ($row9 = mysqli_fetch_assoc($result9)) {

            $item_id = $row9['item'];
            $varriant = $row9['varriant'];
            $quantity = $row9['quantity'];
            $product_name = $row9['product_name'];
            $ori = $row9['ori_price'];
            $cur = $row9['cur_price'];
            $cart_id = $row9['id'];
            $img3 = explode(",", "$row9[image]");

        ?>

            <div class="denver">
                <div class="cart-1">
                    <a>
                        <img src="/template/process/img/<?php echo $img3[0] ?>" width="80px" height="100px">

                    </a>
                </div>

                <div class="cart-2">
                    <div STYLE="font-weight:bold">
                        <a><?= $product_name ?></a>
                    </div>

                    <div class="product-qty" style="width:25%">

                        <button style="color:white;background-color:black;font-size:20px" id="decrement-count" class="minus_plus" data-cart-id="<?= $cart_id ?>">-</button>
                        <span id="total-count" name="quantity" value="<?= $quantity ?>" class="number"><?= $quantity ?></span>
                        <button style="color:white;background-color:black;font-size:20px" id="increment-count" class="plus_minus" data-cart-id="<?= $cart_id ?>">+</button>
                    </div>









                    <div>

                        <ins>
                            <span><?= ($quantity * $cur) ?></span>
                        </ins>
                    </div>


                </div>

                <!-- cross sign -->
                <div class="cart-3" id="cart-3" data-cross-id="<?= $cart_id ?>">
                    <i class="fa-solid fa-trash fa-xl"></i>
                </div>


            </div>

        <?php
        } */

?>

<?php

session_start();

include './connection.php';






$query9 = "SELECT cart.id,cart.item,cart.varriant,cart.quantity,product.product_name,product.ori_price,product.cur_price,product.image FROM cart INNER JOIN product WHERE cart.item=product.id AND cart.user_id='{$_SESSION['id']}'";
$result9 = mysqli_query($con, $query9);
// print_r($result9);die;
$html = '';

$price = 0;
$final_price = 0;
//json
$json_array=array();

if ($result9->num_rows > 0) {
    while ($row9 = mysqli_fetch_assoc($result9)) {
        // print_r($row9); die;
    
        $item_id = $row9['item'];
        $varriant = $row9['varriant'];
        $quantity = $row9['quantity'];
        $product_name = $row9['product_name'];
        $ori = $row9['ori_price'];
        $cur = $row9['cur_price'];
        $cart_id = $row9['id'];
        // print $row9['image']; die;
        $images = $row9['image'];
        $img3 = explode(",", $images);
    
        $price = $cur * $quantity;
    
        $final_price = $final_price + $price;
        //json format
        $row9['image'] = $img3[0];
        
        $json_array[]=$row9;

    
        // echo '<pre>' ;
        // print_r($json_array);
        // echo '</pre>';

    
    

            
    }
} else {
    $html .= '<div style="display: grid; align-items: center; justify-content: center;">
        <p>No Product added to the cart.</p>
    </div>';
}   
print json_encode([
    'count' => $result9->num_rows,
    'json_array' => $json_array,
    'final_price' => $final_price,
]);
