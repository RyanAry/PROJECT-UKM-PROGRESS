<?php
include '../inc/inc_header.php';
include '../../conf/detail_hotel.php';
$data = mysqli_fetch_assoc($select);
?>
<div class="flex justify-center">
    <div class="w-1/2 bg-white p-6 rounded-lg shadow-lg mt-10">
        <!-- Image Gallery -->
        <?php
        if ($data['gambar'] == null) {
            # code...
        ?>
            <img src="../img/hotel-test.jpg" alt="Main Image" class="rounded-lg w-full">
        <?php
        } else {
            ?>
            <img src="../../asset/hotel/<?php echo $data['gambar'] ?>" alt="Main Image" class="rounded-lg w-full">
        <?php
        }
        ?>

        <!-- Hotel Information -->
        <div class="mt-4">
            <div class="flex justify-between items-center">
                <div>
                    <h1 class="text-2xl font-bold"><?php echo $data['nama_akomodasi'] ?></h1>
                </div>
                <div>
                    <a href="#room">
                        <button class="bg-orange-500 text-white px-4 py-2 rounded-lg">Select Room</button>
                    </a>
                </div>
            </div>

            <div class="mt-4">
                <div class="flex items-center">
                    <p><?php echo $data['deskripsi'] ?></p>
                </div>
                <h1 class="font-bold text-xl pt-4">Lokasi</h1>
                <p><?php echo $data['alamat'] . ', ' . $data['kota'] . ', ' . $data['provinsi']; ?></p>
            </div>
        </div>
    </div>
</div>
<div id="room" class="flex justify-center mb-10">
    <div class="w-1/2 bg-white p-6 rounded-lg shadow-lg mt-10">
        <h1 class="text-2xl font-bold text-center">Room Information</h1>
        <?php
        while ($data_room = mysqli_fetch_assoc($select_room)) {
        ?>
            <div class="mx-auto">
                <div class="card-hotels flex shadow-lg my-8 rounded-lg border border-gray-200">
                    <!-- Image Container -->
                    <div class="w-1/3">
                        <img src="../../asset/room/<?php echo $data_room['gambar'] ?>" alt="Hotel Image" class="w-full h-full object-cover rounded-l-lg">
                    </div>
                    <!-- Text Container -->
                    <div class="w-full bg-white p-4 flex flex-col justify-between">
                        <div>
                            <h2 class="text-xl font-bold mb-1"><?php echo $data_room['nama']; ?></h2>
                            <p><?php echo $data_room['deskripsi']; ?></p>
                        </div>
                        <div class="flex justify-between">
                            <p class="pt-2">Rp.<?php echo $data_room['harga']; ?></p>
                            <?php
                            if ($data_room['status'] == 'tersedia') {
                            ?>
                                <a href="booking.php?id=<?php echo $data_room['id_room']; ?>">
                                    <button class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 transition duration-300">Book Now</button>
                                </a>
                            <?php
                            } else {
                            ?>
                                <button class="bg-red-500 text-white py-2 px-4 rounded hover:bg-red-600 transition duration-300">Already Booked</button>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</div>
<?php
include '../inc/inc_footer.php';
?>