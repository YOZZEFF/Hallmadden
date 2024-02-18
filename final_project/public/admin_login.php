<?php

// session_start();
if (isset($_SESSION['admin'])) {
    header('location: admin_page.php');
}
$user_type = 'admin';

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];


    $sql = "SELECT * FROM `users` WHERE `email`='$email' AND `password`='$password' AND `user_type`='$user_type'";
    $result = mysqli_query($connection, $sql);
    $admin  = mysqli_fetch_assoc($result);
    if ($admin) {

        $_SESSION['admin'] = 'yes';
        header('location: admin_page.php');
        
    } 
}


?>