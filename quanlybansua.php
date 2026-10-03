<?php
$host = 'localhost';
$port = 3306;
$dbname = 'QuanLyBanSua';
$username = 'root'; // Thay bằng user MySQL của bạn (mặc định XAMPP/WAMP là root)
$password = '';     // Thay bằng mật khẩu tương ứng (mặc định XAMPP thường để trống)

try {
    $dsn = "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8mb4";
    $conn = new PDO($dsn, $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
    
    echo "Kết nối CSDL QuanLyBanSua thành công!";
} catch (PDOException $e) {
    die("Lỗi kết nối: " . $e->getMessage());
}
?>