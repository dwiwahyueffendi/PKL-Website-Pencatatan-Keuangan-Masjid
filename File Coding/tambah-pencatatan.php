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
<!DOCTYPE html>
<html>
  <head>
    <title>Tambah Pencatatan - Masjid Al Ikhlas</title>
      <meta charset="UTF-8">
      <meta name="author" content="Dwi Wahyu Effendi">
      <link rel="shortcut icon" href="assets/img/logoMasjid.png">
      <link href="assets/css/style.css" rel="stylesheet">
      <link href="assets/css/bootstrap.min.css" rel="stylesheet">
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  </head>

  <body>
    <nav class="navbar fixed-top navbar-dark bg-success justify-content-center p-0">
      <a class="navbar-brand" href="#">
        <h1><img src="assets/img/logoMasjid.png" alt="Logo" style="width:40px;">  Masjid Al Ikhlas</h1>
      </a>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column" style="margin-top:60px;">
              <li class="nav-item">
                    <a class="nav-link btn-outline-dark active" href="<?php echo "index.php"; ?>">Daftar Pencatatan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn-outline-success active" href="<?php echo "tambah-pencatatan.php"; ?>">Tambah Pencatatan</a>
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
              if (@$_GET['status']!==NULL) 
              {
                $status = $_GET['status']; 
                if ($status=='ok') {
                  echo '<br><br><div class="alert alert-success" role="alert">Pencatatan berhasil disimpan</div>';
                }
                elseif($status=='error'){
                  echo '<br><br><div class="alert alert-danger" role="alert">Pencatatan gagal disimpan</div>';
                }
              }
           ?>

          <h2></h2>
          <form action="proses-pencatatan.php" method="POST" enctype="multipart/form-data"> 
          <!-- id admin dummy hapus engkok -->
            <div class="form-group">
              <label>Tipe Organisasi</label>
              <select class="custom-select" name="tipe_organisasi" required="required">
                <option value="">Pilih Salah Satu</option>
                <option value="TA`AMIR">Ta`amir</option>
                <option value="TPQ">TPQ</option>
              </select>
            </div>
            <div class="form-group">
              <label>Tipe Pencatatan</label>
              <select class="custom-select" name="tipe_pencatatan" required="required">
                <option value="">Pilih Salah Satu</option>
                <option value="PENGELUARAN">Pengeluaran</option>
                <option value="PEMASUKAN">Pemasukan</option>
              </select>
            </div>
            <div class="form-group">
              <label>Tanggal Pencatatan</label>
              <input type="date" class="form-control" name="tanggal" required="required">
            </div>
            <div class="form-group">
              <label>Keterangan</label>
              <input type="text" class="form-control" placeholder="Masukkan Keterangan" name="keterangan" required="required" maxlength="255">
            </div>
            <div class="form-group">
              <label>Nominal</label>
              <input type="text" class="form-control" placeholder="Masukkan Nominal" name="nominal" required="required">
            </div>
            <div class="form-group">
              <label>Upload Gambar Berkas</label>
              <input type="file" class="form-control" placeholder="Masukkan Berkas Image" name="berkas_image" accept="image/png, image/jpeg, image/jpg" required="required">
            </div>
            
            <button type="submit" name="tambah_pencatatan" class="btn btn-success">+Tambah Pencatatan</button>
          </form>
        </main>
      </div>
    </div>
  </body>
</html>