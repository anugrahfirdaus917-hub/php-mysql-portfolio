<?php 
include 'koneksi.php';

$judul     = $_POST['judul'];
$kategori  = $_POST['kategori'];
$deskripsi = $_POST['deskripsi'];
$link      = $_POST['link'];

// Query dengan menyebutkan nama kolom secara jelas
$query = "INSERT INTO proyek (judul, kategori, deskripsi, link) VALUES ('$judul', '$kategori', '$deskripsi', '$link')";

if (mysqli_query($koneksi, $query)) {
    header("location:tampil.php");
} else {
    echo "Gagal menyimpan data: " . mysqli_error($koneksi);
}
?>