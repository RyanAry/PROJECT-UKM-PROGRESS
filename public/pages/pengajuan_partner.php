<?php
include '../inc/inc_header.php';
?>
<!-- hero -->
<section class="container-fluid relative">
    <div class="hero h-96">
        <img src="../img/hero.jpg" alt="" class="img-fluid w-full h-full object-cover">
        <!-- Dark overlay panel -->
        <div class="absolute top-0 left-0 w-full h-full bg-black opacity-75"></div>
        <div class="absolute top-0 left-0 w-full h-full flex flex-col items-center justify-center font-poppins text-white">
            <h1 class="text-4xl font-bold mb-4 uppercase">Bergabunglah Dengan Program Partnership Kami</h1>
            <p class="text-center">Perluas pasar Anda dengan berpartisipasi program partnership kami. <br> Kami menyediakan berbagai macam program partnership yang bisa Anda pilih sesuai dengan kebutuhan Anda.</p>
        </div>
    </div>
</section>

<!-- body -->
<section>
    <div class="body container-fluid mx-auto">
        <div class="progress-timeline py-10">
            <h1 class="text-center font-poppins font-bold text-3xl pt-11 pb-3 uppercase">Mulai Bermitra dengan 4 Langkah Mudah</h1>
            <hr class="w-1/2 mx-auto mb-4 border-t-4">
            <div class="progress-timeline grid grid-cols-1 md:grid-cols-4 gap-8 text-center p-8">
                <div class="relative shadow-lg p-8">
                    <div class="mb-4">
                        <div class="flex items-center justify-center w-12 h-12 mx-auto bg-primary rounded-full text-white">
                            <h1 class="font-bold font-poppins">1</h1>
                        </div>
                    </div>
                    <div class="text-konten">
                        <h1 class="pt-4 font-bold font-poppins">
                            Ungkapkan ketertarikan Anda
                        </h1>
                        <p class="font-montserrat">Isi formulir pendaftaran kemitraan kami dan kami akan segera menghubungi Anda.</p>
                    </div>
                </div>
                <div class="relative shadow-lg p-8">
                    <div class="mb-4">
                        <div class="flex items-center justify-center w-12 h-12 mx-auto bg-primary rounded-full text-white">
                            <h1 class="font-bold font-poppins">2</h1>
                        </div>
                    </div>
                    <div class="text-konten">
                        <h1 class="pt-4 font-bold font-poppins">
                            Menerima Email Untuk Diskusi
                        </h1>
                        <p class="font-montserrat">Eksplorasi segala kemungkinan dan tentukan bentuk kemitraan yang paling sesuai dengan kebutuhan Anda.</p>
                    </div>
                </div>
                <div class="relative shadow-lg p-8">
                    <div class="mb-4">
                        <div class="flex items-center justify-center w-12 h-12 mx-auto bg-primary rounded-full text-white">
                            <h1 class="font-bold font-poppins">3</h1>
                        </div>
                    </div>
                    <div class="text-konten">
                        <h1 class="pt-4 font-bold font-poppins">
                            Buat Program Kemitraan
                        </h1>
                        <p class="font-montserrat">Finalisasi & tandatangani kesepakatan kemitraan, sehingga kami bisa mulai membuat programnya.</p>
                    </div>
                </div>
                <div class="relative shadow-lg p-8">
                    <div class="mb-4">
                        <div class="flex items-center justify-center w-12 h-12 mx-auto bg-primary rounded-full text-white">
                            <h1 class="font-bold font-poppins">4</h1>
                        </div>
                    </div>
                    <div class="text-konten">
                        <h1 class="pt-4 font-bold font-poppins">
                            Program Kemitraan Sudah Tayang!
                        </h1>
                        <p class="font-montserrat">Saatnya menyaksikan keajaiban kemitraan kita berjalan.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="form font-poppins">
            <h1 class="text-center font-poppins font-bold text-3xl pt-11 pb-3 uppercase">Formulir Pendaftaran Mitra</h1>
            <hr class="w-1/2 mx-auto mb-4 border-t-4">
            <div class="flex items-center justify-center pb-8">
                <form action="../../conf/pengajuan_partner.php" method="post">
                    <div class="bg-white rounded-lg p-8 w-full max-w-4xl">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                            <div>
                                <label for="akomodasi" class="block text-sm font-medium text-gray-700">Tipe Akomodasi</label>
                                <select name="akomodasi" id="akomodasi" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                                    <option value="hotel">Hotel</option>
                                    <option value="villa">Villa</option>
                                </select>
                            </div>
                            <div>
                                <label for="nama_akomodasi" class="block text-sm font-medium text-gray-700">Nama Akomodasi</label>
                                <input type="text" name="nama_akomodasi" id="nama_akomodasi" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700">Email Perusahaan</label>
                                <input type="email" name="email" id="email" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                            </div>
                            <div>
                                <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat Jalan</label>
                                <input type="text" name="alamat" id="alamat" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                            </div>
                            <div>
                                <label for="provinsi" class="block text-sm font-medium text-gray-700">Provinsi</label>
                                <input type="text" name="provinsi" id="provinsi" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                            </div>
                            <div>
                                <label for="kota" class="block text-sm font-medium text-gray-700">Kota</label>
                                <input type="text" name="kota" id="kota" class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                            </div>
                        </div>
                        <div>
                            <button type="submit" name="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50">
                                Kirim
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="faq pt-10 font-poppins">
            <h1 class="text-center font-poppins font-bold text-3xl pb-3 uppercase">FAQ</h1>
            <hr class="w-1/2 mx-auto mb-4 border-t-4">
            <div class="faq grid grid-cols-1 md:grid-cols-2 gap-4 p-8">
                <div class="faq-item bg-white rounded-lg p-8">
                    <h1 class="font-bold font-poppins">Apa itu program partnership?</h1>
                    <p class="font-montserrat">Program partnership adalah program kerjasama antara kami dengan pihak ketiga yang ingin memasarkan produk atau jasa mereka melalui platform kami.</p>
                </div>
                <div class="faq-item bg-white rounded-lg p-8">
                    <h1 class="font-bold font-poppins">Apa saja keuntungan dari program partnership?</h1>
                    <p class="font-montserrat">Keuntungan dari program partnership adalah Anda bisa memperluas pasar Anda dengan memasarkan produk atau jasa Anda melalui platform kami.</p>
                </div>
                <div class="faq-item bg-white rounded-lg p-8">
                    <h1 class="font-bold font-poppins">Bagaimana cara mendaftar program partnership?</h1>
                    <p class="font-montserrat">Anda bisa mendaftar program partnership dengan mengisi formulir pendaftaran yang telah kami sediakan diatas.</p>
                </div>
                <div class="faq-item bg-white rounded-lg p-8">
                    <h1 class="font-bold font-poppins">Berapa lama proses pendaftaran program partnership?</h1>
                    <p class="font-montserrat">Proses pendaftaran program partnership akan segera kami proses setelah Anda mengisi formulir pendaftaran yang telah kami sediakan diatas.</p>
                </div>
            </div>
        </div>
        <div class="text-center py-8">
            <h1 class="font-poppins text-3xl font-bold">Masih Ada Pertanyaan?</h1>
            <hr class="w-1/2 mx-auto mb-4 border-t-4">
            <p class="font-montserrat">Jika Anda memiliki pertanyaan lebih lanjut <br> Anda bisa menghubungi kami melalui email yang telah kami sediakan berikut ini.</p>
            <div class="flex items-center justify-center pt-4">
                <a href="mailto:example@example.com">
                    <div class="flex items-center justify-center bg-primary text-white font-bold py-2 px-4 rounded-full">
                        <i class="fas fa-envelope"></i>
                        <p class="pl-2">infopartner@gmail.com</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- alert message -->
<?php
include '../inc/alert.php';
include '../inc/inc_footer.php';
?>