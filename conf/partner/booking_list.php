<?php
include '../../../conf/db.php';

if (isset($_POST['approve'])) {
    $id = $_POST['id'];
    
    $query = "UPDATE `booking` SET status = 'diterima' WHERE id_booking = '$id'";
    $update = mysqli_query($db, $query);

    $query_data_booking = "SELECT * FROM `booking` WHERE id_booking = '$id'";
    $select_data_booking = mysqli_query($db, $query_data_booking);
    $data_booking = mysqli_fetch_assoc($select_data_booking);
    
    //msg 
    $success = "Berhasil Approve";
    $failed = "Gagal Approve";

    if ($update) {

        $query_room = "UPDATE `room` SET `status`='tidak_tersedia' WHERE id_room = '$data_booking[id_room]'";
        $update_room = mysqli_query($db, $query_room);

        $_SESSION['status'] = 'Success';
        $_SESSION['succes_msg'] = $success;
    } else {
        $_SESSION['status'] = 'Error';
        $_SESSION['Error_msg'] = $failed;
    }
} else if (isset($_POST['reject'])) {
    $id = $_POST['id'];
    $alasan = $_POST['alasan'];
    
    $query = "UPDATE `booking` SET status = 'ditolak', `alasan` = '$alasan' WHERE id_booking = '$id'";
    $update = mysqli_query($db, $query);

    //msg
    $success = "Berhasil Reject";
    $failed = "Gagal Reject";

    if ($update) {
        $_SESSION['status'] = 'Success';
        $_SESSION['succes_msg'] = $success;
    } else {
        $_SESSION['status'] = 'Error';
        $_SESSION['Error_msg'] = $failed;
    }
} else if (isset($_POST['delete'])) {
    $id = $_POST['id'];

    $query_data_booking = "SELECT * FROM `booking` WHERE id_booking = '$id'";
    $select_data_booking = mysqli_query($db, $query_data_booking);
    $data_booking = mysqli_fetch_assoc($select_data_booking);

    $query_room = "UPDATE `room` SET `status`='tersedia' WHERE id_room = '$data_booking[id_room]'";
    $update_room = mysqli_query($db, $query_room);

    //msg
    $success = "Berhasil Delete";
    $failed = "Gagal Delete";
    
    if ($update_room) {

        $query = "DELETE FROM `booking` WHERE id_booking = '$id'";
        $delete = mysqli_query($db, $query);

        $_SESSION['status'] = 'Success';
        $_SESSION['succes_msg'] = $success;
    } else {
        $_SESSION['status'] = 'Error';
        $_SESSION['Error_msg'] = $failed;
    }
} {

}

$email = $_SESSION['email'];

$query = "SELECT * FROM `partner_admin` WHERE email = '$email'";
$select = mysqli_query($db, $query);
$data_user = mysqli_fetch_assoc($select);

$query_booking = "SELECT * FROM `booking` WHERE id_akomodasi = '$data_user[id_akomodasi]'";
$select_booking = mysqli_query($db, $query_booking);
?>