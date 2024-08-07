<?php
include '../../conf/db.php';

$username = $_SESSION['username'];

$query = "SELECT * FROM user WHERE username = '$username'";
$select = mysqli_query($db, $query);
$data_user = mysqli_fetch_assoc($select);

$query_booking = "SELECT * FROM `booking` WHERE id_user = '$data_user[id_user]'";
$select_booking = mysqli_query($db, $query_booking);
?>