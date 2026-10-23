<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil Saya</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #0f172a; color: #f8fafc; min-height: 100vh; }
        .main-card { background: #1e293b; border: 1px solid #334155; border-radius: 16px; overflow: hidden; }
        .card-header-custom { background: rgba(255, 255, 255, 0.02); border-bottom: 1px solid #334155; padding: 1.5rem 2rem; }
        .form-label { font-size: 0.85rem; font-weight: 600; color: #94a3b8; text-transform: uppercase; margin-bottom: 0.5rem; }
        .form-control { background-color: #0f172a; border-color: #334155; color: #f8fafc; padding: 0.65rem 0.9rem; }
        .form-control:focus { background-color: #0f172a; border-color: #f59e0b; color: #f8fafc; }
    </style>
</head>
<body>

<div class="container py-5" style="max-width: 650px;">
    <div class="main-card">
        <div class="card-header-custom d-flex justify-content-between align-items-center">
            <h5 class="mb-0 fw-bold text-white"><i class="bi bi-person-gear text-warning me-2"></i>Edit Informasi Profil</h5>
            <a href="tampil.php" class="btn btn-outline-secondary btn-sm">Kembali</a>
        </div>
        <div class="card-body p-4 p-md-5">
            <?php
            include 'koneksi.php';
            $data = mysqli_query($koneksi, "SELECT * FROM profil WHERE id=1");
            while($d = mysqli_fetch_array($data)){
                ?>
                <!-- Tambahkan enctype multipart/form-data untuk upload file -->
                <form method="post" action="update_profil.php" enctype="multipart/form-data">
                    <div class="mb-4">
                        <label class="form-label">Nama Lengkap</label>
                        <input class="form-control" type="text" name="nama_lengkap" value="<?php echo $d['nama_lengkap']; ?>" required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Profesi / Peran</label>
                        <input class="form-control" type="text" name="profesi" value="<?php echo $d['profesi']; ?>" required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Status Kerja / Ketersediaan</label>
                        <input class="form-control" type="text" name="status_kerja" value="<?php echo $d['status_kerja']; ?>" required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Upload Foto Profil (PNG/JPG)</label>
                        <input class="form-control" type="file" name="foto_profil" accept="image/*">
                        <small class="text-secondary mt-1 d-block">Kosongkan jika tidak ingin mengganti foto saat ini.</small>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Biografi Singkat</label>
                        <textarea class="form-control" name="bio_singkat" rows="4" required><?php echo $d['bio_singkat']; ?></textarea>
                    </div>

                    <div class="d-grid mt-4">
                        <button type="submit" class="btn btn-warning text-white fw-bold py-2">
                            <i class="bi bi-save-fill me-1"></i> Simpan Perubahan Profil
                        </button>
                    </div>
                </form>
                <?php 
            }
            ?>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>