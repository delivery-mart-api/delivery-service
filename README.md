# Delivery System

Sistem Delivery adalah aplikasi web berbasis PHP yang dirancang untuk mengelola transaksi customer dan supermarket lalu menyediakan pesan antar. Berikut adalah panduan singkat untuk menggunakan sistem ini.

## Persyaratan Sistem

Pastikan sistem memenuhi persyaratan berikut sebelum menggunakan aplikasi:

- PHP versi 7.3 atau lebih tinggi.
- Web server (disarankan menggunakan Apache atau Nginx).
- MySQL database.

## Instalasi

1. Clone repositori dari [GitHub](https://github.com/delivery-mart-api/delivery-service) ke direktori lokal Anda.

    ```bash
    git clone https://github.com/delivery-mart-api/delivery-service.git
    ```

2. Buka terminal dan pindah ke direktori proyek.

    ```bash
    cd delivery-service
    ```

3. Buat dan buka file `.env` menggunakan editor teks dan sesuaikan pengaturan berikut sesuai dengan konfigurasi database Anda.

    ```env
    CI_ENVIRONMENT = production

    database.default.hostname = localhost
    database.default.database = delivery
    database.default.username = root
    database.default.password = 
    database.default.DBDriver = MySQLi
    database.default.DBPrefix =
    database.default.port = 3306
    ```

4. Jalankan migrasi database untuk membuat skema tabel.

    ```bash
    php spark migrate
    ```
5. Jalankan seeder database untuk mengisi tabel.

    ```bash
    php spark db:seed AllSeeder
    ```

6. Jalankan aplikasi pada port 8080.

    ```bash
    php spark serve
    atau
    php spark serve --port 8080
    ```

## Mengakses Aplikasi

Buka browser web Anda dan akses aplikasi melalui [http://localhost:8080](http://localhost:8080). Pastikan web server Anda berjalan dengan benar.

## Masuk ke Aplikasi

Gunakan kredensial yang sesuai untuk masuk ke aplikasi:

Login sebagai customer : 
- **Username**: 081912345678
- **Password**: password

## Panduan Pengguna

- **Customer**: Customer dapat melakukan order produk ke supermarket tertentu, mengedit profile, dan melihat transaksi historis ordernya.
