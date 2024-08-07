<?php
    include '../../../conf/db.php';
    
    // approve partner
    if(isset($_POST['approve'])){
        // data partner yang diapprove akan masuk ke tabel partner dan dihapus dari tabel pengajuan_partner
            $id = $_POST['id'];

            // get data partner
            $query_select_partner = "SELECT * FROM `pengajuan_partner` WHERE `id_pengajuan` = '$id'";
            $select_partner = mysqli_query($db, $query_select_partner);
            $data_partner = mysqli_fetch_array($select_partner);

            // data partner
            $akomodasi = $data_partner['akomodasi'];
            $nama_akomodasi = $data_partner['nama_akomodasi'];
            $email_perusahaan = $data_partner['email_perusahaan'];
            $alamat = $data_partner['alamat'];
            $provinsi = $data_partner['provinsi'];
            $kota = $data_partner['kota'];

            // cek data partner
            $query_cek_partner = "SELECT * FROM `partner` WHERE '$nama_akomodasi' OR `email_perusahaan` = '$email_perusahaan'";
            $cek_partner = mysqli_query($db, $query_cek_partner);

            //cek duplikat data partner
            if($cek_partner->num_rows > 0){
                $_SESSION['status'] = "Error";
                $_SESSION['error_msg'] = "Data sudah ada";
                header("Location: approve_partner.php");
            } else {
                // insert data partner
                $query_insert_partner = "INSERT INTO `partner` (`akomodasi`, `nama_akomodasi`, `email_perusahaan`, `alamat`, `provinsi`, `kota`) VALUES ('$akomodasi', '$nama_akomodasi', '$email_perusahaan', '$alamat', '$provinsi', '$kota')";
                $insert_partner = mysqli_query($db, $query_insert_partner);

                // delete data pengajuan partner
                $query_delete = "DELETE FROM `pengajuan_partner` WHERE `id_pengajuan` = '$id'";
                $delete = mysqli_query($db, $query_delete);

                //alert message
                $success_msg = "Data berhasil diapprove";
                $error_msg = "Data gagal diapprove";

                if($insert_partner && $delete){
                    $_SESSION['status'] = "Success";
                    $_SESSION['succes_msg'] = $success_msg;
                    header("location: approve_partner.php");
                    exit(0);
                } else {
                    $_SESSION['status'] = "Error";
                    $_SESSION['error_msg'] = $error_msg;
                    header("Location: approve_partner.php");
                    exit(0);
                }
            }
    } else {
        // delete partner
        if(isset($_POST['delete'])){
            $id = $_POST['id'];

            // delete data partner
            $query_delete = "DELETE FROM `pengajuan_partner` WHERE `id_pengajuan` = '$id'";
            $delete = mysqli_query($db, $query_delete);

            // alert message
            $delete_success_msg = "Data berhasil dihapus";
            $delete_error_msg = "Data gagal dihapus";

            if ($delete) {
                $_SESSION['status'] = "Success";
                $_SESSION['succes_msg'] = $delete_success_msg;
                header("location: approve_partner.php");
                exit(0);
            } else {
                $_SESSION['status'] = "Error";
                $_SESSION['error_msg'] = $delete_error_msg;
                header("Location: approve_partner.php");
                exit(0);
            }
        }
    }
    
    $query_select = "SELECT * FROM `pengajuan_partner`";
    $select = mysqli_query($db, $query_select);

?>