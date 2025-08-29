# Website Portofolio

Sebuah website layanan laundry digital yang menampilkan fitur-fitur pemesanan, manajemen pelanggan, dan informasi layanan laundry. Proyek ini dirancang untuk membantu pengguna dalam melakukan transaksi laundry secara lebih mudah, cepat, dan efisien. Website ini berfungsi sebagai antarmuka utama bagi pelanggan dan petugas laundry untuk mengelola layanan seperti laundry kiloan, laundry satuan, dan jenis layanan lainnya. Website ini dibangun menggunakan HTML5, CSS3, JavaScript, dan Bootstrap untuk tampilan depan yang responsif dan interaktif. Pada sisi back-end, digunakan PHP untuk pemrosesan server-side dan MySQL sebagai basis data untuk menyimpan informasi layanan, pelanggan, dan transaksi.

---

## Daftar Isi

- [Fitur](#fitur)  
- [Teknologi yang Digunakan](#teknologi-yang-digunakan)  
- [Struktur Proyek](#struktur-proyek)
- [Penjelasan struktur](#penjelasan-struktur)  
- [Tangkapan Layar](#tangkapan-layar)  
- [Informasi Kontak](#informasi-kontak)  
- [Lisensi](#lisensi)  
- [Tautan Sosial](#tautan-sosial)  
- [Ucapan Terima Kasih](#ucapan-terima-kasih)  

---

## Fitur

- **Login Admin**: Sistem autentikasi yang memungkinkan hanya admin atau petugas terdaftar yang bisa mengakses dan mengelola data dalam sistem.
- **Dashboard Statistik**: Menampilkan data ringkasan seperti jumlah pelanggan, total transaksi yang telah dilakukan, dan total pendapatan laundry secara keseluruhan.
- **Jenis Layanan**: Mengelola berbagai jenis layanan yang tersedia, seperti setrika, cuci, dan pengeringan.
- **Jenis Laundry Kiloan**: Input dan pengelolaan layanan berdasarkan berat pakaian pelanggan, cocok untuk pakaian harian dalam jumlah banyak.
- **Jenis Laundry Satuan**: Pengelolaan layanan berdasarkan item satuan seperti jas, sepatu, karpet, dan lainnya yang dihitung per potong.
- **Manajemen Pelanggan**: Fitur untuk menambahkan, memperbarui, dan melihat data pelanggan yang menggunakan layanan laundry.
- **Transaksi Laundry**: Mencatat transaksi baru berdasarkan pelanggan dan jenis layanan yang dipilih, lengkap dengan detail harga dan tanggal.
- **Hasil Transaksi**: Menampilkan riwayat atau daftar transaksi yang telah dilakukan, termasuk detail layanan dan total pembayaran.
- **Cetak Transaksi**: Fitur untuk mencetak bukti transaksi atau laporan dalam format cetak, berguna sebagai struk atau arsip laporan administrasi.

---

## Teknologi yang Digunakan

- **HTML5**: Struktur konten menggunakan tag semantik untuk SEO dan aksesibilitas.
- **CSS3**: Mengatur tampilan dan layout agar website menarik dan responsif di berbagai perangkat.
- **JavaScript**: Menambahkan interaktivitas dan fungsi dinamis pada halaman web.
- **Bootstrap**: Framework CSS yang memudahkan pembuatan desain responsif dan konsisten.
- **PHP**: Bahasa pemrograman server-side untuk memproses data dan menjalankan logika aplikasi.
- **MySQL**: Sistem manajemen basis data untuk menyimpan dan mengelola data pelanggan, layanan, dan transaksi.

---

## Struktur Proyek

```
laundry-tama/
├── assets/                 # Folder untuk gambar dan media statis
│   └── images/             # Subfolder untuk gambar
├── config/                 # Folder untuk konfigurasi aplikasi
├── css/                    # Folder untuk file CSS
├── form/                   # Folder untuk file HTML form
├── function/               # Folder untuk fungsi-fungsi PHP
├── js/                     # Folder untuk file JavaScript
├── proses/                 # Folder untuk proses PHP
├── vendor/                 # Folder untuk dependensi eksternal (jika ada)
├── LICENSE                 # File lisensi proyek
├── README.md               # Dokumentasi proyek
├── index.php               # Halaman utama aplikasi
├── login.php               # Halaman login
├── logout.php              # Halaman logout
└── register.php            # Halaman pendaftaran

```

## Penjelasan struktur

- **assets/images/**: Menyimpan gambar-gambar yang digunakan di seluruh aplikasi, seperti ikon dan ilustrasi.
- **config/**: Berisi file konfigurasi yang mengatur pengaturan dasar aplikasi.
- **css/**: Menyimpan file CSS untuk styling tampilan aplikasi.
- **form/**: Berisi file HTML untuk form input data, seperti form transaksi dan pendaftaran.
- **function/**: Menyimpan fungsi-fungsi PHP yang digunakan untuk logika aplikasi.
- **js/**: Menyimpan file JavaScript untuk menambah interaktivitas pada aplikasi.
- **proses/**: Berisi script PHP yang menangani proses backend, seperti pemrosesan form dan interaksi dengan database.
- **vendor/**: Folder ini biasanya berisi dependensi eksternal yang diinstal melalui Composer (meskipun tidak ditemukan dalam repositori ini).
- **LICENSE**: Menyediakan informasi tentang lisensi penggunaan proyek.
- **README.md**: Dokumentasi proyek yang menjelaskan tentang aplikasi, fitur, dan cara penggunaan.
- **index.php**: Halaman utama aplikasi yang menampilkan dashboard atau halaman depan.
- **login.php**: Halaman untuk proses login pengguna.
- **logout.php**: Halaman untuk proses logout pengguna.
- **register.php**: Halaman untuk pendaftaran pengguna baru.

---

## Tangkapan Layar

#### Halaman Login
![Preview Website](assets/images/login.png)

#### Halaman Utama
![Preview Website](assets/images/home.png)

#### Halaman Managemen Jenis Layanan
![Preview Website](assets/images/jenis%20layanan.png)

#### Halaman Managemen Jenis Laundry Satuan
![Preview Website](assets/images/jenis%20laundry%20satuan.png)

#### Halaman Managemen Jenis Laundry Kiloan
![Preview Website](assets/images/jenis%20laundry%20kiloan.png)

#### Halaman managemen Pelanggan
![Preview Website](assets/images/managemen%20pelanggan.png)

#### Halaman Transaksi
![Preview Website](assets/images/transaksi%20baru.png)

#### Halaman Hasil Transaksi Berhasil
![Preview Website](assets/images/transaksi%20berhasil.png)

#### Halaman Hasil Transaksi 
![Preview Website](assets/images/hasil%20transaksi.png)

---

## Informasi Kontak
Jika Anda tertarik bekerja sama atau memiliki pertanyaan, hubungi saya:
- Email: suriapratama0job@gmail.com
- WhatsApp: +62 831-9026-0337
- Lokasi: Cikarang, Indonesia

---

## Lisensi
Proyek ini dilisensikan di bawah **MIT License**. Lihat file [LICENSE](LICENSE) untuk detail.

---

## Tautan Sosial
Terhubung dengan saya di:
- [LinkedIn](https://www.linkedin.com/in/suria-pratama-97805434b/)
- [Twitter](https://x.com/SuriaPratama0)
- [Instagram](https://www.instagram.com/suria_pratama0/)
- [Dribbble]

---

## Ucapan Terima Kasih
- Font Awesome: Ikon yang digunakan untuk mempercantik tampilan antarmuka.
- Bootstrap: Framework CSS yang membantu membuat desain responsif dan konsisten.
- Inspirasi dari berbagai aplikasi laundry dan sistem manajemen bisnis.
- Terima kasih untuk semua masukan, dukungan, dan bantuan selama pengembangan proyek ini.
