<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data Proyek</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #0f172a;
            color: #f8fafc;
            min-height: 100vh;
        }

        .main-card {
            background: #1e293b;
            border: 1px solid #334155;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            overflow: hidden;
        }

        .card-header-custom {
            background: rgba(255, 255, 255, 0.02);
            border-bottom: 1px solid #334155;
            padding: 1.5rem 2rem;
        }

        .form-label {
            font-size: 0.85rem;
            font-weight: 600;
            color: #94a3b8;
            text-transform: uppercase;
            letter-spacing: 0.03em;
            margin-bottom: 0.5rem;
        }

        .input-group-text {
            background-color: #0f172a;
            border-color: #334155;
            color: #64748b;
            border-top-left-radius: 10px;
            border-bottom-left-radius: 10px;
        }

        .form-control, .form-select {
            background-color: #0f172a;
            border-color: #334155;
            color: #f8fafc;
            padding: 0.65rem 0.9rem;
            font-size: 0.95rem;
            border-top-right-radius: 10px;
            border-bottom-right-radius: 10px;
        }

        .form-control:focus, .form-select:focus {
            background-color: #0f172a;
            border-color: #f59e0b;
            color: #f8fafc;
            box-shadow: 0 0 0 0.25rem rgba(245, 158, 11, 0.2);
        }

        .btn-submit {
            background-color: #f59e0b;
            border: none;
            border-radius: 10px;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            color: #ffffff;
            box-shadow: 0 4px 14px rgba(245, 158, 11, 0.3);
            transition: all 0.2s ease;
        }

        .btn-submit:hover {
            background-color: #d97706;
            color: #ffffff;
            transform: translateY(-1px);
        }

        .btn-back {
            border-radius: 10px;
            padding: 0.55rem 1rem;
            font-weight: 500;
            color: #94a3b8;
            border-color: #334155;
            transition: all 0.2s ease;
        }

        .btn-back:hover {
            background-color: #334155;
            color: #ffffff;
            border-color: #475569;
        }
    </style>
</head>
<body>

<div class="container py-5" style="max-width: 650px;">
    <!-- Header Section -->
    <div class="mb-4">
        <h3 class="fw-bold mb-1 text-white">Ubah Data Proyek</h3>
        <p class="text-secondary mb-0">Perbarui informasi proyek dalam portofolio kamu</p>
    </div>

    <!-- Main Card -->
    <div class="main-card">
        <div class="card-header-custom d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center gap-2">
                <i class="bi bi-pencil-square text-warning fs-4"></i>
                <h5 class="mb-0 fw-bold text-white">Form Edit Proyek</h5>
            </div>
            <a href="tampil.php" class="btn btn-outline-secondary btn-back d-inline-flex align-items-center gap-2">
                <i class="bi bi-arrow-left"></i>
                <span>Kembali</span>
            </a>
        </div>

        <div class="card-body p-4 p-md-5">
            <?php
            include 'koneksi.php';
            $id = $_GET['id'];
            $data = mysqli_query($koneksi, "select * from proyek where id_proyek='$id'");
            while($d = mysqli_fetch_array($data)){
                ?>
                <form method="post" action="update.php">
                    <input type="hidden" name="id_proyek" value="<?php echo $d['id_proyek']; ?>">

                    <div class="mb-4">
                        <label for="judul" class="form-label">Judul Proyek</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-card-heading"></i></span>
                            <input class="form-control" type="text" id="judul" name="judul" value="<?php echo $d['judul']; ?>" required autocomplete="off">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="kategori" class="form-label">Kategori</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-tag"></i></span>
                            <select class="form-select" id="kategori" name="kategori" required>
                                <option value="Web Development" <?php if($d['kategori'] == 'Web Development') echo 'selected'; ?>>Web Development</option>
                                <option value="Mobile App" <?php if($d['kategori'] == 'Mobile App') echo 'selected'; ?>>Mobile App</option>
                                <option value="UI/UX Design" <?php if($d['kategori'] == 'UI/UX Design') echo 'selected'; ?>>UI/UX Design</option>
                                <option value="Desktop App" <?php if($d['kategori'] == 'Desktop App') echo 'selected'; ?>>Desktop App</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="deskripsi" class="form-label">Deskripsi Proyek</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-card-text"></i></span>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required><?php echo $d['deskripsi']; ?></textarea>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="link" class="form-label">Link Proyek / Demo / GitHub</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-link-45deg"></i></span>
                            <input class="form-control" type="url" id="link" name="link" value="<?php echo $d['link']; ?>" required>
                        </div>
                    </div>

                    <div class="d-grid mt-4">
                        <button type="submit" class="btn btn-submit d-flex align-items-center justify-content-center gap-2">
                            <i class="bi bi-save-fill"></i>
                            <span>Simpan Perubahan</span>
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