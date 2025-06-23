<?php
include 'dbkonek.php';

if(isset($_SESSION['nama'])){
    header('location:landing.php');
}
else {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>hal login</title>
</head>
<body>
    <form action="" method="POST">
        <input type="text" placeholder="masukan email" name="email">
        <input type="password" placeholder="masukan password" name="password">
        <input type="submit" value="submit" name="submit">
    </form>

    <?php
    if(isset($_POST['submit'])){
        $checking = mysqli_query($connect, "SELECT * FROM tb_sesi WHERE email = '" .$_POST['email']. "' AND password = '" . $_POST['password'] . "'
        ");

    $login= mysqli_fetch_array($checking);
    $masuk= mysqli_num_rows($checking);
    if($masuk > 0){
        $user = $login['nama'];
        session_start();
        $_SESSION['nama'] = $user;
        header('location:landing.php');
    } else {
        echo "email atau password salah";
    }
    }
    ?>
</body>
</html>

<?php
}
?>