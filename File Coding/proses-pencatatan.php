<?php
    include "koneksi.php";
    //Memulai session
    session_start();

    //Cek apakah user sudah login atau belum
    if(!isset($_SESSION['login']))
    {
        header("Location: login.php");
        exit;
    }
    
    $id_admin = $_SESSION['id_admin'];

    //-- Fungsi ketika tombol tambah pencatatan ditekan
    if(isset($_POST['tambah_pencatatan']))
    {
        //-- Debug file berkas yang diupload
        // echo "<pre>";
        // print_r($_FILES);
        // echo "</pre>";

        //-- Ambil data input form 
        $id_admin = $_SESSION['id_admin'];
        $tp_organisasi = $_POST['tipe_organisasi'];
        $tp_pencatatan = $_POST['tipe_pencatatan'];
        $date = $_POST['tanggal'];
        $ket = $_POST['keterangan'];
        $nominal = $_POST['nominal'];

        //-- Ambil data file berkas
        $namaFile = $_FILES['berkas_image']['name'];
        $ekstensiFile = $_FILES['berkas_image']['type'];
        $namaSementara = $_FILES['berkas_image']['tmp_name'];

        //-- Tentukan lokasi file akan dipindahkan
        $dirUpload = "berkas/";

        //-- Cek terlebih dahulu apakah file nama berkas sudah ada di dalam database atau belum
        $query = "SELECT * FROM tbl_keuangan WHERE berkas='$namaFile'";
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result) == 1)
        {
            $data = mysqli_fetch_assoc($result);
            if($data['berkas'] == $namaFile)
            {
                //Cek ekstensi berkas
                if($ekstensiFile == "image/png")
                {
                    $ekstensiFile = ".png";
                }
                else if($ekstensiFile == "image/jpeg")
                {
                    $ekstensiFile = ".jpeg";
                }
                else if($ekstensiFile == "image/jpg")
                {
                    $ekstensiFile = ".jpg";
                }

                //Ubah namaFile menjadi unik gabungan dari tanggal, dan waktu(dalam detik) sejak 1 january 1970 
                $namaFile = date("Y-m-d")."_".time().$ekstensiFile;
            }
            else
            {
                //namaFile tetap
                $namaFile = $namaFile;
            }
        }
        //-- Pindahkan file
        $terupload = move_uploaded_file($namaSementara, $dirUpload.$namaFile);

        //-- Memasukkan dan mengeksekusi query
        $query = "INSERT INTO tbl_keuangan (id_admin, tipe_organisasi, tipe_pencatatan, tanggal, keterangan, nominal, berkas) VALUES('$id_admin','$tp_organisasi', '$tp_pencatatan', '$date', '$ket', '$nominal', '$namaFile')";
        if(mysqli_query($conn, $query))
        {
            $status = 'ok';
            header('Location: tambah-pencatatan.php?status='.$status);
        }
        else
        {
            $status = 'error';
            header('Location: tambah-pencatatan.php?status='.$status);
        }

        //-- Untuk debug error proses tambah pencatatan    
        // if(mysqli_query($conn,$query))
        // {
        //     echo "sql berhasil";
        // }
        // else
        // {
        //     echo "sql gagal".mysqli_error($conn);
        // }
        // if ($terupload) {
        //     echo "Upload berhasil!<br/>";
        //     echo "Link: <a href='".$dirUpload.$namaFile."'>".$namaFile."</a>";
        // } else {
        //     echo "Upload Gagal!";
        // }
    }

    //-- Fungsi ketika tombol ubah pencatatan ditekan
    if(isset($_POST['ubah_pencatatan']))
    {
        //-- Ambil data input form
        $id_keuangan = $_GET['id_keuangan'];
        $tipe_organisasi = $_POST['tipe_organisasi'];
        $tipe_pencatatan = $_POST['tipe_pencatatan'];
        $tanggal = $_POST['tanggal'];
        $keterangan = $_POST['keterangan'];
        $nominal = $_POST['nominal'];

        //-- Memasukkan dan mengeksekusi query
        $query = "UPDATE tbl_keuangan SET tipe_organisasi='$tipe_organisasi', tipe_pencatatan='$tipe_pencatatan', tanggal='$tanggal', keterangan='$keterangan', nominal='$nominal' WHERE id_keuangan='$id_keuangan';";
        if(mysqli_query($conn,$query))
        {
            $status = 'ok';
            header('Location: index.php?status='.$status);
        }
        else
        {
            echo mysqli_error($conn);
            $status = 'error';
            header('Location: index.php?status='.$status);
        }
    }
    
?>