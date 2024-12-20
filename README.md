# SIMPLE PAYMENT GATEWAY (FE)

## Perkenalan
Ini adalah aplikasi gateway pembayaran sederhana bagian frontend/client yang dibuat menggunakan laravel. Aplikasi ini dibuat dengan tujuan untuk memenuhi kebutuhan teknis/coding tes di PT Kode Kolektif Indonesia.

## Cara Instalasi
Aplikasi ini dapat diinstal pada server lokal maupun online dengan spesifikasi berikut:

### Kebutuhan Server
1. Minimal PHP 8.2 (dan sesuai dengan [persyaratan server Laravel 11.x](https://laravel.com/docs/11.x/deployment#server-requirements)).
2. Database MySQL atau MariaDB.

### Langkah Instalasi
1. Install & jalankan aplikasi [simple-payment-gateway](https://github.com/agasigp/simple-payment-gateway.git) terlebih dahulu
2. Clone repositori ini dengan perintah: `git clone https://github.com/agasigp/pg-fe.git`
3. Masuk ke direktori pg-fe: `$ cd pg-fe`
4. Instal dependensi menggunakan: `$ composer install`
5. Salin berkas `.env.example` ke `.env`: `$ cp .env.example .env`
6. Generate kunci aplikasi: `$ php artisan key:generate`
7. Buat database MySQL untuk aplikasi ini.
8. Konfigurasi database dan pengaturan lainnya yang dibutuhkan di berkas `.env`.
    ```
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=laravel
    DB_USERNAME=nama_db
    DB_PASSWORD=username_db
    PG_BASE_URL=http://localhost:8000/api
    ```
    Untuk `PG_BASE_URL`, isikan dengan alamat aplikasi backend yang berjalan, dalam hal ini http://localhost:8000/api jika aplikasi berjalan di lokal.
9. Jalankan migrasi database: `$ php artisan migrate --seed`.
10. Mulai server: `$ php artisan serve`
11. Untuk menjalankan queue:worker supaya fungsi queue bisa berjalan, silahkan jalankan perintah berikut : `$ php artisan queue:work`.
12. Untuk akses aplikasi, bisa melalui alamat [http://localhost:8001/](http://localhost:8000/api). Akun/user yang bisa digunakana untuk masuk adalah `test@example.com` / `password`.
13. Akses menu deposit untuk melakukan input transaksi (withdraw/deposit).
