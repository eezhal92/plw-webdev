## plw-webdev (Community Social Blog)

###Cara install

* Menggunakan terminal atau command prompt, clone repo ini ke lokal dengan command `git clone <url>`, kemudian masuk ke direktori aplikasi.
* Eksekusi perintah `composer install`.
* Eksekusi perintah `composer update`.
* Copy file .env.example ke .env. Ekseskusi perintah `cp .env.example .env`
* Setelah berhasil, edit file `.env` sesuai konfigurasi di local machine.
* Daftar app di [Github.](https://github.com/settings/applications/new)
* [PENTING] Masukkan `GITHUB_CLIENT_ID`, `GITHUB_CLIENT_SECRET`, dan `GITHUB_REDIRECT` di file `.env`. Jika bingung, lihat di [docs Laravel.](http://laravel.com/docs/5.1/authentication#social-authentication)
* Migrate dan seed database, eksekusi perintah `php artisan migrate --seed`.
* Generate key, eksekusi perintah `php key:generate`.
* Serve app di local `php artisan serve`.

> **Note:**

> - Yang pertama kali login menggunakan Github akan menjadi Admin. Check di `app\Http\Controllers\Auth\AuthController` pada method `findOrCreateUser`
