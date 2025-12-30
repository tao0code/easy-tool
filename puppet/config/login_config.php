<?php
session_start();
header("Content-Type: application/json; charset=utf-8");
require_once '../config/db_config.php';

$result = ['success' => false, 'msg' => '登录失败'];

$username = trim($_POST['username'] ?? '');
$password = trim($_POST['password'] ?? '');

// 非空验证
if (empty($username) || empty($password)) {
    $result['msg'] = '账号或密码不能为空';
    echo json_encode($result);
    exit;
}

try {
    // 查询用户
    $stmt = $pdo->prepare("SELECT username FROM users WHERE username = :username AND password = :password LIMIT 1");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // 登录成功：存储登录状态到会话（关键！）
        $_SESSION['is_login'] = true; // 标记已登录
        $_SESSION['username'] = $user['username']; // 存储用户名
        $result['success'] = true;
        $result['msg'] = '登录成功';
    } else {
        $result['msg'] = '账号或密码错误';
    }
} catch (PDOException $e) {
    $result['msg'] = '数据库错误：' . $e->getMessage();
}

echo json_encode($result);
exit;
?>