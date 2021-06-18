<?php
    //Memulai session
    session_start();

    //Cek apakah user sudah login atau belum
    // if(isset($_SESSION['login']))
    // {
    //     header("Location: admin.php");
    //     exit;
    // }

    if(!isset($_SESSION['login']))
    {
        header("Location: login.php");
        exit;
    }

    require 'proses-akun.php';
    if( isset($_POST['daftar_akun']) )
    {
        if( registrasi($_POST) > 0 )
        {
            echo "<script>
                    alert('Admin baru berhasil terdaftar!');
                  </script>";
        }
        else
        {
            echo mysqli_error($conn);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Daftar Admin Baru| Pencatatan Keuangan</title>
        <link href="assets/css/login-register.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-success">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Daftar Akun</h3></div>
                                    <div class="card-body">
                                        <form method="POST" action="">
                                            <div class="form-group">
                                                <label class="small mb-1" for="daftar_username">Username</label>
                                                <input class="form-control py-4" name="daftar_username" type="text" placeholder="Masukkan username yang diinginkan..." required/>
                                            </div>
                                            <div action="" class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="daftar_password">Password</label>
                                                        <input class="form-control py-4" name="daftar_password" type="password" placeholder="Masukkan password" required/>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="daftar_konfirmpassword">Konfirmasi Password</label>
                                                        <input class="form-control py-4" name="daftar_konfirmpassword" type="password" placeholder="Masukkan konfirmasi password" required/>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group mt-4 mb-0">
                                                <button class="btn btn-success btn-block" type="submit" name="daftar_akun">DAFTARKAN</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><a href="admin.php">Kembali ke halaman admin</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Website Keuangan Masjid Kelurahan Dukuh Setro 2021</div>
                            <div>

                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
