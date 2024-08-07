<?php
    include '../../../conf/db.php';

    if (isset($_POST['edit'])) {
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $role = $_POST['role'];
    
        $cek_data = "SELECT * FROM `app_admin` WHERE `email` = '$email'";
        $cek = mysqli_query($db, $cek_data);
    
        if ($cek->num_rows > 0) {
            $_SESSION['status'] = "Error";
            $_SESSION['error_msg'] = "Data email atau username sudah ada";
            // header("Location: admin.php");
        } else {
            // Fix: Updating the `role` field handling to ensure it is included in the form submission and database update
            $query_edit = "UPDATE `app_admin` SET `nama`='$nama',`username`='$username',`password`='$password',`email`='$email',`role`='$role' WHERE `id`='$id';";
            $edit = mysqli_query($db, $query_edit);
    
            $msg_success = "Data berhasil diubah";
            $msg_failed = "Data gagal diubah";
    
            if ($edit) {
                $_SESSION['status'] = "Success";
                $_SESSION['succes_msg'] = $msg_success;
                // header('Location: admin.php');
            } else {
                $_SESSION['status'] = "Error";  // Fix: Corrected the status to "Error" for failed edit
                $_SESSION['error_msg'] = $msg_failed;
                // echo "Gagal";
            }
        }
    }   else if (isset($_POST['delete'])) {
        $id = $_POST['id'];

        $query_delete = "DELETE FROM `app_admin` WHERE `id` = '$id'";
        $delete = mysqli_query($db, $query_delete);

        $msg_success = "Data berhasil dihapus";
        $msg_failed = "Data gagal dihapus";

        if ($delete) {
            $_SESSION['status'] = "Success";
            $_SESSION['succes_msg'] = $msg_success;
            // header('Location: admin.php');
        } else {
            $_SESSION['status'] = "Success";
            $_SESSION['error_msg'] = $msg_failed;
            // echo "Gagal";
        }
    } else if (isset($_POST['add'])) {
        $nama = $_POST['nama'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $role = $_POST['role'];

        $cek_data = "SELECT * FROM `app_admin` WHERE `username` = '$username' OR `email` = '$email'";
        $cek = mysqli_query($db, $cek_data);

        if ($cek->num_rows > 0) {
            $_SESSION['status'] = "Error";
            $_SESSION['error_msg'] = "Data email atau username sudah ada";
            // header("Location: admin.php");
        } else {
            // insert data partner
            $query_add = "INSERT INTO `app_admin`(`nama`, `username`, `password`, `email`, `role`) VALUES ('$nama', '$username', '$password', '$email', '$role')";
            $add = mysqli_query($db, $query_add);

            $msg_success = "Data berhasil ditambahkan";
            $msg_failed = "Data gagal ditambahkan";

            if ($add) {
                $_SESSION['status'] = "Success";
                $_SESSION['succes_msg'] = $msg_success;
                // header('Location: admin.php');
            } else {
                $_SESSION['status'] = "Success";
                $_SESSION['error_msg'] = $msg_failed;
                // echo "Gagal";
            }
        }
    } 
    $query_admin = "SELECT * FROM `app_admin`";
    $select_admin = mysqli_query($db, $query_admin);
?>