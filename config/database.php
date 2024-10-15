<?php
// PDO ile veritabanına bağlanmak için temel fonksiyon
function connectDB()
{

    require_once __DIR__ . "/env.php";


    $dsn = (string) "mysql:host=" . $DB_HOST . ";dbname=" . $DB_NAME . ";charset=utf8mb4";
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    try {
        $pdo = new PDO($dsn, $DB_USER, $DB_PASSWORD, $options);
        return $pdo;
    } catch (PDOException $e) {
        throw new PDOException($e->getMessage(), (int)$e->getCode());
    }
}

// Güvenli bir şekilde SQL sorgusu çalıştırmak için query fonksiyonu
function query($sql, $params = null)
{
    // Veritabanı bağlantısını al
    $pdo = connectDB();

    try {
        // Prepared statement oluştur
        $stmt = $pdo->prepare($sql);

        // Eğer parametre belirtilmişse execute ile parametreleri bağla
        // Parametre yoksa direkt execute yap
        if ($params) {
            $stmt->execute($params);
        } else {
            $stmt->execute();
        }

        // Sonuçları fetchAll() ile döndür
        return $stmt->fetchAll();
    } catch (PDOException $e) {

        return 'Error: ' . $e->getMessage();
    }
}
