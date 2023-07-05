<?php
session_start();
include './connection.php';
// print($_SESSION['id']);die;






?>
    <header>
        <nav class="flex space-between">

            <div class="menu_bar" id="menuBar">
                <span class="material-symbols-outlined">
                    menu
                </span>
            </div>
            <div class="left flex">
                <ul class="nav-ul flex">
                    <?php
                    $query = "SELECT * FROM category";
                    $result = mysqli_query($con, $query);



                    while ($row = mysqli_fetch_assoc($result)) {
                        $category_id = $row['id'];
                    ?>

                        <li class="about-us"><a href="#"><?php echo $row["category_name"] ?> <i class="fa-sharp fa-solid fa-caret-down"></i></a>
                            <ul>
                                <?php
                                $query2 = "SELECT subcategory.id AS subcategory_id,sub_cat_name FROM subcategory WHERE category_id='$category_id' ";
                                $result2 = mysqli_query($con, $query2);

                                while ($row2 = mysqli_fetch_assoc($result2)) {
                                ?>

                                    <li><a href="./men-disney.php?S_id=<?php echo $row2['subcategory_id']; ?>&C_id=<?php echo $row['id']; ?>&P_no=1"><?php echo $row2["sub_cat_name"] ?> </a></li>

                                <?php
                                }
                                ?>
                                <!-- <li><a href="./men-marvel.php"> Marvel</a></li>
                            <li><a href="./men-anime.php"> anime</a></li>
                            <li><a href="./men-oversized-T-shirt.php"> Oversized T-shirt</a></li>
                            <li><a href="./men-oversized-shirt.php"> Oversized Shirt</a></li>
                            <li><a href="./men-basic.php"> Basic</a></li>
                            <li><a href="./men-shades-of-winter.php"> Shades of Winter</a></li>
                            <li><a href="./men-kookie.php"> Kookie Collection</a></li>
                            <li><a href="./men-Tie-Dye.php"> Tie Dye</a></li>
                            <li><a href="./men-polo.php"> Polo</a></li>
                            <li><a href="./men-long-sleeved-T-shirt.php"> Long sleeved T-shirt</a></li>
                            <li><a href="./men-sweatshirts-&-hoodies.php"> Sweatshirts & Hoodies</a></li>
                            <li><a href="./men-co-ord-sets.php"> Co-ORD Sets</a></li>
                            <li><a href="./men-jacket.php"> Jacket</a></li>
                            <li><a href="./men-shorts.php"> Shorts</a></li>
                            <li><a href="./men-bottoms.php"> Bottoms</a></li> -->
                            </ul>
                        </li>

                    <?php
                    }
                    ?>
                    <!-- <li class="about-us"><a href="#">WOMEN <i class="fa-sharp fa-solid fa-caret-down"></i></a>
                        <ul>
                            <li><a href="./women-disney.php"> Disney</a></li>
                            <li><a href="./women-marvel.php"> Marvel</a></li>
                            <li><a href="./women-anime.php"> anime</a></li>
                            <li><a href="./women-oversizedT-shirt.php"> Oversized T-shirt</a></li>
                            <li><a href="./women-bottoms.php"> Bottoms</a></li>
                            <li><a href="./women-tie dye.php"> Tie Dye</a></li>
                            <li><a href="./women-sweatshirts and hoodie.php"> Sweatshirts & Hoodies</a></li>
                            <li><a href="./women-jacket.php"> Jacket</a></li>
                            <li><a href="./women-oversized.php"> Oversized Shirt</a></li>
                            <li><a href="./women-cardigan.php"> Cardigan</a></li>
                            <li><a href="./women-shades of winter.php"> Shades of Winter</a></li>
                            <li><a href="./women-kookie.php"> Kookie Collection</a></li>
                            <li><a href="./women-summer collection.php"> Summer Collection</a></li>
                            <li><a href="./women-fresca collection.php"> Fresca Collection</a></li>
                            <li><a href="./women-basics.php"> Basic</a></li>
                            <li><a href="./women-full sleeves.php"> Full Sleeves</a></li>
                            <li><a href="./women-signature.php"> Signature</a></li>
                            <li><a href="./women-tops.php"> Tops</a></li>
                            <li><a href="./women-tanks&camisole.php"> Tanks & Camisole </a></li>
                            <li><a href="./women-polo.php"> Polo</a></li>
                            <li><a href="./women-cropped T-shirt.php"> Cropped T-shirts</a></li>
                            <li><a href="./women-regular T-shirt.php"> Relaxed Fit T-shirts</a></li>
                            <li><a href="./women-co-ord sets.php"> Co-ORD Sets</a></li>
                            <li><a href="./women-booty shorts.php">Booty shorts</a></li>
                            <li><a href="./women-regular T-shirt.php"> Regular T-shirt</a></li>


                        </ul>
                    </li>
                    <li class="about-us"><a href="#">ACCESSORIES <i class="fa-sharp fa-solid fa-caret-down"></i></a>
                        <ul>
                            <li><a href="./ACCESSORIES-caps.php"> Cap</a></li>
                            <li><a href="./ACCESSORIES-Bucckethat .php"> Bucket HAT</a></li>
                            <li><a href="./ACCESSORIES-Face.php"> face masks</a></li>
                        </ul>
                    </li>
                    <li> <a href="./new-in.php"> NEW IN</a></li>
                    <li> <a href="./disney.php"> DISNEY</a></li>
                    <li> <a href="./marvel.php"> MARVEL</a></li>
                    <li> <a href="./contact.php"> CONTACT</a></li> -->
                </ul>
                <a href="./home.php"><img src="./assets/images/logo/images.png"></a>
            </div>
            

            <div class="right flex">
                <div class="search mx-2">
                    <span class="material-symbols-outlined">
                        search
                    </span>
                </div>

                <div class="cart mx-2">
                    <span class="material-symbols-outlined" id="nav-toogle">
                        local_mall
                    </span>
                </div>

                

                <div class="profile mx-2">
                    <a href="./login_out_handler.php">
                        <span class="material-symbols-outlined">
                            person
                        </span>
                    </a>

                </div>

            </div>

        </nav>

        <div class="menu_mobile">
            <ul class="nav-ul1">
                <li class="about-us sub-menu-title" id="sub-menu-title"><a href="#">MEN <i class="fa-sharp fa-solid fa-caret-down"></i></a>
                    <ul id="sub-menu-title-details">
                        <li><a href="./men-disney.php"> Disney</a></li>
                        <li><a href="./men-marvel.php"> Marvel</a></li>
                        <li><a href="./men-anime.php"> anime</a></li>
                        <li><a href="./men-oversized-T-shirt.php"> Oversized T-shirt</a></li>
                        <li><a href="./men-oversized-shirt.php"> Oversized Shirt</a></li>
                        <li><a href="./men-basic.php"> Basic</a></li>
                        <li><a href="./men-shades-of-winter.php"> Shades of Winter</a></li>
                        <li><a href="./men-kookie.php"> Kookie Collection</a></li>
                        <li><a href="./men-Tie-Dye.php"> Tie Dye</a></li>
                        <li><a href="./men-polo.php"> Polo</a></li>
                        <li><a href="./men-long-sleeved-T-shirt.php"> Long sleeved T-shirt</a></li>
                        <li><a href="./men-sweatshirts-&-hoodies.php"> Sweatshirts & Hoodies</a></li>
                        <li><a href="./men-co-ord-sets.php"> Co-ORD Sets</a></li>
                        <li><a href="./men-jacket.php"> Jacket</a></li>
                        <li><a href="./men-shorts.php"> Shorts</a></li>
                        <li><a href="./men-bottoms.php"> Bottoms</a></li>
                    </ul>
                </li>
                <li class="about-us sub-menu-title " id="sub-menu-title"><a href="#">WOMEN <i class="fa-sharp fa-solid fa-caret-down"></i></a>
                    <ul id="sub-menu-title-details">
                        <li><a href="./women-disney.php"> Disney</a></li>
                        <li><a href="./women-marvel.php"> Marvel</a></li>
                        <li><a href="./women-anime.php"> anime</a></li>
                        <li><a href="./women-oversizedT-shirt.php"> Oversized T-shirt</a></li>
                        <li><a href="./women-bottoms.php"> Bottoms</a></li>
                        <li><a href="./women-tie dye.php"> Tie Dye</a></li>
                        <li><a href="./women-sweatshirts and hoodie.php"> Sweatshirts & Hoodies</a></li>
                        <li><a href="./women-jacket.php"> Jacket</a></li>
                        <li><a href="./women-oversized.php"> Oversized Shirt</a></li>
                        <li><a href="./women-cardigan.php"> Cardigan</a></li>
                        <li><a href="./women-shades of winter.php"> Shades of Winter</a></li>
                        <li><a href="./women-kookie.php"> Kookie Collection</a></li>
                        <li><a href="./women-summer collection.php"> Summer Collection</a></li>
                        <li><a href="./women-fresca collection.php"> Fresca Collection</a></li>
                        <li><a href="./women-basics.php"> Basic</a></li>
                        <li><a href="./women-full sleeves.php"> Full Sleeves</a></li>
                        <li><a href="./women-signature.php"> Signature</a></li>
                        <li><a href="./women-tops.php"> Tops</a></li>
                        <li><a href="./women-tanks&camisole.php"> Tanks & Camisole </a></li>
                        <li><a href="./women-polo.php"> Polo</a></li>
                        <li><a href="./women-cropped T-shirt.php"> Cropped T-shirts</a></li>
                        <li><a href="./women-regular T-shirt.php"> Relaxed Fit T-shirts</a></li>
                        <li><a href="./women-co-ord sets.php"> Co-ORD Sets</a></li>
                        <li><a href="./women-booty shorts.php">Booty shorts</a></li>
                        <li><a href="./women-regular T-shirt.php"> Regular T-shirt</a></li>


                    </ul>
                </li>
                <li class="about-us sub-menu-title" id="sub-menu-title"><a href="#">ACCESSORIES <i class="fa-sharp fa-solid fa-caret-down"></i></a>
                    <ul id="sub-menu-title-details">
                        <li><a href="./ACCESSORIES-caps.php"> Cap</a></li>
                        <li><a href="./ACCESSORIES-Bucckethat .php"> Bucket HAT</a></li>
                        <li><a href="./ACCESSORIES-Face.php"> face masks</a></li>
                    </ul>
                </li>
                <li> <a href="./new-in.php"> NEW IN</a></li>
                <li> <a href="./disney.php"> DISNEY</a></li>
                <li> <a href="./marvel.php"> MARVEL</a></li>
                <li> <a href="./contact.php"> CONTACT</a></li>
            </ul>
        </div>
    </header>
    <?php
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

            $tot=0;
            while ($row9 = mysqli_fetch_assoc($result9)) {

                $item_id = $row9['item'];
                $varriant = $row9['varriant'];
                $quantity = $row9['quantity'];
                $product_name = $row9['product_name'];
                $ori = $row9['ori_price'];
                $cur = $row9['cur_price'];
                $cart_id = $row9['id'];
                $img3 = explode(",", "$row9[image]");
                $sp=$cur*$quantity;
                $tot+=$sp;

                

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
            }
            ?>

        </div>
        <div class="end">
            <div class="comfort">
                <div>
                    <span>SUBTOTAL:</span>
                    <strong>₹<?=$tot?></strong>
                </div>
                <span class="code"><a href="#" id="code" onclick="myFunction()">Having a Coupon code?</a>
                    <div id="myDIV">
                        <input type="text" placeholder="coupon code">
                        <button class="btn">APPLY</button>
                    </div>
                </span>
            </div>\`

            <div class="congo">
                <a href="./viewcart.php" class="view-cart">VIEW CART</a>
                <a href="./checkout.php" class="checkout ot">CHECKOUT</a>
            </div>
        </div>

    </div>





