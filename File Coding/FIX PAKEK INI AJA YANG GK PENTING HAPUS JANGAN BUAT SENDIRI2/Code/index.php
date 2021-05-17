<?php
  include ('function.php'); 

  //session_start();
  //$mId_admin = $_SESSION['id_admin'];
?>

<!DOCTYPE HTML>
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
    <nav class="navbar navbar-dark fixed-top bg-success justify-content-center p-0">
      <a class="navbar-brand" href="#">
        <h1><img src="assets/img/logoMasjid.png" alt="Logo" style="width:40px;">  Masjid Al Ikhlas</h1>
      </a>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 bg-transparent sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column" style="margin-top:60px;">
                <li class="nav-item">
                    <a class="nav-link btn-outline-success active" href="<?php echo "index.php"; ?>">Lihat Data</a>
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
            if (@$_GET['status']!==NULL) {
              $status = $_GET['status'];
              if ($status=='ok') {
                echo '<br><br><div class="alert alert-success" role="alert">Data Keuangan berhasil di-update</div>';
              }
              elseif($status=='error'){
                echo '<br><br><div class="alert alert-danger" role="alert">Data Keuangan gagal di-update</div>';
              }
            }
           ?>

          <h2></h2>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>TANGGAL</th>
                  <th>ORGANISASI</th>
                  <th>TIPE PENCATATAN</th>
                  <th>KETERANGAN</th>
                  <th>NOMINAL</th>
                  <th>GAMBAR</th>
                  <th>OPSI</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  $query = "SELECT * FROM keuangan";
                  $result = mysqli_query(connection(),$query);
                 ?>

                 <?php while($data = mysqli_fetch_array($result)): ?>
                  <tr>                    
                    <td><?php echo $data['tanggal'];  ?></td>
                    <td><?php echo $data['tipe_organisasi'];  ?></td>
                    <td><?php echo $data['tipe_pencatatan'];  ?></td>
                    <td><?php echo $data['keterangan'];  ?></td>
                    <td><?php echo $data['nominal'];  ?></td>
                    <td>
                      <a href="<?php echo "berkas.php?id_keuangan=".$data['id_keuangan']; ?>" class="btn navbar-dark btn-outline-dark btn-sm"> Berkas</a>
                      <?php // echo $data['berkas_image'];  ?>
                    </td>
                    <td>
                      <a href="<?php echo "update.php?id_keuangan=".$data['id_keuangan']; ?>" class="btn navbar-dark btn-outline-dark btn-sm"> Update</a>
                      <a href="<?php echo "delete.php?id_keuangan=".$data['id_keuangan']; ?>" class="btn navbar-dark btn-outline-dark btn-sm"> Delete</a>
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