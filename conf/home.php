<?php
include 'db.php';

$query_select_akomodasi = "SELECT * FROM `partner`";
$select_akomodasi = mysqli_query($db, $query_select_akomodasi);
?>