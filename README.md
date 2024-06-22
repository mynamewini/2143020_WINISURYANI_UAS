# Rotiku - Toko Roti berbasis web

> Rotiku adalah sebuah aplikasi berbasis web yang digunakan untuk mempermudah pemesanan roti secara online. Aplikasi ini dibuat menggunakan framework Laravel 10 dan MySQL sebagai database.

<table>
    <tr>
        <td><img src="https://github.com/andikatuluspangestu/rotiku/assets/62005221/f8cc070e-5508-4a7e-b877-cd2d7dc051fc" alt="Image 1"></td>
        <td><img src="https://github.com/andikatuluspangestu/rotiku/assets/62005221/d6746f68-a28c-44b5-a4c8-cab8ab45d249" alt="Image 2"></td>
        <td><img src="https://github.com/andikatuluspangestu/rotiku/assets/62005221/bbe7db4a-fff4-4544-979d-ab84c923eec4" alt="Image 3"></td>
    </tr>
</table>

## Fitur-fitur
- Pemesanan roti
- Melihat daftar roti
- Melihat detail roti
- Melihat riwayat pemesanan
- Multi Role User (Admin, Kasir, Pelanggan)
- Dll.

## Instalasi
1. Clone repository atau Download ZIP
2. Extract file ZIP
3. Buka terminal dan arahkan ke folder project
4. Install dependencies dengan perintah : 

```bash
composer install
```

5. Copy file `.env.example` menjadi `.env`
6. Generate key baru dengan perintah :

```bash
php artisan key:generate
```

7. Buat database baru di MySQL
8. Konfigurasi file `.env` sesuai dengan database yang telah dibuat
9. Migrate database dengan perintah :

```bash
php artisan migrate
```

10. Buat Storage Link dengan perintah :

```bash
php artisan storage:link
```

11. Import Data Dummy dengan Seeder :

```bash
php artisan db:seed
```

12. Jalankan aplikasi dengan perintah :

```bash
php artisan serve
```

13. Buka browser dan akses `http://localhost:8000`

## LICENSE
This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details and [CONTRIBUTING](CONTRIBUTING.md) for contribution guidelines. Developed with ❤️ by Andika Tulus Pangestu.
