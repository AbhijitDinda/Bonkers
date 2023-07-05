<?php
include './connection.php';

include './Authentication.php';

$S_id = $_GET['S_id'];
$C_id = $_GET['C_id'];
$P_no = $_GET['P_no'];

$p_per_pg = 5;
$query3 = "SELECT COUNT('id') AS cnt,product.product_name FROM product
                            WHERE product.category_id='$C_id' AND product.sub_category_id='$S_id'";



$result3 = mysqli_query($con, $query3);
//  print_r($result3->num_rows); die;
while ($row3 = mysqli_fetch_assoc($result3)) {
    $p_cnt = $row3['cnt'];

    // print_r($cat_name);die;

}

$query5 = "SELECT subcategory.sub_cat_name,category.category_name  FROM category INNER JOIN subcategory
                            WHERE subcategory.category_id='$C_id' AND subcategory.id='$S_id' AND category.id='$C_id'";

$result5 = mysqli_query($con, $query5);

while ($row5 = mysqli_fetch_assoc($result5)) {

    $subcat_name = $row5['sub_cat_name'];
    $cat_name = $row5['category_name'];
    //print($cat_name);

}
//print($cat_name);die;




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>men-disney</title>
    <?php include 'common-style.php';?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/za-style.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/fontawesome.min.css" />

    <script defer src="./assets/js/za-script.js"></script>

</head>

