# MyNotes

**MyNotes**, PHP ile geliştirilmiş basit bir not alma uygulamasıdır. Bu proje, PHP'nin arka plan işleyişini öğrenmek ve **REST API** ile çalışmayı deneyimlemek amacıyla oluşturulmuştur. Uygulama, kullanıcıların not ekleyebilmesi, görüntüleyebilmesi, düzenleyebilmesi ve silebilmesine olanak tanır. **Composer** ile paket yönetimi yapılmış ve testler için **Pest** framework'ü kullanılmıştır.

## Özellikler

- Kullanıcı Kayıt Olma ve Giriş Yapma
- Not Ekleme, Düzenleme ve Silme
- Notları Listeleme
- REST API ile Not Yönetimi
- Basit ve Fonksiyonel Arayüz
- MySQL Veritabanı Desteği

## Kullanılan Teknolojiler ve Araçlar

- **PHP**: Backend geliştirme dili
- **Composer**: PHP için bağımlılık yönetimi
- **Pest**: PHP uygulamaları için test framework'ü
- **MySQL**: Veritabanı yönetim sistemi
- **REST API**: Not işlemleri için kullanılan API yapısı

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

### Adım 3: Veritabanı ayarlarını yapın
**config.php** dosyasındaki MySQL ayarlarını kendi yerel veritabanınıza göre düzenleyin.
```bash
// config.php
    'database' => [
        'host' => 'localhost',
        'port' => '3306',
        'dbname' => 'PhpDemo',
        'user' => 'root',
        'password' => 'MCopur123'
    ]
```


### Adım 4: Veritabanını oluşturun
    
    ```bash
    php artisan migrate
    ```

