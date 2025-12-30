<?php
//验证登录
session_start();
if (!isset($_SESSION['is_login']) || $_SESSION['is_login'] !== true) {
    header('Location: ../login/login.php');
    exit;

}
//获取用户
$username = $_SESSION['username'] ?? '用户';