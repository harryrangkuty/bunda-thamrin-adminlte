# Teknologi yang Dipakai :
   - Laravel 11
   - Laravel Breeze (Blade only tanpa tailwind)
   - AdminLte 4 Package

# Instalasi:
1. git clone <repo>
2. composer install
3. php artisan key:generate
4. npm install
5. npm run build
6. php artisan serve


# Dokumentasi API Pasien

1. Daftar Pasien  
**GET** `/patients`  
Query opsional:  
- `from_date=YYYY-MM-DD`  
- `to_date=YYYY-MM-DD`  

Contoh : /api/patients?from_date=2025-05-01&to_date=2025-05-23

2. Daftar Pasien Terdaftar  
**GET** `/patients/registered`