<?php
    include "function.php";

    function registrasi($data)
    {
        global $conn;
        $username = strtolower($data['daftar_username']);
        $password = mysqli_real_escape_string($conn, $data['daftar_password']);
        $cpassword = mysqli_real_escape_string($conn, $data['daftar_konfirmpassword']);

        //Cek apakah sudah ada username yang sama
        $result = mysqli_query($conn, "SELECT username FROM login WHERE username='$username' ");

        if(mysqli_fetch_assoc($result))
        {
             echo "<script>
                    alert('Username sudah terdaftar!');
                   </script>";
                   
            return false;
        }

        //Cek sesuai atau tidak sesuai antara password dan konfirmasi password
        if( $password !== $cpassword )
        {
            echo "<script>
                    alert('Password dan Konfirmasi Password tidak sesuai!');
                  </script>";
            
            return false;
        }


        //Enkripsi Password
        $password = password_hash($password, PASSWORD_DEFAULT);
        // var_dump($password); die;


        //Query insert akun baru ke database
        mysqli_query($conn, "INSERT INTO login (username, password) VALUES('$username', '$password')");
        return mysqli_affected_rows($conn); //Mengembalikan sebuah value 1 jika berhasil dan -1 jika tidak berhasil
    }
?>