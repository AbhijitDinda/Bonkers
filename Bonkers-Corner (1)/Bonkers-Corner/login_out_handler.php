<?php
include './connection.php';
session_start();

if (isset($_SESSION['id'])) {

    header("Location: logOut.php");
    exit;
}  else {
    
    header("Location: login.php");
    exit;
}



?>