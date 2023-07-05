<?php
session_start();
include './connection.php';


$query11 = "SELECT cart.id AS CID,cart.user_id,cart.item,cart.quantity,product.id,product.product_name,product.image,product.ori_price,product.cur_price FROM cart INNER JOIN product WHERE cart.user_id='{$_SESSION['id']}' AND product.id=cart.item";

$result11 = mysqli_query($con, $query11);
$totalPrice = 0;


?>
    <?php
    while ($row11 = mysqli_fetch_assoc($result11)) {
        $p_name = $row11['product_name'];

        $img = explode(",", "$row11[image]");
        $car_id = $row11['CID'];

        $ori_prc = $row11['ori_price'];
        $cur_prc = $row11['cur_price'];
        $cart_quantity = $row11['quantity'];
        $tp = $cur_prc * $cart_quantity;
        $totalPrice += $tp;
        //print($o_p);die;




    ?>

<tr>
                            <td>
                                <div class="tb-child1">
                                    <div><a href="#">
                                            <img src="/template/process/img/<?php echo $img[0] ?>" width="100px" height="140px">
                                        </a>
                                    </div>
                                    <div>
                                        <div class="child1">
                                            <a href="#"><?= $p_name ?></a>
                                        </div>
                                        <div style="position: relative;">
                                            <a href="#">
                                                <i class="fa-solid fa-xmark" style="font-size: 0.6rem;"></i>
                                                <span class="remove" id="remove" data-remove-id="<?= $row11['CID'] ?>">remove</span></a>
                                        </div>
                                    </div>

                                </div>
                            </td>
                            <td>
                                <del>
                                    <span>
                                        <span>₹</span>
                                        <?= $ori_prc ?>.00</span>
                                </del>
                                <ins>
                                    <span>
                                        <span>₹</span><?= $cur_prc ?>.00</span>
                                </ins>

                            </td>
                            <td>
                                <div class="product-qty">
                                    <button style="color:white;background-color:black;font-size:20px" id="decrement-count" class="minus-btn" data-cart-id="<?= $car_id ?>">-</button>
                                    <span id="total-count1" name="quantity" value="<?= $cart_quantity ?>" class="number1"><?= $cart_quantity ?></span>
                                    <button style="color:white;background-color:black;font-size:20px" id="increment-count" class="plus-btn" data-cart-id="<?= $car_id ?>">+</button>

                                </div>
                            </td>
                            <td>
                                <span class="total_all">₹<?= $tp ?></span>
                            </td>
                        </tr>
    <?php
    }
    ?>
