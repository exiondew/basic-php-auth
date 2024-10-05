<?php
// Kullanıcı adı doğrulama fonksiyonu
function username_validation($username) {
    if (empty($username)) {
        return "Kullanıcı adı boş olamaz."; // Eğer kullanıcı adı boşsa hata döndür
    }
    return null; // Hata yoksa null döner
}

// Şifre doğrulama fonksiyonu
function password_validation($password) {
    if (strlen($password) < 8) {
        return "Şifre en az 8 karakter olmalıdır."; // Şifre uzunluğu kontrolü
    }
    return null; // Hata yoksa null döner
}

// E-posta doğrulama fonksiyonu
function email_validation($email) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return "Geçersiz e-posta formatı."; // E-posta formatı kontrolü
    }
    return null; // Hata yoksa null döner
}

// Şifre ve şifre tekrar doğrulama fonksiyonu
function password_and_password_confirm_validation($password, $password_confirm) {
    if ($password !== $password_confirm) {
        return "Şifreler eşleşmiyor."; // Şifrelerin eşleşip eşleşmediğini kontrol eder
    }
    return null; // Hata yoksa null döner
}
