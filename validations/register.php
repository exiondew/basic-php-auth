<?php
require "./functions.php";

$error_message = (object)[
    'username' => null,
    'password' => null,
    'email' => null,
    'password_confirm' => null
];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $password_confirm = $_POST["password_confirm"];

    $error_message->username = username_validation($username);
    $error_message->password = password_validation($password);
    $error_message->email = email_validation($email);
    $error_message->password_confirm = password_and_password_confirm_validation($password, $password_confirm);
}
