<?php
include './header.php';

include './connection.php';
$query = "SELECT * FROM wishlist INNER JOIN product WHERE wishlist.product_id=product.id AND wishlist.user_id='{$_SESSION['id']}'";
$result = mysqli_query($con, $query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wishlist</title>
    <?php include 'common-style.php'; ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/wishlist.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/fontawesome.min.css" />

    <script defer src="./assets/js/za-script.js"></script>
   

</head>

<body>

    <div class="heading" style="height: 100px;">
        <h1> WISHLIST  <i class="fa-solid fa-heart fa-2xl" style="color: #ff0000;"></i></h1>
    </div>
    <div class="product-container">
        <?php
        while ($row = mysqli_fetch_assoc($result)) {



        ?>

            <div class="za-product-row" style="width:300px">
                <img class="za-primary-img" src="./assets/images/men-disney/i3.jpg" alt="i1">
                <img class="za-secondary-img" src="./assets/images/men-disney/i3a.jpg" alt="i1a">
                <div class="za-product-info">
                    <p><?= $row['product_name'] ?></p>
                    <h5><?= $row['product_name'] ?></h5>

                </div>
                <div class="za-heart-icon">
                <i class="fa-solid fa-heart fa-2xl" style="color: #ff0000;"></i>

                </div>
                <div class="za-product-price">
                    <p>&#x20b9;<?= $row['ori_price'] ?></p>
                    <p>&#x20b9;<?= $row['cur_price'] ?></p>
                </div>
                <div class="price-discount">
                    <h5>-33%</h5>


                </div>

            </div>

        <?php
        }
        ?>

    </div>
    <footer>
        <?php include './footer.php'; 
        include './footer_script.php' 
        ?>
    </footer>
</body>

</html>