<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portofolio Saya</title>
    <!-- Google Fonts & Bootstrap 5 -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #0f172a; color: #f8fafc; min-height: 100vh; }
        .navbar-custom { background-color: rgba(15, 23, 42, 0.9); backdrop-filter: blur(10px); border-bottom: 1px solid #334155; }
        .profile-img { width: 140px; height: 140px; border-radius: 50%; object-fit: cover; border: 4px solid #3b82f6; box-shadow: 0 0 25px rgba(59, 130, 246, 0.4); }
        .badge-status { background: rgba(34, 197, 94, 0.15); color: #4ade80; border: 1px solid rgba(34, 197, 94, 0.3); padding: 0.4rem 1rem; border-radius: 30px; font-size: 0.85rem; font-weight: 600; }
        .skill-badge { background: #1e293b; border: 1px solid #334155; color: #e2e8f0; padding: 0.5rem 1rem; border-radius: 10px; font-size: 0.9rem; }
        .project-card { background: #1e293b; border: 1px solid #334155; border-radius: 16px; transition: all 0.3s ease; height: 100%; display: flex; flex-direction: column; }
        .project-card:hover { transform: translateY(-6px); border-color: #3b82f6; box-shadow: 0 12px 24px rgba(59, 130, 246, 0.15); }
        .category-badge { display: inline-block; padding: 0.35em 0.8em; font-size: 0.75rem; font-weight: 600; color: #38bdf8; background-color: rgba(56, 189, 248, 0.1); border: 1px solid rgba(56, 189, 248, 0.2); border-radius: 20px; margin-bottom: 1rem; width: fit-content; }
        .btn-link-demo { background-color: #3b82f6; color: #ffffff; border: none; padding: 0.5rem 1.2rem; border-radius: 8px; font-size: 0.85rem; font-weight: 600; text-decoration: none; }
        .btn-link-demo:hover { background-color: #2563eb; color: #ffffff; }
    </style>
</head>
<body>

<?php
include 'koneksi.php';
// Ambil data profil dari database
$query_profil = mysqli_query($koneksi, "SELECT * FROM profil WHERE id=1");
$profil = mysqli_fetch_array($query_profil);

// Logika pengecekan file foto (upload lokal atau link URL)
$foto = $profil['foto_profil'];
$src_foto = (filter_var($foto, FILTER_VALIDATE_URL)) ? $foto : 'uploads/' . $foto;
?>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark navbar-custom sticky-top py-3">
    <div class="container">
        <a class="navbar-brand fw-bold text-white d-flex align-items-center gap-2" href="index.php">
            <i class="bi bi-code-square text-primary fs-4"></i>
            <span>MyPortfolio</span>
        </a>
        <a href="tampil.php" class="btn btn-outline-light btn-sm rounded-pill px-3">
            <i class="bi bi-gear-fill me-1"></i> Kelola Data (Admin)
        </a>
    </div>
</nav>

<!-- Hero Section Dinamis -->
<div class="container py-5">
    <section class="text-center mb-5">
        <img src="<?php echo $src_foto; ?>" class="profile-img mb-3" alt="Foto Profil">
        
        <div class="d-flex justify-content-center mb-3">
            <span class="badge-status">
                <i class="bi bi-circle-fill me-1" style="font-size: 0.5rem;"></i> <?php echo $profil['status_kerja']; ?>
            </span>
        </div>

        <h1 class="display-6 fw-extrabold text-white mb-2">Halo, Saya <?php echo $profil['nama_lengkap']; ?> 👋</h1>
        <p class="text-info fw-semibold mb-2"><?php echo $profil['profesi']; ?></p>
        <p class="text-secondary mx-auto mb-4" style="max-width: 600px;">
            <?php echo $profil['bio_singkat']; ?>
        </p>

        <div class="d-flex justify-content-center flex-wrap gap-2">
            <span class="skill-badge"><i class="bi bi-filetype-html text-warning me-1"></i> HTML/CSS</span>
            <span class="skill-badge"><i class="bi bi-bootstrap-fill text-primary me-1"></i> Bootstrap 5</span>
            <span class="skill-badge"><i class="bi bi-filetype-php text-info me-1"></i> PHP</span>
            <span class="skill-badge"><i class="bi bi-database text-success me-1"></i> MySQL</span>
        </div>
    </section>

    <!-- Daftar Proyek -->
    <section>
        <div class="d-flex justify-content-between align-items-end mb-4">
            <div>
                <h3 class="fw-bold text-white mb-1">Daftar Proyek</h3>
                <p class="text-secondary mb-0">Karya yang telah saya buat dan tersimpan di database</p>
            </div>
        </div>

        <div class="row g-4">
            <?php 
            $data = mysqli_query($koneksi, "SELECT * FROM proyek ORDER BY id_proyek DESC");
            if (mysqli_num_rows($data) > 0) {
                while($d = mysqli_fetch_array($data)){
                    ?>
                    <div class="col-md-6 col-lg-4">
                        <div class="project-card p-4">
                            <span class="category-badge"><i class="bi bi-tag-fill me-1"></i><?php echo $d['kategori']; ?></span>
                            <h4 class="fw-bold text-white mb-2"><?php echo $d['judul']; ?></h4>
                            <p class="text-secondary fs-6 mb-4 flex-grow-1"><?php echo nl2br($d['deskripsi']); ?></p>
                            <div class="pt-3 border-top border-secondary border-opacity-25">
                                <a href="<?php echo $d['link']; ?>" target="_blank" class="btn-link-demo d-inline-flex align-items-center gap-1">
                                    <span>Buka Proyek</span>
                                    <i class="bi bi-box-arrow-up-right ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php 
                }
            } else {
                echo '<div class="col-12 text-center py-5 text-secondary">Belum ada proyek yang ditambahkan.</div>';
            }
            ?>
        </div>
    </section>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>