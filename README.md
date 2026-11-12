# PSB Santri

Aplikasi web Penerimaan Santri Baru (PSB) berbasis **CodeIgniter 4**. Database dibuat lewat **migration** dan datanya diisi lewat **seeder**, jadi tidak perlu impor/ekspor file `.sql`.

## Kebutuhan Sistem

Project ini dikembangkan dan dites dengan versi berikut. Versi yang sama atau lebih baru sebaiknya aman.

| Kebutuhan | Versi |
|-----------|-------|
| XAMPP | 8.2.12 (sudah termasuk PHP dan MariaDB) |
| PHP | 8.2 atau lebih baru |
| MariaDB / MySQL | MariaDB 10.4 atau lebih baru (MySQL 5.7+ juga bisa) |
| Composer | 2.x |
| Git | versi terbaru |
| CodeIgniter | 4.7.0 (terpasang otomatis lewat Composer) |

Ekstensi PHP yang harus aktif: `intl`, `mbstring`, `mysqlnd`, `curl`, `json`.
Cek dengan perintah `php -m`. Kalau `intl` belum ada, buka `C:\xampp\php\php.ini`, hapus tanda `;` di depan `extension=intl`, lalu restart Apache.

## Langkah Instalasi

### 1. Clone project

Masuk ke folder `htdocs` XAMPP, lalu clone:

```powershell
cd C:\xampp\htdocs
git clone <URL-REPOSITORY-GITHUB> psb-santri
cd psb-santri
```

### 2. Install dependensi

```powershell
composer install
```

### 3. Nyalakan MySQL

Buka **XAMPP Control Panel**, klik **Start** pada **Apache** dan **MySQL**.

### 4. Siapkan file `.env`

Salin file contoh `env` menjadi `.env`:

```powershell
copy env .env
```

Buka `.env`, cari bagian berikut, hapus tanda `#` di depannya, lalu sesuaikan:

```ini
CI_ENVIRONMENT = development

app.baseURL = 'http://localhost:8080/'

database.default.hostname = localhost
database.default.database = psb_santri
database.default.username = root
database.default.password =
database.default.DBDriver = MySQLi
database.default.port = 3306
```

> Password `root` bawaan XAMPP kosong. Kalau MySQL kamu memakai password, isi di `database.default.password`.

### 5. Buat database kosong

```powershell
php spark db:create psb_santri
```

Atau lewat phpMyAdmin (`http://localhost/phpmyadmin`): klik **Baru**, isi nama `psb_santri`, pilih collation `utf8mb4_general_ci`, lalu **Buat**.

### 6. Jalankan migration

Perintah ini membuat semua tabel secara otomatis:

```powershell
php spark migrate
```

### 7. Jalankan seeder

Perintah ini mengisi data awal (akun admin, akun pimpinan, dan informasi PSB):

```powershell
php spark db:seed DatabaseSeeder
```

> Jalankan seeder **sekali saja** pada database yang masih kosong. Kalau dijalankan lagi, akan muncul error *Duplicate entry*. Untuk mengulang dari awal:
> ```powershell
> php spark migrate:refresh
> php spark db:seed DatabaseSeeder
> ```
> Perintah `migrate:refresh` **menghapus semua data**.

### 8. Jalankan aplikasi

```powershell
php spark serve
```

Buka di browser: **http://localhost:8080**

## Akun Bawaan (dari Seeder)

| Role | Username | Password |
|------|----------|----------|
| Admin | `admin` | `admin123` |
| Pimpinan | `pimpinan` | `pimpinan123` |

Akun santri/pendaftar dibuat lewat halaman pendaftaran di aplikasi.

> Ganti password bawaan ini kalau aplikasi dipakai di server sungguhan.

## Ringkasan Perintah

```powershell
git clone <URL-REPOSITORY-GITHUB> psb-santri
cd psb-santri
composer install
copy env .env
# edit .env (baseURL dan database)
php spark db:create psb_santri
php spark migrate
php spark db:seed DatabaseSeeder
php spark serve
```

## Masalah Umum

| Masalah | Penyebab dan solusi |
|---------|---------------------|
| `Could not open input file: spark` | Terminal belum ada di folder project. Jalankan `cd` ke folder `psb-santri`. |
| `Unable to connect to the database` | MySQL belum di-Start di XAMPP, atau isi `.env` salah. |
| `Unknown database 'psb_santri'` | Database belum dibuat. Jalankan langkah 5. |
| `Class "Locale" not found` / error `intl` | Aktifkan `extension=intl` di `php.ini`, lalu restart Apache. |
| `Duplicate entry` saat seed | Seeder sudah pernah dijalankan. Lihat catatan di langkah 7. |
| Folder `vendor` tidak ada | Jalankan `composer install`. |
