<?php
include 'dbkonek.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $hapus = mysqli_query($konek, "DELETE FROM tb_a WHERE id_a='$id'");

    if ($hapus) {
        header(('location:tampil.php'));
    }else {
        echo "error ? CEK CODE";
    }
}
?>