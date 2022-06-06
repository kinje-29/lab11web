
### Nama    : Fajar Firmansyah
### Nim     : 312010309
### Kelas   : TI.20.A2

# Praktikum 11: PHP Framework (Codeigniter)



### Instruksi Praktikum
1. Persiapkan text editor misalnya VSCode.
2. Buat folder baru dengan nama lab11_php_ci pada docroot webserver (htdocs)
3. Ikuti langkah-langkah praktikum yang akan dijelaskan berikutnya.

### Langkah-langkah Praktikum
#### Persiapan

Sebelum memulai menggunakan Framework Codeigniter, perlu dilakukan konfigurasi pada webserver. Beberapa ekstensi PHP perlu diaktifkan untuk kebutuhan pengembangan Codeigniter 4.

Berikut beberapa ekstensi yang perlu diaktifkan:
• php-json ekstension untuk bekerja dengan JSON;
• php-mysqlnd native driver untuk MySQL;
• php-xml ekstension untuk bekerja dengan XML;
• php-intl ekstensi untuk membuat aplikasi multibahasa;
• libcurl (opsional), jika ingin pakai Curl.

Untuk mengaktifkan ekstentsi tersebut, melalu XAMPP Control Panel, pada bagian Apache klik Config -> PHP.ini






### Instalasi Codeigniter 4

Untuk melakukan instalasi Codeigniter 4 dapat dilakukan dengan dua cara, yaitu cara manual dan menggunakan composer. Pada praktikum ini kita menggunakan cara manual.

• Unduh Codeigniter dari website https://codeigniter.com/download
• Extrak file zip Codeigniter ke direktori htdocs/lab11_ci.
• Ubah nama direktory framework-4.x.xx menjadi ci4.
• Buka browser dengan alamat http://localhost/lab11_ci/ci4/public/

![webcd.png](img/webcd.png)

### Menjalankan CLI (Command Line Interface)

Codeigniter 4 menyediakan CLI untuk mempermudah proses development. Untuk mengakses CLI buka terminal/command prompt.

Arahkan lokasi direktori sesuai dengan direktori kerja project dibuat (xampp/htdocs/lab11_ci/ci4/)

Perintah yang dapat dijalankan untuk memanggil CLI Codeigniter adalah:

![php_spark.png](img/php_spark.png)

Mengaktifkan Mode Debugging
Codeigniter 4 menyediakan fitur debugging untuk memudahkan developer untuk mengetahui pesan error apabila terjadi kesalahan dalam membuat kode program.

Secara default fitur ini belum aktif. Ketika terjadi error pada aplikasi akan ditampilkan pesan kesalahan seperti berikut.


Semua jenis error akan ditampilkan sama. Untuk memudahkan mengetahui jenis errornya, maka perlu diaktifkan mode debugging dengan mengubah nilai konfigurasi pada environment variable CI_ENVIRINMENT menjadi development.

![env.png](img/env.png)

Ubah nama file env menjadi .env kemudian buka file tersebut dan ubah nilai variable CI_ENVIRINMENT menjadi development.

![pesan.png](img/pesan.png)

Contoh error yang terjadi. Untuk mencoba error tersebut, ubah kode pada file app/Controller/Home.php hilangkan titik koma pada akhir kode.

![pesan1.png](img/pesan1.png)

### Struktur Direktori

Untuk lebih memahami Framework Codeigniter 4 perlu mengetahui struktur direktori dan file yang ada. Buka pada Windows Explorer atau dari Visual Studio Code -> Open Folder.

Terdapat beberapa direktori dan file yang perlu dipahami fungsi dan kegunaannya.
• .github folder ini kita butuhkan untuk konfigurasi repo github, seperti konfigurasi untuk build dengan github action;
• app folder ini akan berisi kode dari aplikasi yang kita kembangkan;
• public folder ini berisi file yang bisa diakses oleh publik, seperti file index.php, robots.txt, favicon.ico, ads.txt, dll;
• tests folder ini berisi kode untuk melakukan testing dengna PHPunit;
• vendor folder ini berisi library yang dibutuhkan oleh aplikasi, isinya juga termasuk kode core dari system CI.
• writable folder ini berisi file yang ditulis oleh aplikasi. Nantinya, kita bisa pakai untuk menyimpan file yang di-upload, logs, session, dll.
Sedangkan file-file yang berada pada root direktori CI sebagai berikut.
• .env adalah file yang berisi variabel environment yang dibutuhkan oleh aplikasi.
• .gitignore adalah file yang berisi daftar nama file dan folder yang akan diabaikan oleh Git.
• build adalah script untuk mengubah versi codeigniter yang digunakan. Ada versi release (stabil) dan development (labil).
• composer.json adalah file JSON yang berisi informasi tentang proyek dan daftar library yang dibutuhkannya. File ini digunakan oleh Composer sebagai acuan.
• composer.lock adalah file yang berisi informasi versi dari libraray yang digunakan aplikasi.
• license.txt adalah file yang berisi penjelasan tentang lisensi Codeigniter;
• phpunit.xml.dist adalah file XML yang berisi konfigurasi untuk PHPunit.
• README.md adalah file keterangan tentang codebase CI. Ini biasanya akan dibutuhkan pada repo github atau gitlab.
• spark adalah program atau script yang berfungsi untuk menjalankan server, generate kode, dll.

