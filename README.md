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

## Kurulum

Projeyi kendi bilgisayarınızda çalıştırmak için aşağıdaki adımları takip edebilirsiniz.

### Gereksinimler

- PHP 7.4 veya üzeri
- MySQL veritabanı
- Composer

### Adım 1: Depoyu klonlayın

```bash
git clone https://github.com/kullanici_adiniz/mynotes.git
cd mynotes
```

### Adım 2: Composer ile bağımlılıkları yükleyin

```bash
composer install
```

### Adım 3: Veritabanı Kurulumu
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

### Adım 4: Veritabanı Bağlantı Ayarlarını Yapın
```bash
// config.php
    'database' => [
        'host' => 'localhost',
        'port' => '3306',
        'dbname' => 'PhpDemo',
        'user' => 'root',
        'password' => 'your_password'
    ]
```

### Adım 5: Sunucuyu Başlatın
```bash
php -S localhost:8000 -t public
```

### Adım 6: Uygulamayı Kullanın
Tarayıcınızda http://localhost:8000 adresine giderek uygulamayı kullanmaya başlayabilirsiniz.
