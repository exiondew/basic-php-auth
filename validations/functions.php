<?php

function username_validation($username)
{
    if (empty($username)) {

        return "Kullanıcı adı boş bırakılamaz";
    } else if (strlen($username) < 3) {
        return "Kullanıcı adınız 3 karakterden uzun olmalıdır";
    } else {
        return null;
    }
}

function email_validation($email)
{
    if (empty($email)) {
        return "E - posta boş bırakılamaz";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return "Lütfen geçerli bir e - posta adresi girin";
    } else {
        return null;
    }
}

function password_validation($password)
{

    $length = strlen($password);

    if (empty($password)) {
        return "Şifre boş bırakılamaz";
    } else if ($length < 8 || $length > 32) {
        return "Şifreniz 8 - 32 karakter arasında olmalıdır";
    } else {
        return null;
    }
}

function password_and_password_confirm_validation($password, $confirm_password)
{
    if ($password != $confirm_password) {
        return "Şifreler uyuşmuyor!";
    } else {
        return null;
    }
}