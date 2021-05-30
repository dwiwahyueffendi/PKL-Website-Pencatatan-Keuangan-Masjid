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
        <title>Sorting Pencatatan - Masjid Al Ikhlas</title>
        <meta charset="UTF-8">
        <meta name="author" content="Dwi Wahyu Effendi">
        <link rel="shortcut icon" href="assets/img/LOGO.png">
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
                    <a class="nav-link btn-outline-dark active" href="<?php echo "pencarian-pencatatan.php"; ?>">Pencarian Pencatatan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn-outline-success active" href="<?php echo "sorting.php"; ?>">Sorting Pencatatan</a>
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
    <h2></h2>
          <div class="table-responsive">
            <div>
                <form class="form-inline" action="filter.php" method="GET">
                    <div class="form-group col-md-4">
                        <label style="margin-right: 5px;">Berdasarkan</label>
                        <select class="form-control">
                            <option value="tanggal">Pilih Salah Satu</option>
                            <option value="TA`AMIR">Ta`amir</option>
                            <option value="TPQ">TPQ</option>
                        </select>
                    </div>
                </form>
            </div>

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
            if(isset($_GET['filter_pencatatan'])){
                $min = $_GET['min_harga'];
                $max = $_GET['max_harga'];
                $query = "SELECT * FROM tbl_keuangan WHERE nominal BETWEEN $min AND $max ORDER BY nominal ASC";
                $filter = mysqli_query($conn, $query);			
            }else{
                $filter = mysqli_query($conn,"SELECT * FROM tbl_keuangan");	
            }
            while($row = mysqli_fetch_array($filter)){
            ?>
            <tr>
                <td><?php echo $row['tanggal'];  ?></td>
                <td><?php echo $row['tipe_organisasi'];  ?></td>
                <td><?php echo $row['tipe_pencatatan'];  ?></td>
                <td><?php echo $row['keterangan'];  ?></td>
                <td><?php echo $row['nominal'];  ?></td>
                <td class="hide-print">
                    <a href="berkas/<?php echo $row['berkas']; ?>" class="btn navbar-dark btn-primary btn-sm"> Tampilkan Berkas</a>
                </td>
                <td class="hide-print">
                    <a href="<?php echo "ubah-pencatatan.php?id_keuangan=".$row['id_keuangan']; ?>" class="btn navbar-dark btn-warning btn-sm"> Ubah</a>
                    <a href="<?php echo "hapus-pencatatan.php?id_keuangan=".$row['id_keuangan']; ?>" class="btn navbar-dark btn-danger btn-sm"> Hapus</a>
                </td>
            </tr>
            <?php } ?>
            <br>
            </tbody>
            </table>
          </div>
        </main>
      </div>
    </div>
    </body>
</html>