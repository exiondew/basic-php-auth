<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kayıt Ol</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body style="font-family: Poppins, Arial, Helvetica, sans-serif;" class="bg-[#25262d] flex flex-center">

    <?php include "./validations/register.php" ?>

    <form method="post" class="flex flex-col bg-gray-100 w-96 rounded-md p-3 gap-1">

        <h1 class="font-bold text-4xl">Kayıt Ol</h1>
        <hr class="border border-black">

        <div class="flex-col flex items-center mt-2 gap-1 w-full">

            <?php

            require_once "functions.php";

            echo create_input("username", "text", "Kullanıcı Adı", "", true, $error_message->username);

            echo create_input("email", "email", "E - Posta", "", true, $error_message->email);

            echo create_input("password", "password", "Şifre", "", true, $error_message->password);
            echo create_input(
                "password_confirm",
                "password",
                "Şifreni Onayla",
                "",
                true,
                $error_message->password_confirm
            );
            ?>
            <div class="flex items-center justify-between w-full">
                <div class="flex flex-center gap-1">
                    <input type="checkbox" name="remember-me" id="remember-me">
                    <label for="remember-me">Beni Hatırla!</label>
                </div>
                <a href="" title="Şifrenizi yenileyin!"
                    class="text-gray-500 duration-200 hover:text-black focus:text-black">Şifremi Unuttum?</a>
            </div>
            <button
                class="my-1 py-2 w-2/3 bg-gray-500 text-lg text-white font-semibold duration-200 rounded-full shadow-md hover:bg-gray-700 focus:outline-none focus:ring focus:ring-gray-400 focus:ring-opacity-75">Kayıt
                Ol</button>
            <a href="/" class="cursor:pointer">Zaten bir hesabın var mı? <b>Hemen Giriş Yap!</b></a>
        </div>

    </form>
    <!-- 
    <script>
    setTimeout(() => {
        window.location.reload();
    }, 5000);
    </script> -->

</body>

</html>