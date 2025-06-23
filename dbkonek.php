<?php
$konek = mysqli_connect("127.0.0.1", "root", "", "pemweb", 3307);
if (!$konek) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
