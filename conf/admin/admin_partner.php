<?php
    include '../../../conf/db.php';

    $query_select_partner_admin = "SELECT * FROM `partner_admin` WHERE `role` = 'admin'";
    $select_partner_admin = mysqli_query($db, $query_select_partner_admin);
?>