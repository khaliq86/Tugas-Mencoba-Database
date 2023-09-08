<?php

require "koneksi.php";

class model
{

    //FUNCTION BUKU
    public function getBuku() //getBuku berfungsi untuk mengambil semua data dari tabel member
    {
        $sql = "SELECT * from buku";
        $result = mysqli_query($GLOBALS['koneksi'], $sql);
        return $result;
    }

    public function getBukuById($id)
    {
        $sql = "SELECT * FROM buku WHERE id_buku = '$id'";
        $result = mysqli_query($GLOBALS['koneksi'], $sql);
        return $result;
    }

    public function deleteBuku($id) //deleteBuku berfungsi untuk menghapus baris berdasarkan id
    {
        $sql = "DELETE from buku where id_buku='$id'";
        $result = mysqli_query($GLOBALS['koneksi'], $sql);
        return $result;
    }

    public function setBuku($judul, $penulis, $penerbit, $tahun_terbit) //setBuku berfungsi untuk memasukkan inputan user ke dalam database
    {
        $sql = "INSERT INTO buku (judul_buku, penulis, penerbit, tahun_terbit) VALUES ('$judul', '$penulis','$penerbit', '$tahun_terbit')";
        $result = mysqli_query($GLOBALS['koneksi'], $sql);
        return $result;
    }

    public function editBuku($id, $judul, $penulis, $penerbit, $tahun_terbit) //editBuku berfunsi untuk mengedit data dari tabel buku berdasarkan id
    {
        $sql = "UPDATE buku SET judul_buku = '$judul', penulis = '$penulis', penerbit = '$penerbit', tahun_terbit = '$tahun_terbit' WHERE id_buku = '$id'";
        $result = mysqli_query($GLOBALS['koneksi'], $sql);
        return $result;
    }
}
?>