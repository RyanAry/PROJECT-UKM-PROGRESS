<?php
include '../../../conf/db.php';

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];
    $provinsi = $_POST['provinsi'];
    $kota = $_POST['kota'];
    $deskripsi = $_POST['deskripsi'];

    $rand = rand();
    $gambar = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];
    $new_name = $rand . '_' . $gambar;
    $path = "../../../asset/hotel/" . $new_name;

    if (move_uploaded_file($tmp, $path)) {
        $query_update = "UPDATE `partner` SET `nama_akomodasi` = '$nama', `email_perusahaan` = '$email', `alamat` = '$alamat', `provinsi` = '$provinsi', `kota` = '$kota', `deskripsi` = '$deskripsi', `gambar` = '$new_name' WHERE `id_partner` = '$id'";
        $update = mysqli_query($db, $query_update);

        if ($update) {
            $_SESSION['status'] = "Success";
            $_SESSION['succes_msg'] = "Room created successfully";
            // header('Location: ../../public/pages/partner/create_room.php');
        } else {
            $_SESSION['status'] = "Error";
            $_SESSION['error_msg'] = "Failed to create room";
            // header('Location: ../../public/pages/partner/create_room.php');
            // echo "Failed to create room";
        }

        $success = "Data berhasil diubah";
        $failed = "Data gagal diubah";

        if ($update) {
            $_SESSION['status'] = "Success";
            $_SESSION['succes_msg'] = $success;
        } else {
            $_SESSION['status'] = "Error";
            $_SESSION['error_msg'] = $failed;
        }
    }
}

$email = $_SESSION['email'];

$query_select_akomodasi = "SELECT * FROM `partner_admin` WHERE `email` = '$email'";
$select_akomodasi = mysqli_query($db, $query_select_akomodasi);
$row_akomodasi = mysqli_fetch_assoc($select_akomodasi);

$query_select_room = "SELECT * FROM `partner` where `id_partner` = '$row_akomodasi[id_akomodasi]'";
$select_partner = mysqli_query($db, $query_select_room);
