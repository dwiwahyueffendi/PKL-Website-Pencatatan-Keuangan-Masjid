<?php
    include ('function.php'); 
?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>Masjid Al Ikhlas</title>
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
                    <a class="nav-link btn-outline-dark active" href="<?php echo "filter.php"; ?>">Filter Data</a>
                </li>
            </ul>
          </div>
        </nav>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <h2></h2>
          <div class="table-responsive">
            <div class="search">
                <form action="filter.php" method="GET">
                <tr>
                    <td>
                        <label>Harga Terendah</label>
                        <input type="text" name="min_harga" placeholder="Min">
                    </td>

                    <td>
                        <label>Harga Tertinggi</label>
                        <input type="text" name="max_harga" placeholder="Max">
                    </td>
                    <td>
                        <button type="submit" name="filter" class="btn btn-danger">Filter</button>
                    </td>
                </tr>
                <br>
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
            if(isset($_GET['filter'])){
                $min = $_GET['min_harga'];
                $max = $_GET['max_harga'];
                $query = "SELECT * FROM barang WHERE hargaSatuan BETWEEN $min AND $max ORDER BY hargaSatuan ASC";
                $filter = mysqli_query(connection(), $query);			
            }else{
                $filter = mysqli_query(connection(),"SELECT * FROM barang");	
            }
            while($data = mysqli_fetch_array($filter)){
            ?>
            <tr>
                <td><?php echo $data['SKU'];  ?></td>
                <td><?php echo $data['namaBarang'];  ?></td>
                <td><?php echo $data['kategori'];  ?></td>
                <td><?php echo $data['stok'];  ?></td>
                <td><?php echo $data['hargaSatuan'];  ?></td>
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