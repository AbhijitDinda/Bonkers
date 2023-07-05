<?php
include './connection.php';

include './Authentication.php';

                                
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cart</title>
    <?php include 'common-style.php'; ?>
    <link rel="stylesheet" href="./assets/css/viewcart.css">
    <link rel="stylesheet" href="./assets/css/viewcartresponsive.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400&display=swap" rel="stylesheet">.
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <header>
        <?php include './header.php'; ?>
    </header>
    <div class="size-container">
        <h1 class="heading-cart">Cart</h1>
        <div class="cart-container">
            <div class="pogress-container active">
                <a href="./viewcart.php">
                    <span class="step title" style="color: black;">
                        <i class="fa-regular fa-circle-check"></i>SHOPPING BAG</span>
                    <p style="color: black;">
                        VIEW YOUR ITEMS</p>
                </a>
            </div>
            <div class="pogress-container">



                <a href="./checkout.php">
                    <span class="step title">
                        SHIPPING AND CHECKOUT</span>
                    <p>
                        ENTER YOUR DETAILS
                    </p>
                </a>
            </div>
            <div class="pogress-container">
                <a href="#">
                    <span class="step title">
                        CONFIRMATION</span>
                    <p>
                        REVIEW YOUR ORDER!</p>
                </a>
            </div>
        </div>

        <section id="sec1">
            <table>
                <thead>
                    <tr>
                        <th>PRODUCT</th>
                        <th>PRICE</th>
                        <th>QUANTITY</th>
                        <th>SUBTOTAL</th>
                    </tr>
                </thead>
                <?php
                $query7 = "SELECT cart.id AS CID,cart.user_id,cart.item,cart.quantity,product.id,product.product_name,product.image,product.ori_price,product.cur_price FROM cart INNER JOIN product WHERE cart.user_id='{$_SESSION['id']}' AND product.id=cart.item";

                $result7 = mysqli_query($con, $query7); ?>

                <tbody>
                    <?php
                    $totalPrice = 0;

                    while ($row7 = mysqli_fetch_assoc($result7)) {
                        $p_name = $row7['product_name'];

                        $img = explode(",", "$row7[image]");
                        $car_id = $row7['CID'];
                        //print($car_id);die;

                        $ori_prc = $row7['ori_price'];
                        $cur_prc = $row7['cur_price'];
                        $cart_quantity = $row7['quantity'];
                        $tp = $cur_prc * $cart_quantity;
                        $totalPrice += $tp;







                        //print($o_p);die;




                    ?>
                        <tr>
                            <td>
                                <div class="tb-child1">
                                    <div><a href="JavaScript;void(0)">
                                            <img src="/template/process/img/<?php echo $img[0] ?>" width="100px" height="140px">
                                        </a>
                                    </div>
                                    <div>
                                        <div class="child1">
                                            <a href="JavaScript;void(0)"><?= $p_name ?></a>
                                        </div>
                                        <div style="position: relative;">
                                            <a href="JavaScript;void(0)">
                                                <i class="fa-solid fa-xmark" style="font-size: 0.6rem;"></i>
                                                <span class="remove" id="remove" data-remove-id="<?= $row7['CID'] ?>">remove</span></a>
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
                </tbody>


            </table>
        </section>

        <section id="sec2">
            <?php
            $gst = ($totalPrice / 100) * 9;
            $shiping = 90;
            ?>
            <div>
                <input type="text" placeholder="coupon code">
                <button class="btn">APPLY</button>
            </div>

            <div class="table-class">
                <h3>CART TOTALS</h3>
                <table>
                    <tr>
                        <th>SUBTOTAL</th>
                        <td> ₹<?= $totalPrice ?></td>
                    </tr>
                    <tr>
                        <th>SHIPPING</th>
                        <td>
                            Delhivery<br>
                            <span class="mg-r" style="font-size: 12px;">Shipping to <strong> mg road,township, st.
                                    schotish school, Rajasthan.</strong></span>
                        </td>
                    </tr>
                    <tr>
                        <th>COD SHIPPING CHARGES</th>
                        <td>₹90.00</td>
                    </tr>
                    <tr>
                        <th>SGST</th>
                        <td> ₹<?= $gst ?></td>
                    </tr>
                    <tr>
                        <th>CGST</th>
                        <td>₹<?= $gst ?></td>
                    </tr>
                    <tr>
                        <th>TOTAL</th>
                        <td><strong>₹<?= ($totalPrice + $gst + $gst + $shiping) ?></strong></td>
                    </tr>

                </table>

                <div>
                    <a href="./checkout.php">PROCEED TO CHECKOUT</a>
                </div>
            </div>
        </section>



    </div>
    <footer>
        <?php include './footer.php'; ?>
    </footer>


    ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        function CartUpdate1() {
            $.ajax({
                url: "user_main_cart_list.php",
                method: "GET",
                success: function(result) {
                    document.querySelector('#sec1 table tbody').innerHTML = result;


                    minicartQty1();
                    quantityChange1();
                    deleteCart1();
                }
            });
        }
        CartUpdate1();




        function deleteCart1() {
            console.log('function loaded');
            $(".remove").click(function() {
                console.log($(this));
                var product_id = $(this).data('remove-id');
                console.log(product_id);
                // return;
                $.ajax({
                    url: "delet_cart_main.php",
                    method: "POST",
                    data: {
                        product_id: product_id,

                    },
                    success: function(result) {
                        
                        // if (result == "Success") {
                            
                            CartUpdate1();

                            let response = JSON.parse(result);
                                document.querySelector(".table-class table tbody tr td").innerHTML =
                                    response.totalPrice;
                                    document.querySelector(".table-class table tbody tr:nth-child(4) td").innerHTML =
                                    ((response.totalPrice)/100)*9;
                                    document.querySelector(".table-class table tbody tr:nth-child(5) td").innerHTML =
                                    ((response.totalPrice)/100)*9;
                                    document.querySelector(".table-class table tbody tr:nth-child(6) td").innerHTML =
                                    (((response.totalPrice)/100)*18)+90+response.totalPrice;

                        // } else {
                        //     alert(result);
                        // }
                    }
                });
            });
        }

        deleteCart1();
    </script>
    <script>
        function minicartQty1() {
            console.log("minicast function");
            //new add
            const plusBtns = document.querySelectorAll(".plus-btn");
            const minusBtns = document.querySelectorAll(".minus-btn");
            let number_els = document.querySelectorAll(".number1");

            let i;
            plusBtns.forEach((plus, i = 0) => {
                console.log(i);
                plus.addEventListener("click", () => {
                    console.log(i);
                    // console.log(number_els[i - 1]);
                    let val = parseInt(number_els[i - 1].innerText);
                    number_els[i - 1].innerText = ++val;
                });
                i++;
            });

            minusBtns.forEach((minus, i = 0) => {
                minus.addEventListener("click", () => {
                    let val = parseInt(number_els[i - 1].innerText);
                    //console.log(val);
                    if (val > 1) {
                        number_els[i - 1].innerText = --val;
                    }
                });
                i++;
            });
        }

        minicartQty1();



        function quantityChange1() {
            $(".minus-btn").click(function() {
                console.log("minus click");
                var quantitys = $(this).parent().find("#total-count1");

                for (var i = 0; i < quantitys.length; i++) {
                    var quantity = quantitys[i].innerHTML;

                    console.log(quantity);
                    var product_id = $(this).data("cart-id");
                    console.log(product_id);

                    $.ajax({
                        url: "./change_quantity_main.php",
                        method: "POST",
                        data: {
                            quantity: quantity,
                            product_id: product_id,
                        },
                        success: function(result) {
                            let response = JSON.parse(result);
                            console.log(response);
                            if (response.status == "success") {
                                document.querySelector(".table-class table tbody tr td").innerHTML =
                                    response.price;


                                    document.querySelector(".table-class table tbody tr:nth-child(4) td").innerHTML =
                                    ((response.price)/100)*9;
                                    document.querySelector(".table-class table tbody tr:nth-child(5) td").innerHTML =
                                    ((response.price)/100)*9;
                                    document.querySelector(".table-class table tbody tr:nth-child(6) td").innerHTML =
                                    (((response.price)/100)*18)+90+response.price;



                                    



                                const totalAllElements = document.querySelectorAll(".total_all");
                                console.log(totalAllElements);
                                totalAllElements.forEach((element, i = 0) => {
                                    console.log(i);
                                    element.innerHTML = response.single_price[i];
                                });



                                //alert(result);
                            } else {
                                alert(result);
                            }
                        },
                    });
                }
            });

            $(".plus-btn").click(function() {
                console.log("plus click");
                var quantitys = $(this).parent().find("#total-count1");

                for (var i = 0; i < quantitys.length; i++) {
                    var quantity = quantitys[i].innerHTML;

                    console.log(quantity);
                    var product_id = $(this).data("cart-id");
                    console.log(product_id);


                    $.ajax({
                        url: "./change_quantity_main.php",
                        method: "POST",
                        data: {
                            quantity: quantity,
                            product_id: product_id,
                        },
                        success: function(result) {
                            let response = JSON.parse(result);
                            if (response.status == "success") {
                                document.querySelector(".table-class table tbody tr td").innerHTML =
                                    response.price;

                                    document.querySelector(".table-class table tbody tr:nth-child(4) td").innerHTML =
                                    ((response.price)/100)*9;
                                    document.querySelector(".table-class table tbody tr:nth-child(5) td").innerHTML =
                                    ((response.price)/100)*9;
                                    document.querySelector(".table-class table tbody tr:nth-child(6) td").innerHTML =
                                    (((response.price)/100)*18)+90+response.price;

                                    


                                const totalAllElements = document.querySelectorAll(".total_all");
                                console.log(totalAllElements);
                                totalAllElements.forEach((element, i = 0) => {
                                    console.log(i);
                                    element.innerHTML = response.single_price[i];
                                });


                                //alert(result);
                            } else {
                                alert(result);
                            }
                        },
                    });
                }
            });
        }
        quantityChange1();
    </script>












</body>

</html>