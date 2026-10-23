<?php 
include 'koneksi.php';

$nama_lengkap = $_POST['nama_lengkap'];
$profesi      = $_POST['profesi'];
$status_kerja = $_POST['status_kerja'];
$bio_singkat  = $_POST['bio_singkat'];

// Ambil info file foto
$foto_nama = $_FILES['foto_profil']['name'];
$foto_tmp  = $_FILES['foto_profil']['tmp_name'];

// Jika pengguna mengunggah file foto baru
if (!empty($foto_nama)) {
    // Buat folder uploads secara otomatis jika belum ada
    if (!file_exists('uploads')) {
        mkdir('uploads', 0777, true);
    }

    // Beri nama unik agar nama file tidak bentrok
    $ext = pathinfo($foto_nama, PATHINFO_EXTENSION);
    $nama_foto_baru = time() . '_profil.' . $ext;
    $folder_tujuan  = 'uploads/' . $nama_foto_baru;

    // Pindahkan file dari lokasi sementara ke folder uploads/
    if (move_uploaded_file($foto_tmp, $folder_tujuan)) {
        // Update data beserta nama file foto baru ke database
        mysqli_query($koneksi, "UPDATE profil SET 
            nama_lengkap = '$nama_lengkap', 
            profesi      = '$profesi', 
            status_kerja = '$status_kerja', 
            foto_profil  = '$nama_foto_baru', 
            bio_singkat  = '$bio_singkat' 
        WHERE id = 1");
    }
} else {
    // Jika tidak ada foto baru, cukup perbarui teks saja
    mysqli_query($koneksi, "UPDATE profil SET 
        nama_lengkap = '$nama_lengkap', 
        profesi      = '$profesi', 
        status_kerja = '$status_kerja', 
        bio_singkat  = '$bio_singkat' 
    WHERE id = 1");
}

header("location:index.php");
exit();
?>