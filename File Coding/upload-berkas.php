<!DOCTYPE html>
<html>
<head>
    <title>Upload File</title> 
</head>

<body>
    <?php 
    /*
        tipe_organisasi varchar,
        tipe_pencatatan varchar,
        tanggal_bulan_tahun date,
        keterangan varchar,
        nominal int,
        berkas_image varchar.
    */ 
    ?>
    <form action="proses-upload.php" method="post" enctype="multipart/form-data">
        Tipe Organisasi :
        <input type="text" name="tipe_organisasi" required>
        <br>

        Tipe Pencatatan : 
        <input type="text" name="tipe_pencatatan" required>
        <br>

        Tanggal : 
        <input type="date" name="tanggal_bulan_tahun" required>
        <br>

        Keterangan :
        <input type="text" name="keterangan" required>
        <br>

        Nominal :
        <input type="number" name="nominal" required>
        <br>

        Pilih file: <input type="file" name="berkas" />
        <br>
        <input type="submit" name="upload" value="Tambah" />
    </form> 

    <button onclick="window.print()">Print disini</button>
</body> 
</html>