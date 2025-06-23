<?php
include 'dbkonek.php';

$data = mysqli_query($konek, "SELECT * FROM tb_a
WHERE id_a = '" . $_GET['id'] . "'");
$panggil = mysqli_fetch_array($data);
$nama = $panggil['nama'];
$file = $panggil['gambar'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDIT</title>
</head>
<body>
    <h1 style="text-align: center;">HALAMAN EDIT : </h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <table>
            <tr>
                <td> nama </td>
                <td> : </td>
                <td> 
                    <input type="text" name="nama" value="<?php echo $nama ?>"
                </td>
            </tr>
            <tr>
                <td> pilih file  </td>
                <td> : </td>
                <td>
                    <input type="hidden" name="img" value="<?php echo $file ?>"
                    <input type="file" name="gambar">
                </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><img src="img/<?php echo $file ?>" width="300" height="300"
                </td>
            </tr>
            <tr>
                <td> <input type="submit" name="kirim" value="update"> </td>
            </tr>
            <?php
            if (isset($_POST['kirim'])){
                $nama = $_POST['nama'];
                $nama_file = $_FILES['gambar']['name'];
                $sumber = $_FILES['gambar']['tmp_name'];
                $folder = './img/';

                if ($nama_file != '') {
                    move_uploaded_file($sumber, $folder . $nama_file);
                    $update = mysqli_query($konek, "UPDATE tb_a SET
                        nama = '$nama',
                        gambar = '" . $nama_file ."'
                        WHERE id_a = '" . $_GET['id'] . "'
                    ");
                    if ($update) {
                        header('location:tampil.php');
                    } else {
                        echo "gagal update";
                    }
                    # code...
                } else {
                    $update = mysqli_query($konek, "UPDATE tb_a SET
            nama = '" . $nama . "'
            WHERE id_a = '" . $_GET['id'] ."'
            ");
                    if ($update) {
                        header('location:tampil.php');
                    } else {
                        echo "gagal update";
                    }
                }
            }
            ?>
        </table>
    </form>
</body>
</html>