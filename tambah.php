<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Proyek Baru</title>
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
        .form-control, .form-select { background-color: #0f172a; border-color: #334155; color: #f8fafc; padding: 0.65rem 0.9rem; }
        .form-control:focus, .form-select:focus { background-color: #0f172a; border-color: #3b82f6; color: #f8fafc; }
    </style>
</head>
<body>

<div class="container py-5" style="max-width: 650px;">
    <div class="main-card">
        <div class="card-header-custom d-flex justify-content-between align-items-center">
            <h5 class="mb-0 fw-bold text-white"><i class="bi bi-folder-plus text-primary me-2"></i>Tambah Proyek Baru</h5>
            <a href="tampil.php" class="btn btn-outline-secondary btn-sm">Kembali</a>
        </div>
        <div class="card-body p-4 p-md-5">
            <form method="post" action="inputproyek.php">
                <div class="mb-4">
                    <label class="form-label">Judul Proyek</label>
                    <input class="form-control" type="text" name="judul" placeholder="Contoh: Web Portfolio Responsive" required autocomplete="off">
                </div>

                <div class="mb-4">
                    <label class="form-label">Kategori</label>
                    <select class="form-select" name="kategori" required>
                        <option value="" disabled selected>-- Pilih Kategori --</option>
                        <option value="Web Development">Web Development</option>
                        <option value="Mobile App">Mobile App</option>
                        <option value="UI/UX Design">UI/UX Design</option>
                        <option value="Desktop App">Desktop App</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="form-label">Deskripsi Proyek</label>
                    <textarea class="form-control" name="deskripsi" rows="3" placeholder="Penjelasan singkat proyek..." required></textarea>
                </div>

                <div class="mb-4">
                    <label class="form-label">Link Proyek / Demo / GitHub</label>
                    <input class="form-control" type="url" name="link" placeholder="https://github.com/..." required>
                </div>

                <div class="d-grid mt-4">
                    <button type="submit" class="btn btn-primary fw-bold py-2">
                        <i class="bi bi-save-fill me-1"></i> Simpan Proyek
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>