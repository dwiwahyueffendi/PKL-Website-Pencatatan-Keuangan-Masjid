<?php
    include ('function.php'); 
?>

<!DOCTYPE HTML>
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
    <nav class="navbar navbar-dark fixed-top bg-danger justify-content-center p-0">
      <a class="navbar-brand" href="#">
        <h1><img src="assets/img/logo.png" alt="Logo" style="width:40px;">  Barokah Minimarket</h1>
      </a>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 bg-light sidebar">
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
                    <a class="nav-link btn-outline-dark active" href="<?php echo "filter.php"; ?>">Filter Data</a>
                </li>
            </ul>
          </div>
        </nav>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <h2></h2>
          <div class="table-responsive">
            <div class="search">
                <form action="search.php" method="GET">
                    <label>Cari Data Berdasarkan SKU</label>
                    <input type="text" placeholder="Cari SKU" name="cariSKU" required="required">
                    <button type="submit" value="cariSKU" class="btn btn-danger">Cari Data</button><br>
                </form>
            </div>

            <table class="table table-striped table-sm">
            <thead>
                <tr>
                  <th>SKU</th>
                  <th>NAMA BARANG</th>
                  <th>KATEGORI</th>
                  <th>JUMLAH STOK</th>
                  <th>HARGA SATUAN</th>
                </tr>
            </thead>
            <tbody>

            <?php 
            if(isset($_GET['cariSKU'])){
                $cari = $_GET['cariSKU'];

                $data = mysqli_query(connection(),"SELECT * FROM barang WHERE SKU LIKE '%".$cari."%'");				
            }else{
                $data = mysqli_query(connection(),"SELECT * FROM barang");	
            }
            while($searching = mysqli_fetch_array($data)){
            ?>
            <tr>
                <td><?php echo $searching['SKU'];  ?></td>
                <td><?php echo $searching['namaBarang'];  ?></td>
                <td><?php echo $searching['kategori'];  ?></td>
                <td><?php echo $searching['stok'];  ?></td>
                <td><?php echo $searching['hargaSatuan'];  ?></td>
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