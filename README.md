## Author
Kerem Özen B241210057 - Bilgisayar Mühendisliği 1. Sınıf A grubu
Public git repo: https://https://github.com/kerezemn/phpblog
Live at: https://kblog.rf.gd

## Tech stack
php(8.1.2) - sqlite3 - bootstrap

## Database
'db.sqlite3' Dosyası şu şekilde oluşturuluyor: 

`CREATE TABLE IF NOT EXISTS contact_messages (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    ad TEXT,
    soyad TEXT,
    email TEXT,
    tel TEXT,
    konu TEXT,
    mesaj TEXT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
)`

## File structure
### index.php
Route'lari manage eden dosya. Aynı zamanda template'ler için ana değişkenleri ve fonksiyonları (auth.php'dekiler gibi) import ediyor.

### auth.php
Session check'leri yapan fonksiyonlar ve değişkenler barındırıyor.

### icons/
SVG'lerimi color olarak currentColor kullandığı için (bu hover effecti sağlıyor ve static değil)
bu klasöre yerleştirdim ve php kısmında bu svgleri inline olarak HTML'ye gömdüm.

### static/
Static dosyalar.

### views/
Template'ler. 'layout.php' dosyası diğer template'ler tarafından extends'leniyor. Bu şekilde DRY prensibine uyumlu bir yapı sunuluyor.

## Running server
WSL2 ortamında Ubuntu 22.04 kullanarak sunucumu çalıştırdım.
>php -S ip:port

Ardından infinityfree'de hostlattım (tek php ile view kullandığım için .htaccess yazmam gerekti)

## Notes
İletişim formu gönderdikten sonra formu göstermeyi yanlışlıkla admin panel yapmam gerek olarak algıladım ve giriş yapan kullanıcı için yollanan contact formlarını table şeklinde gösteren admin panel yaptım.

## Endpoints

### /
![hakkimda ss](/examples/home.png)

### /cv
![cv ss](/examples/cv.png)

### /contact
![contact ss](/examples/contact.png)

### /my-city
![my city ss](/examples/city.png)

### /my-team
![my team ss](/examples/team.png)

### /my-interests
![my interests ss](/examples/interests.png)

### /login
![login ss](/examples/login.png)

### /admin
![admin ss](/examples/admin.png)
