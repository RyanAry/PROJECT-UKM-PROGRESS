<?php
include '../../conf/login.php';
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
    <div class="flex justify-center items-center min-h-screen bg-gray-100">
        <div class="w-full max-w-4xl bg-white rounded-lg shadow-md">
            <div class="flex">
                <div class="w-1/2 relative">
                    <img src="../img/hero.jpg" alt="Description" class="rounded-l-xl object-cover h-full w-full">
                    <div class="absolute inset-0 bg-black bg-opacity-75 flex justify-center items-center rounded-l-xl">
                        <span>
                            <img src="../img/logo_footer.png" class="w-64 h-auto" alt="">
                        </span>
                    </div>
                </div>
                <!-- Login form container -->
                <div class="w-1/2 p-6 font-poppins">
                    <h1 class="py-5 font-bold text-2xl text-center">Sign In</h1>
                    <form action="../../conf/login.php" method="post" class="space-y-6">
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" name="email" id="email" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                        </div>
                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                            <input type="password" name="password" id="password" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                            <input class="w-3 h-3" type="checkbox" id="togglePasswords" onclick="togglePasswordVisibility()"> Show Passwords
                        </div>
                        <div>
                            <button type="submit" name="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Sign In
                            </button>
                        </div>

                        <!-- error message -->
                        <?php
                        if (isset($_SESSION['error'])) {
                            $error_msg = $_SESSION['error'];
                            echo '<p class="text-center" style="color: red;">' . $error_msg . '</p>';
                            unset($_SESSION['error']);
                        }
                        ?>
                        <p class="text-center">
                            Doesn't Have an Account? <a href="signup.php" class="text-indigo-600 hover:text-indigo-900">Sign Up</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="../js/main.js"></script>
<?php
include '../inc/alert.php';
?>
</body>
</html>