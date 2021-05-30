<?php 
  include ('function.php'); 

  $status = '';
  $result = '';
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      if (isset($_GET['SKU'])) {
          $sku_update = $_GET['SKU'];
          $query = "DELETE FROM barang WHERE SKU = '$sku_update'"; 

          $result = mysqli_query(connection(),$query);

          if ($result) {
            $status = 'ok';
          }
          else{
            $status = 'error';
          }
          header('Location: index.php?status='.$status);
      }  
  }
?>