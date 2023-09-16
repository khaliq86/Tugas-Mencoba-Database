<?php

session_start();

if ($_SESSION['is_login'] == 1) {
    echo "<h1>Selamat Datang " . ucfirst($_SESSION['username']) . "</h1>";
} else {
    header("Location: LoginForm.php");
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Beranda</title>
    <link rel="stylesheet" href="asset/main.css">
</head>

<body>
    <div>
        <h1 style="font-size: 50px;">Halaman Beranda Data Buku</h1>
        <form action="" method="post">
            <table>
                <tr>
                    <td>
                        <button type="submit" name="tambah-data-buku">Tambah Data Buku</button>
                    </td>
                    <td>
                        <button type="submit" name="tampilkan-data-buku">Tampilkan Data Buku</button>
                    </td>
                </tr>
            </table>
            <button type="submit" name="logout">Log Out</button>
        </form>
        <?php
        if (isset($_POST['tambah-data-buku'])) {
            header("Location: FormBuku.php");
        }
        if (isset($_POST['tampilkan-data-buku'])) {
            header("Location: Buku.php");
        }
        if (isset($_POST['logout'])) {
            session_destroy();
            header("Location: LoginForm.php");
        }
        ?>
</body>

</html>