# SIMRS With Laravel + AdminLTE

Sebuah proyek berbasis Laravel 11 yang menggunakan Laravel Breeze sebagai starter kit autentikasi, serta integrasi tema AdminLTE 4 untuk tampilan admin panel.

----

# Teknologi yang Dipakai :
   - Laravel 11
   - Laravel Breeze
   - AdminLte 4.0.0-Beta3 Package
   - Maatwebsite/excel 3.1
   - barryvdh/laravel-dompdf 3.1
   - Laravel Sanctum 4.0

# Instalasi:
1. git clone <repo>
2. composer install
3. php artisan key:generate
4. npm install
5. npm run build
6. php artisan serve


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