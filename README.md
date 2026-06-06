# Aplikasi CI-Penjualan (Sistem Informasi Penjualan)

Aplikasi manajemen penjualan berbasis web yang dikembangkan menggunakan arsitektur MVC untuk membantu mengotomatisasi pencatatan transaksi, pengelolaan stok produk, dan penyusunan laporan keuangan secara real-time.

---

## 1. Penjelasan Singkat Solusi

Aplikasi **CI-Penjualan** dirancang sebagai solusi digital untuk mentransformasi sistem pencatatan penjualan konvensional yang rentan terhadap kesalahan input manusia (*human error*). 

Sistem ini memusatkan seluruh data operasional ke dalam satu basis data relasional. Alur kerja utamanya meliputi:
* **Manajemen Data Master**: Mengelola informasi produk, kategori, harga, serta ambang batas minimum stok secara terstruktur.
* **Otomasi Transaksi**: Memproses kalkulasi total belanja secara otomatis pada halaman kasir/form penjualan, mengurangi waktu tunggu pelanggan, dan memperbarui jumlah stok produk di gudang secara *real-time* setelah transaksi berhasil disimpan.
* **Penyusunan Laporan Otomatis**: Menyajikan ringkasan omzet bulanan, grafik tren penjualan barang, serta pembagian data transaksi berdasarkan kategori atau unit kerja terkait, memudahkan manajemen dalam pengambilan keputusan strategis yang cepat dan akurat.

---

## 2. Teknologi Yang Digunakan

Sistem ini menggunakan arsitektur *monolithic* yang ringan dan andal untuk lingkungan lokal maupun produksi:
* **Backend Framework**: CodeIgniter (PHP) dengan penerapan pola desain Model-View-Controller (MVC) untuk memisahkan logika bisnis, pemrosesan data, dan tampilan antarmuka.
* **Database**: MySQL / MariaDB sebagai media penyimpanan data relasional yang telah dinormalisasi.
* **Frontend Interface**: HTML5, CSS3, JavaScript (ES6), dan **Bootstrap** sebagai framework UI untuk memastikan tampilan yang responsif, rapi, dan mudah digunakan.
* **Library Ekstensi**: **DataTables (jQuery Plugin)** untuk merender tabel laporan penjualan interaktif yang dilengkapi fitur pencarian instan, filter multi-kolom, dan tombol ekspor dokumen.
* **Lingkungan Server**: Apache Web Server (XAMPP / Laragon local environment).

---

## 3. Cara Menjalankan Aplikasi

Ikuti panduan langkah demi langkah di bawah ini untuk memasang dan menjalankan proyek CI-Penjualan di lingkungan lokal komputer Anda:

### A. Pemasangan File Proyek
1. Unduh atau salin folder proyek `ci-penjualan` dari repository GitHub ini.
2. Pindahkan folder `ci-penjualan` tersebut ke dalam direktori *root* server lokal Anda:
   * Jika Anda menggunakan **XAMPP**: Letakkan di folder `C:\xampp\htdocs\`
   * Jika Anda menggunakan **Laragon**: Letakkan di folder `C:\laragon\www\`

### B. Import Basis Data (Database)
1. Aktifkan modul **Apache** dan **MySQL** pada control panel XAMPP atau Laragon Anda.
2. Buka browser web, lalu akses halaman **phpMyAdmin** melalui URL: `http://localhost/phpmyadmin/`
3. Buat database baru dengan nama yang sesuai (contoh: `db_penjualan` atau `ci_penjualan`).
4. Pilih database baru tersebut, masuk ke tab **Import**, pilih file `.sql` yang terletak di dalam folder proyek Anda, lalu klik **Go** / **Import** untuk mengeksekusi struktur tabel.

### C. Konfigurasi Sistem CodeIgniter
1. Buka folder proyek `ci-penjualan` menggunakan kode editor pilihan Anda (seperti Visual Studio Code).
2. Atur URL utama aplikasi pada file `application/config/config.php`:
```php
   $config['base_url'] = 'http://localhost/ci-penjualan/';
