<?php
    //Memulai session
    session_start();

    //Cek apakah user sudah login atau belum
    if(isset($_SESSION['login']))
    {
        header("Location: index.php");
        exit;
    }

    include "proses-akun.php";
    if(isset($_POST['login']))
    {
        $username = $_POST['login_username'];
        $password = $_POST['login_password'];

        $result = mysqli_query($conn, "SELECT * FROM tbl_akun WHERE username='$username'");

        //Cek username dari database
        if(mysqli_num_rows($result) === 1)
        {
            //Cek kecocokan password
            $row = mysqli_fetch_assoc($result);
            if(password_verify($password, $row["password"]))
            {
                //Set session login menjadi true
                $_SESSION['id_admin'] = $row['id_admin'];
                $_SESSION['login'] = true;

                //Melempar user ke halaman lain
                header("Location: index.php");
                exit;
            }
        }

        $error = true;
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login | Pencatatan Keuangan</title>
        <link href="assets/css/login-register.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-success">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                        <form method="POST">
                                            <div class="form-group">
                                                <label class="small mb-1" for="login_username">Username</label>
                                                <input class="form-control py-4" name="login_username" type="text" placeholder="Masukkan username yang telah terdaftar" required />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="login_password">Password</label>
                                                <input class="form-control py-4" name="login_password" type="password" placeholder="Masukkan password" required/>
                                            </div>
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <button class="btn btn-success btn-block" type="submit" name="login">LOGIN</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small">Belum punya akun? <a href="register.php">Silahkan daftar di sini!</a></div>
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
