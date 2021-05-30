<?php
  include ('koneksi.php'); 
  //Memulai session
  session_start();

  //Cek apakah user sudah login atau belum
  if(!isset($_SESSION['login']))
  {
    header("Location: login.php");
    exit;
  }
?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>Indeks - Masjid Al Ikhlas</title>
        <meta charset="UTF-8">
        <meta name="author" content="Dwi Wahyu Effendi">
        <link rel="shortcut icon" href="assets/img/logoMasjid.png">
        <link href="assets/css/style.css" rel="stylesheet">
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    </head>

    <body>
    <nav class="navbar navbar-dark fixed-top bg-success justify-content-center p-0">
      <a class="navbar-brand" href="#">
        <h1><img src="assets/img/logoMasjid.png" alt="Logo" style="width:40px;">  Masjid Al Ikhlas</h1>
      </a>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 bg-transparent sidebar hide-print">
          <div class="sidebar-sticky">
            <ul class="nav flex-column" style="margin-top:60px;">
                <li class="nav-item">
                    <a class="nav-link btn-outline-success active" href="<?php echo "index.php"; ?>">Daftar Pencatatan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn-outline-dark active" href="<?php echo "tambah-pencatatan.php"; ?>">Tambah Pencatatan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn-outline-dark active" href="<?php echo "pencarian-pencatatan.php"; ?>">Pencarian Pencatatan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn-outline-dark active" href="<?php echo "sorting.php"; ?>">Sorting Pencatatan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn-outline-dark active" href="<?php echo "filter.php"; ?>">Filter Pencatatan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn-outline-dark active" href="<?php echo "logout.php"; ?>"><span class="material-icons" style="font-size: 14px;">logout</span> Log Out</a>
                </li>
            </ul>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <?php 
            if (@$_GET['status']!==NULL) {
              $status = $_GET['status'];
              if ($status=='ok') {
                echo '<br><br><div class="alert alert-success" role="alert">Pencatatan berhasil diubah!</div>';
              }
              else if($status=='terhapus')
              {
                echo '<br><br><div class="alert alert-warning" role="alert">Pencatatan berhasil dihapus!</div>';
              }
              else if($status=='error'){
                echo '<br><br><div class="alert alert-danger" role="alert">Pencatatan gagal diubah!</div>';
              }
            }
           ?>

          <h2></h2>
          <button id="tombol-print" class="btn btn-success" onclick="window.print()">Cetak / Simpan Pencatatan Keuangan</button>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>TANGGAL</th>
                  <th>ORGANISASI</th>
                  <th>TIPE PENCATATAN</th>
                  <th>KETERANGAN</th>
                  <th>NOMINAL</th>
                  <th class="hide-print">GAMBAR</th>
                  <th class="hide-print">OPSI</th>
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
                    <td class="hide-print">
                      <a href="<?php echo "ubah-pencatatan.php?id_keuangan=".$data['id_keuangan']; ?>" class="btn navbar-dark btn-warning btn-sm"> Ubah</a>
                      <a href="<?php echo "hapus-pencatatan.php?id_keuangan=".$data['id_keuangan']; ?>" class="btn navbar-dark btn-danger btn-sm"> Hapus</a>
                    </td>
                  </tr>
                 <?php endwhile ?>
              </tbody>
            </table>
          </div>
        </main>
      </div>
    </div>
    </body>
</html>