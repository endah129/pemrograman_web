<?php
ob_start();
include 'dbkonek.php';
session_start();
if (!isset($_SESSION['nama'])) {
    header('location:login.php');
} else {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome page</title>
</head>
<body>
    <a href="logout.php">LOGOUT</a>
    <h1>SELAMAT DATANG <?php echo $_SESSION ["nama"]?> DI WEB</h1>
</body>
</html>

<?php
}
?>