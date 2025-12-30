<?php
//PDO
define('DB_HOST', 'localhost'); // 数据库主机
define('DB_USER', 'root'); // 数据库用户名
define('DB_PWD', '123456'); // 数据库密码
define('DB_NAME', 'puppet_db'); // 数据库名
define('DB_CHARSET', 'utf8mb4'); // 字符集，

// 创建数据库连接
try {
    $pdo = new PDO(
        "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=".DB_CHARSET,
        DB_USER,
        DB_PWD,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // 抛出异常处理错误
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC // 默认关联数组获取数据
        ]
    );
} catch (PDOException $e) {
    // 连接失败时返回JSON错误
    header("Content-Type: application/json; charset=utf-8");
    echo json_encode(['success' => false, 'msg' => '数据库连接失败：'.$e->getMessage()]);
    exit;
}
?>