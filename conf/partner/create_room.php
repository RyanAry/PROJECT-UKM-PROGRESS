<?php
include '../db.php';

if (isset($_POST['create'])) {
    $id_akomodasi = $_POST['id_akomodasi'];
    $nama = $_POST['nama'];
    $tipe = $_POST['tipe'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];

    $rand = rand();
    $gambar = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];
    $new_name = $rand . '_' . $gambar;
    $path = "../../asset/room/" . $new_name;

    if (move_uploaded_file($tmp, $path)) {
        $query_insert = "INSERT INTO room (id_akomodasi, nama, tipe, harga, deskripsi, gambar) VALUES ('$id_akomodasi', '$nama', '$tipe', '$harga', '$deskripsi', '$new_name')";
        $insert = mysqli_query($db, $query_insert);

        if ($insert) {
            $_SESSION['status'] = "Success";
            $_SESSION['succes_msg'] = "Room created successfully";
            header('Location: ../../public/pages/partner/create_room.php');
        } else {
            $_SESSION['status'] = "Error";
            $_SESSION['error_msg'] = "Failed to create room";
            header('Location: ../../public/pages/partner/create_room.php');
            // echo "Failed to create room";
        }
    } else {
        $_SESSION['status'] = "Error";
        $_SESSION['error_msg'] = "Failed to upload image";
        echo "Failed to upload image";
    }
}
?>