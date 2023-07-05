<?php

include './connection.php';

include './Authentication.php';




$query1 = "SELECT * FROM user WHERE user.id='{$_SESSION['id']}'";
$result1 = mysqli_query($con, $query1);

while ($row1 = mysqli_fetch_assoc($result1)) {
    $username = $row1['username'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log out</title>
    <?php include 'common-style.php'; ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/za-style.css" />
    <link rel="stylesheet" href="./assets/css/wishlist.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/fontawesome.min.css" />

    <script defer src="./assets/js/za-script.js"></script>

</head>

<body>
    <header>
        <?php include './header.php'; ?>
    </header>

    <center>
        <form method="POST" action="./process_Logout.php" class="forms-sample">
            <div style="padding-bottom: 250px; padding-top: 150px">
                <!-- Account information -->
                <h1 style="font-size: 24px; font-weight: bold; color: #333; text-align: center; margin-bottom: 20px;">
                    Your Account
                </h1>
                <h1 style="font-size: 24px; font-weight: bold; color: #FF1100; text-align: center; margin-bottom: 20px;">
                    UserName: <?= $username ?>
                </h1>
                <!-- Logout button -->
                <button type="submit" name="logout" style="background-color: black; color: white; cursor: pointer; padding: 10px 20px; font-size: 18px; border: none; border-radius: 4px;">
                    LOG OUT
                </button>

                <!-- Wishlist section -->
                <div class="heading" style="height: 100px;">
                    <h1> WISHLIST <i class="fa-solid fa-heart fa-2xl" style="color: #ff0000;"></i></h1>
                </div>

                <div class="product-container">
                    <?php
                    $query = "SELECT * FROM wishlist INNER JOIN product WHERE wishlist.product_id=product.id AND wishlist.user_id='{$_SESSION['id']}'";
                    $result = mysqli_query($con, $query);

                    while ($row = mysqli_fetch_assoc($result)) {
                        $img = explode(",", "$row[image]");



                    ?>

                        <div class="za-product-row" style="width:300px">
                            <img class="za-primary-img" src="/template/process/img/<?php echo $img[0] ?>">
                            <img class="za-secondary-img" src="/template/process/img/<?php echo $img[0] ?>">
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


            </div>
        </form>
    </center>

    <footer>
        <?php include './footer.php'; ?>
        <?php include './footer_script.php'; ?>
    </footer>
</body>


</html>