# 🖼️ Aplikasi Konversi Gambar - Laravel + Python

Aplikasi web sederhana menggunakan **Laravel (PHP)** untuk frontend/backend dan **Python (Flask)** untuk proses image processing. Aplikasi ini mendukung konversi gambar ke:

- Grayscale
- Biner (thresholding)
- Negatif

## 📁 Fitur Utama

- Upload gambar dan pilih jenis konversi
- Kirim gambar ke server Python untuk diproses
- Tampilkan hasil konversi di halaman hasil
- Simpan riwayat konversi ke database dan tampilkan di halaman upload
- Download hasil konversi gambar

---

## 📦 Struktur Folder Penting

projek-final-web2/
│
├── laravel/
│ ├── app/
│ │ ├── Http/
│ │ │ └── Controllers/
│ │ │ └── KonversiController.php
│ │ └── Models/
│ │ └── Gambar.php
│ ├── public/
│ │ ├── gambar_asli/
│ │ └── gambar_hasil/
│ ├── resources/
│ │ └── views/
│ │ ├── upload.blade.php
│ │ └── hasil.blade.php
│ ├── routes/
│ │ └── web.php
│ └── .env
│
└── python/
└── python-api.py

## ⚙️ Langkah Instalasi

### 1. Laravel (PHP Backend)

```
cd projek-final-web2/laravel
```

# Install dependensi Laravel
```
composer install
```

# Copy file env dan generate key
```
cp .env.example .env
php artisan key:generate
```

# Sesuaikan konfigurasi database di file .env
# Lalu jalankan migrasi database
```
php artisan migrate
```

# Pastikan folder penyimpanan hasil ada dan punya izin tulis
```
mkdir -p public/gambar_asli public/gambar_hasil
chmod -R 775 public/gambar_asli public/gambar_hasil
```

# Jalankan server Laravel
```
php artisan serve
```

### 2. Python (Flask API)

```
cd projek-final-web2/python
```

# Buat virtual environment (opsional)
```
python -m venv venv
source venv/bin/activate  # Linux/macOS
venv\Scripts\activate     # Windows
```

# Install library yang dibutuhkan
```
pip install flask opencv-python
```

# Jalankan server Flask
```
python python-api.py
```

## 🚀 Cara Menggunakan

1. Akses Laravel di browser: http://127.0.0.1:8000
2. Pilih gambar dan jenis proses (grayscale, biner, negatif)
3. Klik Proses Gambar
4. Gambar akan dikirim ke Python, diproses, dan ditampilkan
5. Halaman hasil menampilkan:
  - Gambar hasil proses
  - Tombol Download
  - Tombol kembali ke halaman upload
6.Riwayat semua konversi tampil di halaman utama

## 🧠 Teknologi yang Digunakan

- Laravel 12+
- Python 3.10+
- Flask
- OpenCV

## 📜 Lisensi

Projek ini dibuat untuk pembelajaran mata kuliah Pemrograman Web 2. Bebas dikembangkan lebih lanjut.
MIT License © 2025 — Kian Fikram Ayyubi

## 🙋‍♀️ Fitur Tambahan yang Bisa Ditambahkan

1. Konversi batch (banyak gambar sekaligus)
2. Konversi ke format PDF
3. Unduh semua hasil dalam satu ZIP
4. Filter tambahan: blur, sharpen, edge detection

