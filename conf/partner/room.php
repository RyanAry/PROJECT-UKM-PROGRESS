<?php
include '../../../conf/db.php';

if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $query_delete = "DELETE FROM `room` WHERE `id_room` = '$id'";
    $delete = mysqli_query($db, $query_delete);

    $success = "Room berhasil dihapus";
    $failed = "Room gagal dihapus";
    
    if ($delete) {
        $_SESSION['status'] = "Success";
        $_SESSION['succes_msg'] = $success;
    } else {
        $_SESSION['status'] = "Error";
        $_SESSION['error_msg'] = $failed;
    }
} else if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $tipe = $_POST['tipe'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];

    $query_edit = "UPDATE `room` SET `nama` = '$nama', `tipe` = '$tipe', `harga` = '$harga', `deskripsi` = '$deskripsi' WHERE `id_room` = '$id'";
    $edit = mysqli_query($db, $query_edit);

    $success = "Room berhasil diubah";
    $failed = "Room gagal diubah";

    if ($edit) {
        $_SESSION['status'] = "Success";
        $_SESSION['succes_msg'] = $success;
    } else {
        $_SESSION['status'] = "Error";
        $_SESSION['error_msg'] = $failed;
    }
}
$email = $_SESSION['email'];
$query_select_akomodasi = "SELECT * FROM `partner_admin` WHERE `email` = '$email'";
$select_akomodasi = mysqli_query($db, $query_select_akomodasi);
$row_akomodasi = mysqli_fetch_assoc($select_akomodasi);

$query_select_room = "SELECT * FROM `room` where `id_akomodasi` = '$row_akomodasi[id_akomodasi]'";
$select_room = mysqli_query($db, $query_select_room);

?>