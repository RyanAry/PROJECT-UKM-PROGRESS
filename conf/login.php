<?php
include 'db.php';

if (isset($_POST['submit'])) {
    //var
    $email = $_POST['email'];
    $password = $_POST['password'];
    $error_msg = "Username or Password is incorrect";

    //cek database user
    $sql = "SELECT * FROM `user` WHERE email = '$email' AND password = '$password'";
    $user = mysqli_query($db, $sql);

    //cek database admin app
    $sql = "SELECT * FROM `app_admin` WHERE email = '$email' AND password = '$password'";
    $admin_app = mysqli_query($db, $sql);

    //cek database Admin partner
    $sql = "SELECT * FROM `partner_admin` WHERE email = '$email' AND password = '$password'";
    $partner_admin = mysqli_query($db, $sql);

    //data user
    $data = mysqli_fetch_assoc($user);
    $data_admin_app = mysqli_fetch_assoc($admin_app);
    $data_partner = mysqli_fetch_assoc($partner_admin);

    if ($user->num_rows > 0) {
        //login berhasil
        $_SESSION['username'] = $data['username'];
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['email'] = $email;
        header("Location: ../public/pages/index.php");
    } else if ($admin_app ->num_rows > 0) {
        //login berhasil
        $_SESSION['username'] = $data_admin_app['username'];
        $_SESSION['nama'] = $data_admin_app['nama'];
        $_SESSION['email'] = $email;
        header("Location: ../public/pages/admin/index.php");
    } else if ($partner_admin ->num_rows > 0) {
        //login berhasil
        $_SESSION['username'] = $data_partner['username'];
        $_SESSION['nama'] = $data_partner['nama'];
        $_SESSION['email'] = $email;
        header("Location: ../public/pages/partner/index.php");
    } else {
        $_SESSION['error'] = $error_msg;
        header("Location: ../public/pages/login.php");
    }
}
?>