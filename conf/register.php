<?php
include 'db.php';

if(isset($_POST['submit'])){

    $nama = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $pass = $_POST['password'];

    $query = "INSERT INTO `user`(`nama`, `email`, `username`, `password`) VALUES ('$nama','$email','$username','$pass')";

    $regis = mysqli_query($db,$query);

    if($regis){
        header("location:../public/pages/login.php");
    } else {
        echo 'error';
    }
}
?>