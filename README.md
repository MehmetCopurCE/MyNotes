# MyNotes
<img src="assets/logos/mynotes.png" width="200"> 

**MyNotes**, PHP ile geliştirilmiş, basit ve işlevsel bir not alma uygulamasıdır. Bu proje, PHP arka uç geliştirme sürecini öğrenmek ve REST API kullanımı deneyimini kazanmak amacıyla oluşturulmuştur. Kullanıcılar bu uygulama sayesinde not ekleme, düzenleme, silme ve listeleme işlemlerini kolayca gerçekleştirebilirler. Composer paket yönetim sistemi ve testler için Pest framework’ü kullanılarak modern bir PHP geliştirme yaklaşımı benimsenmiştir.

## Özellikler

- Kullanıcı Kayıt Olma ve Giriş Yapma: Kullanıcılar hesap oluşturabilir ve giriş yapabilir.
- Not Yönetimi: Not ekleme, düzenleme, silme ve listeleme işlemleri REST API ile yapılır.
- Basit ve Fonksiyonel Arayüz: Kullanıcı dostu arayüz ile basit bir kullanım sunar.
- MySQL Veritabanı: Notlar MySQL veritabanında saklanır.

## Kullanılan Teknolojiler ve Araçlar

- **PHP**: Backend geliştirme dili
- **Composer**: PHP için bağımlılık yönetimi
- **Pest**: PHP uygulamaları için test framework'ü
- **MySQL**: Veritabanı yönetim sistemi
- **REST API**: Uygulama içi not işlemleri için kullanılan API yapısı.


## Dosya Yapısı

```
MyNotes
├── assets
│   ├── images
│   └── logos
├── Core
│   ├── Middleware
│   ├── Router.php
│   └── Validator.php
│   └── Database.php
├── Http
│   ├── Controllers
│   ├── forms
├── public
│   └── index.php
├── tests
│   ├── Feature
│   └── Unit
├── vendor
├── views
├── .gitignore
├── bootstrap.php
├── composer.json
├── composer.lock
├── config.php
├── README.md
└── routes.php
```

## Kurulum

Projeyi kendi bilgisayarınızda çalıştırmak için aşağıdaki adımları takip edebilirsiniz.

### Gereksinimler

- PHP 7.4 veya üzeri 
- MySQL veritabanı 
- Composer
- Pest test framework’ü

<img src="assets/logos/php.png" width="100" style="margin-right: 20px;"> <img src="assets/logos/composer.png" width="70" style="margin-right: 20px;"> <img src="assets/logos/mysql.png" width="100" style="margin-right: 20px;"> <img src="assets/logos/pest.png" width="130" style="margin-right: 20px;">

### Adım 1: Depoyu klonlayın

```bash
git clone https://github.com/MehmetCopurCE/MyNotes.git
cd MyNotes
```

### Adım 2: Composer ile bağımlılıkları yükleyin
Eğer Composer sisteminizde kurulu değilse, aşağıdaki komutları kullanarak Composer’ı yükleyin:

```bash
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === 'dac665fdc30fdd8ec78b38b9800061b4150413ff2e3b6f88543c636f7cd84f6db9189d43a81e5503cda447da73c7e5b6') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"
```

Kurulum tamamlandıktan sonra, proje bağımlılıklarını yüklemek için şu komutu çalıştırın:

```bash
composer install
```

### Adım 3: Pest test framework’ünü yükleyin
Pest test framework’ü yüklemek için aşağıdaki komutu çalıştırın:

```bash
composer remove phpunit/phpunit
composer require pestphp/pest --dev --with-all-dependencies
```

### Adım 4: Veritabanı Kurulumu
Bu proje Laravel veya başka bir framework kullanmadan saf PHP ile geliştirilmiştir. Bu yüzden veritabanı tablolarını otomatik olarak oluşturmak için bir migrate komutu bulunmamaktadır. Tabloları oluşturmak için aşağıdaki SQL komutlarını kullanabilirsiniz.

#### 1) Veritabanı oluşturun
Öncelikle bir veritabanı oluşturun. Bu örnekte veritabanı adı PhpDemo olarak belirlenmiştir:

```sql
CREATE DATABASE PhpDemo;
USE PhpDemo;
```

#### 2) Tabloları oluşturun
Aşağıdaki SQL komutlarını kullanarak users ve notes tablolarını oluşturabilirsiniz:

```sql
CREATE TABLE users (
                       user_id INT AUTO_INCREMENT PRIMARY KEY,
                       email VARCHAR(100) NOT NULL UNIQUE,
                       password VARCHAR(255) NOT NULL,
                       created_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE notes (
                       id INT AUTO_INCREMENT PRIMARY KEY,
                       body TEXT NOT NULL,
                       user_id INT,
                       created_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                       FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE
);
```
Not: ON DELETE CASCADE ifadesi, bir kullanıcı silindiğinde o kullanıcıya ait tüm notların da otomatik olarak silinmesini sağlar.

### Adım 5: Veritabanı Bağlantı Ayarlarını Yapın
`config.php` dosyasını açarak aşağıdaki bağlantı bilgilerini güncelleyin:
```bash
    'database' => [
        'host' => 'localhost',
        'port' => '3306',
        'dbname' => 'PhpDemo',
        'user' => 'root',
        'password' => 'your_password'
    ]
```

### Adım 6: Sunucuyu Başlatın
```bash
php -S localhost:8000 -t public
```

### Adım 7: Uygulamayı Kullanın
Tarayıcınızda http://localhost:8000 adresine giderek uygulamayı kullanmaya başlayabilirsiniz.
