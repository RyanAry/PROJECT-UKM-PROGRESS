<?php
include '../../conf/db.php';
// include 'db.php';
$id_room = $_GET['id'];
$username = $_SESSION['username'];

$query = "SELECT * FROM user WHERE username = '$username'";
$select = mysqli_query($db, $query);
$data_user = mysqli_fetch_assoc($select);

$query_room = "SELECT * FROM `room` WHERE id_room = '$id_room'";
$select_room = mysqli_query($db, $query_room);
$data_room = mysqli_fetch_assoc($select_room);

$query_partner = "SELECT * FROM `partner` WHERE id_partner = '$data_room[id_akomodasi]'";
$partner = mysqli_query($db, $query_partner);
$data_partner = mysqli_fetch_assoc($partner);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $checkin = $_POST['checkin'];
    $checkout = $_POST['checkout'];

    // Create DateTime objects from the check-in and check-out values
    $checkinDate = new DateTime($checkin);
    $checkoutDate = new DateTime($checkout);

    // Calculate the difference between the two dates
    $interval = $checkinDate->diff($checkoutDate);

    // Get the difference in days
    $daysDifference = $interval->days;

    // Calculate the total room price
    $totalhargaroom = $daysDifference * $data_room['harga'];
}

if (isset($_POST['book'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $checkin = $_POST['checkin'];
    $checkout = $_POST['checkout'];

    $gambar = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];
    $new_name = rand() . '_' . $gambar;
    $path = "../../asset/bukti/" . $new_name;
    move_uploaded_file($tmp, $path);

    $query_booking = "INSERT INTO `booking`(`id_akomodasi`, `id_room`, `id_user`, `nama_kamar`, `tipe_kamar`, `nama_tamu`, `email`, `no_tlp`, `check_in`, `check_out`, `bukti_bayar`) VALUES ('" . $data_room['id_akomodasi'] . "','" . $data_room['id_room'] . "','" . $data_user['id_user'] . "','" . $data_room['nama'] . "','" . $data_room['tipe'] . "','" . $nama . "','" . $email . "','" . $phone . "','" . $checkin . "','" . $checkout . "','" . $new_name . "')";
    $insert = mysqli_query($db, $query_booking);

    //msg
    $success = "Booking Success!";
    $failed = "Booking Failed!";

    if ($insert) {
        $_SESSION['status'] = 'Success';
        $_SESSION['succes_msg'] = $success;
        // echo "<script>alert('Booking Success!')</script>";
    } else {
        $_SESSION['status'] = 'Error';
        $_SESSION['error_msg'] = $failed;
        // echo "<script>alert('Booking Failed!')</script>";
    }
}
?>
