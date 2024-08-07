<?php
include '../inc/booking/inc_header.php';
include '../../conf/booking.php';
error_reporting(0);
?>
<div class="container mx-auto p-4">
    <header class="text-center mb-8">
        <h1 class="text-2xl font-bold">Your Accommodation Booking</h1>
        <p class="text-gray-600">Make sure all the details on this page are correct before proceeding to payment.</p>
    </header>
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="col-span-2 bg-white p-6 rounded-lg shadow-lg">
            <form action="" id="checkinCheckoutForm" method="post" enctype="multipart/form-data">
                <h2 class="text-xl font-semibold mb-4">Contact Details</h2>
                <div class="mb-4">
                    <label for="nama" class="block text-gray-700">Full Name</label>
                    <input type="text" id="name" name="nama" class="w-full mt-2 p-2 border border-gray-300 rounded-lg" placeholder="As in Passport/Official ID Card (without title/special characters)" required>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700">Email</label>
                        <input type="email" id="email" name="email" class="w-full mt-2 p-2 border border-gray-300 rounded-lg" placeholder="Email" required>
                    </div>
                    <div class="mb-4">
                        <label for="phone" class="block text-gray-700">Phone Number</label>
                        <input type="number" id="phone" name="phone" class="w-full mt-2 p-2 border border-gray-300 rounded-lg" placeholder="Phone Number" required>
                    </div>
                </div>
                <div class="border-t-4 border-gray-300 my-4"></div>
                <h1 class="text-2xl font-semibold pt-2">Details Price</h1>
                <div class="pt-4">
                    <p class="text-xl font-semibold text-gray-800 mb-2">Room Price:</p>
                    <div class="flex justify-between items-center py-2 border-b-2 border-gray-300">
                        <p class="text-lg font-medium text-gray-700">1x <?php echo htmlspecialchars($data_room['nama']); ?> / night</p>
                        <p class="text-lg font-semibold text-gray-900">Rp. <?php echo number_format($data_room['harga'], 0, ',', '.'); ?></p>
                    </div>
                    <p class="text-xl font-semibold text-gray-800 mt-4 mb-2">Total Room Price:</p>
                    <div class="flex justify-between items-center py-2 border-b-2 border-gray-300">
                        <p class="text-lg font-medium text-gray-700">1x <?php echo htmlspecialchars($data_room['nama']); ?> (<?php echo $daysDifference ?> Night)</p>
                        <p class="text-lg font-semibold text-gray-900">Rp. <?php echo number_format($totalhargaroom, 0, ',', '.'); ?></p>
                    </div>
                </div>
                <div class="pt-4">
                    <label for="img text-left">Bukti Pembayaran</label>
                    <input type="file" name="gambar" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" required>
                </div>
                <div class="pt-8">
                    <button data-modal-target="popup-modal-book<?php echo $data_room['id_room'] ?>" data-modal-toggle="popup-modal-book<?php echo $data_room['id_room'] ?>" class="bg-blue-600 text-white hover:bg-blue-800 w-full p-2 rounded" type="button">
                        Book Now
                    </button>
                </div>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h2 class="text-xl font-semibold mb-4 text-center"><?php echo $data_partner['nama_akomodasi'] ?></h2>
            <img src="../../asset/room/<?php echo $data_room['gambar'] ?>" alt="Hotel Image" class="w-full rounded-lg mb-4">
            <p class="mt-4">
                <label for="checkin" class="block text-gray-700 text-sm font-bold mb-2"><strong>Check-in:</strong></label>
                <input type="datetime-local" id="checkin" name="checkin" class="border border-gray-300 rounded-lg p-2 mt-1 w-full focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent" value="<?php echo isset($_POST['checkin']) ? ($_POST['checkin']) : ''; ?>">
            </p>
            <p class="mt-4">
                <label for="checkout" class="block text-gray-700 text-sm font-bold mb-2"><strong>Check-out:</strong></label>
                <input type="datetime-local" id="checkout" name="checkout" class="border border-gray-300 rounded-lg p-2 mt-1 w-full focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent" value="<?php echo isset($_POST['checkout']) ? ($_POST['checkout']) : ''; ?>">
            </p>
            <p class="mt-4"><strong>1x <?php echo $data_room['nama']; ?></strong></p>
            <p class="pt-10 text-2xl"><strong>Total Room Price:</strong><br>
                Rp. <?php echo number_format($totalhargaroom, 0, ',', '.'); ?></p>
        </div>
    </div>
</div>
<!-- modal book -->
<div id="popup-modal-book<?php echo $data_room['id_room'] ?>" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow">
            <div class="p-8 md:p-5 text-center">
                <svg class="mx-auto mb-4 text-gray-700 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                <h3 class="pt-2 text-lg font-montserrat text-black">Pastikan Data Anda Sudah Benar!</h3>
            </div>
            <!-- Fixed hidden input field and button types -->
            <div class="py-2 text-center">
                <button name="book" data-modal-hide="popup-modal-book<?php echo $data_room['id_room'] ?>" type="submit" class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                    Book Now
                </button>
                <button data-modal-hide="popup-modal-book<?php echo $data_room['id_room'] ?>" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-700 hover:border-gray-200 hover:bg-gray-200 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">Cancel</button>
            </div>
        </div>
        </form>
    </div>
</div>
</div>
<?php
include '../inc/inc_footer.php';
include '../inc/alert.php';
?>
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        const checkinInput = document.getElementById('checkin');
        const checkoutInput = document.getElementById('checkout');
        const form = document.getElementById('checkinCheckoutForm');

        function checkAndSubmit() {
            if (checkinInput.value && checkoutInput.value) {
                form.submit();
            }
        }

        checkinInput.addEventListener('change', checkAndSubmit);
        checkoutInput.addEventListener('change', checkAndSubmit);
    });
</script>