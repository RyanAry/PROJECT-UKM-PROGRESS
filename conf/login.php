<?php
include 'db.php';
session_start();

if (isset($_POST['submit'])) {
    
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $error_msg = "Username or Password is incorrect";

    $sql = "SELECT * FROM `user` WHERE username = '$username' AND password = '$password'";
    $login = mysqli_query($db, $sql);
    $data = mysqli_fetch_assoc($login);

    if ($login->num_rows > 0) {
        $_SESSION['username'] = $username;
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['email'] = $data['email'];
        header("Location: ../public/pages/index.php");
    } else {
        $_SESSION['error'] = $error_msg;
        header("Location: ../public/pages/login.php");
    }
}
?>