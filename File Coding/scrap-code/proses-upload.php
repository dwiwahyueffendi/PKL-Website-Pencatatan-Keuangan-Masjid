<?php
include "koneksi.php";
//-- Debug file berkas yang diupload
// echo "<pre>";
// print_r($_FILES);
// echo "</pre>";

    /*
        tipe_organisasi varchar,
        tipe_pencatatan varchar,
        tanggal_bulan_tahun date,
        keterangan varchar,
        nominal int,
        berkas_image varchar.
    */

if(isset($_POST['upload']))
{
    // Ambil data input form 
    $tp_organisasi = $_POST['tipe_organisasi'];
    $tp_pencatatan = $_POST['tipe_pencatatan'];
    $date = $_POST['tanggal_bulan_tahun'];
    $ket = $_POST['keterangan'];
    $nominal = $_POST['nominal'];

    // Ambil data file berkas
    $namaFile = $_FILES['berkas']['name'];
    $namaSementara = $_FILES['berkas']['tmp_name'];

    // Tentukan lokasi file akan dipindahkan
    $dirUpload = "terupload/";

    // Pindahkan file
    $terupload = move_uploaded_file($namaSementara, $dirUpload.$namaFile);

    $query = "INSERT INTO tbl_keuangan (tipe_organisasi, tipe_pencatatan, tanggal_bulan_tahun, keterangan, nominal, berkas_image) VALUES('$tp_organisasi', '$tp_pencatatan', '$date', '$ket', '$nominal', '$namaFile')";

    if(mysqli_query($conn,$query))
    {
        echo "sql berhasil";
    }
    else
    {
        echo "sql gagal".mysqli_error($conn);
    }

    if ($terupload) {
        echo "Upload berhasil!<br/>";
        echo "Link: <a href='".$dirUpload.$namaFile."'>".$namaFile."</a>";
    } else {
        echo "Upload Gagal!";
    }
}
?>