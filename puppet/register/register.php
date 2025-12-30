<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>非遗木偶戏 - 注册</title>
    <link rel="stylesheet" href="../CSS/register.css">
</head>
<body>
<div class="register-container">
    <div class="register-card">
        <h2 class="register-title">木偶戏<span>注册</span></h2>
        <form id="registerForm" class="register-form" method="post" action="../config/register_config.php">

            <div class="form-group">
                <label class="form-label" for="username">传承账号</label>
                <input type="text" id="username" name="username" placeholder="请输入账号（6-12位）" required>
                <span class="error-msg" id="usernameError"></span>
            </div>

            <div class="form-group">
                <label class="form-label" for="password">登录密码</label>
                <input type="password" id="password" name="password" placeholder="请输入密码（8-16位，含字母数字）" required>
                <span class="error-msg" id="passwordError"></span>
            </div>
            <button type="submit" class="submit-btn">提交注册</button>
        </form>
    </div>
</div>
<script>
    // 绑定注册表单提交事件
    document.getElementById('registerForm').addEventListener('submit', function(e) {
        e.preventDefault(); // 阻止表单默认提交行为

        // 获取表单数据
        const formData = new FormData(this);

        // 发送请求到后端
        fetch('../config/register_config.php', {
            method: 'POST',
            body: formData
        })
            .then(response => response.json())
            .then(data => {

                alert(data.msg);

                if (data.success) {
                    window.location.href = '../login/login.php';
                }
            })
            .catch(() => {
                // 捕获所有异常
                alert('注册请求失败，请稍后重试');
            });
    });
</script>
</body>
</html>