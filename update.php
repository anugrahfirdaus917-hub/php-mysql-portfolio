<?php 
include 'koneksi.php';

$id_proyek = $_POST['id_proyek'];
$judul     = $_POST['judul'];
$kategori  = $_POST['kategori'];
$deskripsi = $_POST['deskripsi'];
$link      = $_POST['link'];

mysqli_query($koneksi, "UPDATE proyek SET judul='$judul', kategori='$kategori', deskripsi='$deskripsi', link='$link' WHERE id_proyek='$id_proyek'");

header("location:tampil.php");
?>