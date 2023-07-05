<?php
include './connection.php';

error_reporting(E_ERROR | E_PARSE); // Suppress PHP warnings and only display fatal errors

session_start();

if (!isset($_SESSION['id'])) {
    // Session is not active, display custom alert dialog with dynamic CSS
    echo '
    <style>
        .alert {
            background-color: #f8d7da;
            border-color: #f5c6cb;
            color: #721c24;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 4px;
            font-family: Arial, sans-serif;
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        /* Additional dynamic CSS */
        .custom {
            background-color: #cce5ff;
            border-color: #b8daff;
            color: #004085;
        }
    </style>
    <div class="alert custom">
        Session not active. Please login.
    </div>
    <script>
        setTimeout(function(){
            window.location.href = "login.php";
        }, 3000); // Redirect after 3 seconds
    </script>';
    exit;
}
?>
