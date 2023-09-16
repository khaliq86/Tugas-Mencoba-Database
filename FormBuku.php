<?php
require("Koneksi.php");
include_once("Model.php");

if (isset($_GET['id_buku'])) {
    $id = $_GET['id_buku'];
    $buku = new model();
    $data = $buku->getBukuById($id);
    foreach ($data as $row) {
        $judul = $row['judul_buku'];
        $penulis = $row['penulis'];
        $penerbit = $row['penerbit'];
        $tahun_terbit = $row['tahun_terbit'];
    }
}

if (isset($_POST['submit']) && isset($_POST['judul_buku']) && isset($_POST['penulis']) && isset($_POST['penerbit']) && isset($_POST['tahun_terbit'])) {
    $judul = $_POST['judul_buku'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $buku = new model();
    $hasil = $buku->setBuku($judul, $penulis, $penerbit, $tahun_terbit);

    if ($hasil) {
        header("Location: Buku.php");
        exit;
    } else {
        echo "data gagal ditambahkan";
    }
}

if (isset($_POST['update']) && isset($_POST['judul_buku']) && isset($_POST['penulis']) && isset($_POST['penerbit']) && isset($_POST['tahun_terbit'])) {
    $judul = $_POST['judul_buku'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $buku = new model();
    $hasil = $buku->editBuku($id, $judul, $penulis, $penerbit, $tahun_terbit);

    if ($hasil) {
        header("Location: Buku.php");
        exit;
    } else {
        echo "data gagal diupdate";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="asset/main.css">
    <title>Form Tambah Buku</title>
</head>

<body>
    <div>
        <?php
        if (isset($_GET['id_buku'])) {
            echo "<h1>Edit Data Buku</h1>";
        } else {
            echo "<h1>Tambah Data Buku</h1>";
        } ?>
        <form action="" method="post">
            <table>
                <tr>
                    <td class="text-align-left">
                        <label for="judul_buku">Judul Buku</label>
                    </td>
                    <td>
                        <input type="text" name="judul_buku" id="judul_buku" value="<?php if (isset($judul)) {
                            echo $judul;
                        } else {
                            echo "";
                        } ?>">
                    </td>
                </tr>
                <tr>
                    <td class="text-align-left"> <label for="penulis">Penulis Buku</label></td>
                    <td><input type="text" name="penulis" id="penulis" value="<?php if (isset($penulis)) {
                        echo $penulis;
                    } else {
                        echo "";
                    } ?>"></td>
                </tr>
                <tr>
                    <td class="text-align-left"><label for="penerbit">Penerbit</label></td>
                    <td><input type="text" name="penerbit" id="penerbit" value="<?php if (isset($penerbit)) {
                        echo $penerbit;
                    } else {
                        echo "";
                    } ?>"></td>
                </tr>
                <tr>
                    <td class="text-align-left"><label for="tahun_terbit">Tahun Terbit</label></td>
                    <td><input type="text" name="tahun_terbit" id="tahun_terbit" value="<?php if (isset($tahun_terbit)) {
                        echo $tahun_terbit;
                    } else {
                        echo "";
                    } ?>"></td>
                </tr>
                <tr>
                    <td>
                        <?php
                        if (isset($_GET['id_buku'])) {
                            echo "<button type=\"submit\" name=\"update\">Update</button>";
                        } else {
                            echo "<button type=\"submit\" name=\"submit\">Tambah</button>";
                        }
                        ?>
                    </td>
                    <td>
                        <a href="index.php">Kembali</a>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>