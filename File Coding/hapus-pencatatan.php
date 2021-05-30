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
  
  $id_admin = $_SESSION['id_admin']; 

  $status = '';
  $result = '';
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      if (isset($_GET['id_keuangan'])) 
      {
        $id_keuangan = $_GET['id_keuangan'];
        //--Menghapus gambar berkas
        $query = "SELECT * FROM tbl_keuangan WHERE id_keuangan = '$id_keuangan'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);

        $berkas = $row['berkas'];
        // echo $berkas;
        if(unlink("berkas/".$berkas))
        {
          //Jika gambar berkas berhasil dihapus akan dilanjutkan dengan penghapusan data dari database
          $query = "DELETE FROM tbl_keuangan WHERE id_keuangan = '$id_keuangan'"; 
          $result = mysqli_query($conn,$query);

          if ($result) {
            $status = 'terhapus';
          }
          else{
            $status = 'error';
          }
        }
        else
        {
          //Jika gambar berkas gagal dihapus
          $status = 'error';
        }
        header('Location: index.php?status='.$status);
      }  
  }
?>