Fokus kita pada folder app, dimana folder tersebut adalah area kerja kita untuk membuat aplikasi. Dan folder public untuk menyimpan aset web seperti css, gambar, javascript, dll.


### Routing dan Controller

Routing merupakan proses yang mengatur arah atau rute dari request untuk menentukan fungsi/bagian mana yang akan memproses request tersebut. Pada framework CI4, routing bertujuan untuk menentukan Controller mana yang harus merespon sebuah request. Controller adalah class atau script yang bertanggung jawab merespon sebuah request.

Pada Codeigniter, request yang diterima oleh file index.php akan diarahkan ke Router untuk meudian oleh router tesebut diarahkan ke Controller.

Router terletak pada file app/config/Routes.php

![routes.png](img/routes.png)

Untuk mengetahui route yang ditambahkan sudah benar, buka CLI dan jalankan perintah berikut.

![routes1.png](img/routes1.png)

Selanjutnya coba akses route yang telah dibuat dengan mengakses alamat url http://localhost:8080/about

![about.png](img/about.png)

Ketika diakses akan mucul tampilan error 404 file not found, itu artinya file/page tersebut tidak ada. Untuk dapat mengakses halaman tersebut, harus dibuat terlebih dahulu Contoller yang sesuai dengan routing yang dibuat yaitu Contoller Page.

### Membuat Controller

Selanjutnya adalah membuat Controller Page. Buat file baru dengan nama page.php pada direktori Controller kemudian isi kodenya seperti berikut.

![page.png](img/page.png)

Selanjutnya refresh Kembali browser, maka akan ditampilkan hasilnya yaotu halaman sudah dapat diakses.

![about1.png](img/about1.png)


### Auto Routing

Secara default fitur autoroute pada Codeiginiter sudah aktif. Untuk mengubah status autoroute dapat mengubah nilai variabelnya. Untuk menonaktifkan ubah nilai true menjadi false.

Tambahkan method baru pada Controller Page seperti berikut.

![tos.png](img/tos.png)

Method ini belum ada pada routing, sehingga cara mengaksesnya dengan menggunakan alamat: http://localhost:8080/page/tos

![tos1.png](img/tos1.png)

### Membuat View

Selanjutnya adalam membuat view untuk tampilan web agar lebih menarik. Buat file baru dengan nama about.php pada direktori view (app/view/about.php) kemudian isi kodenya seperti berikut.

![aboutphp.png](img/aboutphp.png)

Ubah method about pada class Controller Page menjadi seperti berikut:

![control_about.png](img/control_about.png)

Kemudian lakukan refresh pada halaman tersebut.

![halaman_about.png](img/halaman_about.png)

### Membuat Layout Web dengan CSS

Pada dasarnya layout web dengan css dapat diimplamentasikan dengan mudah pada codeigniter. Yang perlu diketahui adalah, pada Codeigniter 4 file yang menyimpan asset css dan javascript terletak pada direktori public.

Buat file css pada direktori public dengan nama style.css (copy file dari praktikum lab4_layout. Kita akan gunakan layout yang pernah dibuat pada praktikum 4.

![css.png](img/css.png)

Kemudian buat folder template pada direktori view kemudian buat file header.php dan footer.php

### Header

![header.png](img/header.png)

### Footer

![footer.png](img/footer.png)

Kemudian ubah file app/view/about.php seperti berikut.

![about2.png](img/about2.png)

Selanjutnya refresh tampilan pada alamat http://localhost:8080/about

![akhir.png](img/akhir.png)


# Pertanyaan dan Tugas

Lengkapi kode program untuk menu lainnya yang ada pada Controller Page, sehingga semua link pada navigasi header dapat menampilkan tampilan dengan layout yang sama.

Laporan Praktikum
1. Buatlah repository baru dengan nama Lab11Web.
2. Kerjakan semua latihan yang diberikan sesuai urutannya.
3. Screenshot setiap perubahannya.
4. Buatlah file README.md dan tuliskan penjelasan dari setiap langkah praktikum beserta screenshotnya.
5. Commit hasilnya pada repository masing-masing.
6. Kirim URL repository pada e-learning ecampus

### Tugas

Pada bagian views buat file baru dengan nama contact.php lalu isi kode seperti berikut

![kontak.png](img/kontak.png)

Pada bagian views buat file baru dengan nama artikel.php lalu isi kode seperti berikut

![arikel.php](img/artikel.png)

Pada Bagian Controllers Page.php rubah bagian contact dan buat parameter baru seperti dibawah ini

![artikel1.png](img/artikel1.png)

Pada Bagiab Routes.php tambah kode seperti berikut

![artikel2.png](img/artikel2.png)

lalu akses link dibawah ini 
http://localhost:8080/artikel

![akhir_artikel.png](img/akhir_artikel.png)

Membuat File index.php di bagian views

![index.png](img/index.png)

Merubah isi Home.php pada bagian Controllers

![home.png](img/home.png)

lalu akses link http://localhost:8080/

![home1.png](img/home1.png)