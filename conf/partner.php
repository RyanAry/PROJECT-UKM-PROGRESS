<?php
include 'db.php';

if (isset($_POST['submit'])) {
    //var
    $akomodasi = $_POST['akomodasi'];
    $nama_akomodasi = $_POST['nama_akomodasi'];
    $email_perusahaan = $_POST['email'];
    $alamat = $_POST['alamat'];
    $provinsi = $_POST['provinsi'];
    $kota = $_POST['kota'];

    //error message
    $error_msg = "Akomodasi Sudah Terdaftar";

    //cek data
    $cek = "SELECT * FROM `pengajuan_partner` WHERE nama_akomodasi = '$nama_akomodasi' OR email_perusahaan = '$email_perusahaan'";
    $cek_data = mysqli_query($db, $cek);

    $cek_partner = "SELECT * FROM `partner` WHERE nama_akomodasi = '$nama_akomodasi' OR email_perusahaan = '$email_perusahaan'";
    $cek_data_partner = mysqli_query($db, $cek_partner);

    //cek data > 0 atau tidak
    if ($cek_data->num_rows > 0 || $cek_data_partner->num_rows > 0) {
        //mengirimkan pesan error
        $_SESSION['error'] = $error_msg;
        header("Location: ../public/pages/partner.php");
    } else {
        //query insert data
        $query = "INSERT INTO `pengajuan_partner`(`akomodasi`, `nama_akomodasi`, `email_perusahaan`, `alamat`, `provinsi`, `kota`) VALUES ('$akomodasi','$nama_akomodasi','$email_perusahaan','$alamat','$provinsi','$kota')";

        //eksekusi query
        $insert = mysqli_query($db, $query);

        if ($insert) {
            $_SESSION['success'] = "Pengajuan Berhasil";
            header("location:../public/pages/partner.php");
        }
    }
}
?>
