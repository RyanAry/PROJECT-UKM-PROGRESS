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

    //alert message
    $success_msg = "Akomodasi Berhasil Di Daftarkan";
    $error_msg = "Akomodasi Sudah Terdaftar";

    //cek data double pengajuan partner
    $cek = "SELECT * FROM `pengajuan_partner` WHERE nama_akomodasi = '$nama_akomodasi' OR email_perusahaan = '$email_perusahaan'";
    $cek_data = mysqli_query($db, $cek);

    //cek data double partner
    $cek_partner = "SELECT * FROM `partner` WHERE nama_akomodasi = '$nama_akomodasi' OR email_perusahaan = '$email_perusahaan'";
    $cek_data_partner = mysqli_query($db, $cek_partner);

    // Check data
    if ($cek_data->num_rows > 0 || $cek_data_partner->num_rows > 0) {
        //error message
        $_SESSION['status'] = 'Error';
        $_SESSION['error_msg'] = $error_msg;
        header("Location: ../public/pages/pengajuan_partner.php");
    } else {
        // Insert query
        $query = "INSERT INTO `pengajuan_partner`(`akomodasi`, `nama_akomodasi`, `email_perusahaan`, `alamat`, `provinsi`, `kota`) VALUES ('$akomodasi','$nama_akomodasi','$email_perusahaan','$alamat','$provinsi','$kota')";

        //query
        $insert = mysqli_query($db, $query);

        if ($insert) {
            $_SESSION['status'] = "Success";
            $_SESSION['succes_msg'] = $success_msg;
            header("location:../public/pages/pengajuan_partner.php");
        } else {
            $_SESSION['status'] = "Error";
            $_SESSION['error_msg'] = $error_msg;
            header("Location: ../public/pages/pengajuan_partner.php");
        }
    }
}
?>
