<?php
include 'db.php';

if (isset($_POST['submit'])) {
    //var
    $nama = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $pass = $_POST['password'];

    //error message
    $error_msg = "Email Atau Username Sudah Terdaftar";

    //cek data
    $cek = "SELECT * FROM `user` WHERE username = '$username' OR email = '$email'";
    $cek_data = mysqli_query($db, $cek);

    if ($cek_data->num_rows > 0) {
        //mengirimkan pesan error
        $_SESSION['error'] = $error_msg;
        header("Location: ../public/pages/signup.php");
    } else {
        //query insert data
        $query = "INSERT INTO `user`(`nama`, `email`, `username`, `password`) VALUES ('$nama','$email','$username','$pass')";

        //eksekusi query
        $regis = mysqli_query($db, $query);

        if ($regis) {
            header("location:../public/pages/login.php");
        }
    }
}
?>
