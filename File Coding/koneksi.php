<?php
    function koneksi(){
        $host = 'localhost';
        $nama = 'root';
        $pass = '';
        $db = 'db_keuangan';

        $koneksi = mysqli_connect($host, $nama,$pass, $db);
        mysqli_select_db($koneksi,$db);
        return $koneksi;
    }

    $conn = koneksi();
?>