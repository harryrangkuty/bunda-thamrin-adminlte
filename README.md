# SIMRS With Laravel + AdminLTE

Sebuah proyek berbasis Laravel 11 yang menggunakan Laravel Breeze sebagai starter kit autentikasi, serta integrasi tema AdminLTE 4 untuk tampilan admin panel.

![1  Landing Page](https://github.com/user-attachments/assets/875e06f3-7b69-4a69-903c-315052bff63f)

----

# Teknologi yang Dipakai :
   - Laravel 11
   - Laravel Breeze
   - AdminLte 4.0.0-Beta3 Package
   - Maatwebsite/excel 3.1
   - barryvdh/laravel-dompdf 3.1
   - Laravel Sanctum 4.0

# Database
DB dapat didownload di : https://drive.google.com/drive/folders/1uQnerQoai6aSXpbdSLK4h2HoTWcdhFU-?usp=drive_link

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

# Screenshot
![3  Data Pasien](https://github.com/user-attachments/assets/adc8aa0d-5f0c-4152-b0be-050414f81d3f)
![4 Create Data Pasien](https://github.com/user-attachments/assets/c667670e-9e2d-4de3-baef-d02f657a159a)
![5 Edit Data Pasien](https://github.com/user-attachments/assets/f71a8387-5baa-4bf6-9a0c-f65aa3a45d51)
![6  Data Pendaftaran](https://github.com/user-attachments/assets/73b746e9-25eb-4861-8c30-0075fbe4af26)
![7  Hasil Export Data Pendaftaran PDF](https://github.com/user-attachments/assets/ee7e1e39-dfcd-49f8-9463-0c07c94d6d2f)
