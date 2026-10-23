# 🚀 Personal Portfolio & Admin Dashboard (PHP & MySQL)

Aplikasi web portofolio pribadi dinamis yang dilengkapi dengan **Dashboard Admin (CRUD)** untuk mengelola data proyek dan informasi profil secara langsung melalui antarmuka web.

## ✨ Fitur Utama
- **Portofolio Publik (`index.php`):** Menampilkan profil dinamis dan daftar kartu proyek secara interaktif.
- **Dashboard Admin (`tampil.php`):** Fitur CRUD (Tambah, Lihat, Edit, Hapus) untuk data proyek.
- **Manajemen Profil:** Edit data diri dan upload foto profil lokal (`.png` / `.jpg`) langsung dari web.
- **Desain Modern:** Menggunakan Bootstrap 5 dengan tema Dark Mode.

## 🛠️ Teknologi
- **Frontend:** HTML5, CSS3, Bootstrap 5, Bootstrap Icons
- **Backend:** PHP 8.x
- **Database:** MySQL / MariaDB (phpMyAdmin)

## 📁 Struktur Folder
```text
portofolio/
└── php/
    ├── uploads/          # Folder foto profil
    ├── edit_profil.php   # Form edit profil
    ├── hapus.php         # Hapus proyek
    ├── index.php         # Halaman publik
    ├── inputproyek.php   # Simpan proyek baru
    ├── koneksi.php       # Koneksi database
    ├── tambah.php        # Form tambah proyek
    ├── tampil.php        # Dashboard admin
    ├── ubah.php          # Form edit proyek
    ├── update.php        # Simpan perubahan proyek
    └── update_profil.php # Simpan perubahan profil