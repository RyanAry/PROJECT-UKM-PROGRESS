<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$host = "localhost";
$username = "root";
$pass = "";
$database = "app";

$db = new mysqli($host,$username,$pass,$database);

if($db){
    // echo"Berhasil";
}
?>