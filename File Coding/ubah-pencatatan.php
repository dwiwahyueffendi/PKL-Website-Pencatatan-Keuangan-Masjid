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
  
  //-- Mengambil id_keuangan dari method get
  $id_keuangan = $_GET['id_keuangan'];

  //-- Melakukan select data ke dalam database berdasarkan id_keuangan dari method get
  $query = "SELECT * FROM tbl_keuangan WHERE id_keuangan='$id_keuangan'";
  $result = mysqli_query($conn,$query);
  $row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Ubah Pencatatan - Masjid Al Ikhlas</title>
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
                    <a class="nav-link btn-outline-dark active" href="<?php echo "tambah-pencatatan.php"; ?>">Tambah Pencatatan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn-outline-warning active" href="">Ubah Pencatatan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn-outline-dark active" href="<?php echo "pencarian-pencatatan.php"; ?>">Search Data</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn-outline-dark active" href="<?php echo "sorting.php"; ?>">Sorting Data</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn-outline-dark active" href="<?php echo "filter.php"; ?>">Filter Data</a>
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
          <form action="proses-pencatatan.php?id_keuangan=<?php echo $id_keuangan;?>" method="POST" enctype="multipart/form-data"> 
          <!-- id admin dummy hapus engkok -->
            <div class="form-group">
              <label>Tipe Organisasi</label>
              <select class="custom-select" name="tipe_organisasi" required="required">
                <?php 
                  if($row['tipe_organisasi'] == "TA`AMIR")
                  {
                    echo "<option value=''>Pilih Salah Satu</option>";
                    echo "<option value='TA`AMIR' selected>Ta`amir</option>";
                    echo "<option value='TPQ'>TPQ</option>";
                  }
                  else if($row['tipe_organisasi'] == "TPQ")
                  {
                    echo "<option value=''>Pilih Salah Satu</option>";
                    echo "<option value='TA`AMIR'>Ta`amir</option>";
                    echo "<option value='TPQ' selected>TPQ</option>";
                  }
                  else
                  {
                    echo "<option value=''>Pilih Salah Satu</option>";
                    echo "<option value='TA`AMIR'>Ta`amir</option>";
                    echo "<option value='TPQ'>TPQ</option>";
                  }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label>Tipe Pencatatan</label>
              <select class="custom-select" name="tipe_pencatatan" required="required">
              <?php 
                  if($row['tipe_pencatatan'] == "PENGELUARAN")
                  {
                    echo "<option value=''>Pilih Salah Satu</option>";
                    echo "<option value='PENGELUARAN' selected>Pengeluaran</option>";
                    echo "<option value='PEMASUKAN'>Pemasukan</option>";
                  }
                  else if($row['tipe_pencatatan'] == "PEMASUKAN")
                  {
                    echo "<option value=''>Pilih Salah Satu</option>";
                    echo "<option value='PENGELUARAN'>Pengeluaran</option>";
                    echo "<option value='PEMASUKKAN' selected>Pemasukan</option>";
                  }
                  else
                  {
                    echo "<option value=''>Pilih Salah Satu</option>";
                    echo "<option value='PENGELUARAN'>Pengeluaran</option>";
                    echo "<option value='PEMASUKKAN'>Pemasukan</option>";
                  }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label>Tanggal Pencatatan</label>
              <input type="date" class="form-control" name="tanggal" value="<?php echo $row['tanggal'];?>" required="required">
            </div>
            <div class="form-group">
              <label>Keterangan</label>
              <input type="text" class="form-control" placeholder="<?php echo $row['keterangan'];?>" name="keterangan" value="<?php echo $row['keterangan'];?>" required="required" maxlength="255">
            </div>
            <div class="form-group">
              <label>Nominal</label>
              <input type="text" class="form-control" placeholder="<?php echo $row['nominal'];?>" name="nominal" value="<?php echo $row['nominal'];?>" required="required">
            </div>
            <div class="form-group">
              <label>Gambar Berkas :</label>
              <br><img src="berkas/<?php echo $row['berkas']?>" alt="" style="max-width: 720px; max-height:75%;">
            </div>
            <a href="index.php" class="btn btn-primary">Kembali</a>
            <button type="submit" name="ubah_pencatatan" class="btn btn-success">Simpan Perubahan</button>
            <a href="<?php echo "hapus-pencatatan.php?id_keuangan=$id_keuangan" ?>" class="btn btn-danger"> Hapus</a>
          </form>
        </main>
      </div>
    </div>
  </body>
</html>