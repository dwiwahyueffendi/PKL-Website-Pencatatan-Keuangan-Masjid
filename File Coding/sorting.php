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
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column" style="margin-top:60px;">
                <li class="nav-item">
                    <a class="nav-link btn-outline-dark active" href="<?php echo "admin.php"; ?>">Daftar Pencatatan</a>
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
                    <a class="nav-link btn-outline-dark active" href="<?php echo "register.php"; ?>">Daftar Admin Baru</a>
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
                <form class="form-inline" method="GET">
                    <div class="form-group col-md-12">
                        <label style="margin-right: 5px;">Berdasarkan</label>
                        <select class="form-control" name="pilihan_sort" required>
                            <option value="">Pilih Salah Satu</option>
                            <option value="tanggal">Tanggal</option>
                            <option value="organisasi">Organisasi</option>
                            <option value="nominal">Nominal</option>
                        </select>
                        <label style="margin-right: 5px;"> 	&nbsp; 	&nbsp; Urutan</label>
                        <select class="form-control" name="urutan_sort" required>
                            <option value="">Pilih Salah Satu</option>
                            <option value="terbesar">Terbesar ke Terkecil</option>
                            <option value="terkecil">Terkecil ke Terbesar</option>
                        </select>
                        <button type="submit" name="sorting_pencatatan" class="btn btn-success">Urutkan</button>
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
            if(isset($_GET['sorting_pencatatan'])){
                $pilihan = $_GET['pilihan_sort'];
                $urutan = $_GET['urutan_sort'];

                if($pilihan == "tanggal"){
                    if($urutan == "terbesar")
                    {
                        $query = "SELECT * FROM tbl_keuangan ORDER BY tanggal DESC";
                        $sort = mysqli_query($conn, $query); 
                    }
                    else if($urutan == "terkecil")
                    {
                        $query = "SELECT * FROM tbl_keuangan ORDER BY tanggal ASC";
                        $sort = mysqli_query($conn, $query); 
                    }		
                }
                else if($pilihan == "organisasi")
                { 
                    if($urutan == "terbesar")
                    {
                        $query = "SELECT * FROM tbl_keuangan ORDER BY tipe_organisasi DESC";
                        $sort = mysqli_query($conn, $query);
                    }
                    else if($urutan == "terkecil")
                    {
                        $query = "SELECT * FROM tbl_keuangan ORDER BY tipe_organisasi ASC";
                        $sort = mysqli_query($conn, $query);
                    }	
                }
                else if($pilihan == "nominal")
                {
                    if($urutan == "terbesar")
                    {
                        $query = "SELECT * FROM tbl_keuangan ORDER BY nominal DESC";
                        $sort = mysqli_query($conn, $query);
                    }
                    else if($urutan == "terkecil")
                    {
                        $query = "SELECT * FROM tbl_keuangan ORDER BY nominal ASC";
                        $sort = mysqli_query($conn, $query);
                    }		
                }	
            }
            else
            {
                $sort = mysqli_query($conn,"SELECT * FROM tbl_keuangan");	
            }
            while($row = mysqli_fetch_array($sort)){
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