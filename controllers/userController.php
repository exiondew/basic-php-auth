<?php

require_once __DIR__ . "/../config/database.php";
require_once __DIR__ . "/../helpers/generateRandomID.php";

function register_user($username, $email, $password)
{

    $id = generateUniqueRandomID();
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $result =  query("INSERT INTO users (id, username, email, password) VALUES (?, ?, ?, ?)", [$id, $username, $email, $hashed_password]);

    return $result;
}
