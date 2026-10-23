<?php 
include 'koneksi.php';

$id = $_GET['id'];

mysqli_query($koneksi, "delete from proyek where id_proyek='$id'");

header("location:tampil.php");
?>