<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>非遗木偶戏 - 登录</title>
    <!-- 引入字体图标（用于表单图标） -->
    <link rel="stylesheet" href="https://cdn.bootcdn.net/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- 引入登录样式 -->
    <link rel="stylesheet" href="../CSS/login.css">
</head>
<body>
<!-- 核心登录框容器 -->
<div class="login-box">
    <!-- 木偶戏风格logo -->
    <div class="login-logo">
        <i class="fas fa-theater-masks"></i>
        <h2>非遗木偶戏</h2>
    </div>

    <form class="login-form" action="../config/login_config.php" method="POST" id="loginForm">
        <div class="form-item">
            <label for="username">
                <i class="fas fa-user"></i>
            </label>
            <input type="text" id="username" name="username" placeholder="请输入账号" required>
        </div>
        <div class="form-item">
            <label for="password">
                <i class="fas fa-lock"></i>
            </label>
            <input type="password" id="password" name="password" placeholder="请输入密码" required>
        </div>
        <div class="form-options">
            <a href="../register/register.php" class="forgot">注册用户</a>
        </div>
        <button type="submit" class="login-btn">登录</button>
    </form>
</div>
</body>
<script>
    // 表单id---loginForm----login
    document.getElementById('loginForm').addEventListener('submit', function(e) {
        e.preventDefault();
        const formData = new FormData(this);
        fetch('../config/login_config.php', {
            method: 'POST',
            body: formData
        }).then(res => res.json()).then(data => {
            alert(data.msg);
            if (data.success) {
                // 登录成功，跳转到首页
                window.location.href = '../connect/index.php';
            }
        });
    });

</script>
</html>