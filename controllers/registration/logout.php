<?php

// 2. Tüm oturum verilerini temizle
$_SESSION = [];

// 3. Tarayıcıda oluşturulmuş olan session cookie'sini de silmek gerekiyor
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// 4. Oturumu tamamen yok et
session_destroy();

// 5. Debug amaçlı oturumun boş olduğunu kontrol edelim
//dd($_SESSION); // Bu işlem oturumu sonlandırdığından, muhtemelen boş bir array dönecektir

// 6. Kullanıcıyı giriş sayfasına yönlendir
header("Location: /login");
exit();

