<?php

include 'database/config.php';
include 'includes/form_handlers/register_handler.php';
include 'includes/form_handlers/login_handler.php';
include 'includes/form_handlers/connection.php';
session_start();
$user_name = $_SESSION['username'];
$update_msg=mysqli_query($con,"UPDATE users SET log_in='offline' WHERE username='$user_name'");
session_destroy();
header("Location:register.php");


?>