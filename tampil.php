<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <td> NO </td>
            <td> NAMA </td>
            <td> GAMBAR </td>
            <td> ACTION </td>
        </tr>
        <!-- Looping -->
<?php
include 'dbkonek.php';
$query = mysqli_query($konek, "SELECT * FROM tb_a");
while ($baris = mysqli_fetch_array($query)){
?>
        <tr>
            <td><?php echo $baris['id_a'] ?></td>
            <td><?php echo $baris['nama'] ?></td>
            <td>
                <img src="img/<?php echo $baris['gambar'] ?>"
                alt="gambar <?php echo $baris['gambar'] ?>"
                height="100" width="100"></td>
            <td>
            <a href="sunting.php?id=<?php echo $baris['id_a'] ?>">sunting </a> <br>
            <a href="hapus.php?id=<?php echo $baris['id_a'] ?>" onclick="return confirm('lu yakin ?')"> hapus </a>
            </td>
        </tr>
        <?php
}
    ?>

    </table>
</body>
</html>