<body>
    <header>
        <?php include './header.php'; ?>
    </header>
    <section>
        <div class="za-container">
            <div class="za-row">
                <div class="za-left-side">
                    <div class="za-left-side-inner">
                        <div class="za-left-side-filter-menu-icon" id="za-left-side-filter-menu-icon">
                            <i class="fa-solid fa-bars"></i><span>FILTER</span>
                        </div>
                        <div class="wrapper za-left-side-filter-menu-details" id="za-left-side-filter-menu-details">
                            <fieldset class="filter-price">
                                <span class="price-title">Filter By Price</span>

                                <div class="price-field">
                                    <input type="range" min="590" max="1700" value="100" id="lower">
                                    <input type="range" min="590" max="1700" value="2500" id="upper">
                                </div>
                                <div class="price-wrap">
                                    <div class="price-wrap-1">
                                        <label for="one">Price: ₹</label>
                                        <input id="one">

                                    </div>
                                    <div class="price-wrap_line">-</div>
                                    <div class="price-wrap-2">
                                        <label for="two"> ₹</label>
                                        <input id="two">

                                    </div>
                                </div>
                                <button class="filter-btn">FILTER</button>
                            </fieldset>
                        </div>
                    </div>
                </div>
                <div class="za-right-side">
                    <nav>
                        <div>
                            <a href="#">Home</a>
                        </div>
                        <span><i class="fa fa-angle-right" style="font-size:12px"></i></span>
                        <div>
                            <a href="#"><?= $cat_name ?></a>
                        </div>
                        <span><i class="fa fa-angle-right" style="font-size:12px"></i></span>
                        <div>
                            <a href="#"><?= $subcat_name ?></a>
                        </div>

                    </nav>

                    <div class="heading">
                        <h1><?= $subcat_name ?></h1>
                    </div>
                    <div class="loopheader">
                        <div class="result">
                            <p> Showing
                                <?= ($P_no - 1) * $p_per_pg + 1
                                ?>
                                –
                                <?php
                                $p_show = ($P_no * $p_per_pg);
                                if ($p_cnt >= $p_show) {
                                    echo $p_show;
                                } else {
                                    echo $p_cnt;
                                }


                                ?>



                                of <?= $p_cnt ?> results</p>

                        </div>

                        <div class="view">
                            <span>VIEW </span>
                            <ul>
                                <li>2</li>
                                <li>3</li>
                                <li>4</li>
                                <li>5</li>
                            </ul>

                        </div>
                        <div class="resposive-filter">
                            <div class="sort">
                                <select name="orderby" class="orderby">
                                    <option value="popularity">Sort by popularity</option>
                                    <option value="rating">Sort by average rating</option>
                                    <option value="date" selected="selected">Sort by latest</option>
                                    <option value="price">Sort by price: low to high</option>
                                    <option value="price-desc">Sort by price: high to low</option>
                                </select>
                            </div>
                        </div>
                    </div>


                    <div class="za-product">
                        <?php

                        $S_id = $_GET['S_id'];
                        $C_id = $_GET['C_id'];

                        $offset = ($P_no - 1) * $p_per_pg;

                        // print_r($C_id);
                        // print_r($P_no);die;
                        $query2 = "SELECT product.product_name,product.product_des, product.id as p_id, product.image,product.ori_price,product.cur_price,category.id AS c_id,category.category_name,subcategory.sub_cat_name,subcategory.id as sub_id 
                                    FROM product 
                                    INNER JOIN category ON category.id=product.category_id 
                                    INNER JOIN subcategory ON subcategory.id = product.sub_category_id
                                    WHERE product.category_id='$C_id' AND product.sub_category_id='$S_id'LIMIT {$offset},{$p_per_pg}";



                        $result2 = mysqli_query($con, $query2);

                        while ($row2 = mysqli_fetch_assoc($result2)) {
                            $img = explode(",", "$row2[image]");
                            $ori_price = $row2["ori_price"];
                            $cur_price = $row2["cur_price"];
                            // $percentage=(($ori_price - $cur_price)*100) /$ori_price;
                        ?>
                            <div class="za-product-row">
                                <a href="./Product.php?P_id=<?= $row2["p_id"] ?>">
                                
                                <img class="za-primary-img" src="/template/process/img/<?php echo $img[0] ?>">
                                <img class="za-secondary-img" src="/template/process/img/<?php echo $img[0] ?>">
                             </a>
                                <div class="za-product-info">
                                    <p><?php echo $row2["product_name"] ?></p>
                                    <h5><?php echo $row2["product_name"] ?></h5>

                                </div>
                                <div class="za-heart-icon">
                                    <i class="fa-regular fa-heart fa-lg"></i>
                                </div>
                                <div class="za-product-price">
                                    <p>&#x20b9; <?= $ori_price ?>.00</p>
                                    <p>&#x20b9; <?= $cur_price ?>.00</p>
                                </div>
                                <div class="price-discount">
                                    <h5>-<?= (int)((($ori_price - $cur_price) * 100) / $ori_price) ?>%</h5>
                                    <i class="fa-regular fa-heart fa-lg"></i>
                                </div>
                                <div class="za-option">
                                    <p id="select_option">SELECT OPTION</p>
                                    <i style="font-size:22px" class="fa-regular fa-heart"></i>

                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>





                    <!-- <div class="za-product-row">
                            <img class="za-primary-img" src="./assets/images/men-disney/i2.jpg" alt="i1">
                            <img class="za-secondary-img" src="./assets/images/men-disney/i2a.jpg" alt="i1a">
                            <div class="za-product-info">
                                <p>DISNEY COLLECTION, LATEST COLLECTION, SWEATSHIRTS & HOODIES</p>
                                <h5>Moody Mickey Mouse Oversized Sweatshirt</h5>

                            </div>
                            <div class="za-heart-icon">
                                <i class="fa-regular fa-heart fa-lg"></i>

                            </div>
                            <div class="za-product-price">
                                <p>&#x20b9; 1799.00</p>
                                <p>&#x20b9; 1299.00</p>


                            </div>
                            <div class="price-discount">
                                <h5>-28%</h5>
                                <i class="fa-regular fa-heart fa-lg"></i>

                            </div>
                            <div class="za-option">
                                <p>SELECT OPTION</p>
                                <i style="font-size:22px" class="fa-regular fa-heart"></i>

                            </div>
                        </div>
                        <div class="za-product-row">
                            <img class="za-primary-img" src="./assets/images/men-disney/i3.jpg" alt="i1">
                            <img class="za-secondary-img" src="./assets/images/men-disney/i3a.jpg" alt="i1a">
                            <div class="za-product-info">
                                <p>DISNEY COLLECTION, LATEST COLLECTION, OVERSIZED T-SHIRT</p>
                                <h5>Donald Duck 34 Oversized Jersey</h5>

                            </div>
                            <div class="za-heart-icon">
                                <i class="fa-regular fa-heart fa-lg"></i>

                            </div>
                            <div class="za-product-price">
                                <p>&#x20b9; 1499.00</p>
                                <p>&#x20b9; 999.00</p>


                            </div>
                            <div class="price-discount">
                                <h5>-33%</h5>
                                <i class="fa-regular fa-heart fa-lg"></i>

                            </div>
                            <div class="za-option">
                                <p>SELECT OPTION</p>
                                <i style="font-size:22px" class="fa-regular fa-heart"></i>

                            </div>
                        </div>
                        <div class="za-product-row">
                            <img class="za-primary-img" src="./assets/images/men-disney/i4.jpg" alt="i1">
                            <img class="za-secondary-img" src="./assets/images/men-disney/i4a.jpg" alt="i1a">
                            <div class="za-product-info">
                                <p>DISNEY COLLECTION, LATEST COLLECTION, OVERSIZED T-SHIRT</p>
                                <h5>Original Mickey Oversized Jersey</h5>

                            </div>
                            <div class="za-heart-icon">
                                <i class="fa-regular fa-heart fa-lg"></i>

                            </div>
                            <div class="za-product-price">
                                <p>&#x20b9; 1499.00</p>
                                <p>&#x20b9; 999.00</p>


                            </div>
                            <div class="price-discount">
                                <h5>-33%</h5>
                                <i class="fa-regular fa-heart fa-lg"></i>

                            </div>
                            <div class="za-option">
                                <p>SELECT OPTION</p>
                                <i style="font-size:22px" class="fa-regular fa-heart"></i>

                            </div>
                        </div>
                        <div class="za-product-row">
                            <img class="za-primary-img" src="./assets/images/men-disney/i5.jpg" alt="i1">
                            <img class="za-secondary-img" src="./assets/images/men-disney/i5a.jpg" alt="i1a">
                            <div class="za-product-info">
                                <p>DISNEY COLLECTION, LATEST COLLECTION, OVERSIZED T-SHIRT</p>
                                <h5>The Lion King Faded Oversized T-shirt</h5>

                            </div>
                            <div class="za-heart-icon">
                                <i class="fa-regular fa-heart fa-lg"></i>

                            </div>
                            <div class="za-product-price">
                                <p>&#x20b9; 1199.00</p>
                                <p>&#x20b9; 849.00</p>


                            </div>
                            <div class="price-discount">
                                <h5>-29%</h5>
                                <i class="fa-regular fa-heart fa-lg"></i>

                            </div>
                            <div class="za-option">
                                <p>SELECT OPTION</p>
                                <i style="font-size:22px" class="fa-regular fa-heart"></i>

                            </div>
                        </div>
                        <div class="za-product-row">
                            <img class="za-primary-img" src="./assets/images/men-disney/i6.jpg" alt="i1">
                            <img class="za-secondary-img" src="./assets/images/men-disney/i6a.jpg" alt="i1a">
                            <div class="za-product-info">
                                <p>BOTTOMS, DISNEY COLLECTION, LATEST COLLECTION</p>
                                <h5>Olive Parachute Pants</h5>

                            </div>
                            <div class="za-heart-icon">
                                <i class="fa-regular fa-heart fa-lg"></i>

                            </div>
                            <div class="za-product-price">
                                <p>&#x20b9; 1499.00</p>
                                <p>&#x20b9; 999.00</p>


                            </div>
                            <div class="price-discount">
                                <h5>-33%</h5>
                                <i class="fa-regular fa-heart fa-lg"></i>

                            </div>
                            <div class="za-option">
                                <p>SELECT OPTION</p>
                                <i style="font-size:22px" class="fa-regular fa-heart"></i>

                            </div>
                        </div>
                        <div class="za-product-row">
                            <img class="za-primary-img" src="./assets/images/men-disney/i7.jpg" alt="i1">
                            <img class="za-secondary-img" src="./assets/images/men-disney/i7a.jpg" alt="i1a">
                            <div class="za-product-info">
                                <p>DISNEY COLLECTION, LATEST COLLECTION, SWEATSHIRTS & HOODIES</p>
                                <h5>Stitch Heavyweight Hoodie</h5>

                            </div>
                            <div class="za-heart-icon">
                                <i class="fa-regular fa-heart fa-lg"></i>

                            </div>
                            <div class="za-product-price">
                                <p>&#x20b9; 1999.00</p>
                                <p>&#x20b9; 1699.00</p>


                            </div>
                            <div class="price-discount">
                                <h5>-15%</h5>
                                <i class="fa-regular fa-heart fa-lg"></i>

                            </div>
                            <div class="za-option">
                                <p>SELECT OPTION</p>
                                <i style="font-size:22px" class="fa-regular fa-heart"></i>

                            </div>
                        </div>
                        <div class="za-product-row">
                            <img class="za-primary-img" src="./assets/images/men-disney/i8.jpg" alt="i1">
                            <img class="za-secondary-img" src="./assets/images/men-disney/i8a.jpg" alt="i1a">
                            <div class="za-product-info">
                                <p>DISNEY COLLECTION, LATEST COLLECTION, SWEATSHIRTS & HOODIES</p>
                                <h5>X Game Mode Oversized Sweatshirt</h5>

                            </div>
                            <div class="za-heart-icon">
                                <i class="fa-regular fa-heart fa-lg"></i>

                            </div>
                            <div class="za-product-price">
                                <p>&#x20b9; 1699.00</p>
                                <p>&#x20b9; 1199.00</p>


                            </div>
                            <div class="price-discount">
                                <h5>-29%</h5>
                                <i class="fa-regular fa-heart fa-lg"></i>

                            </div>
                            <div class="za-option">
                                <p>SELECT OPTION</p>
                                <i style="font-size:22px" class="fa-regular fa-heart"></i>

                            </div>
                        </div>
                        <div class="za-product-row">
                            <img class="za-primary-img" src="./assets/images/men-disney/i9.jpg" alt="i1">
                            <img class="za-secondary-img" src="./assets/images/men-disney/i9a.jpg" alt="i1a">
                            <div class="za-product-info">
                                <p>DISNEY COLLECTION, LATEST COLLECTION, OVERSIZED T-SHIRT</p>
                                <h5>Get Silly Oversized T-Shirt</h5>

                            </div>
                            <div class="za-heart-icon">
                                <i class="fa-regular fa-heart fa-lg"></i>

                            </div>
                            <div class="za-product-price">
                                <p>&#x20b9; 1099.00</p>
                                <p>&#x20b9; 799.00</p>


                            </div>
                            <div class="price-discount">
                                <h5>-27%</h5>
                                <i class="fa-regular fa-heart fa-lg"></i>

                            </div>
                            <div class="za-option">
                                <p>SELECT OPTION</p>
                                <i style="font-size:22px" class="fa-regular fa-heart"></i>

                            </div>
                        </div>
                        <div class="za-product-row">
                            <img class="za-primary-img" src="./assets/images/men-disney/i10.jpg" alt="i1">
                            <img class="za-secondary-img" src="./assets/images/men-disney/i10a.jpg" alt="i1a">
                            <div class="za-product-info">
                                <p>DISNEY COLLECTION, LATEST COLLECTION, SWEATSHIRTS & HOODIES</p>
                                <h5>Red Mickey Mouse Oversized Sweatshirt</h5>

                            </div>
                            <div class="za-heart-icon">
                                <i class="fa-regular fa-heart fa-lg"></i>

                            </div>
                            <div class="za-product-price">
                                <p>&#x20b9; 1699.00</p>
                                <p>&#x20b9; 1199.00</p>


                            </div>
                            <div class="price-discount">
                                <h5>-29%</h5>
                                <i class="fa-regular fa-heart fa-lg"></i>

                            </div>
                            <div class="za-option">
                                <p>SELECT OPTION</p>
                                <i style="font-size:22px" class="fa-regular fa-heart"></i>

                            </div>
                        </div>
                        <div class="za-product-row">
                            <img class="za-primary-img" src="./assets/images/men-disney/i11.jpg" alt="i1">
                            <img class="za-secondary-img" src="./assets/images/men-disney/i11a.jpg" alt="i1a">
                            <div class="za-product-info">
                                <p>DISNEY COLLECTION, LATEST COLLECTION, SWEATSHIRTS & HOODIES</p>
                                <h5>Mickey & Pluto Oversized Sweatshirt</h5>

                            </div>
                            <div class="za-heart-icon">
                                <i class="fa-regular fa-heart fa-lg"></i>

                            </div>
                            <div class="za-product-price">
                                <p>&#x20b9; 1699.00</p>
                                <p>&#x20b9; 1199.00</p>


                            </div>
                            <div class="price-discount">
                                <h5>-29%</h5>
                                <i class="fa-regular fa-heart fa-lg"></i>

                            </div>
                            <div class="za-option">
                                <p>SELECT OPTION</p>
                                <i style="font-size:22px" class="fa-regular fa-heart"></i>

                            </div>
                        </div>
                        <div class="za-product-row">
                            <img class="za-primary-img" src="./assets/images/men-disney/i12.jpg" alt="i1">
                            <img class="za-secondary-img" src="./assets/images/men-disney/i12a.jpg" alt="i1a">
                            <div class="za-product-info">
                                <p>DISNEY COLLECTION, LATEST COLLECTION, SWEATSHIRTS & HOODIES</p>
                                <h5>Bambi Oversized Sweatshirt</h5>

                            </div>
                            <div class="za-heart-icon">
                                <i class="fa-regular fa-heart fa-lg"></i>

                            </div>
                            <div class="za-product-price">
                                <p>&#x20b9; 1699.00</p>
                                <p>&#x20b9; 1199.00</p>


                            </div>
                            <div class="price-discount">
                                <h5>-29%</h5>
                                <i class="fa-regular fa-heart fa-lg"></i>

                            </div>
                            <div class="za-option">
                                <p>SELECT OPTION</p>
                                <i style="font-size:22px" class="fa-regular fa-heart"></i>

                            </div>
                        </div>
                        <div class="za-product-row">

                            <img class="za-primary-img" src="./assets/images/men-disney/i13.jpg" alt="i1">
                            <img class="za-secondary-img" src="./assets/images/men-disney/i13a.jpg" alt="i1a">
                            <div class="za-product-info">
                                <p>DISNEY COLLECTION, LATEST COLLECTION, OVERSIZED T-SHIRT</p>
                                <h5>Blue Mickey Scribble Oversized T-shirt</h5>

                            </div>
                            <div class="za-heart-icon">
                                <i class="fa-regular fa-heart fa-lg"></i>

                            </div>
                            <div class="za-product-price">
                                <p>&#x20b9; 999.00</p>
                                <p>&#x20b9; 599.00</p>


                            </div>
                            <div class="price-discount">
                                <h5>-40%</h5>
                                <i class="fa-regular fa-heart fa-lg"></i>

                            </div>
                            <div class="za-option">
                                <p>SELECT OPTION</p>
                                <i style="font-size:22px" class="fa-regular fa-heart"></i>

                            </div>
                        </div>
                        <div class="za-product-row">
                            <img class="za-primary-img" src="./assets/images/men-disney/i14.jpg" alt="i1">
                            <img class="za-secondary-img" src="./assets/images/men-disney/i14a.jpg" alt="i1a">
                            <div class="za-product-info">
                                <p>DISNEY COLLECTION, LATEST COLLECTION, OVERSIZED T-SHIRT</p>
                                <h5>Mickey Scribble Oversized T-shirt</h5>

                            </div>
                            <div class="za-heart-icon">
                                <i class="fa-regular fa-heart fa-lg"></i>

                            </div>
                            <div class="za-product-price">
                                <p>&#x20b9; 999.00</p>
                                <p>&#x20b9; 599.00</p>


                            </div>
                            <div class="price-discount">
                                <h5>-40%</h5>
                                <i class="fa-regular fa-heart fa-lg"></i>

                            </div>
                            <div class="za-option">
                                <p>SELECT OPTION</p>
                                <i style="font-size:22px" class="fa-regular fa-heart"></i>

                            </div>
                        </div>
                        <div class="za-product-row">
                            <img class="za-primary-img" src="./assets/images/men-disney/i15.jpg" alt="i1">
                            <img class="za-secondary-img" src="./assets/images/men-disney/i15a.jpg" alt="i1a">
                            <div class="za-product-info">
                                <p>DISNEY COLLECTION, LATEST COLLECTION, OVERSIZED T-SHIRT</p>
                                <h5>Chirpy Donald Duck Oversized T-shirt</h5>

                            </div>
                            <div class="za-heart-icon">
                                <i class="fa-regular fa-heart fa-lg"></i>

                            </div>
                            <div class="za-product-price">
                                <p>&#x20b9; 1299.00</p>
                                <p>&#x20b9; 899.00</p>


                            </div>
                            <div class="price-discount">
                                <h5>-31%</h5>
                                <i class="fa-regular fa-heart fa-lg"></i>

                            </div>
                            <div class="za-option">
                                <p>SELECT OPTION</p>
                                <i style="font-size:22px" class="fa-regular fa-heart"></i>

                            </div>
                        </div>
                        <div class="za-product-row">

                            <img class="za-primary-img" src="./assets/images/men-disney/i16.jpg" alt="i1">
                            <img class="za-secondary-img" src="./assets/images/men-disney/i16a.jpg" alt="i1a">
                            <div class="za-product-info">
                                <p>DISNEY COLLECTION, LATEST COLLECTION, OVERSIZED T-SHIRT</p>
                                <h5>Keep Rok’ing Oversized T-shirt</h5>

                            </div>
                            <div class="za-heart-icon">
                                <i class="fa-regular fa-heart fa-lg"></i>

                            </div>
                            <div class="za-product-price">
                                <p>&#x20b9; 1099.00</p>
                                <p>&#x20b9; 799.00</p>


                            </div>
                            <div class="price-discount">
                                <h5>-27%</h5>
                                <i class="fa-regular fa-heart fa-lg"></i>

                            </div>
                            <div class="za-option">
                                <p>SELECT OPTION</p>
                                <i style="font-size:22px" class="fa-regular fa-heart"></i>

                            </div>
                        </div> -->
                </div>
                <div class="page-number">

                    <ul>

                        <?php
                        $p_cnt;

                        $no_pg = ceil($p_cnt / $p_per_pg);
                        for ($i = 1; $i <= $no_pg; $i++) {
                            echo "<li><a href='./men-disney.php?S_id=$S_id&C_id=$C_id&P_no={$i}'>{$i}</a></li>";
                        }


                        ?>




                    </ul>
                </div>
            </div>
        </div>
        </div>
    </section>
    <footer>
        <?php include './footer.php';
         ?>

    </footer>
    <?php
    include './footer_script.php';
    include './All_cart_js.php';
  ?>
    

</body>

</html>