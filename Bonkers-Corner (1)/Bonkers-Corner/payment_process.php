<?php
session_start();
include './connection.php';


$query = "INSERT INTO payment (user_id, benificery_name, ammount, payment_status)
VALUES ('" . $_SESSION['id'] . "', '" . $_POST['banificery_name'] . "', '" . $_POST['ammount'] . "', '" . $_POST['payment_status'] . "')";
$run = mysqli_query($con, $query);


if ($run) {

    $query2="DELETE FROM cart WHERE user_id = '{$_SESSION['id']}'";
    $run2 = mysqli_query($con, $query2);

} else {
    print "Cart not clean";
}









?>