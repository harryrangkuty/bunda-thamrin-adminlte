# SIMRS With Laravel + AdminLTE

Sebuah proyek berbasis Laravel 11 yang menggunakan Laravel Breeze sebagai starter kit autentikasi, serta integrasi tema AdminLTE 4 untuk tampilan admin panel.
![Uploading 1. Landing Page.png…]()

----

# Teknologi yang Dipakai :
   - Laravel 11
   - Laravel Breeze
   - AdminLte 4.0.0-Beta3 Package
   - Maatwebsite/excel 3.1
   - barryvdh/laravel-dompdf 3.1
   - Laravel Sanctum 4.0

# Database
Dokumentasi dapat didownload di : https://drive.google.com/file/d/1Wn4FOlXm_XU1ba6T79DG1jSBq5uyH2QP/view?usp=sharing

# Instalasi:
1. git clone <repo>
2. composer install
3. cp .env.example .env
4. ganti db_connection dari sqlite ke mysql seperti dibawah ini :

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=bunda_thamrin_lte
DB_USERNAME=root
DB_PASSWORD=

(Opsional) Ganti App_Name menjadi :
APP_NAME='SIMRS Bunda Thamrin'

4. php artisan key:generate
5. npm install
6. npm run build
7. php artisan serve

# Dokumentasi API Pasien
1. Daftar Pasien  
**Endpoint : GET** `/patients`  
Query opsional:  
- `from_date=YYYY-MM-DD`  
- `to_date=YYYY-MM-DD`  

Contoh : /api/patients?from_date=2025-05-01&to_date=2025-05-23

2. Daftar Pasien Terdaftar  
**Endpoint : GET** `/patients/registered`

Contoh : /api/patients.registered


# Dokumentasi (Screenshot) Sistem
Dokumentasi dapat diakses di : https://drive.google.com/drive/folders/1TtSY2mUkv2EikJpP8ZfZZCAMO_4LIU7Z?usp=drive_link
