<?php
include 'dbkonek.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pertemuan 8 php</title>
</head>
<body>
    <form action="" method="POST" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Masukan Nama</td>
                <td> : </td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr>
                <td>Upload Gambar</td>
                <td> : </td>
                <td><input type="file" name="gambar"></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><input type="submit" name="kirim" value="kirim"></td>

                <?php
                if (isset($_POST["kirim"])) {
                    $nama = $_POST["nama"];
                    $nama_file = $_FILES["gambar"] ["name"];
                    $sumber = $_FILES ["gambar"] ["tmp_name"];
                    $folder = "./img/";
                    move_uploaded_file($sumber, $folder.$nama_file);
                    $insert = mysqli_query($konek, "INSERT INTO tb_a VALUES (NULL, '$nama', '$nama_file')");
                    if ($insert) {
                        echo"data berhasil di tambahkan";                        # code...
                    }else{
                        echo"ada yang salah dibagian insert, CEK KODE!";
                    }
                }
                ?>
            </tr>
        </table>
    </form>
</body>
</html>