<?php
session_start();
include './connection.php';


$query10 = "SELECT * FROM cart WHERE cart.user_id=? AND cart.item=?";
$stmt = mysqli_prepare($con, $query10);
mysqli_stmt_bind_param($stmt, "ss", $_SESSION['id'], $_POST['product_id']);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) > 0) {
    $updated_cart = "UPDATE cart SET cart.varriant=?, cart.quantity=? WHERE cart.user_id=? AND cart.item=?";
    $update_stmt = mysqli_prepare($con, $updated_cart);
    mysqli_stmt_bind_param($update_stmt, "ssss", $_POST['size'], $_POST['quantity'], $_SESSION['id'], $_POST['product_id']);
    mysqli_stmt_execute($update_stmt);
    if($update_stmt){
        print "Success";
    }else{
        print "failed update";
    }
} else {
    $insert_query = "INSERT INTO cart (user_id, item, varriant, quantity) VALUES (?, ?, ?, ?)";
    $insert_stmt = mysqli_prepare($con, $insert_query);
    mysqli_stmt_bind_param($insert_stmt, "ssss", $_SESSION['id'], $_POST['product_id'], $_POST['size'], $_POST['quantity']);
    mysqli_stmt_execute($insert_stmt);
    if($insert_stmt){
        print "Success";
    }else{
        print "failed insert";
    }
}




// $query10 = "SELECT * FROM cart WHERE cart.user_id='" . $_POST['traffic_id'] . "' AND cart.item='" . $_POST['product_id'] . "'";
// $query_run = mysqli_query($con, $query10);

// if ($query_run) {
//     $updated_cart = "UPDATE cart SET cart.varriant='" . $_POST['size'] . "',cart.quantity='" . $_POST['quantity'] . "' WHERE cart.user_id='" . $_POST['traffic_id'] . "' AND cart.item='" . $_POST['product_id'] . "'";
//     $update_query_run = mysqli_query($con, $updated_cart);
// } else {
//     $insert_query = "INSERT INTO cart (user_id, item, varriant, quantity) VALUES ('" . $_POST['traffic_id'] . "', '" . $_POST['product_id'] . "', '" . $_POST['size'] . "', '" . $_POST['quantity'] . "')";
//     $insert_query_run = mysqli_query($con, $insert_query);
// }









?>