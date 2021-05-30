<?php 
  include ('function.php'); 

  //session_start();
  //$mId_admin = $_SESSION['id_admin'];

  $status = '';
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      //$mId_admin = $_SESSION['id_admin'];

      $mId_keuangan = $_POST['id_keuangan'];
      $mId_admin = $_POST['id_admin'];    //dummy engkok hapusen
      $mTipe_organisasi = $_POST['tipe_organisasi'];
      $mTipe_pencatatan = $_POST['tipe_pencatatan'];
      $mTanggal = date("Y-m-d");
      $mKeterangan = $_POST['keterangan'];
      $mNominal = $_POST['nominal'];
      $mBerkas = $_POST['berkas_image'];    //dummy engkok hapusen
      //Isien han gawe upload berkas
      
      //Tambahono session id_admin karo berkas nang query
      $query = "INSERT INTO keuangan (id_keuangan, id_admin, tipe_organisasi, tipe_pencatatan, tanggal, keterangan, nominal, berkas_image) VALUES ($mId_keuangan', $mId_admin, '$mTipe_organisasi','$mTipe_pencatatan','$mTanggal', '$mKeterangan', '$mNominal', '$mBerkas')"; 

      $result = mysqli_query(connection(),$query);
      if ($result) {
        $status = 'ok';
      }
      else{
        $status = 'error';
      }
  }

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Masjid Al Ikhlas</title>
      <meta charset="UTF-8">
      <meta name="author" content="Dwi Wahyu Effendi">
      <link rel="shortcut icon" href="assets/img/logoMasjid.png">
      <link href="assets/css/style.css" rel="stylesheet">
      <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  </head>

  <body>
    <nav class="navbar fixed-top navbar-dark bg-danger justify-content-center p-0">
      <a class="navbar-brand" href="#">
        <h1><img src="assets/img/logo.png" alt="Logo" style="width:40px;">  Barokah Minimarket</h1>
      </a>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column" style="margin-top:60px;">
              <li class="nav-item">
                    <a class="nav-link btn-outline-dark active" href="<?php echo "index.php"; ?>">Lihat Data</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn-outline-dark active" href="<?php echo "form.php"; ?>">Tambah Data</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn-outline-dark active" href="<?php echo "search.php"; ?>">Search Data</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn-outline-dark active" href="<?php echo "sorting.php"; ?>">Sorting Data</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn-outline-dark active" href="<?php echo "filter.php"; ?>">Filter Data</a>
                </li>
            </ul>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          
          <?php 
              if ($status=='ok') {
                echo '<br><br><br><div class="alert alert-success" role="alert">Data Inventaris berhasil disimpan</div>';
              }
              elseif($status=='error'){
                echo '<br><br><br><div class="alert alert-danger" role="alert">Data Inventaris gagal disimpan</div>';
              }
           ?>

          <h2></h2>
          <form action="form.php" method="POST">
            
          <!-- id admin dummy hapus engkok -->
            <div class="form-group">
              <label>Id Admin</label>
              <input type="text" class="form-control" placeholder="Masukkan Id Admin" name="id_admin" required="required">
            </div>
            <div class="form-group">
              <label>Id Keuangan</label>
              <input type="text" class="form-control" placeholder="Masukkan Id Keuangan" name="id_keuangan" required="required">
            </div>
            <div class="form-group">
              <label>Organisasi</label>
              <select class="custom-select" name="tipe_organisasi" required="required">
                <option value="">Pilih Salah Satu</option>
                <option value="TA'AMIR">Ta'amir</option>
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
              <label>Keterangan</label>
              <input type="text" class="form-control" placeholder="Masukkan Keterangan" name="keterangan" required="required">
            </div>
            <div class="form-group">
              <label>Nominal</label>
              <input type="text" class="form-control" placeholder="Masukkan Nominal" name="nominal" required="required">
            </div>
            <!-- berkas dummy hapus engkok -->
            <div class="form-group">
              <label>Berkas Image</label>
              <input type="text" class="form-control" placeholder="Masukkan Berkas Image" name="berkas_image" required="required">
            </div>
            
            <button type="submit" class="btn btn-danger">Simpan Data</button>
          </form>
        </main>
      </div>
    </div>
  </body>
</html>