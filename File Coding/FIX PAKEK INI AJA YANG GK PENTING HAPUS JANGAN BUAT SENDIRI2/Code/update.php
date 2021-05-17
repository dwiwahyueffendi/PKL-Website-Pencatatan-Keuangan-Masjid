<?php
  include ('function.php');

  $status = '';
  $result = '';
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      if (isset($_GET['SKU'])) {
          $sku_update = $_GET['SKU'];
          $query = "SELECT * FROM barang WHERE SKU = '$sku_update'";
          $result = mysqli_query(connection(),$query);
      }
  }

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $sku = $_POST['SKU'];
      $namaBarang = $_POST['namaBarang'];
      $kategori = $_POST['kategori'];
      $stok = $_POST['stok'];
      $hargaSatuan = $_POST['hargaSatuan'];
      $sql = "UPDATE barang SET namaBarang='$namaBarang', kategori='$kategori', stok='$stok', hargaSatuan='$hargaSatuan' WHERE SKU='$sku'";

      $result = mysqli_query(connection(),$sql);
      if ($result) {
        $status = 'ok';
      }
      else{
        $status = 'error';
      }
      header('Location: index.php?status='.$status);
  }
?>


<!DOCTYPE html>
<html>
  <head>
    <title>UTS PEMROGRAMAN WEB</title>
    <meta charset="UTF-8">
      <meta name="author" content="Dwi Wahyu Effendi">
      <link rel="shortcut icon" href="assets/img/LOGO.png">
      <link href="assets/css/style.css" rel="stylesheet">
      <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  </head>

  <body>
  <nav class="navbar fixed-top navbar-dark bg-danger justify-content-center flex-md-nowrap p-0 shadow">
      <a class="navbar-brand" href="#">
        <h1><img src="assets/img/logo.png" alt="Logo" style="width:40px;">  Barokah Minimarket</h1>
      </a>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column" style="margin-top:20px;">
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
                    <a class="nav-link btn-outline-dark active" href="<?php echo "filter.php"; ?>">Filter Data</a>
                </li>
            </ul>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <h2></h2>
          <form action="update.php" method="POST">
          <?php while($data = mysqli_fetch_array($result)): ?>            
            <div class="form-group">
              <label>SKU</label>
              <input type="text" class="form-control" placeholder="Masukkan SKU Data Inventaris" name="SKU" required="required">
            </div>
            <div class="form-group">
              <label>Nama Barang</label>
              <input type="text" class="form-control" placeholder="Masukkan Nama Barang" name="namaBarang" required="required">
            </div>
            <div class="form-group">
              <label>Kategori</label>
              <select class="custom-select" name="kategori" required="required">
                <option value="">Pilih Salah Satu</option>
                <option value="ATK">ATK</option>
                <option value="MAKANAN">Makanan</option>
                <option value="MINUMAN">Minuman</option>
              </select>
            </div>
            <div class="form-group">
              <label>Jumlah Stok</label>
              <input type="text" class="form-control" placeholder="Masukkan Jumlah Stok" name="stok" required="required">
            </div>
            <div class="form-group">
              <label>Harga Satuan</label>
              <input type="text" class="form-control" placeholder="Masukkan Harga Satuan" name="hargaSatuan" required="required">
            </div>            
            <?php endwhile; ?>
            <button type="submit" class="btn btn-danger">Simpan Data</button>
          </form>
        </main>
      </div>
    </div>
  </body>
</html>
