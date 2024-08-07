<?php
    include '../../../conf/db.php';

    if (isset($_POST['add'])) {
    
    $id_akomodasi = $_POST['id'];
    $email = $_POST['email'];
    $name = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query check data double
    $query_data_admin_partner = "SELECT * FROM `partner_admin` WHERE username = '$username' AND id_akomodasi = '$id_akomodasi'";
    $data_admin_partner = mysqli_query($db, $query_data_admin_partner);

        // Check data double
        if ($data_admin_partner->num_rows > 0) {
            $_SESSION['status'] = "Error";
            $_SESSION['error_msg'] = "Email atau username sudah terdaftar";
        } else {
            //msg
            $success = "Data berhasil ditambahkan";
            $failed = "Data gagal ditambahkan";

            // Insert query
            $query_insert = "INSERT INTO `partner_admin`(`id_akomodasi`, `nama`, `username`, `password`, `email`) VALUES ('$id_akomodasi', '$name', '$username', '$password', '$email')";
            $insert = mysqli_query($db, $query_insert);

                //query insert data admin partner
                if ($insert) {
                    $_SESSION['status'] = "Success";
                    $_SESSION['succes_msg'] = $success;
                } else {
                    $_SESSION['status'] = "Error";
                    $_SESSION['error_msg'] = $failed;
                }
        }
    }  else if (isset($_POST['delete'])) {
        $id = $_POST['id'];

        //msg
        $success = "Data berhasil dihapus";
        $failed = "Data gagal dihapus";

        // Delete query partner
        $query_delete_partner = "DELETE FROM `partner` WHERE id_partner = '$id'";
        $delete_partner = mysqli_query($db, $query_delete_partner);

        // Delete query partner_admin
        $query_delete_admin = "DELETE FROM `partner_admin` WHERE id_akomodasi = '$id'";
        $delete_admin = mysqli_query($db, $query_delete_admin);

        if ($delete_partner && $delete_admin) {
            $_SESSION['status'] = "Success";
            $_SESSION['succes_msg'] = $success;
            // header("Location: partner.php");
        } else {
            $_SESSION['status'] = "Error";
            $_SESSION['error_msg'] = $failed;
            // header("Location: partner.php");
        }
    }

    $query_select = "SELECT * FROM `partner`";
    $select = mysqli_query($db, $query_select);

?>