### Persyaratan

-   **PHP** (versi 8.x atau lebih baru)
-   **Composer** untuk manajemen dependensi PHP
-   **MySQL** atau database lain yang kompatibel
-   **Laravel** yang terpasang

### Langkah 1: Menyiapkan Backend (Laravel)

1. **Clone repository ini**:

```bash
   git clone https://github.com/username/repository-name.git
   cd siat
```

2. **Install dependensi PHP:**:
   Di dalam direktori proyek, jalankan perintah berikut untuk menginstal dependensi Laravel:

```bash
   composer install
```

3. **Buat file .env:**:
   Salin file .env.example menjadi .env:

```bash
cp .env.example .env
```

4. **Konfigurasi database:**:
   Edit file .env dan sesuaikan pengaturan database:

```bash
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=nama_database
   DB_USERNAME=root
   DB_PASSWORD=
```

5. **Generate key aplikasi:**:
   Jalankan perintah untuk menghasilkan key Laravel:

```bash
   php artisan key:generate
```

6. **Migrasi dan Seed database:**:
   Jalankan migrasi untuk membuat tabel yang diperlukan di database:

```bash
   php artisan migrate
```

7. **Import db:**:
   Import File wilayah_indonesia.sql ke db anda

8. **Jalakan Server**:
   Menjalankan server Laravel:

```bash
   php artisan serve
```

### note:

Pastikan untuk menyesuaikan dengan struktur dan nama-nama file di proyek Anda.
