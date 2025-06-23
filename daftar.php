<?php
include 'dbkonek.php';
session_start();

if (isset($_SESSION['nama'])) {
    header('location:landing.php');
    exit;
    # code...
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Daftar</title>
</head>
<body>
    <h1> Syarat Daftar</h1>
    <ul>
        <li>Panjang Password 8 Karakter </li>
        <li> Ada 1 Huruf Besar</li>
        <li> Dan 1 Huruf Kecil</li>
    </ul>

    <form action="" method="POST">
        <input type="text" name="nama" placeholder="Masukkan Nama" required>
        <input type="text" name="email" placeholder="Masukkan Gmail" required>
        <input type="password" name="password" placeholder="Masukkan Password" required>
        <input type="password" name="konfirmasi" placeholder="Konfirmasi Password" required>
        <input type="submit" name="daftar" placeholder="Daftar sekarang!">

        <?php
            if (isset($_POST['daftar'])) {
                $nama = ($_POST['nama']);
                $email = ($_POST['email']);
                $password = ($_POST['password']);
                $konfirmasi = ($_POST['konfirmasi']);

                $error = array();

                if (empty ($nama)||($email)||($password)||($konfirmasi)) {
                    $error[] = "pass kurang dari 8 karakter";
                }

                if (strlen($password) < 8) {
                    $error[] = "pass kurang dari 8 karakter";
                    # code...
                }

                if ($password !== $konfirmasi) {
                    $error[] = "password tidak sama";
                    # code...
                }

                if (!preg_match(
                    '/^(?=.*[A-Z])(?=.*\d).{8,}$/',
                    $password
                    )) {
                        $error[] = "harus mengikuti aturan";
                    # code...
                }

                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $error[] = "format email salah";
                    # code...
                }

                if (empty ($error)) {
                    $cekemail = mysqli_query($konek, "SELECT * FROM tb_sesi VALUES email = '$email'");
                    if (mysqli_num_rows($cekemail)) {
                        $error[] = "email sudah ada, no dobel2";
                        # code...
                    }
                    # code...
                }

                if (empty ($error)) {
                    $masukkan = mysqli_query($konek, "INSERT INTO tb_sesi (nama, email, password) VALUES ='$nama', '$email', '$password',");
                
                    if ($masukkan) {
                        echo "yeahhhhh berhasil register brooow, silahkan kehalaman login ^^";
                    } else {
                        echo "ada yang salah, cek code bangg";
                    }
                }
            }
        ?>
    </form>
    
</body>
</html>