<?php
include '../../conf/db.php';

$id = $_GET['id'];
$sql = "SELECT * FROM `partner` WHERE id_partner = $id";
$select = mysqli_query($db, $sql);

$query = "SELECT * FROM `room` WHERE id_akomodasi = $id";
$select_room = mysqli_query($db, $query);

?>