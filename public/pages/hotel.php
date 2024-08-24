<?php
include '../inc/inc_header.php';
include '../../conf/home.php';
?>
<!-- hero -->
<section class="container-fluid relative">
    <div class="hero h-96">
        <img src="../img/hero.jpg" alt="" class="img-fluid w-full h-full object-cover">
        <!-- Dark overlay panel -->
        <div class="absolute top-0 left-0 w-full h-full bg-black opacity-75"></div>
        <div class="absolute top-0 left-0 w-full h-full flex flex-col items-center justify-center font-poppins text-white">
            <h1 class="text-5xl font-bold mb-4">WELCOME TRAVELLERS</h1>
            <p>Let's discover the world and find yourself on a journey without limits, we will always be there for you.</p>
        </div>
    </div>
</section>
<!-- end hero -->
<section class="container-fluid">
    <div class="body bg-white">
        <div class="hotel max-w-4xl mx-auto">
            <h1 class="text-3xl font-poppins font-bold pt-20">Hotels</h1>
            <?php
            while ($akomodasi = mysqli_fetch_assoc($select_akomodasi)) {
                ?>
                    <a href="detail_hotel.php?id=<?php echo $akomodasi['id_partner'];?>">
                        <div class="mx-auto">
                            <div class="card-hotels flex shadow-lg my-8 rounded-lg border border-gray-200">
                                <!-- Image Container -->
                                <div class="w-1/3">
                                    <?php
                                    if ($akomodasi['gambar'] == null) {
                                    ?>
                                        <img src="../img/hotel-test.jpg" alt="Hotel Image" class="w-full h-full object-cover rounded-l-lg">
                                    <?php
                                    } else {
                                    ?>
                                        <img src="../../asset/hotel/<?php echo $akomodasi['gambar'] ?>" alt="Hotel Image" class="w-full h-full object-cover rounded-l-lg">
                                    <?php
                                    }
                                    ?>
                                </div>
                                <!-- Text Container -->
                                <div class="w-full bg-white p-4 flex flex-col justify-between">
                                    <div>
                                        <h2 class="text-xl font-bold mb-1"><?php echo $akomodasi['nama_akomodasi']; ?></h2>
                                    </div>
                                    <div class="flex justify-end">
                                        <button class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 transition duration-300">See Availability</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
            <?php
                }
            ?>
        </div>
    </div>
</section>
<?php
include '../inc/inc_footer.php';
?>