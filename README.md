## Author
Kerem Özen B241210057 - Bilgisayar Mühendisliği 1. Sınıf A grubu

## Tech stack
php(8.1.2) - sqlite3 - bootstrap

## File structure
### index.php
Route'lari manage eden dosya. Aynı zamanda template'ler için global değişkenleri import ediyor.

### auth.php
Session check'leri yapan fonksiyonlar ve değişkenler barındırıyor.

### icons/
SVG'lerimi color olarak currentColor kullandığı için (bu hover effecti sağlıyor ve static değil)\
bu klasöre yerleştirdim ve php kısmında bu svgleri inline olarak HTML'ye gömdüm.

### static/
Static dosyalarım.

### views/
Template'lerim.

## Running server
WSL ortamında Ubuntu 22.04 kullanarak sunucumu çalıştırdım.
>php -S ip:port