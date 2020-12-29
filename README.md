# Simple App

## Keterangan Base Project 
- Untuk dokumentasi php nya bisa pake [Dokumentasi laravel](https://laravel.com/docs) 

## Cara instalasi
- Pastikan webserver tersedia (apache, nginx, dll)
- PHP dan Composer sudah terinstall
- Clone projek 
- Jalan kan `composer install`
- Buat database dengan nama apa saja, sesuai project
- Buat file `.env`, isi nya copas dari file `.env.example`
- konfigurasi database :
  ```
  DB_CONNECTION=mysql
  DB_HOST=127.0.0.1
  DB_PORT=3306
  DB_DATABASE=nama_database
  DB_USERNAME=root
  DB_PASSWORD=
  ```
- Jalankan `php artisan key:generate` di terminal / cmd nya 
- `php artisan migrate --seed` untuk data default si aplikasi nya 
- Jalankan aplikasinya dengan menjalankan `php artisan serve` di terminal / cmd
- user default nya
  <table border="1">
    <tr>
      <th>No</th>
      <th>Email</th>
      <th>Password</th>
    </tr>
    <tr>
      <td>1</td>
      <td>admin@gmail.com</td>
      <td>admin123</td>
    </tr>
  </table>
- jalankan `php artisan storage:link`
- Selamat mencoba