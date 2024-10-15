<?php

require_once __DIR__ . "/../config/database.php";

function validate_username($username)
{

    if (empty($username)) {
        return "Kullanıcı adı boş bırakılamaz.";
    } else if (strlen($username) < 3 || strlen($username) > 16) {
        return "Kullanıcı adınız 3-16 karakter arasında olmalıdır.";
    } else if (!preg_match('/^[a-zA-Z][a-zA-Z0-9._]*$/', $username)) {
        return "Kullanıcı adı sadece İngilizce karakterler, sayılar, nokta ve alt çizgi içerebilir ve sayı ile başlayamaz.";
    } else if (preg_match('/\s/', $username)) {
        return "Kullanıcı adı boşluk içeremez.";
    } else if (is_username_exists($username)) {
        return "Bu kullanıcı adı alınmış.";
    } else {
        return null;
    }
}

function validate_email($email)
{

    if (empty($email)) {
        return "E-posta boş bırakılamaz.";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return "Lütfen geçerli bir e-posta adresi girin.";
    } else if (is_email_exists($email)) {
        return "Bu e-posta adresi kullanılmış.";
    } else {

        return null;
    }
}

function validate_password($password)
{

    if (empty($password)) {
        return "Şifre boş bırakılamaz.";
    } else if (strlen($password) < 8 || strlen($password) > 32) {
        return "Şifreniz 8-32 karakter arasında olmalıdır.";
    } else if (!preg_match('/[a-z]/', $password)) {
        return "Şifre en az bir küçük harf içermelidir.";
    } else if (!preg_match('/[A-Z]/', $password)) {
        return "Şifre en az bir büyük harf içermelidir.";
    } else if (!preg_match('/[0-9]/', $password)) {
        return "Şifre en az bir rakam içermelidir.";
    } else if (!preg_match('/[\W_]/', $password)) {
        return "Şifre en az bir özel karakter içermelidir.";
    } else {
        return null;
    }
}

function validate_password_confirmation($password, $confirmPassword)
{

    if ($password !== $confirmPassword) {
        return "Şifreler uyuşmuyor!";
    } else {
        return validate_password($password);
    }
}

// Kullanıcı giriş doğrulama fonksiyonu
function validateLogin($username, $password)
{
    $usernameError = validate_username($username);
    if ($usernameError) return $usernameError;

    $passwordError = validate_password($password);
    if ($passwordError) return $passwordError;

    return null;
}

function is_username_exists($username)
{
    $user = query("SELECT * FROM users WHERE username = ?", [$username]);

    return $user;
}

function is_email_exists($email)
{

    $user = query("SELECT * FROM users WHERE email = ?", [$email]);

    return $user;
}
