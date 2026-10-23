<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #0f172a; color: #f8fafc; min-height: 100vh; }
        .main-card { background: #1e293b; border: 1px solid #334155; border-radius: 16px; overflow: hidden; }
        .card-header-custom { background: rgba(255, 255, 255, 0.02); border-bottom: 1px solid #334155; padding: 1.5rem 2rem; position: relative; z-index: 10; }
        .btn-action-icon { width: 34px; height: 34px; border-radius: 8px; display: inline-flex; align-items: center; justify-content: center; text-decoration: none; }
        .btn-edit { background: rgba(245, 158, 11, 0.15); color: #fbbf24; }
        .btn-delete { background: rgba(239, 68, 68, 0.15); color: #f87171; }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
        <div>
            <h3 class="fw-bold text-white mb-1">Dashboard Proyek</h3>
            <p class="text-secondary mb-0">Kelola data profil dan daftar proyek</p>
        </div>
        <div class="d-flex gap-2">
            <a href="edit_profil.php" class="btn btn-warning text-white btn-sm rounded-pill px-3 d-inline-flex align-items-center gap-1">
                <i class="bi bi-person-gear"></i> Edit Profil Saya
            </a>
            <a href="index.php" class="btn btn-outline-light btn-sm rounded-pill px-3 d-inline-flex align-items-center gap-1">
                <i class="bi bi-eye-fill"></i> Lihat Web Portofolio
            </a>
        </div>
    </div>

    <div class="main-card">
        <div class="card-header-custom d-flex justify-content-between align-items-center">
            <h5 class="mb-0 fw-bold text-white"><i class="bi bi-folder-fill text-primary me-2"></i>Data Proyek</h5>
            <a href="tambah.php" class="btn btn-primary btn-sm px-3 rounded-pill position-relative" style="z-index: 20;">
                <i class="bi bi-plus-lg me-1"></i> Tambah Proyek
            </a>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-dark table-hover mb-0 align-middle">
                    <thead>
                        <tr class="text-secondary" style="font-size: 0.85rem;">
                            <th class="text-center" style="width: 50px;">NO</th>
                            <th>JUDUL PROYEK</th>
                            <th>KATEGORI</th>
                            <th>DESKRIPSI</th>
                            <th>LINK PROYEK / GITHUB</th>
                            <th class="text-center" style="width: 100px;">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        include 'koneksi.php';
                        $no = 1;
                        $data = mysqli_query($koneksi, "SELECT * FROM proyek ORDER BY id_proyek DESC");
                        while($d = mysqli_fetch_array($data)){
                            ?>
                            <tr>
                                <td class="text-center text-secondary"><?php echo $no++; ?></td>
                                <td class="fw-semibold text-white"><?php echo $d['judul']; ?></td>
                                <td><span class="badge bg-primary bg-opacity-20 text-primary"><?php echo $d['kategori']; ?></span></td>
                                <td class="text-secondary small"><?php echo $d['deskripsi']; ?></td>
                                <td>
                                    <a href="<?php echo $d['link']; ?>" target="_blank" class="text-info text-decoration-none small d-inline-flex align-items-center gap-1">
                                        <i class="bi bi-link-45deg"></i> Buka Link
                                    </a>
                                </td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="ubah.php?id=<?php echo $d['id_proyek']; ?>" class="btn-action-icon btn-edit" title="Ubah"><i class="bi bi-pencil-fill"></i></a>
                                        <a href="hapus.php?id=<?php echo $d['id_proyek']; ?>" onclick="return confirm('Yakin hapus proyek ini?')" class="btn-action-icon btn-delete" title="Hapus"><i class="bi bi-trash-fill"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <?php 
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>