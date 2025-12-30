<?php
session_start();
header("Content-Type: application/json; charset=utf-8");
require_once '../config/db_config.php'; // 按实际路径调整

$result = ['success' => false, 'msg' => '注册失败'];

// 1. 接收并过滤数据
$username = trim($_POST['username'] ?? '');
$password = trim($_POST['password'] ?? '');

// 2. 非空验证
if (empty($username) || empty($password)) {
    $result['msg'] = '请填写完整注册信息';
    echo json_encode($result);
    exit;
}

// 3.账号6-12位（无特殊限制）、密码8-16位含字母数字
if (strlen($username) < 6 || strlen($username) > 12) {
    $result['msg'] = '传承账号需为6-12位';
    echo json_encode($result);
    exit;
}
if (!preg_match('/^(?=.*[a-zA-Z])(?=.*\d)[a-zA-Z\d]{8,16}$/', $password)) {
    $result['msg'] = '登录密码需8-16位，含字母和数字';
    echo json_encode($result);
    exit;
}

try {
    // 4. 检查账号是否已存在
    $stmt = $pdo->prepare("SELECT id FROM users WHERE username = :username LIMIT 1");
    $stmt->bindParam(':username', $username);
    $stmt->execute();

    if ($stmt->fetch()) {
        $result['msg'] = '该传承账号已被注册';
        echo json_encode($result);
        exit;
    }

    // 5. 插入新用户（明文存储，仅测试用）
    $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);

    if ($stmt->execute()) {
        $result['success'] = true;
        $result['msg'] = '注册成功，请登录';
    }
} catch (PDOException $e) {
    $result['msg'] = '数据库错误：'.$e->getMessage();
}

echo json_encode($result);
exit;
?>