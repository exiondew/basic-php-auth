<?php

$error_message = (object)[
  'username' => null,
  'email' => null,
  'password' => null,
  'password_confirm' => null
];

if ($_SERVER["REQUEST_METHOD"] === "POST") {

  require_once "../../config/database.php";
  require_once "../../helpers/functions.php";
  require_once "../../middlewares/auth.php";
  require_once "../../controllers/userController.php";


  $username = $_POST["username"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $password_confirm = $_POST["password_confirm"];

  $error_message->username = validate_username($username);
  $error_message->email = validate_email($email);
  $error_message->password = validate_password($password);
  $error_message->password_confirm = validate_password_confirmation($password, $password_confirm);
}

if (!($error_message->username || $error_message->email || $error_message->password || $error_message->password_confirm)) {

  $user = register_user($username, $email, $password);
}

?>

<!DOCTYPE html>
<html lang="tr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Hesap Oluştur</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="../styles.css" />
</head>

<body style="font-family: Poppins, Arial, Helvetica, sans-serif" class="bg-[#25262d] flex flex-center">
  <form method="post" class="flex flex-col bg-gray-100 w-96 rounded-md p-3 gap-1">
    <h1 class="font-bold text-4xl">Kayıt Ol</h1>
    <hr class="border border-black" />

    <div class="flex-col flex items-center mt-2 gap-1 w-full">
      <?php
      require_once "../utils/functions.php"; // Yardımcı fonksiyonları içe aktarıyoruz

      // Hata varsa göster, yoksa boş string döner
      echo create_input("username", "text", "Kullanıcı Adı", "", true, $error_message->username
        ?? "");
      echo create_input(
        "email",
        "email",
        "E - Posta",
        "",
        true,
        $error_message->email ?? ""
      );
      echo create_input(
        "password",
        "password",
        "Şifre",
        "",
        true,
        $error_message->password ?? ""
      );
      echo
      create_input(
        "password_confirm",
        "password",
        "Şifreni Onayla",
        "",
        true,
        $error_message->password_confirm ?? ""
      ); ?>

      <button
        class="mt-2 py-2 w-2/3 bg-gray-500 text-lg text-white font-semibold duration-200 rounded-full shadow-md hover:bg-gray-700 focus:outline-none focus:ring focus:ring-gray-400 focus:ring-opacity-75">
        Kayıt Ol
      </button>

      <a href="/login" class="cursor-pointer">Zaten bir hesabın var mı? <b>Hemen Giriş Yap!</b></a>
    </div>
  </form>
</body>

</html>