<?php
    include '../../conf/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>TWENT4OUR</title>
</head>
<body>
    <div class="app">
        <header>
            <nav class="bg-primary text-white p-4 font-poppins">
                <div class="container-fluid mx-auto flex justify-between items-center ms-32 me-32">
                    <a href="#" class="text-xl font-semibold flex">
                        <img src="../img/notext_logo.png" alt="" class="w-11"><span class="p-2"> TWENT4OUR</span>
                    </a>
                    <div>
                        <a href="#" class="px-4 py-2">Home</a>
                        <a href="#" class="px-4 py-2">About</a>
                        <!-- Sign In and Sign Up Links -->
                        <a href="login.php" class="px-4 py-2">Sign In</a>
                        <a href="signup.php" class="px-6 py-3 bg-transparent border-2 text-white  hover:bg-white hover:text-primary transition duration-300 ease-in-out rounded-md">Sign Up</a>
                    </div>
                </div>
            </nav>
        </header>
