<?php
  include ('koneksi.php'); 
  //Memulai session
  session_start();
?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>Admin - Masjid Al Ikhlas</title>
        <meta charset="UTF-8">
        <meta name="author" content="Dwi Wahyu Effendi">
        <link rel="shortcut icon" href="assets/img/logoMasjid.png">
        <link href="assets/css/style.css" rel="stylesheet">
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    </head>

    <body style="padding: 0px;">
    <nav class="navbar navbar-dark bg-success justify-content-center p-0">
      <a class="navbar-brand" href="index.php">
        <h1><img src="assets/img/logoMasjid.png" alt="Logo" style="width:40px;">  Masjid Al Ikhlas</h1>
      </a>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <h1 style="margin: auto; margin-top:10px;"><b>Data Keuangan Masjid Al Ikhlas</b></h1>
          <div class="table-responsive">
            <table class="table table-striped table-sm" style="margin-top:20px;">
              <thead>
                <tr>
                  <th>TANGGAL</th>
                  <th>ORGANISASI</th>
                  <th>TIPE PENCATATAN</th>
                  <th>KETERANGAN</th>
                  <th>NOMINAL</th>
                  <th class="hide-print">GAMBAR</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  $query = "SELECT * FROM tbl_keuangan";
                  $result = mysqli_query($conn, $query);
                 ?>

                 <?php while($data = mysqli_fetch_array($result)): ?>
                  <tr>                    
                    <td><?php echo $data['tanggal'];  ?></td>
                    <td><?php echo $data['tipe_organisasi'];  ?></td>
                    <td><?php echo $data['tipe_pencatatan'];  ?></td>
                    <td><?php echo $data['keterangan'];  ?></td>
                    <td><?php echo $data['nominal'];  ?></td>
                    <td class="hide-print">
                      <a href="berkas/<?php echo $data['berkas']; ?>" class="btn navbar-dark btn-primary btn-sm"> Tampilkan Berkas</a>
                    </td>
                  </tr>
                 <?php endwhile ?>
              </tbody>
            </table>
            <button id="tombol-print" class="btn btn-success" onclick="window.print()">Cetak / Simpan Pencatatan Keuangan</button>
          </div>
        </main>
      </div>
    </div>
    </body>
</html>