<?php
    function koneksi(){
        $host = 'localhost';
        $nama = 'root';
        $pass = '';
        $db = 'db_masjid';

        $koneksi = mysqli_connect($host, $nama,$pass, $db);
        mysqli_select_db($koneksi,$db);
        return $koneksi;
    }

    $conn = koneksi();
?>