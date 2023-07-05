
<?php
session_start();
include './connection.php';

$product_id = $_POST['product_id'];

// Check if the product ID already exists in the database
$query_check = "SELECT COUNT(*) AS count FROM wishlist WHERE user_id = '" . $_SESSION['id'] . "' AND product_id = '" . $product_id . "'";
$result_check = mysqli_query($con, $query_check);
$row = mysqli_fetch_assoc($result_check);
$count = $row['count'];

if ($count > 0) {
    // Product ID already exists, terminate or handle the error
    echo "Product ID already exists in the wishlist.";
    // Or you can redirect the user to a different page or display an error message
    exit();
} else {
    // Product ID doesn't exist, insert the data into the database
    $query_insert = "INSERT INTO wishlist (user_id, product_id) VALUES ('" . $_SESSION['id'] . "', '" . $product_id . "')";
    $query_run = mysqli_query($con, $query_insert);
    if ($query_run) {
        // Insertion successful
        echo "Data inserted into the wishlist.";
    } else {
        // Error occurred during insertion
        echo "Error: " . mysqli_error($con);
    }
}

?>
